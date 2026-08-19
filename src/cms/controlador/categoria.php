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
    $proceso = isset($_POST['proceso']) && $_POST['proceso'] != '' ? $_POST['proceso'] : '';
    $idcategoria = isset($_POST['idcategoria']) && $_POST['idcategoria'] != '' ? $_POST['idcategoria'] : '';
    $nombre = isset($_POST['nombre']) && $_POST['nombre'] != '' ? $_POST['nombre'] : '';
    $estado = isset($_POST['estado']) && $_POST['estado'] != '' ? $_POST['estado'] : '';


    $data = array (
        'idcategoria' => $idcategoria,
        'nombre' => $nombre,
        'estado' => $estado       
    );   

    if($proceso=='ins'){
        /* GUARDA REGISTRO */
        $result = $cnx->insert('fb_categoria', $data);
    }elseif ($proceso=='upd') {
        /* ACTUALIZA REGISTRO */
        $result = $cnx->update('fb_categoria', $data, ["idcategoria" => $idcategoria] );
    }elseif ($proceso=='del') {
        /* ELIMINA REGISTRO */
        $result = $cnx->delete('fb_categoria', ["idcategoria" => $idcategoria] );
    }else  {
        $data_only = array (
            $proceso => ''        
        );       
        $result = $cnx->update('fb_categoria', $data_only, ["idcategoria" => $idcategoria] );
    }

    /* GENERAR JSON */
    $cnx_json = cnx_json();
    $sql = "SELECT * FROM fb_categoria";
    // Execute the SQL query
    $result = $cnx_json->query($sql);
    // Check if the query was successful
    if ($result) {
        // Use a while loop to fetch and process each row
        while ($row = $result->fetch_assoc()) {
            // Access individual columns of the current row like $row['column_name']
            $jSON[] = array(
                'idcategoria'=> $row['idcategoria'], 
                'nombre'=> $row['nombre'],
                'estado'=> $row['estado'],
                'fecharegistro'=> $row['fecharegistro']
            );
        }
        // Genera archivo JSON
        $json_string = json_encode($jSON);
        $file = '../json/jcategoria.json';
        file_put_contents($file, $json_string);
        // Free the result set
        $result->free();
        $cnx_json->close();
        header('Location: ../categoria');
    } else {
        echo "Error: " . $cnx_json->error;
    }
    
?>
