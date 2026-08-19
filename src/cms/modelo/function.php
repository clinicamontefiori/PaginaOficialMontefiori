<?php
function canonical_url() {

    // Detectar protocolo
    $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off'
        || $_SERVER['SERVER_PORT'] == 443)
        ? "https://" : "http://";

    // Dominio
    $host = $_SERVER['HTTP_HOST'];

    // Ruta sin parámetros GET
    $uri = strtok($_SERVER['REQUEST_URI'], '?');

    // Quitar slash final excepto home
    if ($uri != '/') {
        $uri = rtrim($uri, '/');
    }

    return $protocol . $host . $uri;
}


// Función para subir archivos y devolver solo el nombre
function subirArchivo($campo, $dir, $permitidos){
    if(!isset($_FILES[$campo]) || $_FILES[$campo]['error'] != UPLOAD_ERR_OK){
        return null;
    }

    $fileTmp = $_FILES[$campo]['tmp_name'];
    $fileName = basename($_FILES[$campo]['name']);
    $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

    if(!in_array($fileExt, $permitidos)){
        return null;
    }

    // Nombre limpio y único
    $fileNameNuevo = time() . "_" . preg_replace('/[^a-zA-Z0-9_\-\.]/','_', $fileName);
    $destino = $dir . $fileNameNuevo;

    if(move_uploaded_file($fileTmp, $destino)){
        return $fileNameNuevo; // SOLO el nombre
    }
    return null;
}

/**
 * Función para adjuntar archivos a un correo
 * @param PHPMailer $mail Instancia de PHPMailer
 * @param mixed $archivos String con ruta o array de archivos
 * @param string $nombreOpcional Nombre opcional para el archivo
 */
function adjuntarArchivos(&$mail, $archivos, $nombreOpcional = null) {
    if (empty($archivos)) {
        return;
    }
    
    // Si es un string (un solo archivo)
    if (is_string($archivos)) {
        if (file_exists($archivos)) {
            $mail->addAttachment($archivos, $nombreOpcional ?: basename($archivos));
        } else {
            throw new Exception("Archivo no encontrado: $archivos");
        }
    }
    
    // Si es un array (múltiples archivos)
    if (is_array($archivos)) {
        foreach ($archivos as $archivo) {
            if (is_string($archivo) && file_exists($archivo)) {
                $mail->addAttachment($archivo);
            } elseif (is_array($archivo)) {
                // Si el array tiene 'ruta' y 'nombre'
                if (isset($archivo['ruta']) && file_exists($archivo['ruta'])) {
                    $nombre = $archivo['nombre'] ?? basename($archivo['ruta']);
                    $mail->addAttachment($archivo['ruta'], $nombre);
                }
            }
        }
    }
    
    // Si vienen de $_FILES
    if (isset($archivos['tmp_name']) && isset($archivos['name'])) {
        if ($archivos['error'] == 0 && file_exists($archivos['tmp_name'])) {
            $mail->addAttachment($archivos['tmp_name'], $archivos['name']);
        }
    }
}

function convertirFechaDB($fechaDB) {
    // Crear objeto DateTime desde la fecha de la DB
    $dt = new DateTime($fechaDB);

    // Meses en español
    $meses = [
        1 => "Enero", 2 => "Febrero", 3 => "Marzo", 4 => "Abril",
        5 => "Mayo", 6 => "Junio", 7 => "Julio", 8 => "Agosto",
        9 => "Setiembre", 10 => "Octubre", 11 => "Noviembre", 12 => "Diciembre"
    ];

    // Extraer datos
    $dia = $dt->format("j");
    $mes = $meses[(int)$dt->format("n")];
    $anio = $dt->format("Y");

    // Hora con am/pm
    $hora = $dt->format("g:i a"); // ejemplo: "5:35 pm"
    $hora = str_replace(" ", "", $hora); // quitar espacio → "5:35pm"

    // Armar salida final
    return "$dia $mes $anio $hora";
}

