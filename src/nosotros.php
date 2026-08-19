<?php 
include ('cms/php/var.php');
include ('cms/modelo/function.php');
include ('modelo/metas.php');

$json_nosotros = 'cms/json/jnosotros.json';
$data_nos = json_decode(file_get_contents($json_nosotros), true);
if(!$data_nos) $data_nos = [];
?>
<!DOCTYPE html>
<html lang="es">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
    <?php include('vista/head.php');?>
    <style>
        /* Small fix for line-clamp which might not be in the default CDN build */
        .line-clamp-3 {
            overflow: hidden;
            display: -webkit-box;
            -webkit-box-orient: vertical;
            -webkit-line-clamp: 3;
        }
        .w-full {
            width: 100%;
            height: auto;
        }
        /* .splide__list {
            display: grid;
        } */
    </style>

</head>

<body>
    <!-- Header -->
    <header class="header-site backdrop-blur-md fixed top-0 left-0 right-0  z-50 ">
        <?php include('vista/header.php')?>
    </header>

    <main>
        <!-- Hero Section -->
        <section class="hero-section relative md:pt-28 pt-20 pb-12 overflow-hidden">
            <div class="container mx-auto md:px-4 px-7 z-10 relative">



                <div class="block-enter bg-white overflow-hidden  w-full flex flex-col md:flex-row">
                    <!-- Image Section -->
                    <div class="block-enter__cover md:w-1/2 md:h-auto">
                        <img class=" w-full h-full object-cover" src="uploads/img/<?php echo $data_nos['historia_img'] ?? 'Nuestra-HistoriaCMF.webp'; ?>"
                            alt="<?php echo $data_nos['historia_titulo'] ?? 'Nuestra Historia'; ?>" />
                    </div>

                    <!-- Text Section -->
                    <div class="md:w-1/2 p-8 sm:p-12 lg:p-12 flex flex-col justify-center">
                        <h1 class="title-section font-bold  mb-6">
                            <?php echo $data_nos['historia_titulo'] ?? 'Nuestra Historia'; ?>
                        </h1>
                        <div class="mb-5">
                            <p class="text-gray-600 leading-relaxed" style="color: #718096;">
                               <?php echo nl2br($data_nos['historia_texto'] ?? ''); ?>
                            </p>
                        </div>
                    </div>
                </div>

            </div>

        </section>

        <!-- Quick Actions Section -->
        <section class="bg-white py-16">
            <div class="container mx-auto md:px-4 px-7">
                <header>
                    <h2 class="title-section font-bold"><?php echo $data_nos['cultura_titulo'] ?? 'Nuestra Cultura CCR'; ?></h2>
                    <p class="mt-7 text-lg"><?php echo nl2br($data_nos['cultura_texto'] ?? ''); ?></p>
                </header>

                <main class="mt-10">


                    <div class="splide" data-restrict="desktop" data-config='{"arrows": false, "type": "loop", "autoplay":  true, "interval": 5000}' >
                        <div class="splide__track">
                                <ul class="md:grid md:grid-cols-2 lg:grid-cols-3 md:gap-x-8 md:gap-y-24">

                                    <li class="splide__slide">
                                        <div class="item-nst flex flex-col items-center text-center md:items-start md:text-left">
                                            <div class="relative w-full">
                                                <img alt="Cordialidad" class="item-nst__cover w-full object-cover" src="uploads/img/Nuestracult-Cordialidad.webp">
                                                <div class="item-nst__cort ">
                                                    <div
                                                        class="item-nst__icon bg-amber-400 rounded-full flex items-center justify-center  border-slate-50">
                                                        <img src="img/icon_hand.svg" loading="lazy" alt="Cordialidad">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mt-12">
                                                <h3 class="text-2xl font-bold">Cordialidad</h3>
                                                <p class="mt-2 text-slate-600">Porque un saludo amable, una sonrisa y un gesto de
                                                    cercanía hacen la diferencia en tu recuperación.</p>
                                            </div>
                                        </div>
                                    </li>

                                    <li class="splide__slide">
                                        <div class="item-nst flex flex-col items-center text-center md:items-start md:text-left">
                                            <div class="relative w-full">
                                                <img alt="Confianza" class="item-nst__cover w-full object-cover" src="uploads/img/CULTURA CCR - CONFIANZA.webp">
                                                <div class="item-nst__cort ">
                                                    <div
                                                        class="item-nst__icon bg-amber-400 rounded-full flex items-center justify-center  border-slate-50">
                                                        <img src="img/icon_shield.svg" loading="lazy" alt="Confianza">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mt-12">
                                                <h3 class="text-2xl font-bold">Confianza</h3>
                                                <p class="mt-2 text-slate-600">Porque mereces sentirte seguro, con información clara y
                                                    un equipo que te acompaña con ética y compromiso.</p>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="splide__slide">   
                                        <div class="item-nst flex flex-col items-center text-center md:items-start md:text-left">
                                            <div class="relative w-full">
                                                <img alt="Rapidez" class="item-nst__cover w-full object-cover" src="uploads/img/Nuestracult-Rapidez.webp">
                                                <div class="item-nst__cort ">
                                                    <div
                                                        class="item-nst__icon bg-amber-400 rounded-full flex items-center justify-center  border-slate-50">
                                                        <img src="img/icon_timer.svg" loading="lazy" alt="Rapidez">

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mt-12">
                                                <h3 class="text-2xl font-bold">Rapidez</h3>
                                                <p class="mt-2 text-slate-600">Porque tu tiempo y tu bienestar son valiosos, y
                                                    respondemos con agilidad sin dejar de lado el cuidado y la precisión.</p>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                        </div>
                    </div>  

                </main>
            </div>
        </section>

        <!-- Services Section -->
        <section class="bg-gray-site md:py-14 py-7">
            <div class="container  mx-auto md:px-4 px-7">
                <section class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-24 items-center">
                    <div class="order-1">
                        <h2 class="title-section mb-6"><?php echo $data_nos['adn_titulo'] ?? 'Nuestro ADN'; ?></h2>
                        <p class="text-slate-500 text-lg leading-relaxed"><?php echo nl2br($data_nos['adn_texto'] ?? ''); ?></p>
                    </div>
                    <div class="order-2 flex items-start gap-6">
                        <div class="w-1 bg-yellow-400 self-stretch flex-shrink-0 hidden md:block"></div>
                        <div class="flex gap-6 md:block">
                            <div class="bg-amber-400 flex-shrink-0 rounded-full inline-block md:mb-6 flex items-center justify-center" style="width: 69px; height: 69px;">
                                <svg width="22" height="46" viewBox="0 0 22 46" fill="none">
                                        <g clip-path="url(#clip0_290_5852)">
                                        <path d="M20.7568 45.9128C20.8255 45.9128 20.8951 45.9071 20.9654 45.8949C21.6414 45.7793 22.0967 45.1337 21.9827 44.4531C20.9525 38.3301 18.1013 36.9176 14.7989 35.2813C12.3011 34.0438 9.47014 32.6403 6.27449 28.8497C4.47532 26.7159 3.81549 23.6508 4.50848 20.6516C5.37289 16.9131 8.14806 13.8496 12.3213 12.026C21.8323 7.8707 21.998 1.52953 22.0004 1.26087C22.0061 0.570497 21.4554 0.00631286 20.7697 -0.000200085C20.0824 -0.00589892 19.5293 0.542003 19.5172 1.22668C19.5091 1.46196 19.2374 6.27828 11.334 9.73259C6.42085 11.8794 3.13868 15.5568 2.09072 20.0849C1.21984 23.8519 2.07616 27.7336 4.38153 30.4682C7.91113 34.6544 11.1221 36.246 13.7024 37.5242C16.8285 39.0734 18.7158 40.0089 19.5334 44.87C19.6361 45.4797 20.1617 45.9112 20.756 45.9112L20.7568 45.9128Z" fill="white"/>
                                        <path d="M1.24362 45.913C1.83795 45.913 2.36355 45.4816 2.46625 44.8718C3.28456 40.0107 5.17106 39.0753 8.29717 37.526C10.8775 36.2478 14.0885 34.6562 17.6181 30.47C19.9234 27.7354 20.7806 23.8537 19.9089 20.0868C18.8617 15.5578 15.5796 11.8812 10.6656 9.73442C2.73632 6.26708 2.4905 1.42878 2.48323 1.22443C2.46139 0.548713 1.91073 0.00732422 1.242 0.00732422C1.23311 0.00732422 1.22502 0.00732422 1.21613 0.00732422C0.536081 0.0211642 -0.00650024 0.576393 -3.24249e-05 1.26107C0.00239372 1.52891 0.168161 7.87008 9.67748 12.0262C13.8507 13.8506 16.6259 16.9133 17.4903 20.6517C18.1841 23.651 17.5235 26.7161 15.7243 28.8499C12.5287 32.6405 9.69769 34.0432 7.19988 35.2815C3.8983 36.9178 1.04713 38.3303 0.0161419 44.4533C-0.0978737 45.1339 0.356567 45.7795 1.03338 45.8951C1.10373 45.9073 1.17327 45.913 1.242 45.913H1.24362Z" fill="white"/>
                                        <path d="M2.62008 3.40222H19.2476C19.5905 3.40222 19.8687 3.12216 19.8687 2.77698C19.8687 2.43179 19.5905 2.15173 19.2476 2.15173H2.62008C2.27723 2.15173 1.99906 2.43179 1.99906 2.77698C1.99906 3.12216 2.27723 3.40222 2.62008 3.40222Z" fill="white"/>
                                        <path d="M3.60637 6.34364H18.2617C18.5835 6.34364 18.8447 6.08068 18.8447 5.75666C18.8447 5.43264 18.5835 5.16968 18.2617 5.16968H3.60718C3.28535 5.16968 3.02417 5.43264 3.02417 5.75666C3.02417 6.08068 3.28535 6.34364 3.60718 6.34364H3.60637Z" fill="white"/>
                                        <path d="M2.62008 43.7605H19.2476C19.5905 43.7605 19.8687 43.4804 19.8687 43.1353C19.8687 42.7901 19.5905 42.51 19.2476 42.51H2.62008C2.27723 42.51 1.99906 42.7901 1.99906 43.1353C1.99906 43.4804 2.27723 43.7605 2.62008 43.7605Z" fill="white"/>
                                        <path d="M3.60637 40.7426H18.2617C18.5835 40.7426 18.8447 40.4796 18.8447 40.1556C18.8447 39.8316 18.5835 39.5686 18.2617 39.5686H3.60718C3.28535 39.5686 3.02417 39.8316 3.02417 40.1556C3.02417 40.4796 3.28535 40.7426 3.60718 40.7426H3.60637Z" fill="white"/>
                                        <path d="M3.59215 26.8179H18.3623C18.6858 26.8179 18.9478 26.5541 18.9478 26.2285C18.9478 25.9028 18.6858 25.639 18.3623 25.639H3.59215C3.2687 25.639 3.00671 25.9028 3.00671 26.2285C3.00671 26.5541 3.2687 26.8179 3.59215 26.8179Z" fill="white"/>
                                        <path d="M5.2423 30.0947H5.24715L16.6317 29.9905C16.9139 29.9881 17.1411 29.7552 17.1387 29.4703C17.1362 29.187 16.9074 28.9598 16.6268 28.9598H16.6219L5.23745 29.064C4.95524 29.0665 4.72802 29.2993 4.73045 29.5843C4.73287 29.8676 4.96171 30.0947 5.2423 30.0947Z" fill="white"/>
                                        <path d="M4.63288 16.8792H17.3217C17.6209 16.8792 17.8643 16.6349 17.8643 16.3329C17.8643 16.0309 17.6217 15.7866 17.3217 15.7866H4.63288C4.3337 15.7866 4.0903 16.0309 4.0903 16.3329C4.0903 16.6349 4.33289 16.8792 4.63288 16.8792Z" fill="white"/>
                                        <path d="M3.59215 20.2211H18.3623C18.6858 20.2211 18.9478 19.9573 18.9478 19.6317C18.9478 19.306 18.6858 19.0422 18.3623 19.0422H3.59215C3.2687 19.0422 3.00671 19.306 3.00671 19.6317C3.00671 19.9573 3.2687 20.2211 3.59215 20.2211Z" fill="white"/>
                                        <path d="M3.00578 23.6111H3.01144L18.8684 23.4662C19.2015 23.4629 19.47 23.1886 19.4668 22.8523C19.4643 22.5185 19.1943 22.2499 18.8627 22.2499H18.8571L3.00012 22.3948C2.66697 22.398 2.39851 22.6724 2.40175 23.0086C2.40417 23.3424 2.67425 23.6111 3.00578 23.6111Z" fill="white"/>
                                        </g>
                                        <defs>
                                        <clipPath id="clip0_290_5852">
                                        <rect width="22" height="45.913" fill="white" transform="matrix(-1 0 0 1 22 0)"/>
                                        </clipPath>
                                        </defs>
                                        </svg>

                            </div>
                            <p class="text-[17px] md:text-3xl font-medium leading-snug">
                                <?php echo $data_nos['adn_subtexto'] ?? ''; ?></p>
                        </div>
                    </div>
                </section>

            </div>
        </section>

        <!-- Why Us Section -->
        <section class="bg-white md:py-20 py-8" id="convenios">
            <div class="container mx-auto md:px-4 px-7">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-24 items-center">
                    <div>
                        <h2 class="title-section mb-6"><?php echo $data_nos['convenios_titulo'] ?? 'Aseguradoras y Convenios'; ?></h2>
                        <div class="space-y-4 text-slate-500 text-lg leading-relaxed">
                            <?php echo $data_nos['convenios_texto'] ?? ''; ?>
                        </div>
                    </div>
                    <div class="lg:pl-8"><img alt="<?php echo $data_nos['convenios_titulo'] ?? 'Aseguradoras y Convenios'; ?>" loading="lazy"
                            class="rounded-2xl  object-cover "
                            src="uploads/img/<?php echo $data_nos['convenios_img'] ?? 'Aseg-y-Convenio-V2.webp'; ?>" height="360" width="563"></div>
                </div>
            </div>
        </section>


        <section class="bg-white">
            <div class="container mx-auto md:px-4 px-7">
                <div class="">
                    <h2 class="text-[40px] font-bold  mb-12 text-center md:text-left">Convenios</h2>
                    
                    
                    
                    <div class="splide swiper-logos" data-config='{"arrows": false, "type": "loop", "perPage": 6, "perMove": 1, "autoplay":  true, "interval": 4000}' >
                        <div class="splide__track">
                                <ul class="splide__list">
                                    <?php
                                    $jlogos = lista_registros_cms('jconvenios', 'cms/json');
                                    foreach ( $jlogos as $rlogo ){
                                    ?>
                                    <li class="splide__slide">
                                        <div class="grayscale opacity-70 hover:grayscale-0 hover:opacity-100 transition-all duration-300">
                                            <img src="uploads/logos/<?php echo $rlogo->imgdesktop?>" loading="lazy" alt="<?php echo $rlogo->nombre?>">
                                        </div>
                                    </li>
                                    <?php } ?>
                                </ul>
                        </div>
                    </div>

              
                </div>
            </div>
        </section>



         <section class="bg-white mt-12">
            <div class="container mx-auto md:px-4 px-7">
                <div class="">
                    <h2 class="text-[40px] font-bold  mb-12 text-center md:text-left">Aseguradoras</h2>
                    
                    
                    
                    <div class="splide swiper-logos" data-config='{"arrows": false, "type": "loop", "perPage": 6, "perMove": 1, "autoplay":  true, "interval": 4000}' >
                        <div class="splide__track">
                                <ul class="splide__list">
                                    <?php
                                    $jlogos = lista_registros_cms('jaseguradoras', 'cms/json');
                                    foreach ( $jlogos as $rlogo ){
                                    ?>
                                    <li class="splide__slide">
                                        <div class="grayscale opacity-70 hover:grayscale-0 hover:opacity-100 transition-all duration-300">
                                            <img src="uploads/logos/<?php echo $rlogo->imgdesktop?>" loading="lazy" alt="<?php echo $rlogo->nombre?>">
                                        </div>
                                    </li>
                                    <?php } ?>
                                </ul>
                        </div>
                    </div>

              
                </div>
            </div>
        </section>

        <!-- Blog Section -->
        <section class="bg-white py-20">
            <div class="container mx-auto md:px-4 px-7">

                    <div class="splide swiper-logos" data-config='{"arrows": false, "type": "loop", "autoplay":  true, "interval": 5000}' >
                        <div class="splide__track">
                                <ul class="splide__list">
                                    <li class="splide__slide">
                                         <div class="bg-[#F3F6F8] rounded-2xl overflow-hidden grid grid-cols-1 lg:grid-cols-2">
                                            <div class="p-8 sm:p-12 lg:p-16 flex flex-col justify-center">
                                                <h2 class="title-section mb-6"><?php echo $data_nos['staff_titulo'] ?? 'Nuestro Staff Médico'; ?></h2>
                                                <div class="text-gray-500 mb-6 leading-relaxed space-y-4">
                                                    <?php echo nl2br($data_nos['staff_texto'] ?? ''); ?>
                                                </div>
                                                <div class="mt-4"><a href="medicos"
                                                        class="px-8 py-3 bg-transparent border-2 border-gray-500 text-gray-700 font-semibold rounded-full hover:bg-white/60 hover:border-gray-600 transition-all duration-300 ease-in-out focus:outline-none focus:ring-2 focus:ring-gray-400 focus:ring-offset-2 focus:ring-offset-[#F3F6F8]">Staff
                                                        Médico</a></div>
                                            </div>
                                            <div class="relative min-h-[300px] lg:min-h-0"><img class="absolute inset-0 h-full w-full object-cover"
                                                    alt="<?php echo $data_nos['staff_titulo'] ?? 'Nuestro Staff Médico'; ?>"
                                                    src="uploads/img/<?php echo $data_nos['staff_img'] ?? 'Staff-Medicov1.webp'; ?>">
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                        </div>
                    </div>

               
                
                
            </div>
        </section>

        <!-- Opening Hours Section -->
        <section class="py-20 pt-0">
            <?php include('vista/horarios.php')?>
        </section>

        <!-- Contact Section -->
        <section class="section-contact">
            <?php include('vista/contacto.php')?>
        </section>
    </main>

    <!-- Footer -->
    <footer class="bg-white pt-12 pb-8">
        <?php include('vista/footer.php')?>
    </footer>

    <!-- Floating WhatsApp Button -->
    <?php include('vista/whatsapp.php')?>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const menuOpenButton = document.getElementById('menu-open-button');
            const menuCloseButton = document.getElementById('menu-close-button');
            const mobileMenu = document.getElementById('mobile-menu');

            if (menuOpenButton && menuCloseButton && mobileMenu) {
                menuOpenButton.addEventListener('click', function () {
                    mobileMenu.classList.remove('translate-x-full');
                    mobileMenu.classList.add('translate-x-0');
                });

                menuCloseButton.addEventListener('click', function () {
                    mobileMenu.classList.remove('translate-x-0');
                    mobileMenu.classList.add('translate-x-full');
                });
            }
        });
    </script>
   
    <?php include('vista/script.php')?>
</body>
</html>