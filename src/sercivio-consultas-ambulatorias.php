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
        /* Small fix for line-clamp which might not be in the default CDN build */
        /*.line-clamp-3 {
            overflow: hidden;
            display: -webkit-box;
            -webkit-box-orient: vertical;
            -webkit-line-clamp: 3;
        }*/
        .bg-gray-100:hover{
            background-color: #d9d9d9!important;
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

                <main class="max-w-7xl w-full bg-white rounded-2xl md:p-8 py-8 px-6 sm:p-12">
                    


                    <div class="flex flex-col lg:flex-row md:gap-12 gap-6 items-center">
                        <div class="text-slate-600 lg:w-full">
                            <h1 class="title-section tracking-tight">Consultas Ambulatorias</h1>
                            <p class="mt-6 text-base leading-relaxed">En Clínica Montefiori ponemos a tu disposición un completo servicio de
                                <strong class="text-slate-700">consultas ambulatorias</strong>, pensado para brindarte una atención médica
                                integral y accesible en un entorno cómodo y seguro.</p>
                            <p class="mt-4 text-base leading-relaxed">Contamos con <strong class="text-slate-700">consultorios modernos y
                                    equipados</strong>, diseñados para tu bienestar y respaldados por un staff de especialistas con amplia
                                experiencia y trayectoria. Aquí encontrarás una atención personalizada, con la <strong
                                    class="text-slate-700">cordialidad, confianza y calidez</strong> que forman parte de nuestro ADN.</p>
                        </div>
                        <div class="md:max-w-[422px]  w-full h-full"><img alt="Consultas Ambulatorias"
                                class="rounded-2xl object-cover w-full h-full aspect-[4/3]" src="<?php echo HOST_VAR  ?>uploads/img/Consulta Ambulatoria - Mobile.webp">
                        </div>
                    </div>

                    <div class="mt-12 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        <div class="bg-site text-white p-6 rounded-2xl flex flex-col">
                            <div class="flex items-center gap-4">
                                <svg width="34" height="34" viewBox="0 0 34 34" fill="none">
                                    <path d="M17.0004 3.33325C18.8948 3.33329 20.6684 3.69296 22.3265 4.40845C23.9945 5.12818 25.4409 6.10191 26.6693 7.33032C27.8978 8.55881 28.8724 10.0051 29.5922 11.6731C30.3077 13.3314 30.6664 15.1056 30.6664 17.0002C30.6663 18.8946 30.3076 20.6683 29.5922 22.3264C28.8724 23.9944 27.8978 25.4407 26.6693 26.6692C25.4408 27.8977 23.9946 28.8723 22.3265 29.592C20.6684 30.3075 18.8947 30.6662 17.0004 30.6663C15.1058 30.6663 13.3315 30.3076 11.6732 29.592C10.0052 28.8723 8.55893 27.8977 7.33044 26.6692C6.10204 25.4407 5.1283 23.9944 4.40857 22.3264C3.69309 20.6682 3.33342 18.8947 3.33337 17.0002C3.33337 15.1056 3.693 13.3314 4.40857 11.6731C5.12832 10.0051 6.10199 8.55878 7.33044 7.33032C8.5589 6.10186 10.0052 5.1282 11.6732 4.40845C13.3315 3.69287 15.1057 3.33325 17.0004 3.33325ZM17.0004 5.16626C13.7284 5.16626 10.9264 6.32225 8.62439 8.62427C6.32237 10.9263 5.16638 13.7282 5.16638 17.0002C5.16646 20.272 6.32255 23.0733 8.62439 25.3752C10.9264 27.6773 13.7284 28.8333 17.0004 28.8333C20.2722 28.8332 23.0734 27.6772 25.3754 25.3752C27.6773 23.0733 28.8333 20.2721 28.8334 17.0002C28.8334 13.7282 27.6774 10.9263 25.3754 8.62427C23.0735 6.32243 20.2722 5.16634 17.0004 5.16626ZM17.9164 10.4163V16.6399L22.9515 21.675L21.6752 22.9514L16.0834 17.3596V10.4163H17.9164Z" fill="white" stroke="#FDB733"/>
                                    </svg>

                                <h3 class="text-xl font-bold">Horarios de Atención</h3>
                            </div>
                            <ul class="mt-4 space-y-2 text-sm pl-2">
                                <li class="flex items-start"><span class="mr-2">•</span><span><span class="font-semibold">Lunes a
                                            Viernes:</span> 7:00 a.m. - 8:00 p.m.</span></li>
                                <li class="flex items-start"><span class="mr-2">•</span><span><span
                                            class="font-semibold">Sábados:</span> 7:00 a.m. - 1:00 p.m.</span></li>
                            </ul>
                        </div>
                        <div class="bg-site text-white p-6 rounded-2xl flex flex-col">
                            <div class="flex items-center gap-4">
                                <img src="img/pluss_calendar.svg" loading="lazy" width="33" height="31" alt="">
                                <h3 class="text-xl font-bold">Citas a tu medida</h3>
                            </div>
                            <ul class="mt-4 space-y-2 text-sm pl-2">
                                <li class="flex items-start"><span class="mr-2">•</span><span><span class="font-semibold">Disponibilidad
                                            inmediata de citas</span></span></li>
                                <li class="flex items-start"><span class="mr-2">•</span><span><span class="font-semibold">Atención en
                                            feriados</span> (según disponibilidad)</span></li>
                            </ul>
                        </div>
                        <div class="bg-site text-white p-6 rounded-2xl flex flex-col">
                            <div class="flex items-center gap-4">
                                <img src="img/icon_med_ofer.svg" loading="lazy" width="26" height="28" alt="">
                                <h3 class="text-xl font-bold">Nuestra Oferta Médica</h3>
                            </div>
                            <ul class="mt-4 space-y-2 text-sm pl-2">
                                <li class="flex items-start"><span class="mr-2">•</span><span><span class="font-semibold">Más de 35
                                            especialidades médicas</span></span></li>
                                <li class="flex items-start"><span class="mr-2">•</span><span><span class="font-semibold">Más de 150
                                            profesionales de la salud</span></span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="mt-12 text-center text-slate-600 text-base">
                        <p>En cada consulta, nuestro compromiso es claro: Brindarte <strong class="text-slate-700">profesionalismo y
                                cercanía</strong>, porque tu salud y la de tu familia son siempre lo más importante.</p>
                    </div>
                </main>
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