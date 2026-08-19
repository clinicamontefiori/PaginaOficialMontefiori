<?php

use DevCod\DatabaseException;
require '../core/config.php';

/* GENERAR JSON */
$cnx_json = cnx_json();
$sql = "SELECT * FROM fb_trabaja_nosotros ORDER BY  fecharegistro DESC ";
// Execute the SQL query
$result = $cnx_json->query($sql);
// Check if the query was successful
if ($result) {
    // Use a while loop to fetch and process each row
    while ($row = $result->fetch_assoc()) {
        // Access individual columns of the current row like $row['column_name']
        $jSON[] = array(
            'nombre'=> $row['nombre'], 
            'apellidos'=> $row['apellidos'], 
            'telefono'=> $row['telefono'],
            'email'=> $row['email'],
            'mensaje'=> $row['mensaje'],
            'adjunta_archivo'=> $row['adjunta_archivo'],
            'fecharegistro'=> $row['fecharegistro']
        );
    }
    // Genera archivo JSON
    $json_string = json_encode($jSON);
    $file = '../json/jtrabajaconnosotros_general.json';
    file_put_contents($file, $json_string);
    // Free the result set
    $result->free();
    $cnx_json->close();
    header('Location: ../trabaja-con-nosotros');
} else {
    echo "Error: " . $cnx_json->error;
}





die();
exit();









// Consulta SQL
$sql = "SELECT * FROM fb_banner WHERE estado=1 ORDER BY orden DESC";

// Ejecutar la consulta
$result = $conn->query($sql);

// Verificar si la consulta se ejecutó correctamente
if ($result === false) {
    echo "Error al ejecutar la consulta: " . $conn->error;
} else {
    // Procesar los resultados de la consulta
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
        $titulo=$row['titulo'];
           $bajada=$row['bajada'];
           $img=$row['img'];
            $jSON[] = array('titulo'=> $titulo, 'bajada'=> $bajada, 'img'=> $img);
        }
        $json_string = json_encode($jSON);
        $file = '../json/jslider_general.json';
        file_put_contents($file, $json_string);
        
        $result->free();
    } else {
        echo "No se encontraron resultados.";
    }
}

// Cerrar la conexión
$conn->close();
?>
