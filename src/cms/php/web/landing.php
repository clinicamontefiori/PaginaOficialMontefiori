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
        if($datos['action'] == 'landingservicio'){    

			$nombres = isset($_POST['nombres']) && $_POST['nombres'] != '' ? $_POST['nombres'] : ''; 
			$apellidos = isset($_POST['apellidos']) && $_POST['apellidos'] != '' ? $_POST['apellidos'] : ''; 
			$telefono = isset($_POST['telefono']) && $_POST['telefono'] != '' ? $_POST['telefono'] : ''; 
			$edad = isset($_POST['edad']) && $_POST['edad'] != '' ? $_POST['edad'] : ''; 
			$dni = isset($_POST['dni']) && $_POST['dni'] != '' ? $_POST['dni'] : ''; 
			$email = isset($_POST['email']) && $_POST['email'] != '' ? $_POST['email'] : ''; 
			$tipo = isset($_POST['tipo']) && $_POST['tipo'] != '' ? $_POST['tipo'] : '';
			$servicios = isset($_POST['servicios']) && $_POST['servicios'] != '' ? $_POST['servicios'] : ''; 

			$utm_id = isset($_POST['utm_id']) && $_POST['utm_id'] != '' ? $_POST['utm_id'] : ''; 
			$utm_source = isset($_POST['utm_source']) && $_POST['utm_source'] != '' ? $_POST['utm_source'] : ''; 
			$utm_medium = isset($_POST['utm_medium']) && $_POST['utm_medium'] != '' ? $_POST['utm_medium'] : ''; 
			$utm_campaign = isset($_POST['utm_campaign']) && $_POST['utm_campaign'] != '' ? $_POST['utm_campaign'] : ''; 
			$utm_term = isset($_POST['utm_term']) && $_POST['utm_term'] != '' ? $_POST['utm_term'] : ''; 
			$utm_content = isset($_POST['utm_content']) && $_POST['utm_content'] != '' ? $_POST['utm_content'] : ''; 

			$cnx = cnx();
			date_default_timezone_set('America/Lima');

			$data = [
				'nombre' => cleardata($nombres),
				'apellidos' => cleardata($apellidos),
				'telefono' => cleardata($telefono),
				'edad' => cleardata($edad),
				'dni' => cleardata($dni),
				'email' => cleardata($email),
				'servicios' => cleardata($servicios),
				'tipo' => cleardata($tipo),
				'utm_id' => cleardata($utm_id),
				'utm_source' => cleardata($utm_source),
				'utm_medium' => cleardata($utm_medium),
				'utm_campaign' => cleardata($utm_campaign),
				'utm_term' => cleardata($utm_term),
				'utm_content' => cleardata($utm_content)
			];
			$result = $cnx->insert('fb_landing', $data);

			/* GENERAR JSON */
			$cnx_json = cnx_json();
			$sql = "SELECT * FROM  fb_landing WHERE estado=1 ORDER BY  fecharegistro DESC";
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
			            'edad'=> $row['edad'],
			            'dni'=> $row['dni'],
			            'fecharegistro'=> $row['fecharegistro'],
			            'tipo'=> $row['tipo'],
			            'email'=> $row['email'],
			            'servicios'=> $row['servicios'],
			            'estado'=> $row['estado'],
			            'utm_id'=> $row['utm_id'],
			            'utm_source'=> $row['utm_source'],
			            'utm_medium'=> $row['utm_medium'],
			            'utm_campaign'=> $row['utm_campaign'],
			            'utm_term'=> $row['utm_term'],
			            'utm_content'=> $row['utm_content']
			        );
			    }
			    // Genera archivo JSON
			    $json_string = json_encode($jSON);
			    $file = '../../json/jlanding_general.json';
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

