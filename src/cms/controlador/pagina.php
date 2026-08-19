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
    $file_desktop_old = $_POST['file_desktop_old'] ?? '';
    $file_movil_old   = $_POST['file_movil_old'] ?? '';

    $imgdesktop = subir_archivo('file_desktop', 'paginas', $file_desktop_old, $permitidos);
    $imgmovil   = subir_archivo('file_movil', 'paginas', $file_movil_old, $permitidos);

    /* GUARDA EN TABLA */
    $cnx = cnx();
    $cnx->query("SET NAMES 'utf8mb4'");
    date_default_timezone_set('America/Lima');

    $proceso = isset($_POST['proceso']) && $_POST['proceso'] != '' ? $_POST['proceso'] : '';
    $idpagina = isset($_POST['idpagina']) && $_POST['idpagina'] != '' ? $_POST['idpagina'] : '';
    $idseccion = isset($_POST['idseccion']) && $_POST['idseccion'] != '' ? $_POST['idseccion'] : '';
    $titulo = isset($_POST['titulo']) && $_POST['titulo'] != '' ? $_POST['titulo'] : '';
    $detalle = isset($_POST['detalle']) && $_POST['detalle'] != '' ? $_POST['detalle'] : '';

    $url_pagina    = urls_amigables($titulo);
    $estado = isset($_POST['estado']) && $_POST['estado'] != '' ? $_POST['estado'] : '';

    $meta_title = isset($_POST['meta_title']) && $_POST['meta_title'] != '' ? $_POST['meta_title'] : '';  
    $meta_description = isset($_POST['meta_description']) && $_POST['meta_description'] != '' ? $_POST['meta_description'] : '';  
    $meta_keywords = isset($_POST['meta_keywords']) && $_POST['meta_keywords'] != '' ? $_POST['meta_keywords'] : '';      


   
    $data = array (
        'titulo' => $titulo,
        'detalle' => ($detalle),
        'imgdesktop' => $imgdesktop,
        'imgmovil' => $imgmovil,
        'url' => $url_pagina,
        'meta_title' => $meta_title,
        'meta_description' => $meta_description,
        'meta_keywords' => $meta_keywords,        
        'estado' => $estado        
    );

    if($proceso=='ins'){
        /* GUARDA REGISTRO */
        $result = $cnx->insert('fb_pagina', $data);
        $idpagina = $result->id();

    }elseif ($proceso=='upd') {
        /* ACTUALIZA REGISTRO */
        $result = $cnx->update('fb_pagina', $data, ["idpagina" => $idpagina] );
    }elseif ($proceso=='del') {
        /* ELIMINA REGISTRO */
        $result = $cnx->delete('fb_pagina', ["idpagina" => $idpagina] );
    }else  {
        $data_only = array (
            $proceso => ''        
        );       
        $result = $cnx->update('fb_pagina', $data_only, ["idpagina" => $idpagina] );
    }


    if($idpagina!=''){
        $cnx_json = cnx_json();
        # GENERAR JSON UNICO
        $sql_unico = "SELECT * FROM fb_pagina WHERE idpagina=".$idpagina."  LIMIT 1";
        $sql_general = "SELECT * FROM fb_pagina ORDER BY idpagina DESC";
        $result_unico = $cnx_json->query($sql_unico);
        $result_general = $cnx_json->query($sql_general);

        if ($result_unico) {
        $rowu = $result_unico->fetch_assoc();
        $arrarunino = array(
            'idpagina'=> $rowu['idpagina'],
            'titulo'=> $rowu['titulo'], 
            'detalle'=> $rowu['detalle'], 
            'imgdesktop'=> $rowu['imgdesktop'],
            'imgmovil'=> $rowu['imgmovil'],
            'url'=> $rowu['url'],
            'fechapublicacion'=> $rowu['fechapublicacion'],
            'fecharegistro'=> $rowu['fecharegistro'],
            'meta_title'=> $rowu['meta_title'],
            'meta_description'=> $rowu['meta_description'],
            'meta_keywords'=> $rowu['meta_keywords'],        
            'estado'=> $rowu['estado']  
            );
        }
        $json_unico = json_encode($arrarunino);
        
        $file_unico = '../json/paginas/'.$idpagina.'.json';
        $file_unico_url = '../json/paginas/'.$rowu['url'].'.json';

        file_put_contents($file_unico, $json_unico);
        file_put_contents($file_unico_url, $json_unico);
    }
    

    if ($result_general) {
        //$rowg = $result_general->fetch_assoc();
        while ($rowg = $result_general->fetch_assoc()) {
        $arrageneral[] = array(
            'idpagina'=> $rowg['idpagina'],
            'titulo'=> $rowg['titulo'], 
            'url'=> $rowg['url'],
            'fechapublicacion'=> $rowg['fechapublicacion'],
            'fecharegistro'=> $rowg['fecharegistro'],        
            'estado'=> $rowg['estado']
            );
        }
        $json_gene = json_encode($arrageneral);
        $file_gene = '../json/jpagina.json';
        file_put_contents($file_gene, $json_gene);
    }
   
    header('Location: ../pagina');
?>
