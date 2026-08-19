<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
include 'modelo/function.php';

if (!isset($_GET['id'])) {
    echo json_encode([
        'isError' => true,
        'message' => 'ID no proporcionado',
        'result' => []
    ]);
    exit;
}

$id = $_GET['id'];

// Llamar a la API
$response = getData("medicosdetalle-web", ['idmedico' => $id]);

header('Content-Type: application/json; charset=utf-8');
echo json_encode($response);
