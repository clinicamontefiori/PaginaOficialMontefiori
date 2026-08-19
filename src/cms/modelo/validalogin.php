<?php
if (isset($_SESSION['usuario'])) {
    //$_SESSION['usuario'];

	$datauserrol = explode("|", $_SESSION['usuario']);
	$usuario = $datauserrol[0];
	$roluser = $datauserrol[1];
	$idusuario = $datauserrol[2];
   
} else {
    header('location: salir');
}
?>