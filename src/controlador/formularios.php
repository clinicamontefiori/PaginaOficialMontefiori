<?php
header("Content-Type: application/json; charset=utf-8");

// ============================
// INCLUDES & CONFIG
// ============================
require '../cms/core/config.php';
require '../cms/core/mail.php';

// PHPMailer
require '../PHPMailer-master/src/PHPMailer.php';
require '../PHPMailer-master/src/SMTP.php';
require '../PHPMailer-master/src/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

date_default_timezone_set('America/Lima');
$cnx = cnx();

$response = [
    "success" => false,
    "message" => ""
];

// ============================
// VALIDACIÓN DE CAMPOS
// ============================
$requiredFields = [
    "nombres",
    "apellidos",
    "dni",
    "edad",
    "celular",
    "email"
];

foreach ($requiredFields as $field) {
    if (!isset($_POST[$field]) || trim($_POST[$field]) === '') {
        $response["message"] = "El campo {$field} es obligatorio.";
        echo json_encode($response);
        exit;
    }
}

// ============================
// SANITIZACIÓN
// ============================
$nombres   = trim($_POST['nombres']);
$apellidos = trim($_POST['apellidos']);
$dni       = preg_replace('/[^0-9]/', '', $_POST['dni']);
$edad      = (int) $_POST['edad'];
$telefono  = preg_replace('/[^0-9]/', '', $_POST['celular']);
$email     = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
$tipo      = $_POST['tipo'] ?? 'Web';

// Validaciones extra
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $response["message"] = "El correo electrónico no es válido.";
    echo json_encode($response);
    exit;
}

if (strlen($dni) < 8) {
    $response["message"] = "El DNI no es válido.";
    echo json_encode($response);
    exit;
}

// ============================
// DATA DB
// ============================
$data = [
    "nombre"    => $nombres,
    "apellidos" => $apellidos,
    "dni"       => $dni,
    "edad"      => $edad,
    "telefono"  => $telefono,
    "email"     => $email,
    "tipo"      => $tipo
];

// ============================
// INSERT DB
// ============================
try {
    $cnx->insert('fb_form_web', $data);
} catch (Exception $e) {
    $response["message"] = "Error al guardar los datos.";
    error_log('DB ERROR: ' . $e->getMessage());
    echo json_encode($response);
    exit;
}

// ============================
// ENVÍO DE CORREO (SIN ADJUNTOS)
// ============================
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

    $mail->setFrom($smtp_user, 'Formulario Web');
    //$mail->addAddress($smtp_user); // correo destino
    //$mail->addAddress('alejj20@gmail.com');

    if (!empty($data['tipo'])) {

        if ($data['tipo'] === 'PROSALUD') {
            $mail->Subject = 'Nueva solicitud de Prosalud';
            $txtcampo1 = 'Edad';
            //$mail->addAddress('alejj20@gmail.com');
            $mail->addAddress('programamaterno@montefiori.com.pe');

        } elseif ($data['tipo'] === 'MATERNO') {
            $mail->Subject = 'Nueva solicitud de Paquete Materno';
            $txtcampo1 = 'Semanas de gestación';
            //$mail->addAddress('alejj20@gmail.com');
            $mail->addAddress('programamaterno@montefiori.com.pe');

        } else {
            // Fallback por seguridad
            $mail->Subject = 'Nueva solicitud de Formulario';
            $mail->addAddress('alejj20@gmail.com');
        }

    } else {
        // Si no viene tipo
        $mail->addAddress('alejj20@gmail.com');
    }

    
    if (!empty($data['email'])) {
        $mail->addReplyTo($data['email'], $data['nombre']);
    }

    $mail->isHTML(true);
    

    $mail->Body = "
        <h3>Nuevo registro</h3>
        <p><strong>Nombres:</strong> {$nombres}</p>
        <p><strong>Apellidos:</strong> {$apellidos}</p>
        <p><strong>DNI:</strong> {$dni}</p>
        <p><strong>".$txtcampo1.":</strong> {$edad}</p>
        <p><strong>Teléfono:</strong> {$telefono}</p>
        <p><strong>Email:</strong> {$email}</p>
        <p><strong>Tipo:</strong> {$tipo}</p>
        <hr>
        <small>Enviado el " . date('d/m/Y H:i') . "</small>
    ";

    $mail->send();

} catch (Exception $e) {
    // El correo falla, pero NO rompemos el flujo
    error_log('MAIL ERROR: ' . $e->getMessage());
}

// ============================
// RESPONSE
// ============================
$response["success"] = true;
$response["message"] = "Datos enviados correctamente.";

echo json_encode($response);
exit;
