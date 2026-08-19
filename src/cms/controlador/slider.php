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
    $permitidos = ['jpg', 'png', 'webp'];
    $imgdesktop = subir_archivo('file_desktop', 'slider', $_POST['file_desktop_old'], $permitidos);
    $imgmovil = subir_archivo('file_movil', 'slider', $_POST['file_movil_old'], $permitidos);

    /* GUARDA EN TABLA */
    $cnx = cnx();
    date_default_timezone_set('America/Lima');


    $proceso = isset($_POST['proceso']) && $_POST['proceso'] != '' ? $_POST['proceso'] : '';
    $idbanner = isset($_POST['idbanner']) && $_POST['idbanner'] != '' ? $_POST['idbanner'] : '';
    $titulo = isset($_POST['titulo']) && $_POST['titulo'] != '' ? $_POST['titulo'] : '';
    $bajada = isset($_POST['bajada']) && $_POST['bajada'] != '' ? $_POST['bajada'] : '';
    $url = isset($_POST['url']) && $_POST['url'] != '' ? $_POST['url'] : '';
    $idseccion = isset($_POST['idseccion']) && $_POST['idseccion'] != '' ? $_POST['idseccion'] : '';
    $orden = isset($_POST['orden']) && $_POST['orden'] != '' ? $_POST['orden'] : '';
    $estado = isset($_POST['estado']) && $_POST['estado'] != '' ? $_POST['estado'] : '';

   
    $data = array (
        'titulo' => $titulo,
        'bajada' => $bajada,
        'imgdesktop' => $imgdesktop,
        'imgmovil' => $imgmovil,
        'url' => $url,
        'idseccion' => $idseccion,
        'orden' => $orden,
        'estado' => $estado
        
    );

    if($proceso=='ins'){
        /* GUARDA REGISTRO */
        $result = $cnx->insert('fb_banner', $data);
    }elseif ($proceso=='upd') {
        /* ACTUALIZA REGISTRO */
        $result = $cnx->update('fb_banner', $data, ["idbanner" => $idbanner] );
    }elseif ($proceso=='del') {
        /* ELIMINA REGISTRO */
        $result = $cnx->delete('fb_banner', ["idbanner" => $idbanner] );
    }else  {
        $data_only = array (
            $proceso => ''        
        );       
        $result = $cnx->update('fb_banner', $data_only, ["idbanner" => $idbanner] );
    }
   

    /* GENERAR JSON */
    $cnx_json = cnx_json();
    $sql = "SELECT * FROM fb_banner ORDER BY  orden ASC ";
    // Execute the SQL query
    $result = $cnx_json->query($sql);
    // Check if the query was successful

    
    if ($result) {
        // Use a while loop to fetch and process each row
        while ($row = $result->fetch_assoc()) {

            //$nombre_seccion=get_row('nombre','fb_secciones', 'idseccion', $idseccion); 
            // Access individual columns of the current row like $row['column_name']
            $nombre_seccion = $cnx->selectColumn("fb_secciones","nombre", ["idseccion" => $row['idseccion'] ], 1);
            $jSON[] = array(
                'idbanner'=> $row['idbanner'], 
                'titulo'=> $row['titulo'], 
                'bajada'=> $row['bajada'], 
                'imgdesktop'=> $row['imgdesktop'],
                'imgmovil'=> $row['imgmovil'],
                'url'=> $row['url'],
                'estado'=> $row['estado'],
                'idseccion'=> $row['idseccion'],
                'nombre_seccion'=> $nombre_seccion,
                'url_seccion'=> urls_amigables($nombre_seccion),
                'orden'=> $row['orden']
            );
        }  
        // Genera archivo JSON
        $json_string = json_encode($jSON);
        $file = '../json/jslider_general.json';
        file_put_contents($file, $json_string);
        // Free the result set
        $result->free();
        $cnx_json->close();
        header('Location: ../slider');
    } else {
        echo "Error: " . $cnx_json->error;
    }
    
?>
