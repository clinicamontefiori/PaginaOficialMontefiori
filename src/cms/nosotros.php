<?php 
session_start();
include('modelo/validalogin.php');
require 'modelo/function.php';
require 'php/var.php'; 

$json_file = __DIR__ . '/json/jnosotros.json';
$success_msg = '';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    // Leer actual
    $current_data = json_decode(file_get_contents($json_file), true);
    
    // Procesar textos
    $current_data['historia_titulo'] = $_POST['historia_titulo'] ?? '';
    $current_data['historia_texto'] = $_POST['historia_texto'] ?? '';
    $current_data['cultura_titulo'] = $_POST['cultura_titulo'] ?? '';
    $current_data['cultura_texto'] = $_POST['cultura_texto'] ?? '';
    $current_data['adn_titulo'] = $_POST['adn_titulo'] ?? '';
    $current_data['adn_texto'] = $_POST['adn_texto'] ?? '';
    $current_data['adn_subtexto'] = $_POST['adn_subtexto'] ?? '';
    $current_data['convenios_titulo'] = $_POST['convenios_titulo'] ?? '';
    $current_data['convenios_texto'] = $_POST['convenios_texto'] ?? '';
    $current_data['staff_titulo'] = $_POST['staff_titulo'] ?? '';
    $current_data['staff_texto'] = $_POST['staff_texto'] ?? '';

    $upload_dir = dirname(__DIR__) . '/uploads/img/';
    if (!is_dir($upload_dir)) {
        @mkdir($upload_dir, 0777, true);
    }

    $errors = [];

    // Función auxiliar para procesar imagen
    $procesar_imagen = function($campo, &$current_data, $upload_dir, &$errors) {
        if (isset($_FILES[$campo]) && $_FILES[$campo]['name'] != '') {
            if ($_FILES[$campo]['error'] == UPLOAD_ERR_OK) {
                $img_name = time() . '_' . basename($_FILES[$campo]['name']);
                $target = $upload_dir . $img_name;
                if(move_uploaded_file($_FILES[$campo]['tmp_name'], $target)){
                    $current_data[$campo] = $img_name;
                } else {
                    $errors[] = "Error al mover el archivo de $campo al destino. Verifique permisos en $upload_dir.";
                }
            } else {
                $errores_upload = [
                    UPLOAD_ERR_INI_SIZE => 'El archivo excede el tamaño máximo permitido por el servidor.',
                    UPLOAD_ERR_FORM_SIZE => 'El archivo excede el tamaño máximo permitido por el formulario.',
                    UPLOAD_ERR_PARTIAL => 'El archivo fue subido parcialmente.',
                    UPLOAD_ERR_NO_FILE => 'No se subió ningún archivo.',
                    UPLOAD_ERR_NO_TMP_DIR => 'Falta la carpeta temporal en el servidor.',
                    UPLOAD_ERR_CANT_WRITE => 'Fallo al escribir el archivo en el disco.',
                    UPLOAD_ERR_EXTENSION => 'Una extensión de PHP detuvo la subida del archivo.'
                ];
                $codigo_error = $_FILES[$campo]['error'];
                $msg_error = $errores_upload[$codigo_error] ?? 'Error desconocido al subir el archivo.';
                $errors[] = "Error en $campo: $msg_error";
            }
        }
    };

    $procesar_imagen('historia_img', $current_data, $upload_dir, $errors);
    $procesar_imagen('convenios_img', $current_data, $upload_dir, $errors);
    $procesar_imagen('staff_img', $current_data, $upload_dir, $errors);

    $json_file = __DIR__ . '/json/jnosotros.json';

    // Guardar JSON solo si no hay errores críticos de json
    $json_string = json_encode($current_data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    if ($json_string !== false) {
        $write_result = file_put_contents($json_file, $json_string);
        if ($write_result === false) {
            $errors[] = "Error crítico: No se pudo escribir en el archivo JSON. Verifica los permisos de $json_file";
        }
    } else {
        $errors[] = "Error crítico: No se pudo codificar el JSON (posibles caracteres inválidos).";
    }
    
    if (empty($errors)) {
        $success_msg = 'Información actualizada correctamente.';
    } else {
        $success_msg = 'Textos guardados, pero hubo problemas con las imágenes:<br>' . implode('<br>', $errors);
    }
}

