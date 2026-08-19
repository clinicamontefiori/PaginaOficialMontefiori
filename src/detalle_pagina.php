<?php 
include ('cms/php/var.php');
include ('cms/modelo/function.php');
include ('modelo/metas.php');

$url_pagina = isset($_GET['url_pagina']) ? $_GET['url_pagina'] : '';
$pagina = lista_registros_cms($url_pagina, 'cms/json/paginas');

/* detallle de nota */
$titulo = $pagina->titulo;
$detalle = $pagina->detalle;
$imagen = $pagina->imgdesktop;

/* SEO de nota */
$mtitle = $pagina->meta_title;
$mdescription = $pagina->meta_description;
$imgpage = $pagina->imgdesktop;


?>
<!DOCTYPE html>
<html lang="es">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
    <?php include('vista/head.php');?>
</head>

<body>
    <!-- Header -->
    <header class="header-site backdrop-blur-md fixed top-0 left-0 right-0  z-50 ">
        <?php include('vista/header.php')?>
    </header>

    <main>
        <!-- Hero Section -->
        <section class="hero-section relative md:pt-28 pt-20 pb-10 overflow-hidden">
            <div class="container mx-auto px-4 z-10 relative">

                <div class="splide swiper-hero" data-config='{"arrows": false, "type": "loop", "autoplay":  true, "interval": 5000}'>
                    <div class="splide__track">
                            <ul class="splide__list">
                                <li class="splide__slide">
                                     <img src="uploads/paginas/<?php echo $imagen; ?>" loading="eager" alt="<?php echo $titulo; ?>">
                                </li>
                            </ul>
                    </div>
                </div>

            </div>

        </section>

    

        <section class="bg-gray-site pb-10">
            <div class="container-med mx-auto md:px-4 px-7">
                <div class="bg-white p-8 sm:p-12 rounded-2xl">
                    <div class="text-left mb-10">
                    <!-- <h1 class="title-section">
                        <?php echo $titulo; ?>
                    </h1> -->
                    <p class="mt-4 text-base text-slate-500">
                        <?php echo $detalle; ?>
                    </p>
                </div>
                
        
            </div>
            </div>
        </section>

        <!-- Opening Hours Section -->
        <section class="py-20 pt-0">
            <?php //include('vista/horarios.php')?>
        </section>

        <!-- Contact Section -->
        <section class="section-contact">
            <?php //include('vista/contacto.php')?>
        </section>
    </main>

    <!-- Footer -->
    <footer class="bg-white pt-12 pb-8">
      <?php include('vista/footer.php')?>
    </footer>

    <!-- Floating WhatsApp Button -->
    <?php include('vista/whatsapp.php')?>
    <?php include('vista/script.php')?>

</body>
</html>