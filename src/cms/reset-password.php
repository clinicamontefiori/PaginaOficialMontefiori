<?php 
require 'php/var.php'; 
?>
<?php
if ($_GET) {
	$token_reco_pass = $_GET['token_reco_pass'];
	$uid = $_GET['uid'];
}else{

	header('location: /');
	die();
}

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
									<h5 class="">Generar nueva contraseña</h5>
									<p class="mb-0">Recibimos su solicitud de restablecimiento de contraseña. ¡Por favor ingrese su nueva contraseña!</p>
								</div>
								<form id="jQueryValidationForm" class="row g-3 needs-validation" action="controlador/restablecer-contrasena" method="post" enctype="multipart/form-data" novalidate="">


									<input type="hidden" required name="token_reco_pass" value="<?php echo $token_reco_pass; ?>">
									<input type="hidden" required name="uid" value="<?php echo $uid; ?>">
									<input type="hidden" required name="google_response_token" id="google_response_token" value="">

									<div class="col-12">
										<label class="form-label">Nueva Contraseña</label>
										<div class="input-group" id="show_hide_password">
											<input type="password" class="form-control border-end-0" id="input38" name="password" placeholder="Choose Password"> <a href="javascript:;" class="input-group-text bg-transparent"><i class='bx bx-hide'></i></a>
										</div>
									</div>

									<div class="col-12">
										<label class="form-label">Confirmar Contraseña</label>
										<div class="input-group" id="show_hide_password">
											<input type="password" class="form-control border-end-0" id="input38" name="confirm_password" placeholder="Confirm Password"> <a href="javascript:;" class="input-group-text bg-transparent"><i class='bx bx-hide'></i></a>
										</div>
									</div>

									<div class="d-grid gap-2">
										<button type="submit" class="btn btn-primary px-4">Cambiar contraseña</button> <!-- <a href="./" class="btn btn-light"><i class='bx bx-arrow-back mr-1'></i>Regresar a Login</a> -->
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






	<script src="assets/js/bootstrap.bundle.min.js"></script>
	<!--plugins-->
	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/plugins/validation/jquery.validate.min.js"></script>
	<script src="assets/plugins/validation/validation-script.js"></script>

	<!--Password show & hide js -->
	<script>
		$(document).ready(function () {
			$("#show_hide_password a").on('click', function (event) {
				event.preventDefault();
				if ($('#show_hide_password input').attr("type") == "text") {
					$('#show_hide_password input').attr('type', 'password');
					$('#show_hide_password i').addClass("bx-hide");
					$('#show_hide_password i').removeClass("bx-show");
				} else if ($('#show_hide_password input').attr("type") == "password") {
					$('#show_hide_password input').attr('type', 'text');
					$('#show_hide_password i').removeClass("bx-hide");
					$('#show_hide_password i').addClass("bx-show");
				}
			});
		});
	</script>

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
	grecaptcha.execute('<?php echo SITE_KEY; ?>', {action: 'UpdatePassword'})
	.then(function(token) {
	  //alert(token)
	  $('#google_response_token').val(token);
	});
	});
	</script>



</body>

</html>