<?php
error_reporting(0);

use DevCod\DatabaseException;
require '../../core/config.php';
include '../var.php';

    $token = $_POST['token'];
    $action = $_POST['action'];
    
    $cu = curl_init();
    curl_setopt($cu, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify");
    curl_setopt($cu, CURLOPT_POST, 1);
    curl_setopt($cu, CURLOPT_POSTFIELDS, http_build_query(array('secret' => SECRET_KEY, 'response' => $token)));
    curl_setopt($cu, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($cu);
    curl_close($cu);
    
    $datos = json_decode($response, true);
    
    if($datos['success'] == 1 && $datos['score'] >= 0.5){
        if($datos['action'] == 'validarUsuario'){
            
        

	$nombres = cleardata($_POST['nombres']);
	$apellidos = cleardata($_POST['apellidos']);
	$telefono = cleardata($_POST['telefono']);
	$correo_electronico = cleardata($_POST['correo_electronico']);
	$comentario = cleardata($_POST['comentario']);
	$fecha_registro = date("Y-m-d H:i:s");



	$cnx = cnx();
	$data = [
		'nombre' => $nombres,
		'apellidos' => $apellidos,
		'telefono' => $telefono,
		'email' => $correo_electronico,
		'mensaje' => $comentario,
		'fecharegistro' => $fecha_registro 
	];
	$result = $cnx->insert('fb_contactanos', $data);

	/* GENERAR JSON */
	$cnx_json = cnx_json();
	$sql = "SELECT * FROM  fb_contactanos WHERE estado=1 ORDER BY  idcontactanos DESC ";
	// Execute the SQL query
	$result = $cnx_json->query($sql);
	// Check if the query was successful
	if ($result) {
		// Use a while loop to fetch and process each row
		while ($row = $result->fetch_assoc()) {
		    // Access individual columns of the current row like $row['column_name']
		    $jSON[] = array(
		        'nombre'=> $row['nombre'], 
		        'apellidos'=> $row['apellidos'], 
		        'telefono'=> $row['telefono'],
		        'email'=> $row['email'],
		        'mensaje'=> $row['mensaje'],
		        'fecharegistro'=> $row['fecharegistro']
		    );
		}
		// Genera archivo JSON
		$json_string = json_encode($jSON);
		$file = '../../json/jcontacto_general.json';
		file_put_contents($file, $json_string);
		// Free the result set
		$result->free();
		$cnx_json->close();
		header('Location: ../../../gracias');
	} else {
		echo "Error: " . $cnx_json->error;
	}


	}
        
        } else {
        	// fuera eres un ROBOT
        	header('Location: https://clinicasanfelipe.com/');
    }   