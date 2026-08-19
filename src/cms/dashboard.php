<?php 
session_start();
include('modelo/validalogin.php');
require 'modelo/function.php';
require 'php/var.php'; 
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
				<?php echo imprime_breadcrumb('Dashboard',1); ?>
				<!--end breadcrumb-->

				<div class="row">
					<div class="col col-lg-9 mx-auto">
						<div class="card radius-10">
							<div class="card-body">
								<!-- <div>
									<h5 class="card-title">Button With Icons</h5>
								</div>
								<hr> -->
								<div class="row row-cols-auto g-3">
									
									<?php 
					    $caracter = "-add";    					
						foreach ($rol_page_user as $permipage) {
							$parte_posterior = strstr($permipage, $caracter);
							if($parte_posterior!='-add'){
					?>
									<div class="col">
										<a type="button" id="tetet" data-evento="<?php echo urls_page_cms($permipage); ?>" href="<?php echo urls_page_cms($permipage); ?>" class="btn btn-outline-primary px-5"><i class="bx bx-bookmark mr-1"></i><?php echo ($permipage); ?></a>
									</div>
									<?php 
							} 
						}
					?>

								</div>
								
								<!--end row-->
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
	<script src="assets/plugins/validation/validation-script.js?v1"></script>	
	<!--app JS-->
	<script src="assets/js/app.js"></script>
	<script type="text/javascript">

	grecaptcha.ready(function() {
	grecaptcha.execute('<?php echo SITE_KEY; ?>', {action: 'AgregarUsuario'})
	.then(function(token) {
	  //alert(token)
	  $('#google_response_token').val(token);
	});
	});

	</script>
<?php include('vista/js.php');?>
</body>

</html>