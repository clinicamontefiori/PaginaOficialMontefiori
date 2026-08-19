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
				<?php echo imprime_breadcrumb('Medicos',1); ?>
				<!--end breadcrumb-->
				<!-- <h6 class="mb-0 text-uppercase">Medicos</h6> -->
				<hr>
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table id="example" class="table table-striped table-bordered">
								<thead>
									<tr>
										<th>Nombres y Apellidos</th>
										<th>Especialidad</th>
										<th>Imagen</th>
									</tr>
								</thead>
								<tbody>

								<?php
								$servicio = "medicos-web";
								$response = getData($servicio);
								if (!$response->isError && isset($response->result)) {
									foreach ($response->result as $medico) {
								?>
									<tr>
										<td><a href="#" 
       class="text-primary fw-bold ver-detalle" 
       data-id="<?php echo $medico->idMedico; ?>" 
       data-nombre="<?php echo htmlspecialchars($medico->medico); ?>">
       <?php echo $medico->medico; ?>
    </a></td>
										<td><?php echo $medico->especialidad?></td>
										<td><img src="<?php echo $medico->imgMedico?>" class="rounded-circle p-1 border" width="80" height="80"></td>
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


		<!-- Modal Detalle Médico -->
<div class="modal fade" id="modalDetalleMedico" tabindex="-1" aria-labelledby="detalleMedicoLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title" id="detalleMedicoLabel">Detalle del Médico</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Cerrar"></button>
      </div>
      <div class="modal-body">
        <div id="detalleContenido" class="text-center p-3">
          <div class="spinner-border text-primary" role="status" id="spinnerDetalle"></div>
        </div>
      </div>
    </div>
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
	<script src="assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
	<script src="assets/plugins/datatable/js/dataTables.bootstrap5.min.js"></script>
	<script>
		$(document).ready(function() {
			$('#example').DataTable();
		  } );
	</script>


<script>
document.addEventListener("DOMContentLoaded", function() {
    // Evento click en los enlaces de médico
    document.querySelectorAll(".ver-detalle").forEach(function(el) {
        el.addEventListener("click", function(e) {
            e.preventDefault();
            const idMedico = this.getAttribute("data-id");
            const nombre = this.getAttribute("data-nombre");
            const modal = new bootstrap.Modal(document.getElementById('modalDetalleMedico'));
            const detalle = document.getElementById("detalleContenido");
            const spinner = document.getElementById("spinnerDetalle");
            const titulo = document.getElementById("detalleMedicoLabel");

            // Actualizar título del modal
            titulo.textContent = nombre;
            detalle.innerHTML = '<div class="text-center p-4"><div class="spinner-border text-primary" role="status"></div></div>';

            // Mostrar modal inmediatamente
            modal.show();

            // Llamar vía AJAX al detalle del médico
            fetch('detalle_medico.php?id=' + idMedico)
                .then(res => res.json())
                .then(data => {
                    if (data.isError || !data.result || !data.result.length) {
                        detalle.innerHTML = "<div class='text-danger'>No se encontró información del médico.</div>";
                        return;
                    }

                    const m = data.result[0];
                    detalle.innerHTML = `
                        <div class="row align-items-center">
                            <div class="col-md-4 text-center">
                                <img src="${m.imgMedico || 'https://via.placeholder.com/150'}" class="rounded-circle border mb-3" width="150" height="150">
                            </div>
                            <div class="col-md-8 text-start">
                                <h5 class="fw-bold">${m.medico}</h5>
                                <p><strong>Especialidad:</strong> ${m.especialidad ?? 'No definida'}</p>
                                <p><strong>Trayectoria:</strong> ${m.trayectoria || 'Sin información disponible.'}</p>
                                <p><strong>Intereses:</strong> ${m.interes || 'No especificado.'}</p>
                            </div>
                        </div>
                    `;
                })
                .catch(err => {
                    detalle.innerHTML = "<div class='text-danger'>Error al cargar los datos del médico.</div>";
                    console.error(err);
                });
        });
    });
});
</script>

	<!--app JS-->
	<script src="assets/js/app.js"></script>
</body>

</html>