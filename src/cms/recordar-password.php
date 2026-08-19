<?php 
require 'php/var.php'; 
?>
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

	<script src='https://www.google.com/recaptcha/api.js?render=<?php echo SITE_KEY; ?>'></script>
	<script src="https://code.jquery.com/jquery-3.2.1.js"></script>

	<title>CLINICA SAN FELIPE</title>
</head>

<body class="">
	<!-- wrapper -->
	<div class="wrapper">
		<div class="authentication-forgot d-flex align-items-center justify-content-center">
			<div class="card forgot-box">
				<div class="card-body">
					<div class="p-3">
						<form  method="post" action="controlador/recuperar-contrasena">
							<input type="hidden" name="google_response_token" id="google_response_token" value="">
							<div class="text-center">
								<img src="assets/images/icons/forgot-2.png" width="100" alt="">
							</div>
							<h4 class="mt-5 font-weight-bold">¿Has olvidado tu contraseña?</h4>
							<p class="text-muted">Ingrese Email registrado para restablecer <br>la contraseña</p>

							<?php 
									if (isset($_GET['msg'])){ 
										if (  $_GET['msg']  == 1 ) {
											echo '<div class="alert alert-success border-0 bg-success alert-dismissible fade show">
									<div class="text-white">Se envio un correo para restablecer la contraseña</div>
									<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
								</div>';
										} elseif ( $_GET['msg'] == 0 ) {
											echo '<div class="alert alert-danger border-0 bg-danger alert-dismissible fade show">
									<div class="text-white">El Email ingresado no esta registrado</div>
									<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
								</div>';
										} 
									}
							?>
							

							<div class="my-4">
								
								<label class="form-label">Email</label>
								<input type="email" name="email" required="" class="form-control" placeholder="example@user.com">
							</div>
							<div class="d-grid gap-2">
								<button type="submit" class="btn btn-primary">Enviar</button>
								 <a href="./" class="btn btn-light"><i class='bx bx-arrow-back me-1'></i>Regresar a Login</a>
							</div>
						</form>
									
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end wrapper -->

	<!-- Bootstrap JS -->
	<script src="assets/js/bootstrap.bundle.min.js"></script>
	<!--plugins-->



	<script type="text/javascript">
	grecaptcha.ready(function() {
	grecaptcha.execute('<?php echo SITE_KEY; ?>', {action: 'ReuperarPasswordEnvia'})
	.then(function(token) {
	  //alert(token)
	  $('#google_response_token').val(token);
	});
	});
	</script>

</body>

</html>