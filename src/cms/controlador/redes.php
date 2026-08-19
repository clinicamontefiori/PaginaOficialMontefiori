<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

use DevCod\DatabaseException;
require '../core/config.php';
include '../modelo/function.php';
include '../php/var.php';
require '../php/recaptcha_v3.php';

    $permitidos = ['jpg', 'jpeg', 'png', 'webp', 'svg'];
    $imgdesktop = subir_archivo('file_desktop', 'redes', $_POST['file_desktop_old'], $permitidos);
    $icono = subir_archivo('icono', 'redes', $_POST['icono_old'], $permitidos);


    /* GUARDA EN TABLA */
    $cnx = cnx();
    date_default_timezone_set('America/Lima');

    $proceso = isset($_POST['proceso']) && $_POST['proceso'] != '' ? $_POST['proceso'] : '';
    $idrs = isset($_POST['idrs']) && $_POST['idrs'] != '' ? $_POST['idrs'] : '';
    $titulo = isset($_POST['titulo']) && $_POST['titulo'] != '' ? $_POST['titulo'] : '';
     $url = isset($_POST['url']) && $_POST['url'] != '' ? $_POST['url'] : '';
    $orden = isset($_POST['orden']) && $_POST['orden'] != '' ? $_POST['orden'] : '';
    $estado = isset($_POST['estado']) && $_POST['estado'] != '' ? $_POST['estado'] : '';
    $fecha_add_upd_blog = date("Y-m-d H:i:s");

    $data = array (
        'titulo' => $titulo,
        'url' => $url,
        'imgdesktop' => $imgdesktop,   
        'icono' => $icono,     
        'fecharegistro' => $fecha_add_upd_blog,
        'orden' => $orden,
        'estado' => $estado
    );

    if($proceso=='ins'){
        /* GUARDA REGISTRO */
        $result = $cnx->insert('fb_rrss', $data);
        $idrs = $result->id();

    }elseif ($proceso=='upd') {
        /* ACTUALIZA REGISTRO */
        $result = $cnx->update('fb_rrss', $data, ["idrs" => $idrs] );
    }elseif ($proceso=='del') {
        /* ELIMINA REGISTRO */
        $result = $cnx->delete('fb_rrss', ["idrs" => $idrs] );
    }else  {
        $data_only = array (
            $proceso => ''        
        );       
        $result = $cnx->update('fb_rrss', $data_only, ["idrs" => $idrs] );
    }


    $cnx_json = cnx_json();
    $sql_principal = "SELECT * FROM fb_rrss ORDER BY orden";
    $result_principal = $cnx_json->query($sql_principal);
    if ($result_principal) {
        while ($row = $result_principal->fetch_assoc()) {
            $jSON[] = array(
                'idrs'=> $row['idrs'], 
                'titulo'=> $row['titulo'], 
                'url'=> $row['url'], 
                'imgdesktop'=> $row['imgdesktop'], 
                'icono'=> $row['icono'], 
                'orden'=> $row['orden'],
                'fecharegistro'=> $row['fecharegistro'],                
                'estado'=> $row['estado']
            );
        }  
        // Genera archivo JSON General
        $json_principal = json_encode($jSON);
        $file_principal = '../json/jredes_general.json';
        file_put_contents($file_principal, $json_principal);
        
        
    } else {
        echo "Error: " . $cnx_json->error;
    }


   

    $result_principal->free();        
    $cnx_json->close();
    header('Location: ../redes');


?>
