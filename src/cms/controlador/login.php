<?php
session_start();
error_reporting(0);
ini_set('display_errors', 0);

use DevCod\DatabaseException;
require '../core/config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {


    // Sanitiza y valida el email
    $usuario_ingresado = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    if (!filter_var($usuario_ingresado, FILTER_VALIDATE_EMAIL)) {
        // Email no válido
        header('Location: ../?error=email');
        exit();
    }

    // Sanitiza la contraseña (elimina espacios innecesarios)
    $contrasena_ingresada = trim($_POST["password"]);

    // Puedes agregar una validación opcional:
    // if (strlen($contrasena_ingresada) < 6) {
    //     // Contraseña muy corta
    //     header('Location: ../?error=password');
    //     exit();
    // }



    // $usuario_ingresado = $_POST["email"];
    // $contrasena_ingresada = $_POST["password"];

    // Validación básica de email
    if (!filter_var($usuario_ingresado, FILTER_VALIDATE_EMAIL)) {
        header('Location: ../?error=1');
        exit();
    }

    $cnx_json = cnx_json();
    $cnx = cnx();

    // CONSULTA SEGURA
    $stmt = $cnx_json->prepare("SELECT * FROM fb_usuarios WHERE email = ?");
    $stmt->bind_param("s", $usuario_ingresado);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $usuario = $row['usuario'];
            $idusuario = $row['idusuario'];
            $email = $row['email'];
            $idrol = $row['idrol'];
            $google2fa = $row['google2fa'];
            $contrasena_correcta = trim($row['password']);
        }

        if (($usuario_ingresado == $email) && password_verify($contrasena_ingresada, $contrasena_correcta)) {
            $rol_user = $cnx->selectColumn("fb_roles", "nombre", ["idrol" => $idrol], 1);
            $_SESSION['usuario'] = $usuario . '|' . $rol_user . '|' . $idusuario . '|' . $google2fa;
            $_SESSION['rol_page'] = $cnx->selectColumn("fb_roles", "page", ["idrol" => $idrol], 1);

            if ($google2fa == 'on') {
                $create_hash = $_SESSION['usuario'] . date("Y/m/d") . "CMF2019STEP1";
                $_SESSION['TOKEN'] = password_hash($create_hash, PASSWORD_DEFAULT);
                header('Location: ../doble-verificacion');
            } else {
                header('Location: ../dashboard');
            }
            exit();
        } else {
            header('Location: ../?error=1');
            exit();
        }
    } else {
        header('Location: ../?error=0');
        exit();
    }
}
?>
