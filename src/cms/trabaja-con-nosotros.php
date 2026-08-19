<?php
session_start();

use DevCod\DatabaseException;
require 'core/config.php';
include 'modelo/function.php';

include('modelo/validalogin.php');
?>
<!doctype html>
<html lang="en">

<head>
<?php include ('vista/head.php')?>
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
				<?php echo imprime_breadcrumb('Trabaja con Nosotros',1); ?>
				<!--end breadcrumb-->
				<!-- <h6 class="mb-0 text-uppercase">Medicos</h6> -->
				<hr>
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table id="example2" class="table table-striped table-bordered">
								<thead>
									<tr>
										<th>Nombres</th>
										<th>Apellidos</th>
										<th>Telefono</th>
										<th>Email</th>
										<th>CV</th>
										<th>Fecha Registro</th>							
									</tr>
								</thead>
								<tbody>

								<?php
								$cnx = cnx();
								$data = $cnx->select('fb_trabaja_nosotros')->result_array();
								foreach ($data as $fila) {
								?>
									<tr>
										<td><?php echo $fila['nombre'];?></td>
										<td><?php echo $fila['apellidos'];?></td>
										<td><?php echo $fila['telefono'];?></td>
										<td><a href="mailto:<?php echo $fila['email']; ?>"><?php echo  $fila['email']; ?></a></td>
										<td><a target="_blank" href="uploads/trabaje-nosotros/<?php echo $fila['adjunta_archivo'];?>"><?php echo $fila['adjunta_archivo'];?></a></td>
										<td><?php echo $fila['fecharegistro'];?></td>
									</tr>
								<?php } ?>	
									
								</tbody>
							</table>
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
				order: [[1, 'desc']],
				buttons: [ 'copy', 'excel', 'pdf', 'print']
			} );
		 
			table.buttons().container()
				.appendTo( '#example2_wrapper .col-md-6:eq(0)' );
		} );
	</script>
	<!--app JS-->
	<script src="assets/js/app.js"></script>
	<?php include('vista/js.php');?>
</body>

</html>