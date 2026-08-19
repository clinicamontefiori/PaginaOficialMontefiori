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
				<?php echo imprime_breadcrumb('Convenios'); ?>
				<!--end breadcrumb-->
				<!-- <h6 class="mb-0 text-uppercase">Medicos</h6> -->
				<hr>
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table id="example2" class="table table-striped table-bordered">
								<thead>
									<tr>
										<th>Nombre</th>
										<th>Orden</th>
										<th>Logo Portada</th>
										<th>Fecha Registro</th>
										<th>Estado</th>	
										<th>[Acciones]</th>							
									</tr>
								</thead>
								<tbody>
								
								<?php
								$searproye = lista_registros_cms('jconvenios', 'json');
								foreach ( $searproye as $ProSeObj ){
								?>
									<tr>
										<td><?php echo $ProSeObj->nombre?></td>
										<td><?php echo $ProSeObj->orden?></td>
										<td><?php echo $ProSeObj->imgmovil?></td>
										<td><?php echo $ProSeObj->fechapublicacion?></td>
										<td><?php if ($ProSeObj->estado=='1'){?><span class="badge bg-primary">Activo</span><?php }else{ ?><span class="badge bg-secondary">Desactivo</span><?php } ?></td>
										<td>
											<div class="d-flex order-actions">
												<a href="convenios-add?id=<?php echo $ProSeObj->idconvenio?>" class=""><i class='bx bxs-edit'></i></a>
												<a href="#" data-id='<?php echo $ProSeObj->idconvenio?>' class="enviarPost ms-3"><i class='bx bxs-trash'></i></a>
											</div>
										</td>
									</tr>
								<?php } ?>	
									
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
		<input type="hidden" id="google_response_token" name="google_response_token">
		<input type="hidden" id="proceso" name="proceso" value="del">
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
	<script src="assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
	<script src="assets/plugins/datatable/js/dataTables.bootstrap5.min.js"></script>
	<script>
		$(document).ready(function() {
			$('#example').DataTable();
		  } );
	</script>
	<script>
		$(document).ready(function() {
			var table = $('#example2').DataTable( {
				lengthChange: false,
				buttons: [ 'copy', 'excel', 'pdf', 'print'],
				order: [[1, 'asc']] 
			} );
		 
			table.buttons().container()
				.appendTo( '#example2_wrapper .col-md-6:eq(0)' );
		} );
	</script>
	<!--app JS-->
	<script src="assets/js/app.js"></script>

	<script type="text/javascript">
    $(document).ready(function () {
        
        function getRecaptchaToken() {
            return new Promise((resolve, reject) => {
                if (typeof grecaptcha === 'undefined') {
                    reject('reCAPTCHA no cargado');
                    return;
                }
                grecaptcha.ready(() => {
                    grecaptcha.execute('<?php echo SITE_KEY; ?>', {action: 'DeleteUser'})
                        .then(resolve)
                        .catch(reject);
                });
            });
        }
        
        $(document).on('click', '.enviarPost', async function (e) {

            e.preventDefault();
            
            const $link = $(this);
            const idconvenio = $link.data("id");
            const proceso = $("#proceso").val();
            
            if (!confirm('¿Estás seguro de eliminar este usuario?')) {
                return;
            }
            
            const originalHtml = $link.html();
            $link.html('<i class="bx bx-loader bx-spin"></i>');
            $link.css('pointer-events', 'none');
            
            try {
                const token = await getRecaptchaToken();
                
                // Crear un formulario dinámico en lugar de AJAX
                const $form = $('<form>', {
                    method: 'POST',
                    action: 'controlador/convenios.php',
                    target: '_self'
                });
                
                // Agregar los campos necesarios
				// Versión más limpia
				$form.append('<input type="hidden" id="recaptcha_token" name="recaptcha_token" value="' + token + '">');
				$form.append('<input type="hidden" id="proceso" name="proceso" value="' + proceso + '">');
				$form.append('<input type="hidden" id="idconvenio" name="idconvenio" value="' + idconvenio + '">');
                
                // Agregar el formulario al body y enviarlo
                $form.appendTo('body');
                $form[0].submit();
                
            } catch (error) {
                console.error(error);
                alert('Error de seguridad. Recarga la página.');
                $link.html(originalHtml);
                $link.css('pointer-events', 'auto');
            }
        });
    });
	</script>

</body>

</html>