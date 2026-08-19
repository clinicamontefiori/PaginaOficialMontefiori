<?php
session_start();

include 'php/var.php';

require __DIR__ . '/../vendor/autoload.php';

use DevCod\DatabaseException;
use Vectorface\GoogleAuthenticator;

require 'core/config.php';

if (isset($_SESSION['usuario']) and isset($_SESSION['TOKEN'])) {
    $create_hash = $_SESSION['usuario'].date("Y/m/d")."CMF2019STEP1";
    $check_token = password_verify($create_hash, $_SESSION['TOKEN']);

    // if (!$check_token) {
    //     header('location: salir');
    // }

    $datauserrol = explode("|", $_SESSION['usuario']);
    $usuario = $datauserrol[0];
    $roluser = $datauserrol[1];
    $idusuario = $datauserrol[2];

    $cnx = cnx();
    $cnx->select("fb_usuarios", ['idusuario'=>$idusuario]);
    $data = $cnx->row();
    $secret = $data->google2fa_key;
    $email = $data->email;
    $ga = new GoogleAuthenticator();
    $error_code = False;

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        /* VALIDA BOT CON CATPCHA */
        $token = $_POST['google_response_token'];
        $url = 'https://www.google.com/recaptcha/api/siteverify';
        $peticion = "$url?secret=".SECRET_KEY."&response=$token";
        $rta = file_get_contents( $peticion );
        $json = json_decode($rta, true);
        $ok = $json['success']; //true si salió ok... false si algo falló.
        if( $token === false ){  
            $error_code = True;
            //echo 'error01: '.$token;
            //die( ); 
        }
        if( $ok === false ){ 
            $error_code = True;
            //echo 'error02: '.$ok;
            //die( ); 
        }

         if( ( $ok === false ) or ( $token === false ) ){ 
            //echo 'errores: '.$ok.$token;
            $error_code = True;
            // die();
            // exit(); 
        }



        $oneCode = $_POST["code"];

        // 2 = 2*30sec clock tolerance
        $checkResult = $ga->verifyCode($secret, $oneCode, 1);
        if ($checkResult) {
            $create_hash = $_SESSION['usuario'].date("Y/m/d")."CMF2019STEP2";
            $_SESSION['TOKEN'] = password_hash($create_hash, PASSWORD_DEFAULT);
            header('Location: dashboard');
        } else {
            $error_code = True;
        }
    } else {
        if ($secret == "") {
            $secret = $ga->createSecret();
            $cnx->update("fb_usuarios", ['google2fa_key'=>$secret], ['idusuario'=>$idusuario]);
        }
        $qrCodeUrl = $ga->getQRCodeUrl('Clínica Montefiori: '.$email, $secret);
    }
} else {
    header('location: salir');
}
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="robots" content="noindex, nofollow">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--favicon-->
    <link rel="icon" href="assets/images/cropped-logo-clinica-montefiori-32x32.png" type="image/png">
    <link href="assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet">
    <!-- loader-->
    <link href="assets/css/pace.min.css" rel="stylesheet">
    <script src="assets/js/pace.min.js"></script>
    <!-- Bootstrap CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/bootstrap-extended.css" rel="stylesheet">
    <link href="assets/css/app.css" rel="stylesheet">
    <link href="assets/css/icons.css" rel="stylesheet">
    <title>Clínica Montefiori</title>
    <script src='https://www.google.com/recaptcha/api.js?render=<?php echo SITE_KEY; ?>'></script>
</head>

