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
    $imgdesktop = subir_archivo('file_desktop', 'testimonios', $_POST['file_desktop_old'], $permitidos);

    /* GUARDA EN TABLA */
    $cnx = cnx();
    date_default_timezone_set('America/Lima');
    $proceso = isset($_POST['proceso']) && $_POST['proceso'] != '' ? $_POST['proceso'] : '';
    $idtestimonio = isset($_POST['idtestimonio']) && $_POST['idtestimonio'] != '' ? $_POST['idtestimonio'] : '';
    $titulo = isset($_POST['titulo']) && $_POST['titulo'] != '' ? $_POST['titulo'] : '';
    $bajada = isset($_POST['bajada']) && $_POST['bajada'] != '' ? $_POST['bajada'] : '';
    $orden = isset($_POST['orden']) && $_POST['orden'] != '' ? $_POST['orden'] : '';
    $youtube = isset($_POST['youtube']) && $_POST['youtube'] != '' ? $_POST['youtube'] : '';
    $estado = isset($_POST['estado']) && $_POST['estado'] != '' ? $_POST['estado'] : '';

   
    $data = array (
        'titulo' => $titulo,
        'bajada' => $bajada,
        'imgdesktop' => $imgdesktop,
        'orden' => $orden,
        'youtube' => $youtube,
        'estado' => $estado        
    );

    if($proceso=='ins'){
        /* GUARDA REGISTRO */
        $result = $cnx->insert('fb_testimonios', $data);
    }elseif ($proceso=='upd') {
        /* ACTUALIZA REGISTRO */
        $result = $cnx->update('fb_testimonios', $data, ["idtestimonio" => $idtestimonio] );
    }elseif ($proceso=='del') {
        /* ELIMINA REGISTRO */
        $result = $cnx->delete('fb_testimonios', ["idtestimonio" => $idtestimonio] );
    } else {
        $data_only = array (
            $proceso => ''        
        );       
        $result = $cnx->update('fb_testimonios', $data_only, ["idtestimonio" => $idtestimonio] );
    }
   

    /* GENERAR JSON */
    $cnx_json = cnx_json();
    $sql = "SELECT * FROM fb_testimonios ORDER BY orden ASC ";
    // Execute the SQL query
    $result = $cnx_json->query($sql);
    // Check if the query was successful

    
    if ($result) {
        // Use a while loop to fetch and process each row
        while ($row = $result->fetch_assoc()) {
            //$nombre_seccion=get_row('nombre','fb_secciones', 'idseccion', $idseccion); 
            // Access individual columns of the current row like $row['column_name']
            //$nombre_seccion = $cnx->selectColumn("fb_secciones","nombre", ["idseccion" => $row['idseccion'] ], 1);
            $jSON[] = array(
                'idtestimonio'=> $row['idtestimonio'], 
                'titulo'=> $row['titulo'], 
                'bajada'=> $row['bajada'], 
                'imgdesktop'=> $row['imgdesktop'],
                'estado'=> $row['estado'],
                'youtube'=> $row['youtube'],
                'orden'=> $row['orden']
            );
        }  
        // Genera archivo JSON
        $json_string = json_encode($jSON);
        $file = '../json/jtestimonios.json';
        file_put_contents($file, $json_string);
        // Free the result set
        $result->free();
        $cnx_json->close();
        header('Location: ../testimonios');
    } else {
        echo "Error: " . $cnx_json->error;
    }
    
?>
