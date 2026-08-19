<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

use DevCod\DatabaseException;
require '../core/config.php';
include '../modelo/function.php';
include '../php/var.php';
require '../php/recaptcha_v3.php';


    /* CONECTA TABLA */
    $cnx = cnx();
    date_default_timezone_set('America/Lima');

    /* DECLARA INPUT FORMULARIOS */    
    $permitidos = ['jpg', 'png', 'webp'];
    $file_desktop_old = $_POST['file_desktop_old'] ?? '';
    $imgdesktop = subir_archivo('file_desktop', 'logos', $file_desktop_old, $permitidos);

    $proceso = isset($_POST['proceso']) && $_POST['proceso'] != '' ? $_POST['proceso'] : '';
    $idaseguradora = isset($_POST['idaseguradora']) && $_POST['idaseguradora'] != '' ? $_POST['idaseguradora'] : '';
    $nombre = isset($_POST['nombre']) && $_POST['nombre'] != '' ? $_POST['nombre'] : '';
    $orden = isset($_POST['orden']) && $_POST['orden'] != '' ? $_POST['orden'] : '0';
    $estado = isset($_POST['estado']) && $_POST['estado'] != '' ? $_POST['estado'] : '0';

    $data = array (
        'idaseguradora' => $idaseguradora,
        'nombre' => $nombre,
        'imgdesktop' => $imgdesktop,
        'orden' => $orden,
        'estado' => $estado       
    );       

    if($proceso=='ins'){
        /* GUARDA REGISTRO */
        $result = $cnx->insert('fb_aseguradoras', $data);
    }elseif ($proceso=='upd') {
        /* ACTUALIZA REGISTRO */
        $result = $cnx->update('fb_aseguradoras', $data, ["idaseguradora" => $idaseguradora] );
    }elseif ($proceso=='del') {
        /* ELIMINA REGISTRO */
        $result = $cnx->delete('fb_aseguradoras', ["idaseguradora" => $idaseguradora] );
    }else  {
        $data_only = array (
            $proceso => ''        
        );       
        $result = $cnx->update('fb_aseguradoras', $data_only, ["idaseguradora" => $idaseguradora] );
    }
        

    /* GENERAR JSON */
    $cnx_json = cnx_json();
    $sql = "SELECT * FROM fb_aseguradoras ORDER BY  orden ";
    // Execute the SQL query
    $result = $cnx_json->query($sql);
    // Check if the query was successful
    if ($result) {
        // Use a while loop to fetch and process each row
        while ($row = $result->fetch_assoc()) {
            // Access individual columns of the current row like $row['column_name']
            $jSON[] = array(
                'idaseguradora'=> $row['idaseguradora'], 
                'nombre'=> $row['nombre'],
                'imgdesktop'=> $row['imgdesktop'], 
                'orden'=> $row['orden'],
                'estado'=> $row['estado'],
                'fechapublicacion'=> $row['fechapublicacion']
            );
        }
        // Genera archivo JSON
        $json_string = json_encode($jSON);
        $file = '../json/jaseguradoras.json';
        file_put_contents($file, $json_string);
        // Free the result set
        $result->free();
        $cnx_json->close();
        header('Location: ../aseguradoras');
    } else {
        echo "Error: " . $cnx_json->error;
    }
    
?>
