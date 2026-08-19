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
    <style>
    @media (min-width: 769px) {
        .block-enter__cover {
            max-width: none;
        }
    }
    </style>
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



                <div class="block-enter bg-white overflow-hidden  w-full flex flex-col md:flex-row">
                    <!-- Image Section -->
                    <div class="block-enter__cover md:w-1/2 h-64 md:h-auto">
                        <img class=" w-full h-full object-cover" src="uploads/img/Emergencia Pediatrica - Mobile.webp"
                            alt="Emergencia Pediátrica" />
                    </div>

                    <!-- Text Section -->
                    <div class="md:w-1/2 p-8 sm:p-12 lg:p-12 flex flex-col justify-center">
                        <h1 class="title-section font-bold  mb-6">
                            Emergencia Pediátrica
                        </h1>
                        <div class="mb-0">
                            <p class="text-gray-600 leading-relaxed mb-6" style="color: #718096;">
                               Los más pequeños también tienen un espacio especialmente diseñado para su cuidado. Nuestra <b>Emergencia Pediátrica</b> funciona las 24 horas, los 365 días, con un equipo médico altamente capacitado para responder con sensibilidad, experiencia y dedicación a las necesidades de los niños.
                            </p>
                            <p class="text-gray-600 leading-relaxed mb-6" style="color: #718096;">
                                Disponemos de <b>9 boxes pediátricos</b>, además de equipos modernos que permiten actuar con rapidez y exactitud. Aquí, cada niño recibe una atención profesional que combina calidez y precisión, porque su bienestar es nuestra prioridad.
                            </p>

                            <ul class="space-y-4">
                                <li class="flex items-center"><span class="w-1.5 h-1.5 bg-amber-400 rounded-full mr-4 shrink-0"></span><span class="text-slate-600 text-base">9 boxes</span></li>
                                <li class="flex items-center"><span class="w-1.5 h-1.5 bg-amber-400 rounded-full mr-4 shrink-0"></span><span class="text-slate-600 text-base">Unidad de Traumashock</span></li>
                                <li class="flex items-center"><span class="w-1.5 h-1.5 bg-amber-400 rounded-full mr-4 shrink-0"></span><span class="text-slate-600 text-base">Traumatología</span></li>
                                <li class="flex items-center"><span class="w-1.5 h-1.5 bg-amber-400 rounded-full mr-4 shrink-0"></span><span class="text-slate-600 text-base">Cirugía</span></li>
                            </ul>

                        </div>
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