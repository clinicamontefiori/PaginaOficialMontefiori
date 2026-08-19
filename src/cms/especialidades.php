<?php
session_start();
include('modelo/validalogin.php');
require 'modelo/function.php';
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
				<?php  echo imprime_breadcrumb('Especialidades',1); ?>
				<!--end breadcrumb-->
				<!-- <h6 class="mb-0 text-uppercase">Medicos</h6> -->
				<hr>
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table id="example2" class="table table-striped table-bordered">
								<thead>
									<tr>
										<th>ID</th>
										<th>Especialidad</th>
										<th>Imagen</th>
																	
									</tr>
								</thead>
								<tbody>
								<?php
								$servicio = "especialidades-web";
								$response = getData($servicio);
								if (!$response->isError && isset($response->result)) {
									foreach ($response->result as $medico) {
										//$imagen = !empty($medico->urlEspecialidad) ? $medico->urlEspecialidad : 'default.svg';
 										$imagen =  (file_exists('../uploads/especialidades/'.($medico->urlEspecialidad??'').'.svg') && !empty($medico->urlEspecialidad)) ? $medico->urlEspecialidad : 'default.svg'; 

								?>
									<tr>
										<td><a href='especialidades-add?urlEspecialidad=<?php echo $medico->urlEspecialidad; ?>'><?php echo $medico->idEspecialidad; ?></a></td>
										<td><?php echo $medico->especialidad?></td>
										<td><img src="../uploads/especialidades/<?php echo $imagen; ?>"  
											class="img-thumbnail" 
         									style="width: 80px; height: 80px; object-fit: cover;" ></td>
									</tr>
								<?php 
									} 
								} else {
    								echo "❌ Error: " . htmlspecialchars($response->message);
								} ?>	
									
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
			$('#example2').DataTable();
		  } );
	</script>
	<script>
		// $(document).ready(function() {
		// 	var table = $('#example2').DataTable( {
		// 		lengthChange: false,
		// 		buttons: [ 'copy', 'excel', 'pdf', 'print']
		// 	} );
		 
		// 	table.buttons().container()
		// 		.appendTo( '#example2_wrapper .col-md-6:eq(0)' );
		// } );
	</script>
	<!--app JS-->
	<script src="assets/js/app.js"></script>
	<?php include('vista/js.php');?>
</body>

</html>