// EJEMPLO:
//echo convertirFechaDB("2025-12-01 04:43:38");

function subir_archivo_especialidad(
    $input_name,
    $directorio_destino,
    $input_name_act,
    $nombre_personalizado = null
) {

    // Validar si se ha enviado archivo
    if (!isset($_FILES[$input_name]) || $_FILES[$input_name]['error'] !== UPLOAD_ERR_OK) {
        return $input_name_act;
    }

    $archivo = $_FILES[$input_name];

    // Obtener extensión
    $ext = strtolower(pathinfo($archivo['name'], PATHINFO_EXTENSION));

    // ❌ Solo permitir SVG
    if ($ext !== 'svg') {
        return $input_name_act;
    }

    // Validar MIME real (seguridad)
    $finfo = finfo_open(FILEINFO_MIME_TYPE);
    $mime = finfo_file($finfo, $archivo['tmp_name']);
    finfo_close($finfo);

    if ($mime !== 'image/svg+xml') {
        return $input_name_act;
    }

    // Nombre final del archivo
    if (!empty($nombre_personalizado)) {
        $nombre_archivo = $nombre_personalizado . '.svg';
    } else {
        $nombre_archivo = $archivo['name'];
    }

    // Crear directorio si no existe
    $ruta_dir = '../../uploads/' . rtrim($directorio_destino, '/');
    if (!is_dir($ruta_dir)) {
        mkdir($ruta_dir, 0755, true);
    }

    $ruta_destino = $ruta_dir . '/' . $nombre_archivo;

    // Mover archivo
    if (move_uploaded_file($archivo['tmp_name'], $ruta_destino)) {
        return $nombre_archivo;
    }

    return $input_name_act;
}


function subir_archivo($input_name, $directorio_destino, $input_name_act, $extensiones_permitidas = []) {

    if (!isset($_FILES[$input_name]) || $_FILES[$input_name]['error'] !== UPLOAD_ERR_OK) {
        return $input_name_act;
    }

    $archivo = $_FILES[$input_name];

    // =========================
    // EXTENSIÓN
    // =========================
    $ext = strtolower(pathinfo($archivo['name'], PATHINFO_EXTENSION));

    if (!empty($extensiones_permitidas) && !in_array($ext, $extensiones_permitidas)) {
        return $input_name_act;
    }

    // =========================
    // LIMPIAR NOMBRE (SEO URL)
    // =========================
    $nombre_original = pathinfo($archivo['name'], PATHINFO_FILENAME);

    // quitar tildes
    $nombre_limpio = iconv('UTF-8', 'ASCII//TRANSLIT', $nombre_original);

    // minúsculas
    $nombre_limpio = strtolower($nombre_limpio);

    // reemplazar espacios por guiones
    $nombre_limpio = preg_replace('/\s+/', '-', $nombre_limpio);

    // eliminar caracteres especiales
    $nombre_limpio = preg_replace('/[^a-z0-9\-]/', '', $nombre_limpio);

    // eliminar múltiples guiones
    $nombre_limpio = preg_replace('/-+/', '-', $nombre_limpio);

    // quitar guiones inicio/fin
    $nombre_limpio = trim($nombre_limpio, '-');

    // =========================
    // EVITAR DUPLICADOS
    // =========================
    $nombre_archivo = $nombre_limpio . '-' . time() . '.' . $ext;

    // =========================
    // DIRECTORIO
    // =========================
    $ruta_dir = '../../uploads/' . rtrim($directorio_destino, '/');

    if (!is_dir($ruta_dir)) {
        mkdir($ruta_dir, 0755, true);
    }

    $ruta_destino = $ruta_dir . '/' . $nombre_archivo;

    // =========================
    // SUBIR ARCHIVO
    // =========================
    if (move_uploaded_file($archivo['tmp_name'], $ruta_destino)) {

        // =========================
        // COMPRESIÓN
        // =========================
        switch ($ext) {

            case 'jpg':
            case 'jpeg':
                $img = imagecreatefromjpeg($ruta_destino);
                imagejpeg($img, $ruta_destino, 75);
                imagedestroy($img);
                break;

            case 'png':
                $img = imagecreatefrompng($ruta_destino);
                imagepng($img, $ruta_destino, 6);
                imagedestroy($img);
                break;

            case 'webp':
                $img = imagecreatefromwebp($ruta_destino);
                imagewebp($img, $ruta_destino, 75);
                imagedestroy($img);
                break;
        }

        return $nombre_archivo;
    }

    return $input_name_act;
}


