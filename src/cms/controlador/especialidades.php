<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

use DevCod\DatabaseException;
require '../core/config.php';
include '../modelo/function.php';
include '../php/var.php';


    /* VALIDA BOT CON CATPCHA */
    // $token = $_POST['google_response_token'];
    // $url = 'https://www.google.com/recaptcha/api/siteverify';
    // $peticion = "$url?secret=".SECRET_KEY."&response=$token";
    // $rta = file_get_contents( $peticion );
    // $json = json_decode($rta, true);
    // $ok = $json['success']; //true si salió ok... false si algo falló.
    // if( $token === false ){  die( ); }
    // if( $ok === false ){ die( ); }

    /* UPLOAD DE ARCHIVO */
    /***************IMAGEN PORTADA *******************/
    //$permitidos = ['jpg', 'png', 'webp'];
    //$imgdesktop = subir_archivo_especialidad('file_desktop', 'especialidades', $_POST['file_desktop_old'], $permitidos);

    $nuevo_nombre = $_POST['ideEspecialidad'];

    $imagen = subir_archivo_especialidad('file_desktop','especialidades',$_POST['file_desktop_old'],$nuevo_nombre);

    header('Location: ../especialidades');
    
?>
