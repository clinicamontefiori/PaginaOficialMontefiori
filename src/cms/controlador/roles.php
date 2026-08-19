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
    /* DECLARA INPUT FORMULARIOS */
    $proceso = isset($_POST['proceso']) && $_POST['proceso'] != '' ? $_POST['proceso'] : '';
    $idrol = isset($_POST['idrol']) && $_POST['idrol'] != '' ? $_POST['idrol'] : '';
    $nombre = isset($_POST['nombre']) && $_POST['nombre'] != '' ? $_POST['nombre'] : '';
    $page = isset($_POST['page']) && $_POST['page'] != '' ? $_POST['page'] : '';
    $estado = isset($_POST['estado']) && $_POST['estado'] != '' ? $_POST['estado'] : '';


    // $busqueda = trim('Dashboard');
    // if (strpos($page, $busqueda) !== false) {
    //     $page = $page;
    // }else{
    //     $page = 'Dashboard';
    // }
    
    $data = array (
        'idrol' => $idrol,
        'nombre' => $nombre,
        'page' => $page,
        'estado' => $estado       
    );   

    if($proceso=='ins'){
        /* GUARDA REGISTRO */
        $result = $cnx->insert('fb_roles', $data);
    }elseif ($proceso=='upd') {
        /* ACTUALIZA REGISTRO */
        $result = $cnx->update('fb_roles', $data, ["idrol" => $idrol] );
    }elseif ($proceso=='del') {
        /* ELIMINA REGISTRO */
        $result = $cnx->delete('fb_roles', ["idrol" => $idrol] );
    }


    /* GENERAR JSON */
    $cnx_json = cnx_json();
    $sql = "SELECT * FROM fb_roles";
    // Execute the SQL query
    $result = $cnx_json->query($sql);
    // Check if the query was successful
    if ($result) {
        // Use a while loop to fetch and process each row
        while ($row = $result->fetch_assoc()) {
            // Access individual columns of the current row like $row['column_name']
            $jSON[] = array(
                'idrol'=> $row['idrol'], 
                'nombre'=> $row['nombre'],
                'page'=> $row['page'], 
                'estado'=> $row['estado'],
                'fecharegistro'=> $row['fecharegistro']
            );
        }
        // Genera archivo JSON
        $json_string = json_encode($jSON);
        $file = '../json/jroles_general.json';
        file_put_contents($file, $json_string);
        // Free the result set
        $result->free();
        $cnx_json->close();
        header('Location: ../roles');
    } else {
        header('Location: ../roles-add');
        echo "Error: " . $cnx_json->error;
    }
    
?>
