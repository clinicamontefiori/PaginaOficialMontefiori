<?php 
session_start();
include('modelo/validalogin.php');
require 'modelo/function.php';
require 'php/var.php'; 
?>

<?php
if($_GET){

	$idpage = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
	$searproye = detalle_registros_cms($idpage, 'json/blog/');
	$proceso ='upd';
	$idblog = $searproye->idblog;
	$titulo = $searproye->titulo;
	$bajada = $searproye->bajada;
	$detalle = $searproye->detalle;
	$imgdesktop = $searproye->imgdesktop;
	$imgmovil = $searproye->imgmovil;
	$url = $searproye->url;
	$estado = $searproye->estado;
	$destacado = $searproye->destacado;
	$idcategoria = $searproye->idcategoria;

	$meta_title = $searproye->meta_title;
	$meta_description = $searproye->meta_description;
	$meta_keywords = $searproye->meta_keywords;

}else{

	$proceso ='ins';
	$idblog = '';
	$titulo = '';
	$bajada = '';
	$detalle = '';
	$imgdesktop = '';
	$imgmovil = '';
	$url = '';
	$estado = '';
	$destacado = '';
	$idcategoria = '';

	$meta_title = '';
	$meta_description = '';
	$meta_keywords = '';
}
?>

<!doctype html>
<html lang="en">

<head>
	<?php include ('vista/head.php')?>
	<!-- <link href="assets/plugins/fancy-file-uploader/fancy_fileupload.css" rel="stylesheet">
	<link href="assets/plugins/Drag-And-Drop/dist/imageuploadify.min.css" rel="stylesheet"> -->
	<script src='https://www.google.com/recaptcha/api.js?render=<?php echo SITE_KEY; ?>'></script>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" />
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
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
				<?php echo imprime_breadcrumb('Blog'); ?>
				<!--end breadcrumb-->

				<div class="row">
					<div class="col-xl-6 mx-auto">
						<div class="card">
							<div class="card-header px-4 py-3">
								<h5 class="mb-0">Mantenimiento Blog</h5>
							</div>
							<div class="card-body p-4">
								<form class="row g-3 needs-validation" data-sitekey="<?php echo SITE_KEY; ?>" action="controlador/blog.php" method="post" enctype="multipart/form-data" novalidate="">
									<div class="col-md-12">
										<input type="hidden" name="recaptcha_token" id="recaptcha_token">
										
										<input type="hidden" id="idblog" name="idblog" value="<?php echo $idblog; ?>">
										<input type="hidden" id="proceso" name="proceso" value="<?php echo $proceso; ?>">

										<label for="bsValidation1" class="form-label">Título</label>
										<input type="text" required class="form-control" id="titulo" name="titulo" placeholder="Título" value="<?php echo $titulo?>" >
										
									</div>

									<div class="col-md-12">
										<label for="bsValidation1" class="form-label">Subtítulo</label>
										<!-- <input type="text" required class="form-control" id="bajada" name="bajada" placeholder="Subtítulo" value="<?php echo $bajada?>" > -->
										<textarea rows="5" id="bajada" class="form-control" name="bajada"><?php echo $bajada?></textarea>
									</div>

									<div class="col-md-12">
										<label for="bsValidation13" class="form-label">URL Destino</label>
										<textarea readonly="" disabled="" class="form-control" id="url" name="url" placeholder="URL Destino" rows="3"><?php echo $url?></textarea>
										<?php if ($url!='') { ?>
											URL de Blog: <a target="_blank" href="../blog/<?php echo $url?>" ><?php echo $url?></a>
										<?php } ?>
									</div>

									<div class="col-md-12">
										<label for="bsValidation13" required class="form-label">Detalle</label>
										<textarea rows="25" id="detalle" name="detalle"><?php echo $detalle?></textarea>
									</div>

									<div class="col-md-12">
    <label for="multiple-select-field" class="form-label">Categoria</label>
    <select class="form-select" id="multiple-select-field" name="idcategoria[]" data-placeholder="Seleccione Categoria" multiple required>    
        <option></option>
        <?php
        // $idcategoria debe ser array. Si viene como "1,3,7", lo convertimos:
        if (!is_array($idcategoria)) {
            $idcategoria = explode(",", $idcategoria);
        }

        $categoria = detalle_registros('jcategoria', 'json/');
        foreach ($categoria as $rscate) {
        ?>
            <option 
                value="<?php echo $rscate->idcategoria; ?>" 
                <?php echo (in_array($rscate->idcategoria, $idcategoria)) ? "selected" : ''; ?>
            >
                <?php echo $rscate->nombre; ?>
            </option>
        <?php } ?>
    </select>
