<!DOCTYPE html>
<html lang="en" class="semi-dark">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--favicon-->
	<link rel="icon" href="assets/images/favicon-32x32.png" type="image/png">
	<!-- loader-->
	<link href="assets/css/pace.min.css" rel="stylesheet">
	<script src="assets/js/pace.min.js"></script>
	<!-- Bootstrap CSS -->
	<link href="assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="assets/css/bootstrap-extended.css" rel="stylesheet">
	<link href="assets/css/css2-1?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
	<link href="assets/css/app.css" rel="stylesheet">
	<link href="assets/css/icons.css" rel="stylesheet">
	<title>CLINICA SAN FELIPE</title>
</head>

<body>
	<!-- wrapper -->
	<div class="wrapper">
		<div class="authentication-reset-password d-flex align-items-center justify-content-center">
		 <div class="container">
			<div class="row row-cols-1 row-cols-lg-2 row-cols-xl-3">
				<div class="col mx-auto">
					<div class="card">
						<div class="card-body">
							<div class="p-4">
								<div class="mb-4 text-center">
									<img src="assets/images/nuevo-logo-san-felipe-final-01.svg" width="100%" alt="">
								</div>
								<div class="text-start mb-4">
									<h5 class="">Error al cambiar contraseña</h5>
									<p class="mb-0">Hubo un error al actualizar su contraseña. Si el problema persiste comunicase con su administrador.</p>
								</div>
								<form id="jQueryValidationForm" class="row g-3 needs-validation" action="controlador/restablecer_contrasena" method="post" enctype="multipart/form-data" novalidate="">



									<div class="d-grid gap-2">
										 <a href="./" class="btn btn-light"><i class='bx bx-arrow-back mr-1'></i>Regresar a Login</a>
									</div>




								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		  </div>
		</div>
	</div>
	<!-- end wrapper -->


</body>

</html>