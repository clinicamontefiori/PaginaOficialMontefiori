<?php 
session_start();
include('modelo/validalogin.php');
require 'modelo/function.php';
require 'php/var.php'; 
?>

<?php
if($_GET){

	$idpage = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
	$searproye = detalle_registros_cms('jslider_general', 'json');
	$proceso ='upd';

	foreach ( $searproye as $ProSeObj ){
		if ( $ProSeObj->idbanner == $idpage ) {
			$idbanner = $ProSeObj->idbanner;
			$titulo = $ProSeObj->titulo;
			$bajada = $ProSeObj->bajada;
			$imgdesktop = $ProSeObj->imgdesktop;
			$imgmovil = $ProSeObj->imgmovil;
			$url = $ProSeObj->url;
			$estado = $ProSeObj->estado;
			$idseccion = $ProSeObj->idseccion;
			$orden = $ProSeObj->orden;
		}
	}

}else{

	$proceso ='ins';
	$idbanner = '';
	$titulo = '';
	$bajada = '';
	$imgdesktop = '';
	$imgmovil = '';
	$url = '';
	$estado = '';
	$idseccion = '';
	$orden = '';
}
?>

<!doctype html>
<html lang="en">

<head>
<?php include ('vista/head.php')?>
	<!-- <link href="assets/plugins/fancy-file-uploader/fancy_fileupload.css" rel="stylesheet"> -->
	<!-- <link href="assets/plugins/Drag-And-Drop/dist/imageuploadify.min.css" rel="stylesheet"> -->
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
				<?php echo imprime_breadcrumb('Slider'); ?>
				<!--end breadcrumb-->

				<div class="row">
					<div class="col-xl-6 mx-auto">
						<div class="card">
							<div class="card-header px-4 py-3">
								<h5 class="mb-0">Mantenimiento Slider</h5>
							</div>
							<div class="card-body p-4">
								<form class="row g-3 needs-validation" data-sitekey="<?php echo SITE_KEY; ?>" action="controlador/slider" method="post" enctype="multipart/form-data" novalidate="">
									<div class="col-md-12">
										<input type="hidden" name="recaptcha_token" id="recaptcha_token">
										<input type="hidden" id="idbanner" name="idbanner" value="<?php echo $idbanner; ?>">
										<input type="hidden" id="proceso" name="proceso" value="<?php echo $proceso; ?>">
										<label for="bsValidation1" class="form-label">Título</label>
										<input type="text" class="form-control" id="titulo" name="titulo" placeholder="Título" value="<?php echo $titulo?>" >
										<div class="invalid-feedback">
											Ingrese Título.
										  </div>
									</div>

									<div class="col-md-12">
										<label for="bsValidation1" class="form-label">Subtítulo</label>
										<input type="text" class="form-control" id="subtitulo" name="bajada" placeholder="Subtítulo" value="<?php echo $bajada?>" >
										<div class="invalid-feedback">
											Ingrese Subtítulo.
										  </div>
									</div>

									<div class="col-md-12">
										<label for="bsValidation13" class="form-label">URL Destino</label>
										<textarea class="form-control" id="url" name="url" placeholder="URL Destino" rows="3"><?php echo $url?></textarea>
									</div>

									<div class="col-md-6">
										<label for="bsValidation13" class="form-label">Seleccione Página</label>
										<select id="idseccion" name="idseccion" class="form-select" required="">
											<option selected="" disabled="" value="">...</option>
											<?php
											$secciones = detalle_registros('jsecciones_general', 'json/');
											foreach ( $secciones as $prosec ){
												if ( $prosec->estado==1 ) {
											?>
											<option value="<?php echo $prosec->idseccion; ?>" <?php if ($prosec->idseccion==$idseccion) { ?> selected <?php } ?>><?php echo $prosec->nombre; ?></option>
										<?php } } ?>
										</select>
									</div>

									<div class="col-md-6">
										<label for="bsValidation13" class="form-label">Seleccione Orden</label>
										<select id="orden" name="orden" class="form-select" required="">
											<option selected="" disabled="" value="">...</option>
											<?php for ($i = 1; $i <= 10; $i++) { ?>
												<option value="<?php echo $i; ?>" <?php if ($orden==$i) { ?> selected <?php } ?> ><?php echo $i; ?></option>
											<?php } ?>
										</select>
									</div>

									<div class="col-md-12">
										<label for="bsValidation13" class="form-label">Seleccionar Banner Desktop: Formato PNG, JPG, JPEG</label>
										<input class="form-control" type="file" name="file_desktop" accept=".jpg, .jpeg, .png, .webp, image/jpeg, image/png, image/webp">
										<input type="hidden" name="file_desktop_old" value="<?php echo $imgdesktop;?>">
										<div id="enlaceimgdesktop" name="enlaceimgdesktop">
										<?php if ($imgdesktop!='') { ?>
												<a target="_blank" href="../uploads/slider/<?php echo $imgdesktop;?>">[ver IMG]</a> <a href="#" data-id='<?php echo $idbanner?>' data-vatipo='imgdesktop' class="enviarPost ms-3"><i class='bx bxs-trash'></i></a>
										<?php } ?>
										</div>
									</div>

									<div class="col-md-12">
										<label for="bsValidation13" class="form-label">Seleccionar Banner Móvil: Formato PNG, JPG, JPEG</label>
										<input class="form-control" type="file" name="file_movil" accept=".jpg, .jpeg, .png, .webp, image/jpeg, image/png, image/webp">
										<input type="hidden" name="file_movil_old" value="<?php echo $imgmovil;?>">
										<div id="enlaceimgmovil" name="enlaceimgmovil">
										<?php if ($imgmovil!='') { ?>
												<a target="_blank" href="../uploads/slider/<?php echo $imgmovil;?>">[ver IMG]</a> <a href="#" data-id='<?php echo $idbanner?>' data-vatipo='imgmovil' class="enviarPost ms-3"><i class='bx bxs-trash'></i></a>
										<?php } ?>
										</div>
									</div>



									<div class="col-md-12">
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
		$(document).ready(function () {
            $('.enviarPost').click(function (e) {

            	e.preventDefault(); // Evita la navegación por defecto	
            	var token = $("#recaptcha_token").val();
            	var proceso = $(this).data("vatipo");
            	var idbanner = $(this).data("id");

                $.ajax({
                    type: 'POST',
                    url: 'controlador/slider.php', // Reemplaza con la URL de tu script PHP
                    data: { recaptcha_token: token, proceso: proceso, idbanner: idbanner },
                    success: function (response) {
                        $('#enlace'+ proceso).hide();
                        location.reload(); // Recargar la página actual
                    },
                    error: function (error) {
                        // Manejar errores aquí
                        location.reload(); // Recargar la página actual
                    }
                });
            });
        });	

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
	grecaptcha.execute('<?php echo SITE_KEY; ?>', {action: 'homepage'})
	.then(function(token) {
	  //alert(token)
	  $('#recaptcha_token').val(token);
	});
	});
	</script>

</body>

</html>