</div>

									

									<div class="col-md-6">
										<label for="bsValidation13" class="form-label">Seleccionar Banner Desktop: Formato PNG, JPG, JPEG</label>
										<input class="form-control" type="file" name="file_desktop" accept=".jpg, .png, image/jpeg, image/png">
										<input type="hidden" name="file_desktop_old" value="<?php echo $imgdesktop;?>">
										<div id="enlaceimgdesktop" name="enlaceimgdesktop">
										<?php if ($imgdesktop!='') { ?>
												<a target="_blank" href="../uploads/blog/<?php echo $imgdesktop;?>">[ver IMG]</a> <a href="#" data-id='<?php echo $idblog?>' data-vatipo='imgdesktop' class="enviarPost ms-3"><i class='bx bxs-trash'></i></a>
										<?php } ?>
										</div>
									</div>

									<div class="col-md-6">
										<label for="bsValidation13" class="form-label">Seleccionar Banner Móvil: Formato PNG, JPG, JPEG</label>
										<input class="form-control" type="file" name="file_movil" accept=".jpg, .png, image/jpeg, image/png">
										<input type="hidden" name="file_movil_old" value="<?php echo $imgmovil;?>">
										<div id="enlaceimgmovil" name="enlaceimgmovil">
										<?php if ($imgmovil!='') { ?>
												<a target="_blank" href="../uploads/blog/<?php echo $imgmovil;?>">[ver IMG]</a> <a href="#" data-id='<?php echo $idblog?>' data-vatipo='imgmovil' class="enviarPost ms-3"><i class='bx bxs-trash'></i></a>
										<?php } ?>
										</div>
									</div>

									

									<div class="col-md-6">
										<label for="bsValidation13" class="form-label">Destacar</label>									
										<div class="form-check form-switch">
										<input class="form-check-input" type="checkbox" role="switch" id="destacado" name="destacado" <?php if ($destacado=='on') { ?> checked <?php } ?>></div>
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

									<hr>

									<div class="col-md-12">
										<label for="bsValidation13" required class="form-label">META TITLE</label>
										<textarea class="form-control" id="meta_title" name="meta_title" rows="2"><?php echo $meta_title?></textarea>
									</div>
									<div class="col-md-12">
										<label for="bsValidation13" required class="form-label">META DESCRIPTION</label>
										<textarea class="form-control" id="meta_description" name="meta_description" rows="2"><?php echo $meta_description?></textarea>
									</div>
									<div class="col-md-12">
										<label for="bsValidation13" required class="form-label">META KEYWORDS</label>
										<textarea class="form-control" id="meta_keywords" name="meta_keywords" rows="2"><?php echo $meta_keywords?></textarea>
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

	<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
	<script src="assets/plugins/select2/js/select2-custom.js"></script>


	<script>
	$(document).ready(function () {
            $('.enviarPost').click(function (e) {

            	e.preventDefault(); // Evita la navegación por defecto	
            	var token = $("#recaptcha_token").val();
            	var proceso = $(this).data("vatipo");
            	var idblog = $(this).data("id");

                $.ajax({
                    type: 'POST',
                    url: 'controlador/blog.php', // Reemplaza con la URL de tu script PHP
                    data: { recaptcha_token: token, proceso: proceso, idblog: idblog },
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
			grecaptcha.execute('<?php echo SITE_KEY; ?>', {action: 'AgregarBlog'})
			.then(function(token) {
			  //alert(token)
			  $('#recaptcha_token').val(token);
			});
		});
	</script>

	<script src="https://cdn.jsdelivr.net/npm/tinymce@6/tinymce.min.js"></script>

	<script>
		tinymce.init({
			selector: '#detalle',
			promotion: false,
			branding: false,
			height: 400, // Altura del editor en píxeles
			menubar: 'file edit view insert format table tools', // Barra de menú
			plugins: 'advlist autolink lists link image charmap preview anchor searchreplace visualblocks code fullscreen insertdatetime media table', // Lista de complementos habilitados
			toolbar: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | outdent indent | link image | bullist', // Barra de herramientas personalizada
			setup: function (editor) {
				editor.on('Change', function (e) {
					// Manejar el evento Change
					console.log('Contenido cambiado');
				});
			}
		});
	</script>

</body>

</html>