function getData($path, $params = [], $token = null)
{
    // URL base de la API
    $baseUrl = "https://servicios.montefiori.com.pe/api/CitaSivsa/";
    //$baseUrl = "https://serviciotestv2.montefiori.com.pe:8085/api/CitaSivsa/";
    //$baseUrl = "https://servicios.montefiori.com.pe/api/CitaSivsa/";

    // Construir URL completa (con parámetros si existen)
    $query = '';
    if (!empty($params) && is_array($params)) {
        $query = '?' . http_build_query($params);
    }

    $url = $baseUrl . ltrim($path, '/') . $query;

    // Inicializar cURL
    $curl = curl_init();

    // Cabeceras HTTP
    $headers = [
        'Accept: application/json'
    ];

    if (!empty($token)) {
        $headers[] = 'Authorization: Bearer ' . $token;
    }

    // Configuración segura
    curl_setopt_array($curl, [
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_TIMEOUT => 10,
        CURLOPT_SSL_VERIFYPEER => true,
        CURLOPT_SSL_VERIFYHOST => 2,
        CURLOPT_HTTPHEADER => $headers,
    ]);

    // Ejecutar
    $response = curl_exec($curl);

    // Verificar errores
    if (curl_errno($curl)) {
        $error_msg = curl_error($curl);
        curl_close($curl);
        return (object)[
            'statusCode' => 500,
            'isError' => true,
            'message' => "Error al conectar con el servicio: $error_msg",
            'result' => null
        ];
    }

    // Obtener código HTTP
    $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
    curl_close($curl);

    // Decodificar JSON
    $data = json_decode($response);

    // Validar estructura
    if ($httpCode !== 200 || !$data) {
        return (object)[
            'statusCode' => $httpCode,
            'isError' => true,
            'message' => "Respuesta no válida del servicio",
            'result' => null
        ];
    }

    return $data;
}




function utms($key)
{
    $utm_id = isset($_GET['utm_id']) && $_GET['utm_id'] != '' ? $_GET['utm_id'] : '';
    $utm_source = isset($_GET['utm_source']) && $_GET['utm_source'] != '' ? $_GET['utm_source'] : '';
    $utm_medium = isset($_GET['utm_medium']) && $_GET['utm_medium'] != '' ? $_GET['utm_medium'] : '';
    $utm_campaign = isset($_GET['utm_campaign']) && $_GET['utm_campaign'] != '' ? $_GET['utm_campaign'] : '';
    $utm_term = isset($_GET['utm_term']) && $_GET['utm_term'] != '' ? $_GET['utm_term'] : '';
    $utm_content = isset($_GET['utm_content']) && $_GET['utm_content'] != '' ? $_GET['utm_content'] : '';
    $gclid = isset($_GET['gclid']) && $_GET['gclid'] != '' ? $_GET['gclid'] : '';
    $key = $key !== false ? '<input type="hidden" name="tipo" value="' . $key . '" no>' : '';

    $inputUTMs = '
            <input type="hidden" name="utm_id" value="' . $utm_id . '" no>
            <input type="hidden" name="utm_source" value="' . $utm_source . '" no>
            <input type="hidden" name="utm_medium" value="' . $utm_medium . '" no>
            <input type="hidden" name="utm_campaign" value="' . $utm_campaign . '" no>
            <input type="hidden" name="utm_term" value="' . $utm_term . '" no>
            <input type="hidden" name="utm_content" value="' . $utm_content . '" no>
            <input type="hidden" name="gclid" value="' . $gclid . '" no>
            ' . $key . '
        ';

    echo $inputUTMs;
}


