<?php 
session_start();
include('modelo/validalogin.php');
require 'modelo/function.php';
require 'php/var.php'; 
?>

<?php

if($_GET){

	//$urlEspecialidad = filter_input(INPUT_GET, 'urlEspecialidad', FILTER_SANITIZE_NUMBER_INT);

	$urlEspecialidad = $_GET['urlEspecialidad'];
	$servicio = "especialidades-web";
	$response = getData($servicio,['urlEspecialidad' => $urlEspecialidad ]);

	//var_dump($response);

	$ideEspecialidad = $response->result[0]->idEspecialidad;
	$nomespecialidad = $response->result[0]->especialidad;
	$urlEspecialidad = $response->result[0]->urlEspecialidad;

	$proceso = 'upd';

	//echo $ideEspecialidad;

	// die();
	// exit();

}


?>

<!doctype html>
<html lang="en">

<head>
<?php include ('vista/head.php')?>
	<!-- <link href="assets/plugins/fancy-file-uploader/fancy_fileupload.css" rel="stylesheet">
	<link href="assets/plugins/Drag-And-Drop/dist/imageuploadify.min.css" rel="stylesheet"> -->
	<script src='https://www.google.com/recaptcha/api.js?render=<?php echo SITE_KEY; ?>'></script>
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
				<?php echo imprime_breadcrumb('Especialidades'); ?>
				<!--end breadcrumb-->

				<div class="row">
					<div class="col-xl-6 mx-auto">
						<div class="card">
							<div class="card-header px-4 py-3">
								<h5 class="mb-0">Mantenimiento Especialidades</h5>
							</div>
							<div class="card-body p-4">
								<form class="row g-3 needs-validation" action="controlador/especialidades.php" method="post" enctype="multipart/form-data" novalidate="">
									<div class="col-md-12">
										<input type="hidden" name="google_response_token" id="google_response_token" value="">
										<input type="hidden" id="ideEspecialidad" name="ideEspecialidad" value="<?php echo $urlEspecialidad; ?>">
										<label for="bsValidation1" class="form-label">Especialidad</label>
										<input type="text" class="form-control" id="titulo" name="titulo" placeholder="Ej. CIRUGIA GENERAL" value="<?php echo $nomespecialidad?>" >
									</div>							


									<div class="col-md-12">
										<label for="bsValidation13" class="form-label">Seleccionar Banner Desktop: Formato SVG</label>
										<input class="form-control" type="file" name="file_desktop" accept=".svg,image/svg+xml">
										<input type="hidden" name="file_desktop_old" value="<?php echo $urlEspecialidad;?>">
									</div>

									<?php $ruta = "../uploads/especialidades/".$urlEspecialidad.".svg"; ?>

									<?php if (file_exists($ruta)) { ?>
									    <img src="<?php echo $ruta; ?>" class="img-fluid border rounded p-2" style="max-width:200px;">
									<?php } ?>


									<div class="col-md-12">
										<div class="d-md-flex d-grid align-items-center gap-3">
											<button type="submit" class="btn btn-primary px-4">Submit</button>
											<button type="reset" class="btn btn-light px-4">Reset</button>
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
	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/plugins/simplebar/js/simplebar.min.js"></script>
	<script src="assets/plugins/metismenu/js/metisMenu.min.js"></script>
	<script src="assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
	<script src="assets/plugins/validation/jquery.validate.min.js"></script>
	<script src="assets/plugins/validation/validation-script.js"></script>
	<script>
		// Example starter JavaScript for disabling form submissions if there are invalid fields
		(function () {
		  'use strict'

		  // Fetch all the forms we want to apply custom Bootstrap validation styles to
		  var forms = document.querySelectorAll('.needs-validation')

		  // Loop over them and prevent submission
		  Array.prototype.slice.call(forms)
			.forEach(function (form) {
			  form.addEventListener('submit', function (event) {
				if (!form.checkValidity()) {
				  event.preventDefault()
				  event.stopPropagation()
				}

				form.classList.add('was-validated')
			  }, false)
			})
		})()
	</script>	
	<!--app JS-->
	<script src="assets/js/app.js"></script>

	<script type="text/javascript">

	grecaptcha.ready(function() {
		grecaptcha.execute('<?php echo SITE_KEY; ?>', {action: 'EliminarSlider'})
		.then(function(token) {
		  //alert(token)
		  $('#google_response_token').val(token);
		});
	});


	</script>

</body>

</html>