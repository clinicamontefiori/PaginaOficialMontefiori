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
if (
    empty($_POST['names']) ||
    empty($_POST['phone']) ||
    empty($_POST['cookiesAccepted'])
) {
    http_response_code(400);
    $response['message'] = 'Campos obligatorios incompletos.';
    echo json_encode($response);
    exit;
}

// ============================
// SUBIDA DE CV
// ============================
$uploadDir   = '../uploads/trabaja-cv/';
$permitidos = ['jpg','jpeg','png','webp','pdf'];

if (!is_dir($uploadDir)) {
    mkdir($uploadDir, 0777, true);
}

$cv = subirArchivo('cv', $uploadDir, $permitidos);

if (!$cv) {
    http_response_code(400);
    $response['message'] = 'El archivo CV es obligatorio y debe ser válido.';
    echo json_encode($response);
    exit;
}

// ============================
// DATA NORMALIZADA
// ============================
$data = [
    'nombre'          => trim($_POST['names']),
    'apellidos'       => trim($_POST['surnames'] ?? ''),
    'telefono'        => trim($_POST['phone']),
    'email'           => trim($_POST['email'] ?? ''),
    'adjunta_archivo' => $cv
];

// ============================
// INSERTAR EN BD
// ============================
try {
    $cnx->insert('fb_trabaja_nosotros', $data);
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
    $mail->CharSet    = $smtp_CharSet ?? 'UTF-8';
    $mail->Encoding   = $smtp_Encoding ?? 'base64';

    $mail->setFrom($smtp_user, 'Trabaja con Nosotros');
    //$mail->addAddress('alejj20@gmail.com');
    $mail->addAddress('acafferata@montefiori.com.pe');

    if (!empty($data['email'])) {
        $mail->addReplyTo($data['email'], $data['nombre']);
    }

    // Adjuntar CV
    $cvPath = realpath($uploadDir . $data['adjunta_archivo']);
    if ($cvPath && is_file($cvPath)) {
        $mail->addAttachment($cvPath);
    }

    $mail->isHTML(true);
    $mail->Subject = 'Nueva postulación - Trabaja con Nosotros';
    $mail->Body = "
        <h3>Nueva Postulación</h3>
        <p><b>Nombres:</b> {$data['nombre']} {$data['apellidos']}</p>
        <p><b>Teléfono:</b> {$data['telefono']}</p>
        <p><b>Email:</b> {$data['email']}</p>
    ";

    $mail->send();
    $correoEnviado = true;

} catch (Throwable $e) {
    error_log('Correo trabaja con nosotros no enviado: '.$e->getMessage());
}

// ============================
// RESPUESTA FINAL
// ============================
$response['success'] = true;
$response['message'] = $correoEnviado
    ? 'Postulación enviada correctamente.'
    : 'Postulación guardada, pero el correo no pudo enviarse.';

$response['data'] = $data;

echo json_encode($response);
exit;