<body>
    <!--wrapper-->
    <div class="wrapper">
        <!--start header wrapper--> 
        <div class="header-wrapper">
            <!--start header -->
            <header>
                <div class="topbar d-flex align-items-center">
                    <nav class="navbar navbar-expand gap-3">
                        <div class="topbar-logo-header d-none d-lg-flex">
                            <div class="">
                                <img src="assets/images/cropped-logo-clinica-montefiori-32x32.png" class="logo-icon" alt="Clínica Montefiori">
                            </div>
                            <div class="">
                                <h4 class="logo-text">Clínica Montefiori</h4>
                            </div>
                        </div>
                        <div class="top-menu ms-auto">
                            <ul class="navbar-nav align-items-center gap-1">                            
                            </ul>
                        </div>
                        <div class="user-box dropdown px-3">
                            <a class="d-flex align-items-center nav-link dropdown-toggle gap-3 dropdown-toggle-nocaret" href="" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="assets/images/avatars/avatar-19.png" class="user-img" alt="user avatar">
                                <div class="user-info">
                                    <p class="user-name mb-0"><?php echo $usuario; ?></p>
                                    <p class="designattion mb-0"><?php echo $roluser; ?></p>
                                </div>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item d-flex align-items-center" href="salir"><i class="bx bx-log-out-circle"></i><span>Logout</span></a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </header>
            <?php //include('vista/header.php')?>
            <!--end header -->
            <!--navigation-->
            <div class="primary-menu">
                <nav class="navbar navbar-expand-lg align-items-center">
                    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                        <div class="offcanvas-header border-bottom">
                            <div class="d-flex align-items-center">
                                <div class="">
                                    <img src="assets/images/favicon-32x32.png" class="logo-icon" alt="logo icon">
                                </div>
                                <div class="">
                                    <h4 class="logo-text">Clínica Montefiori</h4>
                                </div>
                            </div>
                            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                        </div>
                    </div>
                </nav>
            </div>
            <!--end navigation-->
           </div>
           <!--end header wrapper-->
        
        <!--start page wrapper -->
        <div class="page-wrapper">
            <div class="page-content">
                <div class="container">
                    <div class="main-body">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex flex-column align-items-center text-center">
                                            <?php if($error_code){ ?>    
                                                <div class="alert alert-danger border-0 bg-danger alert-dismissible fade show">
                                                    <div class="text-white">Error de código 2FA</div>
                                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                    
                                                </div>
                                                <div class="mt-3">
                                                    <p class="text-secondary mb-1">Vuelva ingresar el código de autenticación</p>
                                                </div>
                                                <?php } else { ?>
                                                    <img src="<?= $qrCodeUrl ?>" />
                                                    <div class="mt-3">
                                                        <p class="text-secondary mb-1">Escanea el QR con la aplicación de tu teléfono que genera códigos de autenticación para iniciar sesión</p>
                                                     </div>
                                                <?php } ?>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-lg-8">
                                <form class="row g-3 needs-validation" action="doble-verificacion" method="post" validate="">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="col-md-12">
                                                <input type="hidden" name="google_response_token" id="google_response_token" value="">
                                                <label for="bsValidation13" class="form-label">Ingresa Código de Autenticación</label>
                                                <input type="text" placeholder="123456" pattern="^\d{1,6}$" maxlength="6" required class="form-control" id="code" name="code" value="" >
                                            </div>
                                            <hr>
                                            <div class="col-md-12">
                                                <div class="d-md-flex d-grid align-items-center gap-3">
                                                    <button type="submit" class="btn btn-primary px-4">Enviar Código</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end page wrapper -->       

    <footer class="page-footer">
        <?php include ('vista/footer.php'); ?>
    </footer>
    </div>
    <!--end wrapper-->

    <!-- Bootstrap JS -->
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <!--plugins-->
    <script src="assets/js/jquery.min.js"></script>

    <script type="text/javascript">
    grecaptcha.ready(function() {
    grecaptcha.execute('<?php echo SITE_KEY; ?>', {action: 'Valida2FA'})
    .then(function(token) {
      $('#google_response_token').val(token);
    });
    });
    </script>

    <script>
        document.getElementById("code").addEventListener("input", function (e) {
        var input = e.target;
        var value = input.value;
        var numericValue = value.replace(/\D/g, ''); // Elimina todos los caracteres no numéricos
        if (value !== numericValue) {
        input.value = numericValue; // Reemplaza el valor con el valor numérico
        }
        });
    </script>

</body>

</html>