function send_data($email,$asunto,$body){

    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'no-reply@montefiori.com'; // Tu dirección de correo de Gmail
    $mail->Password   = 'N0pLy2015/';       // Tu contraseña de Gmail
    //$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->CharSet = 'UTF-8';
    $mail->Port       = 587; // Puerto SMTP de Gmail

    // Configura los detalles del remitente y destinatario
    $mail->setFrom('no-reply@montefiori.com', 'Clínica Montefiori');
    $mail->addAddress($email, 'Hola');
    //$mail->addReplyTo('tu_correo@gmail.com', 'Tu Nombre');

    // Contenido del correo electrónico
    $mail->isHTML(true);
    $mail->Subject = $asunto;
    $mail->Body    = $body;

    // Envía el correo electrónico
    $mail->send();
    //echo 'El correo electrónico se envió correctamente.';

}

function urls_page_cms($url) { 
      // Tranformamos todo a minusculas 
      //$url = strtolower($url);
      //Rememplazamos caracteres especiales latinos 
      $find = array('á', 'é', 'í', 'ó', 'ú', 'ñ'); 
      $repl = array('a', 'e', 'i', 'o', 'u', 'n'); 
      $url = str_replace ($find, $repl, $url); 
      // Añadimos los guiones 
      $find = array(' ', '&', '\r\n', '\n', '+');
      $url = str_replace ($find, '-', $url); 
      $url = strtolower($url);
      // Eliminamos y Reemplazamos otros carácteres especiales 
      // $find = array('/[^a-z0-9\-<>]/', '/[\-]+/', '/<[^>]*>/'); 
      // $repl = array('', '-', ''); 
      // $url = preg_replace ($find, $repl, $url); 
      return $url; 
}

function urls_amigables($url) { 
      // Tranformamos todo a minusculas 
      $url = strtolower($url);
      //Rememplazamos caracteres especiales latinos 
      $find = array('á', 'é', 'í', 'ó', 'ú', 'ñ'); 
      $repl = array('a', 'e', 'i', 'o', 'u', 'n'); 
      $url = str_replace ($find, $repl, $url); 
      // Añadimos los guiones 
      $find = array(' ', '&', '\r\n', '\n', '+');
      $url = str_replace ($find, '-', $url); 
      // Eliminamos y Reemplazamos otros carácteres especiales 
      $find = array('/[^a-z0-9\-<>]/', '/[\-]+/', '/<[^>]*>/'); 
      $repl = array('', '-', ''); 
      $url = preg_replace ($find, $repl, $url); 
      return $url; 
}

function urls_medico($url) { 
      // Tranformamos todo a minusculas 
      $url = strtolower($url);
      //Rememplazamos caracteres especiales latinos 
      $find = array('á', 'é', 'í', 'ó', 'ú', 'ñ'); 
      $repl = array('a', 'e', 'i', 'o', 'u', 'n'); 
      $url = str_replace ($find, $repl, $url); 
      // Añadimos los guiones 
      $find = array(' ', '&', '\r\n', '\n', '+');
      $url = str_replace ($find, '-', $url); 
      // Eliminamos y Reemplazamos otros carácteres especiales 
      $find = array('/[^a-z0-9\-<>]/', '/[\-]+/', '/<[^>]*>/'); 
      $repl = array('', '-', ''); 
      $url = preg_replace ($find, $repl, $url); 
      return $url; 
}

