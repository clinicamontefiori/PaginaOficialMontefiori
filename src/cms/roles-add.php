<?php 
session_start();
include('modelo/validalogin.php');
require 'modelo/function.php';
require 'php/var.php'; 
?>

<?php
if($_GET){

	$idpage = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
	$searproye = detalle_registros_cms('jroles_general', 'json');
	//print_r($searproye);

	//$searproye = detalle_registros_cms($idpage, 'json/jroles_general');

	foreach ( $searproye as $ProSeObj ){
		if ( $ProSeObj->idrol == $idpage ) {
			$idrol = $ProSeObj->idrol;
			$nombre = $ProSeObj->nombre;
			$page = $ProSeObj->page;
			$estado = $ProSeObj->estado;
		}
	}


	$proceso ='upd';
	// $idrol = $searproye->idrol;
	// $nombre = $searproye->nombre;
	// $page = $searproye->page;
	// $estado = $searproye->estado;
	


}else{

	$proceso ='ins';
	
	$idrol = '0';
	$nombre = '';
	$page = '';	
	$estado = '';	
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
				<?php echo imprime_breadcrumb('Roles'); ?>
				<!--end breadcrumb-->

				<div class="row">
					<div class="col-xl-6 mx-auto">
						<div class="card">
							<div class="card-header px-4 py-3">
								<h5 class="mb-0">Mantenimiento Roles</h5>
							</div>
							<div class="card-body p-4">
								<form class="row g-3 needs-validation" data-sitekey="<?php echo SITE_KEY; ?>"  action="controlador/roles.php" method="post" enctype="multipart/form-data" novalidate="">
									<div class="col-md-12">
										<input type="hidden" name="recaptcha_token" id="recaptcha_token">
										<input type="hidden" name="google_response_token" id="google_response_token" value="">
										
										<input type="hidden" id="idrol" name="idrol" value="<?php echo $idrol; ?>">
										<input type="hidden" id="proceso" name="proceso" value="<?php echo $proceso; ?>">

										<label for="bsValidation1" class="form-label">Nombre</label>
										<input type="text" required class="form-control" id="nombre" name="nombre" placeholder="Título" value="<?php echo $nombre?>" >
										
									</div>

									<div class="col-md-12">
										<label for="bsValidation13"  class="form-label">Detalle</label>
										<textarea rows="5" id="page"  class="form-control"  name="page"><?php echo $page?></textarea>
									</div>

									<div class="col-md-6">
										<label for="bsValidation13" class="form-label">Estado</label>
										<div class="d-flex align-items-center gap-3">
											<div class="form-check">
												<input required type="radio" <?php if ($estado==1) { ?> checked <?php } ?> value="1" class="form-check-input" id="" name="estado" >
												<label class="form-check-label" for="bsValidation6">Activo</label>
											  </div>
											  <div class="form-check">
												<input required type="radio" <?php if ($estado==0) { ?> checked <?php } ?>  value="0" class="form-check-input" id="" name="estado" >
												<label class="form-check-label" for="bsValidation7">Desactivo</label>
											  </div>
										</div>
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
	grecaptcha.execute('<?php echo SITE_KEY; ?>', {action: 'AgregarPagina'})
	.then(function(token) {
	  //alert(token)
	  $('#recaptcha_token').val(token);
	});
	});
	</script>
</body>
</html>