// Cargar datos para la vista
$data = json_decode(file_get_contents($json_file), true);
if(!$data) $data = [];

?>
<!doctype html>
<html lang="es">

<head>
	<?php include ('vista/head.php')?>
	<script src="https://code.jquery.com/jquery-3.2.1.js"></script>	
</head>

<body>
	<!--wrapper-->
	<div class="wrapper">
		<!--start header wrapper-->	
		<div class="header-wrapper">
			<!--start header -->
			<?php include('vista/header.php')?>
			<!--end header -->
			<!--navigation-->
			<?php include ('vista/navigation.php')?>
			<!--end navigation-->
		</div>
		<!--end header wrapper-->
		<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">
				<!--breadcrumb-->
				<?php echo imprime_breadcrumb('Nosotros'); ?>
				<!--end breadcrumb-->

				<div class="row">
					<div class="col-xl-8 mx-auto">
						<div class="card">
							<div class="card-header px-4 py-3">
								<h5 class="mb-0">Administrar Página Nosotros</h5>
							</div>
							<div class="card-body p-4">
                                <?php if($success_msg): ?>
                                    <div class="alert <?php echo (strpos($success_msg, 'problemas') !== false) ? 'alert-warning' : 'alert-success'; ?>">
                                        <?php echo $success_msg; ?>
                                    </div>
                                <?php endif; ?>

								<form class="row g-3 needs-validation" action="nosotros" method="post" enctype="multipart/form-data" novalidate="">
									
                                    <h5 class="mt-4">Sección: Nuestra Historia</h5>
                                    <hr>
                                    <div class="col-md-12">
										<label class="form-label">Título Historia</label>
										<input type="text" required class="form-control" name="historia_titulo" value="<?php echo htmlspecialchars($data['historia_titulo'] ?? ''); ?>" >
									</div>
									<div class="col-md-12">
										<label class="form-label">Texto Historia</label>
										<textarea rows="5" class="form-control" name="historia_texto" required><?php echo htmlspecialchars($data['historia_texto'] ?? ''); ?></textarea>
									</div>
                                    <div class="col-md-12">
										<label class="form-label">Imagen Historia (Dejar vacío para no cambiar)</label>
										<input class="form-control" type="file" name="historia_img" accept=".jpg, .png, image/jpeg, image/png, image/webp">
                                        <?php if(!empty($data['historia_img'])): ?>
                                            <p class="mt-2">Actual: <a target="_blank" href="../uploads/img/<?php echo $data['historia_img']; ?>"><?php echo $data['historia_img']; ?></a></p>
                                        <?php endif; ?>
									</div>


                                    <h5 class="mt-5">Sección: Cultura CCR</h5>
                                    <hr>
                                    <div class="col-md-12">
										<label class="form-label">Título Cultura</label>
										<input type="text" required class="form-control" name="cultura_titulo" value="<?php echo htmlspecialchars($data['cultura_titulo'] ?? ''); ?>" >
									</div>
									<div class="col-md-12">
										<label class="form-label">Texto Cultura</label>
										<textarea rows="4" class="form-control" name="cultura_texto" required><?php echo htmlspecialchars($data['cultura_texto'] ?? ''); ?></textarea>
									</div>


                                    <h5 class="mt-5">Sección: Nuestro ADN</h5>
                                    <hr>
                                    <div class="col-md-12">
										<label class="form-label">Título ADN</label>
										<input type="text" required class="form-control" name="adn_titulo" value="<?php echo htmlspecialchars($data['adn_titulo'] ?? ''); ?>" >
									</div>
									<div class="col-md-12">
										<label class="form-label">Texto ADN</label>
										<textarea rows="4" class="form-control" name="adn_texto" required><?php echo htmlspecialchars($data['adn_texto'] ?? ''); ?></textarea>
									</div>
                                    <div class="col-md-12">
										<label class="form-label">Subtexto (Frase final)</label>
										<input type="text" required class="form-control" name="adn_subtexto" value="<?php echo htmlspecialchars($data['adn_subtexto'] ?? ''); ?>" >
									</div>


                                    <h5 class="mt-5">Sección: Aseguradoras y Convenios</h5>
                                    <hr>
                                    <div class="col-md-12">
										<label class="form-label">Título Convenios</label>
										<input type="text" required class="form-control" name="convenios_titulo" value="<?php echo htmlspecialchars($data['convenios_titulo'] ?? ''); ?>" >
									</div>
									<div class="col-md-12">
										<label class="form-label">Texto Convenios</label>
										<textarea rows="5" class="form-control" name="convenios_texto" required><?php echo htmlspecialchars($data['convenios_texto'] ?? ''); ?></textarea>
									</div>
                                    <div class="col-md-12">
										<label class="form-label">Imagen Convenios (Dejar vacío para no cambiar)</label>
										<input class="form-control" type="file" name="convenios_img" accept=".jpg, .png, image/jpeg, image/png, image/webp">
                                        <?php if(!empty($data['convenios_img'])): ?>
                                            <p class="mt-2">Actual: <a target="_blank" href="../uploads/img/<?php echo $data['convenios_img']; ?>"><?php echo $data['convenios_img']; ?></a></p>
                                        <?php endif; ?>
									</div>


                                    <h5 class="mt-5">Sección: Nuestro Staff Médico</h5>
                                    <hr>
                                    <div class="col-md-12">
										<label class="form-label">Título Staff</label>
										<input type="text" required class="form-control" name="staff_titulo" value="<?php echo htmlspecialchars($data['staff_titulo'] ?? ''); ?>" >
									</div>
									<div class="col-md-12">
										<label class="form-label">Texto Staff</label>
										<textarea rows="5" class="form-control" name="staff_texto" required><?php echo htmlspecialchars($data['staff_texto'] ?? ''); ?></textarea>
									</div>
                                    <div class="col-md-12">
										<label class="form-label">Imagen Staff (Dejar vacío para no cambiar)</label>
										<input class="form-control" type="file" name="staff_img" accept=".jpg, .png, image/jpeg, image/png, image/webp">
                                        <?php if(!empty($data['staff_img'])): ?>
                                            <p class="mt-2">Actual: <a target="_blank" href="../uploads/img/<?php echo $data['staff_img']; ?>"><?php echo $data['staff_img']; ?></a></p>
                                        <?php endif; ?>
									</div>


									<div class="col-md-12 mt-4">
										<div class="d-md-flex d-grid align-items-center gap-3">
											<button type="submit" class="btn btn-primary px-4">Guardar Cambios</button>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>

				<!--end row-->
			</div>
		</div>
		
		<!-- search modal -->
		<?php include ('vista/modal.php'); ?>
		<!-- end search modal -->

		<!--start overlay-->
		<div class="overlay toggle-icon"></div>
		<!--end overlay-->
		<!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
		<!--End Back To Top Button-->
		<footer class="page-footer">
			<?php include ('vista/footer.php'); ?>
		</footer>
	</div>
	<!--end wrapper-->
	<!--start switcher-->
	<?php include('vista/switcher.php');?>
	<!--end switcher-->
	<!-- Bootstrap JS -->
	<script src="assets/js/bootstrap.bundle.min.js"></script>
	<!--plugins-->
	<script src="assets/plugins/simplebar/js/simplebar.min.js"></script>
	<script src="assets/plugins/metismenu/js/metisMenu.min.js"></script>
	<script src="assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
	<!--app JS-->
	<script src="assets/js/app.js"></script>
</body>
</html>