function urls_especialidad($url) { 
      // Tranformamos todo a minusculas 
      $url = strtolower($url);
      //Rememplazamos caracteres especiales latinos 
      $find = array('á', 'é', 'í', 'ó', 'ú', 'ñ'); 
      $repl = array('a', 'e', 'i', 'o', 'u', 'n'); 
      $url = str_replace ($find, $repl, $url); 
      // Añadimos los guiones 
      $find = array(' ', '&', '\r\n', '\n', '+');
      $url = str_replace ($find, '-', $url); 
      // Eliminamos y Reemplazamos otros carácteres especiales 
      $find = array('/[^a-z0-9\-<>]/', '/[\-]+/', '/<[^>]*>/'); 
      $repl = array('', '-', ''); 
      $url = preg_replace ($find, $repl, $url); 
      return $url; 
}

function nombre_upload($url) { 
      // Tranformamos todo a minusculas 
      $url = strtolower($url);
      $url = preg_replace("/[^a-zA-Z0-9_.-]/", "", $url);
      return $url; 
}



// function lista_registros ($servicio,$ruta){

//       $searproye = file_get_contents(DIR_SERVER."$ruta/$servicio.json");
//       $searproye = json_decode($searproye);
//        return $searproye; 

// }

function detalle_registros ($servicio,$ruta){

      $searproye = file_get_contents("$ruta/$servicio.json");
      $searproye = json_decode($searproye);
       return $searproye; 

}

function lista_registros_cms($servicio, $ruta)
{
    $archivo = $ruta . '/' . $servicio . '.json';

    if (!file_exists($archivo)) {
        return [];  
    }

    $contenido = file_get_contents($archivo);

    if ($contenido === false || trim($contenido) === '') {
        return [];
    }

    $json = json_decode($contenido);

    if (json_last_error() !== JSON_ERROR_NONE || $json === null) {
        return [];
    }

    return $json;
}



function detalle_registros_cms ($servicio,$ruta){
    $searproye = file_get_contents("$ruta/$servicio.json");
    $searproye = json_decode($searproye);
    return $searproye; 
}

function json_unico_detalle($servicio, $ruta, $data) {
    $archivo = "$ruta/$servicio.json";
    if (file_exists($archivo)) {
        $contenido = file_get_contents($archivo);
        $json = json_decode($contenido, true);

        if (isset($json[0][$data])) {
            return $json[0][$data];
        }
    }

    // Si no existe o no tiene el dato, devolvemos null o mensaje controlado
    return null;
}


function imprime_breadcrumb ($servicio,$estado=null,$page = false){

      $servicio_name = urls_amigables($servicio);
      $page_name = urls_amigables($page);
      
      $breadcrumb = '
      <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
      <div class="breadcrumb-title pe-3">'.$servicio.'</div>
      <div class="ps-3">
            <nav aria-label="breadcrumb">
                  <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="dashboard"><i class="bx bx-home-alt"></i></a>
                        </li>';
      
      if (empty($estado))  {      
      $breadcrumb.= '   <li class="breadcrumb-item active" aria-current="page"><a href="'.$servicio_name.'-add">Agregar '.$servicio.'</a></li>';
      } elseif ($page) {
       $breadcrumb.= '   <li class="breadcrumb-item active" aria-current="page"><a href="'.$page_name.'">'.$page.'</a></li>';
      }

      $breadcrumb.= '</ol>
            </nav>
      </div>
      </div>';

      return $breadcrumb; 

}

function get_row($row, $table, $id, $equal){
  global $cnx_json;
  $querymultivar = "SELECT $row FROM $table WHERE  $id='$equal' Limit 1";
  $result = $cnx_json->query($querymultivar);
  $row = $result->fetch_assoc();
  $value=$rqmv[$row];
  return $value; 
}


// function custom_str_contains($haystack, $needle) {
//     return strpos($haystack, $needle) !== false;
// }

function format_date_time($timestamp) {
    setlocale(LC_TIME, 'es_ES.UTF-8', 'es_ES', 'es');
    $date = new DateTimeImmutable($timestamp);
    $fecha_date = $date->format('d-m-Y h:i:s');
    return $fecha_date;
}

function escaparParaHTML($texto) {
    return htmlspecialchars($texto, ENT_QUOTES, 'UTF-8');
}

?>