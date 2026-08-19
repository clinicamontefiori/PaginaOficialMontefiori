<?php
    $rol_page_user_valor = $_SESSION['rol_page'];
    $rol_page_user_valor = 'Dashboard,Perfil de Usuario,'.$rol_page_user_valor; 
    $page_url_rol = urls_page_cms($rol_page_user_valor); 
    $busqueda = trim(basename($_SERVER['REQUEST_URI']));

    $caracter = "?";
    $parte_posterior = strstr($busqueda, $caracter);
	if ($parte_posterior !== false) {
	    $busqueda  = str_replace($parte_posterior, "", $busqueda);
	} else {

	}

	if (strpos($page_url_rol, $busqueda) !== false) {

	} else {
		header('location: salir');
	}
	$rol_page_user = explode(",", $rol_page_user_valor);
?>

	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="robots" content="noindex, nofollow">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--favicon-->
	<link rel="icon" href="assets/images/cropped-logo-clinica-montefiori-32x32.png" type="image/png">
	<!--plugins-->
	<!-- <link href="assets/plugins/simplebar/css/simplebar.css" rel="stylesheet"> -->
	<link href="assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet">
	<link href="assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet">
	<!--SOLO PARA LISTADO DE TABLAS-->
	<link href="assets/plugins/datatable/css/dataTables.bootstrap5.min.css" rel="stylesheet">
	<!-- loader-->
	<link href="assets/css/pace.min.css" rel="stylesheet">
	<script src="assets/js/pace.min.js"></script>
	<!-- Bootstrap CSS -->
	<link href="assets/css/bootstrap.min.css" rel="stylesheet">
	<!-- <link href="assets/css/bootstrap-extended.css" rel="stylesheet"> -->
	<!-- <link href="../../../../css2-1?family=Roboto:wght@400;500&display=swap" rel="stylesheet"> -->
	<link href="assets/css/app.css" rel="stylesheet">
	<link href="assets/css/icons.css" rel="stylesheet">
	<!-- Theme Style CSS -->
	<link rel="stylesheet" href="assets/css/dark-theme.css">
	<!-- <link rel="stylesheet" href="assets/css/semi-dark.css"> -->
	<!-- <link rel="stylesheet" href="assets/css/header-colors.css"> -->
	<title>Clínica Montefiori</title>