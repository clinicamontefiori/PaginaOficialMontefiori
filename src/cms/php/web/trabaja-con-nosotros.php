<?php
error_reporting(0);

use DevCod\DatabaseException;

require '../../core/config.php';
include '../var.php';
include '../../modelo/function.php';

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

	/*************IMAGEN PORTADA ****************/
	if(!empty($_FILES["item_file_portada"]['name'])) { //check if any file uploaded

		//$tamanoMaximo = 5 * 1024 * 1024; // 2 MB en bytes
	    $file_name_portada =$_FILES["item_file_portada"]['name'];  
	    $file_size_portada =$_FILES['item_file_portada']['size'];
	    $file_type_portada =$_FILES['item_file_portada']['type'];
	    $file_name_portada = nombre_upload($file_name_portada);

	    $imageFileType = strtolower(pathinfo($file_name_portada,PATHINFO_EXTENSION));
	    $uploadOk = 1;
	    $upload_ext = 1;
	    $path = "../../uploads/trabaje-nosotros/" . $file_name_portada;

	    //echo $tamanoMaximo."---->".$_FILES['item_file_portada']['size'].'===';

		if ($_FILES["item_file_portada"]["size"] > 500000) {
		//if ($_FILES['item_file_portada']['size'] < $tamanoMaximo) {
		
			#echo "Sorry, your file is too large.";
			$uploadOk = 0;
			//echo $uploadOk;
		}

		// Allow certain file formats
		if(($imageFileType != "jpg") && ($imageFileType != "png") && ($imageFileType != "jpeg") && ($imageFileType != "gif") && ($imageFileType != "pdf") && ($imageFileType != "doc") && ($imageFileType != "docx")  ) {
		  #echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		  $upload_ext = 0;
		}		
	}

	if ( ($uploadOk == 1) && ($upload_ext == 1) ){
		//echo "1";

		if(move_uploaded_file($_FILES["item_file_portada"]['tmp_name'],$path)) {     

		//echo "2";            

		$cnx = cnx();
		date_default_timezone_set('America/Lima');
		$ip = $_SERVER['REMOTE_ADDR'];
		$navegador = $_SERVER['HTTP_USER_AGENT'];
		$host = $_SERVER['HTTP_HOST'];

		$nombres = cleardata($_POST['nombres']);
		$apellidos = cleardata($_POST['apellidos']);
		$telefono = cleardata($_POST['telefono']);
		$correo_electronico = cleardata($_POST['correo_electronico']);
		$comentario = cleardata($_POST['comentario']);
		$fecha_registro = date("Y-m-d H:i:s");

		$data = [
		'nombre' => $nombres,
		'apellidos' => $apellidos,
		'telefono' => $telefono,
		'email' => $correo_electronico,
		'mensaje' => $comentario,
		'adjunta_archivo' => $file_name_portada,
		'fecharegistro' => $fecha_registro

		];
		$result = $cnx->insert('fb_trabaja_nosotros', $data);
		/* GENERAR JSON */
		$cnx_json = cnx_json();
		$sql = "SELECT * FROM fb_trabaja_nosotros WHERE estado=1 ORDER BY  fecharegistro DESC ";
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
		            'adjunta_archivo'=> $row['adjunta_archivo'],
		            'fecharegistro'=> $row['fecharegistro']
		        );
		    }
		    // Genera archivo JSON
		    $json_string = json_encode($jSON);
		    $file = '../../json/jtrabajaconnosotros_general.json';
		    file_put_contents($file, $json_string);
		    // Free the result set
		    $result->free();
		    $cnx_json->close();
		    //header('Location: ../trabaja-con-nosotros');
		} else {
		    echo "Error: " . $cnx_json->error;
		}





			header('Location: ../../../gracias');
	    }else{
	    	header('location: ../../../?error=1');	
	    }

	} else {

		header('location: ../../../?error=0');

	}


		}
        
        } else {
        echo "ERES UN ROBOT";
    }   