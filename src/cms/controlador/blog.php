<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

use DevCod\DatabaseException;
require '../core/config.php';
include '../modelo/function.php';
include '../php/var.php';
require '../php/recaptcha_v3.php';

    /* GUARDA EN TABLA */
    $cnx = cnx();
    date_default_timezone_set('America/Lima');

    $proceso = isset($_POST['proceso']) && $_POST['proceso'] != '' ? $_POST['proceso'] : '';
    $idblog = isset($_POST['idblog']) && $_POST['idblog'] != '' ? $_POST['idblog'] : '';
    $titulo = isset($_POST['titulo']) && $_POST['titulo'] != '' ? $_POST['titulo'] : '';
    $bajada = isset($_POST['bajada']) && $_POST['bajada'] != '' ? $_POST['bajada'] : '';
    $url_blog    = isset($_POST['url']) && $_POST['url'] != '' ? $_POST['url'] : '';
    $url_blog    = urls_amigables($titulo);
    $detalle = isset($_POST['detalle']) && $_POST['detalle'] != '' ? $_POST['detalle'] : '';  

    $meta_title = isset($_POST['meta_title']) && $_POST['meta_title'] != '' ? $_POST['meta_title'] : '';  
    $meta_description = isset($_POST['meta_description']) && $_POST['meta_description'] != '' ? $_POST['meta_description'] : '';  
    $meta_keywords = isset($_POST['meta_keywords']) && $_POST['meta_keywords'] != '' ? $_POST['meta_keywords'] : '';  

    $estado = isset($_POST['estado']) && $_POST['estado'] != '' ? $_POST['estado'] : '';
    $destacado = isset($_POST['destacado']) && $_POST['destacado'] != '' ? $_POST['destacado'] : '';

    $fecha_add_upd_blog = date("Y-m-d H:i:s");

    // $idcategoria = isset($_POST['idcategoria']) && $_POST['idcategoria'] != '' ? $_POST['idcategoria'] : '';
    // $idcategoria_txt = implode(",", $idcategoria); // "1,3,5"




    /* UPLOAD DE ARCHIVO */
    /***************IMAGEN PORTADA *******************/
    $permitidos = ['jpg', 'jpeg', 'png', 'webp'];
    $file_desktop_old = $_POST['file_desktop_old'] ?? '';
    $file_movil_old   = $_POST['file_movil_old'] ?? '';

    $imgdesktop = subir_archivo('file_desktop', 'blog', $file_desktop_old, $permitidos);
    $imgmovil   = subir_archivo('file_movil', 'blog', $file_movil_old, $permitidos);

    /* CATEGORÍAS MULTIPLES */
    $idcategoria = $_POST['idcategoria'] ?? [];       // si no existe, es array vacío

    if (!is_array($idcategoria)) {                    // seguridad extra
    $idcategoria = [];
    }

    $idcategoria_txt = implode(",", $idcategoria);    // genera: "1,3,5"



   
    $data = array (
        'titulo' => $titulo,
        'bajada' => $bajada,
        'detalle' => $detalle,
        'idcategoria' => $idcategoria_txt,
        'imgdesktop' => $imgdesktop,
        'imgmovil' => $imgmovil,
        'url' => $url_blog,
        'meta_title' => $meta_title,
        'meta_description' => $meta_description,
        'meta_keywords' => $meta_keywords,
        'destacado' => $destacado,
        'fechapublicacion' => $fecha_add_upd_blog,
        'estado' => $estado
        
    );

    if($proceso=='ins'){
        /* GUARDA REGISTRO */
        $result = $cnx->insert('fb_blog', $data);
        $idblog = $result->id();

    }elseif ($proceso=='upd') {
        /* ACTUALIZA REGISTRO */
        $result = $cnx->update('fb_blog', $data, ["idblog" => $idblog] );
    }elseif ($proceso=='del') {
        /* ELIMINA REGISTRO */
        $result = $cnx->delete('fb_blog', ["idblog" => $idblog] );
        //$idblog = $result->id();
    }else  {
        $data_only = array (
            $proceso => ''        
        );       
        $result = $cnx->update('fb_blog', $data_only, ["idblog" => $idblog] );
    }


    if($idblog!=''){
    /**********************************/
    $cnx_json = cnx_json();
    # GENERAR JSON UNICO
    $sql_unico = "SELECT * FROM fb_blog WHERE idblog=".$idblog."  LIMIT 1";
    $result_unico = $cnx_json->query($sql_unico);
    if ($result_unico) {
    $rowu = $result_unico->fetch_assoc();
    $arrarunino = array(
        'idblog'=> $rowu['idblog'], 
        'titulo'=> $rowu['titulo'], 
        'bajada'=> $rowu['bajada'], 
        'detalle'=> $rowu['detalle'], 
        'idcategoria'=> $rowu['idcategoria'], 
        'imgdesktop'=> $rowu['imgdesktop'],
        'imgmovil'=> $rowu['imgmovil'],
        'url'=> $rowu['url'],
        'fechapublicacion'=> $rowu['fechapublicacion'],
        'fecharegistro'=> $rowu['fecharegistro'],
        'meta_title'=> $rowu['meta_title'],
        'meta_description'=> $rowu['meta_description'],
        'meta_keywords'=> $rowu['meta_keywords'],
        'destacado' => $rowu['destacado'],
        'estado'=> $rowu['estado']
        );
    }
    $json_unico = json_encode($arrarunino);
    $file_unico = '../json/blog/'.$idblog.'.json';
    $file_unico_url = '../json/blog/'.$rowu['url'].'.json';

    file_put_contents($file_unico, $json_unico);
    file_put_contents($file_unico_url, $json_unico);
    $result_unico->free();   
    /**********************************/
    }


    $sql_principal = "SELECT * FROM fb_blog ORDER BY idblog DESC";
    $result_principal = $cnx_json->query($sql_principal);
    if ($result_principal) {
        while ($row = $result_principal->fetch_assoc()) {
            $jSON[] = array(
                'idblog'=> $row['idblog'], 
                'titulo'=> $row['titulo'], 
                'bajada'=> $row['bajada'],
                'idcategoria'=> $row['idcategoria'], 
                'url'=> $row['url'], 
                'imgmovil'=> $row['imgmovil'], 
                'fecharegistro'=> $row['fecharegistro'],
                'destacado' => $row['destacado'],
                'estado'=> $row['estado']
            );
        }  
        // Genera archivo JSON General
        $json_principal = json_encode($jSON);
        $file_principal = '../json/jblog_general.json';
        file_put_contents($file_principal, $json_principal);
        
    } else {
        echo "Error: " . $cnx_json->error;
    }  

    $result_principal->free();        
    $cnx_json->close();
    header('Location: ../blog');


?>
