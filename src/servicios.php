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
        <section class="hero-section relative md:pt-28 pt-20 md:pb-10 overflow-hidden md:mb-12 pb-6 mb-6">
            <div class="container mx-auto px-4 z-10 relative">
                <?php include('vista/slider-interno-sin-fondo-amarillo.php')?>
            </div>
        </section>

        <!-- Quick Actions Section -->
        <section class="bg-white mb-12">
            <div class="container-med mx-auto md:px-4 px-7">

                <h1 class="title-section text-center mb-10">Nuestros Servicios Médicos</h1>

                 <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 md:gap-9 gap-6">
                    <!-- Action Card 1 -->
                    <div class="item-servicio rounded-3xl text-center flex flex-col items-center justify-between transform hover:shadow-md transition-transform duration-300">
                        <div class="circle-icon bg-white p-4 flex align-center justify-center rounded-full mb-9">
                            <img src="img/servicios/_1.svg" alt="" width="64" height="68" loading="lazy">
                        </div>
                        <div class="mb-9">
                            <div class="text-xl font-bold text-white"> Emergencia</div>
                            <div class="md:text-3xl font-bold text-white">ADULTOS</div> 
                        </div>
                        <a href="servicio-emergencia-adulto" class="bg-white text-gray-700 font-semibold py-3 px-8 rounded-full hover:bg-gray-100 transition-colors w-full">Ver más</a>
                    </div>

                    <div class="item-servicio rounded-3xl text-center flex flex-col items-center justify-between transform hover:shadow-md transition-transform duration-300">
                        <div class="circle-icon bg-white p-4 flex align-center justify-center rounded-full mb-9">
                            <img src="img/servicios/_2.svg" alt="" width="64" height="68" loading="lazy">
                        </div>
                        <div class="mb-9">
                            <div class="text-xl font-bold text-white"> Emergencia</div>
                            <div class="md:text-3xl font-bold text-white">PEDIÁTRICA</div> 
                        </div>
                        <a href="servicio-emergencia-pediatrica" class="bg-white text-gray-700 font-semibold py-3 px-8 rounded-full hover:bg-gray-100 transition-colors w-full">Ver más</a>
                    </div>

                    <div class="item-servicio rounded-3xl text-center flex flex-col items-center justify-between transform hover:shadow-md transition-transform duration-300">
                        <div class="circle-icon bg-white p-4 flex align-center justify-center rounded-full mb-9">
                            <img src="img/servicios/_3.svg" alt="" width="64" height="68" loading="lazy">
                        </div>
                        <div class="mb-9">
                            <div class="text-xl font-bold text-white"> Consultas</div>
                            <div class="md:text-3xl font-bold text-white">AMBULATORIAS</div> 
                        </div>
                        <a href="servicio-consultas-ambulatorias" class="bg-white text-gray-700 font-semibold py-3 px-8 rounded-full hover:bg-gray-100 transition-colors w-full">Ver más</a>
                    </div>

                    <div class="item-servicio rounded-3xl text-center flex flex-col items-center justify-between transform hover:shadow-md transition-transform duration-300">
                        <div class="circle-icon bg-white p-4 flex align-center justify-center rounded-full mb-9">
                            <img src="img/servicios/_4.svg" alt="" width="64" height="68" loading="lazy">
                        </div>
                        <div class="mb-9">
                            <div class="text-xl font-bold text-white"> Servicio</div>
                            <div class="md:text-3xl font-bold text-white">HOSPITALARIO</div> 
                        </div>
                        <a href="servicio-hospitalizacion" class="bg-white text-gray-700 font-semibold py-3 px-8 rounded-full hover:bg-gray-100 transition-colors w-full">Ver más</a>
                    </div>

                    <div class="item-servicio rounded-3xl text-center flex flex-col items-center justify-between transform hover:shadow-md transition-transform duration-300">
                        <div class="circle-icon bg-white p-4 flex align-center justify-center rounded-full mb-9">
                            <img src="img/servicios/_5.svg" alt="" width="64" height="68" loading="lazy">
                        </div>
                        <div class="mb-9">
                            <div class="md:text-3xl font-bold text-white">ESPECIALIDADES</div> 
                        </div>
                        <a href="especialidades" class="bg-white text-gray-700 font-semibold py-3 px-8 rounded-full hover:bg-gray-100 transition-colors w-full">Ver más</a>
                    </div>

                    <div class="item-servicio rounded-3xl text-center flex flex-col items-center justify-between transform hover:shadow-md transition-transform duration-300">
                        <div class="circle-icon bg-white p-4 flex align-center justify-center rounded-full mb-9">
                            <img src="img/servicios/_6.svg" alt="" width="64" height="68" loading="lazy">
                        </div>
                        <div class="mb-9">
                            <div class="text-xl font-bold text-white"> Servicios</div>
                            <div class="md:text-3xl font-bold text-white">AUXILIARES</div> 
                        </div>
                        <a href="servicio-auxiliares" class="bg-white text-gray-700 font-semibold py-3 px-8 rounded-full hover:bg-gray-100 transition-colors w-full">Ver más</a>
                    </div>
                    

                </div>
                
            </div>
        </section>

        <div class="container mx-auto">
            <div class="border-t mb-10"></div>
        </div>
        

        

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
    <?php include('vista/script.php')?>

</body>
</html>