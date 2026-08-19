<?php
//error_reporting(0);
use DevCod\DatabaseException;

require '../../core/config.php';
include '../var.php';
include '../../modelo/function.php';

$token = $_POST['token'];
$action = $_POST['action'];

$cu = curl_init();
curl_setopt($cu, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify");
curl_setopt($cu, CURLOPT_POST, 1);
curl_setopt($cu, CURLOPT_POSTFIELDS, http_build_query(array('secret' => SECRET_KEY, 'response' => $token)));
curl_setopt($cu, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($cu);
curl_close($cu);

$datos = json_decode($response, true);


if($datos['success'] == 1 && $datos['score'] >= 0.5){
        if($datos['action'] == 'presupuesto'){

        	//echo 'paso googlebot';


$uploadOk = 0;
$upload_ext = 0;
        
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_FILES['item_file_portada']) && $_FILES['item_file_portada']['error'] == UPLOAD_ERR_OK) {
        // Obtener información del archivo subido
        $file = $_FILES['item_file_portada'];
        $fileName = $file['name'];
        $fileTmpName = $file['tmp_name'];
        $fileSize = $file['size'];
        $fileError = $file['error'];
        $fileType = $file['type'];

        // Mostrar la información del archivo
        // echo "Nombre del archivo: " . htmlspecialchars($fileName) . "<br>";
        // echo "Tipo de archivo: " . htmlspecialchars($fileType) . "<br>";
        // echo "Tamaño del archivo: " . htmlspecialchars($fileSize) . " bytes<br>";
        // echo "Ubicación temporal: " . htmlspecialchars($fileTmpName) . "<br>";

        // Puedes mover el archivo a una ubicación permanente si lo deseas
        $uploadDirectory = '../../uploads/solicite-presupuesto/';
        // if (!is_dir($uploadDirectory)) {
        //     mkdir($uploadDirectory, 0755, true); // Crear el directorio si no existe
        // }

        if ($fileSize < 500000) {
        	$uploadOk = 1;
        }
        if(($fileType = "image/jpeg") && ($fileType = "image/png") &&  ($fileType = "application/pdf") && ($fileType = "application/msword") && ($fileType = "application/vnd.openxmlformats-officedocument.wordprocessingml.document")  ) {
		  	$upload_ext = 1;
		  //echo 'tipo';
		}
        $uploadPath = $uploadDirectory . basename($fileName);
        if ( ($uploadOk == 1) && ($upload_ext == 1) ){	
	        if (move_uploaded_file($fileTmpName, $uploadPath)) {
	            #echo "El archivo " . htmlspecialchars($fileName) . " ha sido subido exitosamente.<br>";
	            #echo "Ubicación final: " . htmlspecialchars($uploadPath) . "<br>";
	            // $uploadOk = 1;
	            // $upload_ext = 1;
	        } else {
	            //echo "Hubo un error al mover el archivo subido.";
	        }
    	}else{
    		//echo "Hubo un error no cumple con el peso y formato";
    	}
    } else {
        //echo "No se ha subido ningún archivo o hubo un error en la subida.";
    }
} else {
    //echo "Método de solicitud no permitido.";
}






if ( ($uploadOk == 1) && ($upload_ext == 1) ){

	

       	//$file_name_portada = $file_name_portada;
		$cnx = cnx();
		date_default_timezone_set('America/Lima');
		$ip = $_SERVER['REMOTE_ADDR'];
		$navegador = $_SERVER['HTTP_USER_AGENT'];
		$host = $_SERVER['HTTP_HOST'];


		$nombres = cleardata($_POST['nombres']);
		$primer_apellido = cleardata($_POST['primer_apellido']);
		$segundo_apellido = cleardata($_POST['segundo_apellido']);
		$fecha_de_nacimiento = cleardata($_POST['fecha_de_nacimiento']);
		$dni = cleardata($_POST['dni']);
		$sexo = cleardata($_POST['sexo']);
		$telefono_1 = cleardata($_POST['telefono_1']);
		$email = cleardata($_POST['email']);

		$especialidad_solicitada = cleardata($_POST['especialidad_solicitada']);
		$diagnostico = cleardata($_POST['diagnostico']);
		$numero_de_dias_de_hospitalizacion = cleardata($_POST['numero_de_dias_de_hospitalizacion']);
		$fecha_probable_de_intervencion = cleardata($_POST['fecha_probable_de_intervencion']);
		$compania_de_seguros = cleardata($_POST['compania_de_seguros']);
		$medico_tratante = cleardata($_POST['medico_tratante']);
		$nombre_de_la_intervencion = cleardata($_POST['nombre_de_la_intervencion']);

		//$sql = sprintf('INSERT INTO fs_table_form (fs_nombre, fs_celular, fs_email, fs_dni, fs_sede) VALUES ("%s", "%s", "%s", "%s", "%s")', $nombre, $celular, $email, $dni, $sede);
		$data = [
		'nombre' => $nombres,
		'paterno' => $primer_apellido,
		'materno' => $segundo_apellido,
		'fecha' => $fecha_de_nacimiento,
		'dni' => $dni,
		'sexo' => $sexo,
		'telefono' => $telefono_1,
		'email' => $email,
		'especialidad' => $especialidad_solicitada,
		'diagnostico' => $diagnostico,
		'dias' => $numero_de_dias_de_hospitalizacion,
		'fecha2' => $fecha_probable_de_intervencion,
		'seguro' => $compania_de_seguros,
		'medico' => $medico_tratante,
		'intervencion' => $nombre_de_la_intervencion,
		'adjunta_archivo' => $fileName

		];
		$result = $cnx->insert('fb_solicite_presupuesto', $data);


	/* GENERAR JSON */
	$cnx_json = cnx_json();
	$sql = "SELECT * FROM  fb_solicite_presupuesto WHERE estado=1 ORDER BY  fecharegistro DESC ";
	// Execute the SQL query
	$result = $cnx_json->query($sql);
	// Check if the query was successful
	if ($result) {
	    // Use a while loop to fetch and process each row
	    while ($row = $result->fetch_assoc()) {
	        // Access individual columns of the current row like $row['column_name']
	        $jSON[] = array(
	            'nombre'=> $row['nombre'], 
	            'paterno'=> $row['paterno'], 
	            'materno'=> $row['materno'],
	            'fecha'=> $row['fecha'],
	            'dni'=> $row['dni'],
	            'sexo'=> $row['sexo'],
	            'telefono'=> $row['telefono'],
	            'email'=> $row['email'],
	            'especialidad'=> $row['especialidad'],
	            'diagnostico'=> $row['diagnostico'],
	            'dias'=> $row['dias'],
	            'fecha2'=> $row['fecha2'],
	            'seguro'=> $row['seguro'],
	            'medico'=> $row['medico'],
	            'intervencion'=> $row['intervencion'],
	            'adjunta_archivo'=> $row['adjunta_archivo'],
	            'fecharegistro'=> $row['fecharegistro'],
	            'estado'=> $row['estado']

	        );
	    }
	    // Genera archivo JSON
	    $json_string = json_encode($jSON);
	    $file = '../../json/jsolicite_presupuesto_general.json';
	    file_put_contents($file, $json_string);
	    // Free the result set
	    $result->free();
	    $cnx_json->close();
	    //header('Location: ../trabaja-con-nosotros');
	} else {
	    echo "Error: " . $cnx_json->error;
	}



		header('Location: ../../../gracias');
		
    

}   else {

	header('location: ../../../solicite-presupuesto/?error=0');

}

	}
        
        } else {
        echo "ERES UN ROBOT";
}   