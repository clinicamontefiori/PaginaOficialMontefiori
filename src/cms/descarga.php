<?php
session_start();

use DevCod\DatabaseException;
include 'modelo/function.php';
require 'core/config.php';

$cnx_json = cnx_json();
$cnx = cnx();

	$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
	$datalogin = explode("|", $_SESSION['usuario']);
	$idusuario = $datalogin[2];
	$id = isset($_GET['id']) && $_GET['id'] != '' ? $_GET['id'] : $idusuario;	


	$fechaInicio = filter_input(INPUT_GET, 'fechai', FILTER_SANITIZE_STRING);
	$fechaFin = filter_input(INPUT_GET, 'fechaf', FILTER_SANITIZE_STRING);

	$sql = "SELECT usuario,l.fecharegistro,dispositivo,pagina,evento 
	FROM `fb_log` l INNER JOIN  fb_usuarios u ON l.idusuario=u.idusuario 
	WHERE l.idusuario = 4  AND DATE(l.fecharegistro) >= '$fechaInicio' AND DATE(l.fecharegistro) <= '$fechaFin' 
	ORDER BY l.idlog DESC;";
	$result = $cnx_json->query($sql);



// Supongamos que $result_principal es tu array multidimensional

// Definir el nombre del archivo CSV
//$csvFileName = 'exported_data.csv';

// Definir el nombre del archivo CSV
$csvFileName = date('YmdHmi').'_log.csv';

// Configurar las cabeceras para indicar que se va a descargar un archivo CSV
header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="' . $csvFileName . '"');

// Crear el puntero de salida para escribir en el flujo de salida
$output = fopen('php://output', 'w');

// Escribir los encabezados en el archivo CSV
$fila = $result->fetch_assoc();
fputcsv($output, array_keys($fila));

// Volver a ejecutar la consulta para recuperar todos los resultados
$result = $cnx_json->query($sql);

// Escribir los datos en el archivo CSV
while ($fila = $result->fetch_assoc()) {
    fputcsv($output, $fila);
}

// Cerrar la conexión a la base de datos
 $cnx_json->close();

// Cerrar el puntero de salida
fclose($output);

?>


