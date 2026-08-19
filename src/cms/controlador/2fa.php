<?php
session_start();

require __DIR__ . '/../../vendor/autoload.php';

use DevCod\DatabaseException;
use Vectorface\GoogleAuthenticator;

require '../core/config.php';

if (isset($_SESSION['usuario']) and isset($_SESSION['TOKEN'])) {

    $create_hash = $_SESSION['usuario'].date("Y/m/d")."CMF2019STEP1";
    $check_token = password_verify($create_hash, $_SESSION['TOKEN']);

    if (!$check_token) {
        header('location: salir');
    }

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
        $oneCode = $_POST["code"];

        // 2 = 2*30sec clock tolerance
        $checkResult = $ga->verifyCode($secret, $oneCode, 0.5);
        if ($checkResult) {
            $create_hash = $_SESSION['usuario'].date("Y/m/d")."CMF2019STEP2";
            $_SESSION['TOKEN'] = password_hash($create_hash, PASSWORD_DEFAULT);
            header('Location: ../dashboard');
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
<!--     <link rel="icon" href="../assets/images/favicon-32x32.png" type="image/png"> -->
    <!--plugins-->
<!--     <link href="../assets/plugins/simplebar/css/simplebar.css" rel="stylesheet">
    <link href="../assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet"> -->
    <link href="../assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet">
    <!--SOLO PARA LISTADO DE TABLAS-->
<!--     <link href="../assets/plugins/datatable/css/dataTables.bootstrap5.min.css" rel="stylesheet"> -->
    <!-- loader-->
    <link href="../assets/css/pace.min.css" rel="stylesheet">
    <script src="../assets/js/pace.min.js"></script>
    <!-- Bootstrap CSS -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/css/bootstrap-extended.css" rel="stylesheet">
    <!-- <link href="../../../../css2-1?family=Roboto:wght@400;500&display=swap" rel="stylesheet"> -->
    <link href="../assets/css/app.css" rel="stylesheet">
    <link href="../assets/css/icons.css" rel="stylesheet">
    <!-- Theme Style CSS -->
<!--     <link rel="stylesheet" href="../assets/css/dark-theme.css">
    <link rel="stylesheet" href="../assets/css/semi-dark.css">
    <link rel="stylesheet" href="../assets/css/header-colors.css"> -->
    <title>CMS - Clínica Montefiori</title>
    <link href="../assets/plugins/fancy-file-uploader/fancy_fileupload.css" rel="stylesheet">
    <link href="../assets/plugins/Drag-And-Drop/dist/imageuploadify.min.css" rel="stylesheet">
    <!-- <script src='https://www.google.com/recaptcha/api.js?render=<?php echo SITE_KEY; ?>'></script> -->
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
                                <img src="../assets/images/favicon-32x32.png" class="logo-icon" alt="Clínica Montefiori">
                            </div>
                            <div class="">
                                <h4 class="logo-text">Clínica Montefiori</h4>
                            </div>
                        </div>
                        <!-- <div class="mobile-toggle-menu d-block d-lg-none" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"><i class='bx bx-menu'></i></div> -->
                          <div class="top-menu ms-auto">
                            <ul class="navbar-nav align-items-center gap-1">                            
                            </ul>
                        </div>
                        <div class="user-box dropdown px-3">
                            <a class="d-flex align-items-center nav-link dropdown-toggle gap-3 dropdown-toggle-nocaret" href="" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="../assets/images/avatars/avatar-19.png" class="user-img" alt="user avatar">
                                <div class="user-info">
                                    <p class="user-name mb-0"><?php echo $usuario; ?></p>
                                    <p class="designattion mb-0"><?php echo $roluser; ?></p>
                                </div>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item d-flex align-items-center" href="../salir"><i class="bx bx-log-out-circle"></i><span>Logout</span></a>
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
                    <img src="../assets/images/favicon-32x32.png" class="logo-icon" alt="logo icon">
                </div>
                <div class="">
                    <h4 class="logo-text">Clínica Montefiori</h4>
                </div>
            </div>
          <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <!-- <div class="offcanvas-body">
          <ul class="navbar-nav align-items-center flex-grow-1">
            
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="javascript:;" data-bs-toggle="dropdown">
                    <div class="parent-icon"><i class='bx bx-home-alt'></i>
                    </div>
                    <div class="menu-title d-flex align-items-center">Dashboard </div>
                    <div class="ms-auto dropy-icon"><i class='bx bx-chevron-down'></i></div>
                </a>
                <ul class="dropdown-menu scroll-menu ps ps--active-y">
                    
                   
                    
                </ul>
            </li>



          </ul>
        </div> -->
      </div>
  </nav>
</div>
            <?php //include ('vista/navigation.php')?>
            <!--end navigation-->
           </div>
           <!--end header wrapper-->
        <!--start page wrapper -->
        <div class="page-wrapper">
            <div class="page-content">
                <!--breadcrumb-->
                <?php //echo imprime_breadcrumb('Dashboard',1); ?>
                <!--end breadcrumb-->

                <div class="row">
                   <div class="row row-cols-auto g-3">



                    <?php if($error_code){ ?>
    
    <h2>ERROR DE CODIGO 2FA</h2>

<?php } else { ?>

    <img src="<?= $qrCodeUrl ?>" />

<?php } ?>



                                    
                                    <form method="POST" action="./2fa">
    <input name="code" />
    <button type="submit">Enviar</button>
</form>
                                    

                                </div>
                </div>
                <!--end row-->
            </div>
        </div>
        

        <footer class="page-footer">
            <?php include ('../vista/footer.php'); ?>
        </footer>
    </div>
    <!--end wrapper-->

    <!-- Bootstrap JS -->
    <script src="../assets/js/bootstrap.bundle.min.js"></script>
    <!--plugins-->
    <script src="../assets/js/jquery.min.js"></script>
<!--     <script src="../assets/plugins/simplebar/js/simplebar.min.js"></script>
    <script src="../assets/plugins/metismenu/js/metisMenu.min.js"></script>
    <script src="../assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script> -->
    <!-- <script src="../assets/plugins/validation/jquery.validate.min.js"></script> -->
   <!--  <script src="../assets/plugins/validation/validation-script.js?v1"></script> -->
    <!-- <script>
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
    </script>    -->
    <!--app JS-->
<!--     <script src="../assets/js/app.js"></script> -->

<!--     <script type="text/javascript">

    grecaptcha.ready(function() {
    grecaptcha.execute('<?php echo SITE_KEY; ?>', {action: 'AgregarUsuario'})
    .then(function(token) {
      //alert(token)
      $('#google_response_token').val(token);
    });
    });


    </script> -->

</body>

</html>


