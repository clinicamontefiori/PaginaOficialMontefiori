<?php 
include ('../cms/php/var.php');
include ('../cms/modelo/function.php');
include ('../modelo/metas.php');

$url_blog = isset($_GET['url_blog']) ? $_GET['url_blog'] : '';
$blog = lista_registros_cms($url_blog, '../cms/json/blog');

/* detallle de nota */
$titulo = $blog->titulo;
$detalle = $blog->detalle;
$fecharegistro = $blog->fecharegistro;
$imagen = $blog->imgdesktop;

#SEO
$mtitle = $blog->meta_title;
$mdescription = $blog->meta_description;
$imgpage = $blog->imgdesktop;


?>
<!DOCTYPE html>
<html lang="es">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
    <?php include('../vista/head.php');?>
    <script type='text/javascript' src='https://platform-api.sharethis.com/js/sharethis.js#property=6937ed41d1fcd60fb5090f9a&product=sop' async='async'></script>
</head>

<body>
    <!-- Header -->
    <header class="header-site backdrop-blur-md fixed top-0 left-0 right-0  z-50 ">
        <?php include('../vista/header.php')?>
    </header>

    <main>
        <!-- Hero Section -->
        <section class="hero-section relative md:pt-28 pt-20 pb-10 overflow-hidden">
            <div class="container mx-auto px-4 z-10 relative">
                <div class="splide swiper-hero" data-config='{"arrows": false, "autoplay":  false}'>
                    <div class="splide__track">
                            <ul class="splide__list">
                                <li class="splide__slide">
                                     <img src="../uploads/blog/<?php echo $imagen; ?>" loading="eager" alt="<?php echo $titulo; ?>">
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
                            <div class="flex items-center space-x-1.5 text-gray-600">

                        <a href="javascript:history.back()" class="flex items-center gap-1 text-gray-600 hover:text-orange-500">
                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M15 18l-6-6 6-6"/>
                            </svg>
                        <span>Volver</span>
                        </a>
                        </div>
                        <h1 class="title-section  mt-4">
                            <?php echo $titulo; ?>
                        </h1>
                        <div class="flex items-center justify-self-end space-x-1.5 text-gray-600 mt-4">

                                        <svg fill="none" height="13" viewBox="0 0 12 13" width="12"><g clip-path="url(#clip0_167_1221)"><path d="M10.7528 12.8571C11.4109 12.748 11.9237 12.2042 11.9912 11.4853C11.9757 8.38608 12.0376 5.27747 11.9598 2.18364C11.8888 1.63702 11.2566 1.00454 10.7411 1.00454H10.0266V0H9.08951V1.00454H2.90497V0H1.96785V1.00454H1.25343C0.657827 1.00454 0.0610542 1.72729 2.76566e-05 2.33555V11.5265C0.0569468 11.8218 0.14438 12.0841 0.32746 12.3181C0.564527 12.6213 0.88169 12.7854 1.24169 12.8575H10.7528V12.8571ZM10.0263 2.00909H10.6706C10.81 2.00909 11.057 2.2739 11.057 2.4233V3.71656H0.936849V2.4233C0.936849 2.27359 1.18389 2.00909 1.32325 2.00909H1.96756V3.01363H2.90467V2.00909H9.08951V3.01363H10.0266V2.00909H10.0263ZM0.937142 4.7211H11.057V11.4384C11.057 11.6195 10.7798 11.8778 10.6011 11.8535H1.41626C1.22937 11.8891 0.937142 11.6284 0.937142 11.4384V4.7211Z" fill="#FF8F30"></path><path d="M9.27675 5.77563H10.2139V6.78018H9.27675V5.77563Z" fill="#FF8F30"></path><path d="M7.40273 5.77563H8.33984V6.78018H7.40273V5.77563Z" fill="#FF8F30"></path><path d="M5.52871 5.77563H6.46582V6.78018H5.52871V5.77563Z" fill="#FF8F30"></path><path d="M3.65468 5.77563H4.5918V6.78018H3.65468V5.77563Z" fill="#FF8F30"></path><path d="M1.78066 5.77563H2.71777V6.78018H1.78066V5.77563Z" fill="#FF8F30"></path><path d="M9.27675 7.78479H10.2139V8.78933H9.27675V7.78479Z" fill="#FF8F30"></path><path d="M7.40273 7.78479H8.33984V8.78933H7.40273V7.78479Z" fill="#FF8F30"></path><path d="M5.52871 7.78479H6.46582V8.78933H5.52871V7.78479Z" fill="#FF8F30"></path><path d="M3.65468 7.78479H4.5918V8.78933H3.65468V7.78479Z" fill="#FF8F30"></path><path d="M1.78066 7.78479H2.71777V8.78933H1.78066V7.78479Z" fill="#FF8F30"></path><path d="M9.27675 9.79346H10.2139V10.798H9.27675V9.79346Z" fill="#FF8F30"></path><path d="M7.40273 9.79346H8.33984V10.798H7.40273V9.79346Z" fill="#FF8F30"></path><path d="M5.52871 9.79346H6.46582V10.798H5.52871V9.79346Z" fill="#FF8F30"></path><path d="M3.65468 9.79346H4.5918V10.798H3.65468V9.79346Z" fill="#FF8F30"></path></g><defs><clipPath id="clip0_167_1221"><rect fill="white" height="12.8571" transform="matrix(-1 0 0 1 12 0)" width="12"></rect></clipPath></defs></svg>

                                        <span><?php echo convertirFechaDB($fecharegistro); ?></span>
                        </div>
                        <p class="mt-4 text-base text-slate-500">
                            <?php echo $detalle; ?>
                        </p>
                    </div>  

                    <!-- ShareThis BEGIN --><div class="sharethis-inline-share-buttons"></div><!-- ShareThis END -->      
                </div>
            </div>
        </section>

        <section class="bg-white md:py-18 py-10">
            <?php include('../vista/blog-interna.php')?>
        </section>

        <!-- Opening Hours Section -->
        <section class="py-20 pt-0">
            <?php //include('../vista/horarios.php')?>
        </section>

        

        <!-- Contact Section -->
        <section class="section-contact">
            <?php include('../vista/contacto.php')?>
        </section>
    </main>

    <!-- Footer -->
    <footer class="bg-white pt-12 pb-8">
      <?php include('../vista/footer.php')?>
    </footer>

    <!-- Floating WhatsApp Button -->
    <?php include('../vista/whatsapp.php')?>
    <?php include('../vista/script.php')?>

</body>
</html>