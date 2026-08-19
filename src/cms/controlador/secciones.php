<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

use DevCod\DatabaseException;
require '../core/config.php';
include '../modelo/function.php';
include '../php/var.php';
require '../php/recaptcha_v3.php';

    $cnx = cnx();
    date_default_timezone_set('America/Lima');

    /* DECLARA INPUT FORMULARIOS */
    $proceso = isset($_POST['proceso']) && $_POST['proceso'] != '' ? $_POST['proceso'] : '';
    $idseccion = isset($_POST['idseccion']) && $_POST['idseccion'] != '' ? $_POST['idseccion'] : '';
    $nombre = isset($_POST['nombre']) && $_POST['nombre'] != '' ? $_POST['nombre'] : '';
    $meta_title = isset($_POST['meta_title']) && $_POST['meta_title'] != '' ? $_POST['meta_title'] : '';  
    $meta_description = isset($_POST['meta_description']) && $_POST['meta_description'] != '' ? $_POST['meta_description'] : '';  
    $meta_keywords = isset($_POST['meta_keywords']) && $_POST['meta_keywords'] != '' ? $_POST['meta_keywords'] : '';      
    $estado = isset($_POST['estado']) && $_POST['estado'] != '' ? $_POST['estado'] : '';


    $data = array (
        'idseccion' => $idseccion,
        'nombre' => $nombre,
        'meta_title' => $meta_title,
        'meta_description' => $meta_description,
        'meta_keywords' => $meta_keywords,
        'estado' => $estado
        
    );       


    if($proceso=='ins'){
        /* GUARDA REGISTRO */
        $result = $cnx->insert('fb_secciones', $data);
    }elseif ($proceso=='upd') {
        /* ACTUALIZA REGISTRO */
        $result = $cnx->update('fb_secciones', $data, ["idseccion" => $idseccion] );
    }elseif ($proceso=='del') {
        /* ELIMINA REGISTRO */
        $result = $cnx->delete('fb_secciones', ["idseccion" => $idseccion] );
    }

    /* GENERAR JSON */
    $cnx_json = cnx_json();
    $sql = "SELECT * FROM fb_secciones ORDER BY  fecharegistro DESC ";
    // Execute the SQL query
    $result = $cnx_json->query($sql);
    // Check if the query was successful
    if ($result) {
        // Use a while loop to fetch and process each row
        while ($row = $result->fetch_assoc()) {
            // Access individual columns of the current row like $row['column_name']
            $jSON[] = array(
                'idseccion'=> $row['idseccion'], 
                'nombre'=> $row['nombre'], 
                'url_seccion'=> urls_amigables($row['nombre']),
                'estado'=> $row['estado'],
                'meta_title'=> $row['meta_title'],
                'meta_description'=> $row['meta_description'],
                'meta_keywords'=> $row['meta_keywords'],
                'fecharegistro'=> $row['fecharegistro']
            );
        }
        // Genera archivo JSON
        $json_string = json_encode($jSON);
        $file = '../json/jsecciones_general.json';
        file_put_contents($file, $json_string);
        // Free the result set
        $result->free();
        $cnx_json->close();
        header('Location: ../secciones');
    } else {
        //header('Location: ../secciones-add');
        echo "Error: " . $cnx_json->error;
    }
    
?>
