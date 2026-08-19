<?php 
include ('cms/php/var.php');
include ('cms/modelo/function.php');
include ('modelo/metas.php');
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
        <section class="hero-section relative md:pt-28 pt-20 pb-12 overflow-hidden mb-12">
            <div class="container mx-auto px-4 z-10 relative">



                <div class="block-enter bg-white overflow-hidden  w-full flex flex-col md:flex-row mb-12">
                    <!-- Image Section -->
                    <div class="block-enter__cover md:w-1/2 h-64 md:h-auto">
                        <img class=" w-full h-full object-cover" src="uploads/img/Emergencia-Adulto-Portada.webp"
                            alt="Dos doctores sonriendo en una clínica" />
                    </div>

                    <!-- Text Section -->
                    <div class="md:w-1/2 p-8 sm:p-12 lg:p-12 flex flex-col justify-center">
                        <h1 class="title-section font-bold  mb-6">
                            Emergencia Adultos
                        </h1>
                        <div class="mb-0">
                            <p class="text-gray-600 leading-relaxed mb-6" style="color: #718096;">
                               En Clínica Montefiori estamos a tu lado las 24 horas del día, los 365 días del año. Nuestro equipo de especialistas brinda una atención inmediata, segura y humana, enfocada en responder con rapidez y precisión a cualquier situación crítica.
                            </p>
                            <p class="text-gray-600 leading-relaxed" style="color: #718096;">
                                Contamos con <b>15 boxes exclusivos para adultos</b> y con una <b>Unidad de Trauma Shock</b>, equipados con tecnología de última generación para la toma de decisiones ágiles y efectivas. Cada detalle está pensado para tu seguridad y pronta recuperación.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="flex flex-col lg:flex-row items-stretch justify-center gap-8 w-full max-w-7xl">
                    <div
                        class="bg-white rounded-[2rem] overflow-hidden flex flex-col md:flex-row w-full max-w-2xl lg:max-w-none lg:flex-1">
                        <div class="p-8 sm:p-10 md:p-12 w-full flex flex-col justify-center">
                            <h2 class="text-3xl font-bold mb-8">Equipamiento</h2>
                            <ul class="space-y-4">
                                <li class="flex items-center"><span
                                        class="w-1.5 h-1.5 bg-amber-400 rounded-full mr-4 shrink-0"></span><span
                                        class="text-slate-600 text-base">15 boxes</span></li>
                                <li class="flex items-center"><span
                                        class="w-1.5 h-1.5 bg-amber-400 rounded-full mr-4 shrink-0"></span><span
                                        class="text-slate-600 text-base">Unidad de Trauma Shock</span></li>
                            </ul>
                        </div>
                        <div class="w-full md:w-1/2 h-64 md:h-auto min-h-[217px] md:max-w-[] flex-none"><img alt="Equipamiento"
                                class="w-full h-full object-cover" src="uploads/img/Emergencia-Adulto-Equipamiento.webp" loading="lazy"></div>
                    </div>
                    <div
                        class="bg-white rounded-[2rem]  overflow-hidden flex flex-col md:flex-row w-full max-w-2xl lg:max-w-none lg:flex-1">
                        <div class="p-8 sm:p-10 md:p-12 w-full  flex flex-col justify-center">
                            <h2 class="text-3xl font-bold mb-8">Nuestro staff especializado</h2>
                            <ul class="space-y-4">
                                <li class="flex items-center"><span
                                        class="w-1.5 h-1.5 bg-amber-400 rounded-full mr-4 shrink-0"></span><span
                                        class="text-slate-600 text-base">Ginecología</span></li>
                                <li class="flex items-center"><span
                                        class="w-1.5 h-1.5 bg-amber-400 rounded-full mr-4 shrink-0"></span><span
                                        class="text-slate-600 text-base">Traumatología</span></li>
                                <li class="flex items-center"><span
                                        class="w-1.5 h-1.5 bg-amber-400 rounded-full mr-4 shrink-0"></span><span
                                        class="text-slate-600 text-base">Cirugía</span></li>
                            </ul>
                        </div>
                        <div class="w-full md:w-1/2 h-64 md:h-auto min-h-[217px] md:max-w-[] flex-none"><img alt="Nuestro staff especializado"
                                class="w-full h-full object-cover" src="uploads/img/Emergencia-Adulto-Staff-Espec.webp" loading="lazy"></div>
                    </div>
                </div>

            </div>

        </section>

        <section class="bg-white mb-12 ">
            <?php include('vista/info.php')?>
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