<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

use DevCod\DatabaseException;
require '../core/config.php';
include '../modelo/function.php';
include '../php/var.php';
require '../php/recaptcha_v3.php';

    /* UPLOAD DE ARCHIVO */
    /***************IMAGEN PORTADA *******************/
    $permitidos = ['jpg','jpeg', 'png', 'webp'];
    $imgdesktop = subir_archivo('file_desktop', 'popup', $_POST['file_desktop_old'], $permitidos);
    $imgmovil = subir_archivo('file_movil', 'popup', $_POST['file_movil_old'], $permitidos);

    /* GUARDA EN TABLA */
    $cnx = cnx();
    $cnx_json = cnx_json();
    date_default_timezone_set('America/Lima');

    $proceso = isset($_POST['proceso']) && $_POST['proceso'] != '' ? $_POST['proceso'] : '';
    $idpopup = isset($_POST['idpopup']) && $_POST['idpopup'] != '' ? $_POST['idpopup'] : '';
    $titulo = isset($_POST['titulo']) && $_POST['titulo'] != '' ? $_POST['titulo'] : '';
    $url = isset($_POST['url']) && $_POST['url'] != '' ? $_POST['url'] : '';
    $estado = isset($_POST['estado']) && $_POST['estado'] != '' ? $_POST['estado'] : '';

   
    $data = array (
        'titulo' => $titulo,
        'imgdesktop' => $imgdesktop,
        'imgmovil' => $imgmovil,
        'url' => $url,
        'estado' => $estado
        
    );

    if($proceso=='ins'){
        /* GUARDA REGISTRO */
        $result = $cnx->insert('fb_popup', $data);
    }elseif ($proceso=='upd') {
        /* ACTUALIZA REGISTRO */
        $result = $cnx->update('fb_popup', $data, ["idpopup" => $idpopup] );
    }elseif ($proceso=='del') {
        /* ELIMINA REGISTRO */
        $result = $cnx->delete('fb_popup', ["idpopup" => $idpopup] );
    }else  {
        $data_only = array (
            $proceso => ''        
        );       
        $result = $cnx->update('fb_popup', $data_only, ["idpopup" => $idpopup] );
    }

    /* GENERAR JSON */
    $sql = "SELECT * FROM fb_popup ORDER BY  fechapublicacion ASC ";
    // Execute the SQL query
    $result = $cnx_json->query($sql);
    // Check if the query was successful        
    if ($result) {
        // Use a while loop to fetch and process each row
        while ($row = $result->fetch_assoc()) {
            // Access individual columns of the current row like $row['column_name']
            $jSON[] = array(
                'idpopup'=> $row['idpopup'], 
                'titulo'=> $row['titulo'], 
                'imgdesktop'=> $row['imgdesktop'],
                'imgmovil'=> $row['imgmovil'],
                'url'=> $row['url'],
                'estado'=> $row['estado']
            );
        }  
        // Genera archivo JSON
        $json_string = json_encode($jSON);
        $file = '../json/jpopup_general.json';
        file_put_contents($file, $json_string);
        header('Location: ../popup');
    } else {
        echo "Error: " . $cnx_json->error;
    }
    
?>
