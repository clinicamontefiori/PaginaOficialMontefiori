<?php
// ============================
// VALIDACIÓN RECAPTCHA V3
// ============================
$recaptchaToken = $_POST['recaptcha_token'] ?? '';

if (empty($recaptchaToken)) {
    http_response_code(400);
    $response['success'] = false;
    $response['message'] = 'Verificación de seguridad faltante.';
    echo json_encode($response);
    exit;
}

$secretKey = SECRET_KEY;

// Llamada a Google con timeout
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query([
    'secret' => $secretKey,
    'response' => $recaptchaToken
]));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_TIMEOUT, 10);

$verifyResponse = curl_exec($ch);
curl_close($ch);

if (!$verifyResponse) {
    http_response_code(500);
    $response['success'] = false;
    $response['message'] = 'Error al verificar seguridad.';
    echo json_encode($response);
    exit;
}

$responseData = json_decode($verifyResponse);

// Verificar éxito y score
if (!$responseData->success || $responseData->score < 0.5) {
    http_response_code(403);
    $response['success'] = false;
    $response['message'] = 'Actividad sospechosa detectada.';
    $response['score'] = $responseData->score ?? null;
    echo json_encode($response);
    exit;
}