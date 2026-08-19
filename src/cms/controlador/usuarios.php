<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

use DevCod\DatabaseException;
require '../core/config.php';
include '../php/var.php';
require '../php/recaptcha_v3.php';



    /* CONECTA TABLA */
    $cnx = cnx();
    date_default_timezone_set('America/Lima');

    /* DECLARA INPUT FORMULARIOS */
    $proceso = isset($_POST['proceso']) && $_POST['proceso'] != '' ? $_POST['proceso'] : '';
    $idusuario = isset($_POST['idusuario']) && $_POST['idusuario'] != '' ? $_POST['idusuario'] : '0';
    $idrol = isset($_POST['idrol']) && $_POST['idrol'] != '' ? $_POST['idrol'] : '';
    $username = isset($_POST['username']) && $_POST['username'] != '' ? $_POST['username'] : '';
    $password = isset($_POST['password']) && $_POST['password'] != '' ? $_POST['password'] : '';
    $email = isset($_POST['email']) && $_POST['email'] != '' ? $_POST['email'] : '';
    $estado = isset($_POST['estado']) && $_POST['estado'] != '' ? $_POST['estado'] : '';
    $google2fa = isset($_POST['google2fa']) && $_POST['google2fa'] != '' ? $_POST['google2fa'] : '';

    $salt = bin2hex(random_bytes(32));
    $hash_contrasena = password_hash($password, PASSWORD_DEFAULT);
    $data = array (
        'idusuario' => $idusuario,
        'idrol' => $idrol,
        'usuario' => $username,
        'password' => $hash_contrasena,
        'email' => $email,
        'estado' => $estado,
        'google2fa' => $google2fa
        
    );       
    if($proceso=='ins'){
        /* GUARDA REGISTRO */
        $result = $cnx->insert('fb_usuarios', $data);
    }elseif ($proceso=='upd') {
        /* ACTUALIZA REGISTRO */
        $result = $cnx->update('fb_usuarios', $data, ["idusuario" => $idusuario] );
    }elseif ($proceso=='del') {
        /* ELIMINA REGISTRO */
        $result = $cnx->delete('fb_usuarios', ["idusuario" => $idusuario] );
    }
        

    /* GENERAR JSON */
    $cnx_json = cnx_json();
    $sql = "SELECT * FROM fb_usuarios ORDER BY  fecharegistro DESC ";
    // Execute the SQL query
    $result = $cnx_json->query($sql);
    // Check if the query was successful
    if ($result) {
        // Use a while loop to fetch and process each row
        while ($row = $result->fetch_assoc()) {
            // Access individual columns of the current row like $row['column_name']
            $nombre_rol = $cnx->selectColumn("fb_roles","nombre", ["idrol" => $row['idrol'] ], 1);
            $jSON[] = array(
                'idusuario'=> $row['idusuario'], 
                'idrol'=> $row['idrol'], 
                'usuario'=> $row['usuario'], 
                'email'=> $row['email'],
                'estado'=> $row['estado'],
                'nombre_rol'=> $nombre_rol,
                'google2fa'=> $row['google2fa'],
                'fecharegistro'=> $row['fecharegistro']
            );
        }
        // Genera archivo JSON
        $json_string = json_encode($jSON);
        $file = '../json/jusuarios_general.json';
        file_put_contents($file, $json_string);
        // Free the result set
        $result->free();
        $cnx_json->close();

        if(isset($_POST['profile'])){
            header('Location: ../perfil-de-usuario?msg=ok');
        }else{
            header('Location: ../usuarios');
        }
    } else {
        echo "Error: " . $cnx_json->error;
    }
    
?>
