<?php
session_start();
include('modelo/validalogin.php');
require 'modelo/function.php';
require 'php/var.php';

$searproye = detalle_registros_cms('jusuarios_general', 'json');
$proceso ='upd';

foreach ( $searproye as $ProSeObj ){
	if ( $ProSeObj->idusuario == $idusuario ) {

		$pprofile_idusuario = $ProSeObj->idusuario;
		$pprofile_usuario = $ProSeObj->usuario;
		$pprofile_email = $ProSeObj->email;
		$pprofile_fregistro = $ProSeObj->fecharegistro;
		$pprofile_estado = $ProSeObj->estado;
		$pprofile_idrol = $ProSeObj->idrol;
		$pprofile_google2fa = $ProSeObj->google2fa;
	}
}
?>

<!doctype html>
<html lang="en">

<head>
<?php include ('vista/head.php')?>
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
				<?php echo imprime_breadcrumb('Perfil de Usuario',1); ?>
				<!--end breadcrumb-->
				<div class="container">
					<div class="main-body">
						<div class="row">
							<div class="col-lg-4">
								<div class="card">
									<div class="card-body">
										<div class="d-flex flex-column align-items-center text-center">
											<img src="assets/images/avatars/avatar-19.png" class="rounded-circle p-1 bg-primary" width="110">
											<div class="mt-3">
												<h4><?php echo $usuario; ?></h4>
												<p class="text-secondary mb-1"><?php echo $roluser; ?></p>
												<p class="text-secondary mb-1"><em>Última actualización:<br><?php echo format_date_time($pprofile_fregistro); ?></em></p>
											</div>
											<?php 
												if (isset($_GET['msg'])){ 
													echo '<div class="alert alert-success border-0 bg-success alert-dismissible fade show">
									<div class="text-white">El Perfil del Usuario se actualizo correctamente</div>
									<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
								</div>';
												}
											?>
										</div>
										<!-- <hr class="my-4"> -->
									</div>
								</div>
							</div>
							
							<div class="col-lg-8">
								<form id="jQueryValidationForm" data-sitekey="<?php echo SITE_KEY; ?>" class="row g-3 needs-validation" action="controlador/usuarios.php" method="post" enctype="multipart/form-data" novalidate="">
								<div class="card">
									<div class="card-body">
									


										<input type="hidden" name="recaptcha_token" id="recaptcha_token">
										<input type="hidden" id="idusuario" name="idusuario" value="<?php echo $pprofile_idusuario; ?>">
										<input type="hidden" id="proceso" name="proceso" value="<?php echo $proceso; ?>">
										<input type="hidden" id="idrol" name="idrol" value="<?php echo $pprofile_idrol; ?>">
										<input type="hidden" id="estado" name="estado" value="<?php echo $pprofile_estado; ?>">
										<input type="hidden" id="profile" name="profile" value="profile">

										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Email</h6>
											</div>
												<div class="col-sm-9 text-secondary">
													<input type="email"  readonly="" style="background-color: #f8f9fa; " class="form-control" name="email" id="email" placeholder="admin@montefiori.com.pe" required value="<?php echo $pprofile_email; ?>"> 
												</div>
										</div>

										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Usuario</h6>
											</div>
											<div class="col-sm-9 text-secondary">
												<input type="text" name="username" autocomplete="new-password" id="username" class="form-control" value="<?php echo $pprofile_usuario; ?>">
											</div>
										</div>

										

										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Ingresa Password</h6>
											</div>
											<div class="col-sm-9 text-secondary">
												<input type="password" class="form-control" autocomplete="new-password" id="input38" name="password" placeholder="Choose Password">
											</div>
										</div>

										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Confirma Password</h6>
											</div>
											<div class="col-sm-9 text-secondary">
												<input type="password" class="form-control" autocomplete="new-password" id="input38" name="confirm_password" placeholder="Confirm Password">
											</div>
										</div>

										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Activar Doble Autentificación</h6>
											</div>
											<div class="col-sm-9 form-check form-switch">
												<input class="form-check-input" type="checkbox" role="switch" id="google2fa" name="google2fa" <?php if ($pprofile_google2fa=='on') { ?> checked <?php } ?>>
											</div>
										</div>
									</div>


										
										<div class="row">
											<div class="col-sm-3"></div>
											<div class="col-sm-9 text-secondary">
												<!-- <button type="submit" class="btn btn-primary px-4">Submit</button> -->
												<input type="submit" class="btn btn-primary px-4" value="Guardar Cambios">
											</div>
										</div>
										<hr>	
									
									</div>
								</div>

								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--end page wrapper -->
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
	<script src="assets/plugins/validation/validation-script.js?v1"></script>	
	<!--app JS-->
	<script src="assets/js/app.js"></script>

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

	<script type="text/javascript">
	grecaptcha.ready(function() {
		grecaptcha.execute('<?php echo SITE_KEY; ?>', {action: 'AgregarUsuario'})
		.then(function(token) {
		  //alert(token)
		  $('#recaptcha_token').val(token);
		});
	});
	</script>
<?php //include('vista/js.php');?>
</body>

</html>