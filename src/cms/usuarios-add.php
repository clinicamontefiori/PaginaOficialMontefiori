<?php 
session_start();
include('modelo/validalogin.php');
require 'modelo/function.php';
require 'php/var.php'; 
?>

<?php
if($_GET){

	$idpage = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
	$searproye = detalle_registros_cms('jusuarios_general', 'json');
	$proceso ='upd';

	foreach ( $searproye as $ProSeObj ){
		if ( $ProSeObj->idusuario == $idpage ) {
			$idusuario = $ProSeObj->idusuario;
			$idrol = $ProSeObj->idrol;
			$user = $ProSeObj->usuario;
			$email = $ProSeObj->email;
			$estado = $ProSeObj->estado;
			$google2fa = $ProSeObj->google2fa;
		}
	}

}else{

	$idusuario = '';
	$idrol = '';
	$user = '';
	$email = '';
	$estado = '';
	$google2fa = '';
	$proceso ='ins';

}

?>

<!doctype html>
<html lang="en">

<head>
<?php include ('vista/head.php')?>
<!-- 	<link href="assets/plugins/fancy-file-uploader/fancy_fileupload.css" rel="stylesheet">
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
				<?php echo imprime_breadcrumb('Usuarios'); ?>
				<!--end breadcrumb-->

				<div class="row">
					<div class="col-xl-6 mx-auto">
						<div class="card">
							<div class="card-header px-4 py-3">
								<h5 class="mb-0">Mantenimiento Usuarios</h5>
							</div>
							<div class="card-body p-4">
								<form id="jQueryValidationForm" data-sitekey="<?php echo SITE_KEY; ?>" class="row g-3 needs-validation" action="controlador/usuarios.php" method="post" enctype="multipart/form-data" novalidate="">
									<div class="col-md-12">
										<input type="hidden" name="recaptcha_token" id="recaptcha_token">
										<input type="hidden" id="idusuario" name="idusuario" value="<?php echo $idusuario; ?>">
										<input type="hidden" id="proceso" name="proceso" value="<?php echo $proceso; ?>">
										
										<label for="bsValidation1" class="form-label">Usuario</label>
										<input type="text" class="form-control" id="username" name="username" autocomplete="new-password" placeholder="webmaster" value="<?php echo $user; ?>" >
									</div>

									<div class="col-md-12">
										<label class="col-sm-3 col-form-label">Ingresa Password</label>
										<div class="col-sm-9">
											<input type="password" class="form-control" id="input38" name="password" autocomplete="new-password" placeholder="Ingrese Password">
										</div>
									</div>
									<div class="col-md-12">
										<label class="col-sm-3 col-form-label">Confirma Password</label>
										<div class="col-sm-9">
											<input type="password" class="form-control" id="input38_new" autocomplete="new-password" name="confirm_password" placeholder="Confirmar Password">
										</div>
									</div>

									<div class="col-md-12">
										<label for="bsValidation1" class="form-label">Email</label>
										<input type="email" class="form-control" name="email" id="email" placeholder="usuario@montefiori.com.pe"  required value="<?php echo $email; ?>">
									</div>									

									<div class="col-md-12">
										<label for="bsValidation13" class="form-label">Seleccione Rol</label>
										<select id="idrol" name="idrol" class="form-select" required="">
											<option selected="" disabled="" value="">...</option>
											<?php
											$secciones = detalle_registros_cms('jroles_general', 'json/');
											foreach ( $secciones as $prosec ){
												if ( $prosec->estado==1 ) {
											?>
											<option value="<?php echo $prosec->idrol; ?>" <?php if ($prosec->idrol==$idrol) { ?> selected <?php } ?>><?php echo $prosec->nombre; ?></option>
										<?php } } ?>
										</select>
									</div>

									<div class="col-md-6">
										<div class="d-flex align-items-center gap-3">
											<div class="form-check">
												<input required type="radio" <?php if ($estado==1) { ?> checked <?php } ?> value="1" class="form-check-input" id="" name="estado"   >
												<label class="form-check-label" for="bsValidation6">Activo</label>
											  </div>
											  <div class="form-check">
												<input required type="radio" <?php if ($estado==0) { ?> checked <?php } ?>  value="0" class="form-check-input" id="" name="estado" >
												<label class="form-check-label" for="bsValidation7">Desactivo</label>
											  </div>
										</div>
									</div>
									<div class="col-md-6">
										<label for="bsValidation13" class="form-label">Activar Doble Autentificación</label>									
										<div class="form-check form-switch">
										<input class="form-check-input" type="checkbox" role="switch" id="google2fa" name="google2fa" <?php if ($google2fa=='on') { ?> checked <?php } ?> ></div>
									</div>

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
	<script src="assets/plugins/validation/validation-script.js?v2"></script>
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
		grecaptcha.execute('<?php echo SITE_KEY; ?>', {action: 'AgregarUsuario'})
		.then(function(token) {
		  //alert(token)
		  $('#recaptcha_token').val(token);
		});
	});
	</script>

</body>

</html>