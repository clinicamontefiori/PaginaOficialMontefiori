<?php
declare(strict_types=1);

header("Content-Type: application/json; charset=utf-8");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// ============================
// BOOTSTRAP
// ============================
require '../cms/php/var.php';
require '../cms/core/config.php';
require '../cms/core/mail.php';
require '../cms/modelo/function.php';

require '../PHPMailer-master/src/PHPMailer.php';
require '../PHPMailer-master/src/Exception.php';
require '../PHPMailer-master/src/SMTP.php';

date_default_timezone_set('America/Lima');

$cnx = cnx();
$response = ['success' => false, 'message' => ''];

// ============================
// VALIDACIÓN RECAPTCHA V3
// ============================
$recaptchaToken = $_POST['recaptcha_token'] ?? '';
$secretKey = SECRET_KEY;

if (empty($recaptchaToken)) {
    http_response_code(400);
    $response['message'] = 'Verificación de seguridad faltante.';
    echo json_encode($response);
    exit;
}

// Llamada a Google
$verifyResponse = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret={$secretKey}&response={$recaptchaToken}");
$responseData = json_decode($verifyResponse);

// Si falla o el score es muy bajo (0.5 es el estándar)
if (!$responseData->success || $responseData->score < 0.5) {
    http_response_code(403);
    $response['message'] = 'Actividad sospechosa detectada (Captcha fallido).';
    echo json_encode($response);
    exit;
}

// ============================
// VALIDACIÓN BÁSICA
// ============================
if (empty($_POST['nombres']) || empty($_POST['dni'])) {
    http_response_code(400);
    $response['message'] = 'Campos obligatorios incompletos.';
    echo json_encode($response);
    exit;
}

// ============================
// SUBIDA DE ARCHIVOS
// ============================
$uploadDir = '../uploads/presupuesto/';
$permitidos = ['jpg','jpeg','png','webp','pdf'];

if (!is_dir($uploadDir)) {
    mkdir($uploadDir, 0777, true);
}

$ordenMedica = subirArchivo('ordenMedica', $uploadDir, $permitidos);
$otroArchivo = subirArchivo('otroArchivo', $uploadDir, $permitidos);

// ============================
// DATA NORMALIZADA
// ============================
$data = [
    'nombre'          => trim($_POST['nombres']),
    'paterno'         => trim($_POST['apellidoPaterno'] ?? ''),
    'materno'         => trim($_POST['apellidoMaterno'] ?? ''),
    'dni'             => trim($_POST['dni']),
    'sexo'            => $_POST['genero'] ?? '',
    'telefono'        => trim($_POST['telefono'] ?? ''),
    'email'           => trim($_POST['email'] ?? ''),
    'orden_medica'    => $ordenMedica ?? '',
    'adjunta_archivo' => $otroArchivo ?? ''
];

// ============================
// INSERTAR EN BD
// ============================
try {
    $cnx->insert('fb_solicite_presupuesto', $data);
} catch (Throwable $e) {
    http_response_code(500);
    $response['message'] = 'Error al guardar en base de datos.';
    error_log($e->getMessage());
    echo json_encode($response);
    exit;
}

// ============================
// ENVÍO DE CORREO (NO CRÍTICO)
// ============================
$correoEnviado = false;

try {
    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host       = $smtp_host;
    $mail->SMTPAuth   = true;
    $mail->Username   = $smtp_user;
    $mail->Password   = $smtp_pass;
    $mail->SMTPSecure = $smtp_secure;
    $mail->Port       = $smtp_port;
    $mail->CharSet    = $smtp_CharSet;
    $mail->Encoding   = $smtp_Encoding;    

    $mail->setFrom($smtp_user, 'Solicita un Presupuesto');
    //$mail->addAddress('alejj20@gmail.com');
    $mail->addAddress('acafferata@montefiori.com.pe');

    if (!empty($data['email'])) {
        $mail->addReplyTo($data['email'], $data['nombre']);
    }

    $basePath = realpath($uploadDir);

    foreach (['orden_medica','adjunta_archivo'] as $campo) {
        if (!empty($data[$campo])) {
            $file = $basePath.'/'.$data[$campo];
            if (is_file($file)) {
                $mail->addAttachment($file);
            }
        }
    }

    $mail->isHTML(true);
    $mail->CharSet = 'UTF-8';
    $mail->Subject = 'Nueva solicitud de presupuesto';
    $mail->Body = "
        <h3>Solicitud de presupuesto</h3>
        <p><b>Nombre:</b> {$data['nombre']} {$data['paterno']} {$data['materno']}</p>
        <p><b>DNI:</b> {$data['dni']}</p>
        <p><b>Teléfono:</b> {$data['telefono']}</p>
        <p><b>Email:</b> {$data['email']}</p>
    ";

    $mail->send();
    $correoEnviado = true;

} catch (Throwable $e) {
    error_log('Correo no enviado: '.$e->getMessage());
}

// ============================
// RESPUESTA FINAL
// ============================
$response['success'] = true;
$response['message'] = $correoEnviado
    ? 'Datos guardados y correo enviado correctamente.'
    : 'Datos guardados. El correo no pudo enviarse.';

$response['data'] = $data;

echo json_encode($response);
exit;
