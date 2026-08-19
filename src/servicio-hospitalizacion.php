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
        <section class="hero-section relative md:pt-28 pt-20 pb-10 overflow-hidden mb-12">
            <div class="container mx-auto px-4 z-10 relative">
                <?php include('vista/slider-interno-sin-fondo-amarillo.php')?>
            </div>
        </section>

        <!-- Quick Actions Section -->
        <section class="bg-white mb-12">
            <div class="container-med mx-auto md:px-4 px-7">
                
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-16 items-center mb-6 md:mb-28">
                <div class="text-center lg:text-left">
                    <h1 class="title-section mb-6">Servicio Hospitalario</h1>
                    <p class="text-gray-600 leading-relaxed">En Clínica Montefiori sabemos que una hospitalización no es solo un
                        tratamiento médico, sino también un momento en el que la cercanía y la confianza hacen la diferencia. Por
                        eso, nuestro servicio hospitalario está diseñado para brindarte una atención integral, humana y segura, con
                        instalaciones cómodas y personal altamente capacitado que acompaña cada etapa de tu recuperación.</p>
                </div>
                <div class="flex gap-4 md:gap-6">
                    <div class="w-1/2 aspect-square"><img alt="Servicio Hospitalario" class="rounded-2xl shadow-lg object-cover w-full h-full"
                            src="uploads/img/Portada-Hospitalizacion.webp" height="237"></div>
                    <div class="w-1/2 aspect-square"><img alt="Servicio Hospitalario"
                            class="rounded-2xl shadow-lg object-cover w-full h-full" height="237" src="uploads/img/Hospitalización-57.webp"></div>
                </div>
            </div>
            </div>
        </section>

        <section class="bg-white mb-12">
            <div class="container-med mx-auto md:px-4 px-7">
                <section class="flex flex-col md:flex-row items-center gap-8 mb-20 md:mb-28">
                    <div class="flex-shrink-0 hidden md:block">
                        <div class="w-24 h-24 bg-site rounded-full flex items-center justify-center shadow-md">
                            <svg width="38" height="48" viewBox="0 0 38 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0_323_4429)">
                            <path d="M22.5922 3.60943C25.0527 3.99658 27.3486 5.23905 28.5704 7.46627C29.8644 9.82517 29.7618 12.6646 29.2174 15.2227C30.7323 15.8654 30.8315 17.6931 30.6568 19.1358C30.4449 20.8848 29.2501 21.6253 27.5391 21.4689C27.4737 24.2217 25.7492 27.1095 23.2752 28.3306L24.621 31.4064C29.0371 32.2932 33.3224 32.6095 35.6026 37.0594C36.5516 38.9119 37.7701 44.4468 37.9853 46.5862C38.0699 47.4325 37.8106 47.8365 36.9326 47.8703H1.16883C0.504953 47.8152 0.0473394 47.6711 0 46.9261C1.21617 42.4367 0.934389 37.0099 5.06193 34.0039C7.53034 32.2066 10.6051 32.0985 13.4838 31.4098L14.8206 28.4882C12.3567 26.9204 10.6457 24.449 10.4428 21.4767C9.15566 21.6602 7.66785 20.9568 7.43905 19.5905C7.34549 19.0312 7.34437 17.3937 7.43905 16.8366C7.54612 16.2075 8.0398 15.6954 8.52447 15.3319C8.32497 12.7277 8.51658 9.84318 9.82743 7.54055C12.0197 3.69271 18.1603 0.30967 22.5381 0.0181839C26.2441 -0.229411 23.5085 2.161 22.5933 3.60943H22.5922ZM21.8054 1.81437C16.6601 2.83401 10.8971 6.08425 10.2388 11.7677C10.1205 12.7851 10.0236 14.0354 10.2174 15.0179C11.1248 15.647 13.8208 13.2138 14.2548 12.4103C14.5986 11.7744 14.5129 10.4734 15.4529 10.47C15.7956 10.47 16.9915 11.7328 17.3668 12.031C19.399 13.6483 22.103 15.2464 24.781 15.297C25.6467 15.3139 26.4943 14.9796 27.3712 15.0663L27.5989 14.9571C28.7102 11.0744 27.8006 6.68298 23.4668 5.48777C22.786 5.29982 20.9792 5.25931 20.6287 4.84065C19.8352 3.89416 21.4211 2.60667 21.8054 1.81324V1.81437ZM25.7966 16.8647H23.548C23.0396 16.8647 21.3129 16.2716 20.764 16.0522C18.991 15.342 17.3352 14.175 15.9004 12.9359L14.4982 14.6769L12.1538 16.3785C12.1538 20.3277 11.4009 24.3049 15.2252 26.7539C19.8205 29.6969 25.5554 26.6413 25.9645 21.3023C26.0423 20.2917 26.0863 18.2276 25.9713 17.2541C25.9521 17.0909 25.9578 16.9649 25.7966 16.867V16.8647ZM10.4496 19.7852V16.8085C10.4496 16.5136 9.45435 16.634 9.20751 16.9154C8.87501 17.2924 8.86035 19.4105 9.28866 19.6817L10.4496 19.7852ZM27.6518 19.7852C29.2524 20.1071 29.1216 18.6362 29.0078 17.4758C28.9311 16.6959 28.345 16.625 27.6518 16.6408V19.7852ZM22.4693 34.1513L23.0396 32.0952L21.6938 29.1555C19.878 29.671 18.1073 29.7059 16.3028 29.1105C16.1551 29.8882 15.0111 31.5505 14.9784 32.2145C14.9705 32.3821 15.5521 34.0894 15.6389 34.1434L22.4682 34.1513H22.4693ZM1.90372 46.181H17.8695L13.4309 33.1418L7.63742 34.3877L8.08376 35.7945C10.3899 35.9655 11.8743 37.2766 12.5292 39.4408C12.7388 40.1341 13.2528 41.6996 12.0625 41.766C11.1157 41.8189 11.0673 40.0587 10.7336 39.3249C10.32 38.4201 9.61778 37.6739 8.58533 37.5411C7.79747 37.4398 7.63178 37.5738 7.28125 38.2411C6.71092 39.3272 6.93071 40.5854 7.36015 41.685C7.65996 42.4525 8.7499 43.6128 8.32046 44.3342C7.46835 45.768 6.16877 43.1154 5.89826 42.4716C5.21184 40.8409 4.95035 39.0728 5.81936 37.4545C5.96589 37.1821 6.49902 36.6306 6.51593 36.4607C6.53171 36.3133 6.18117 35.2666 6.12143 35.2846C2.62734 37.7347 2.84374 42.4334 1.90372 46.1788V46.181ZM20.2308 46.181H36.1966C35.6759 44.1012 35.429 41.8628 34.8835 39.7987C34.1035 36.8434 32.0938 34.5869 29.001 34.0512L29.1306 37.459C32.1513 39.3486 30.0132 44.0281 26.6712 42.8363C23.6212 41.748 24.3516 37.3442 27.5267 37.0741C27.5752 35.9329 27.5391 34.7185 27.0849 33.6618L24.6695 33.1429L20.2297 46.1833L20.2308 46.181ZM21.8054 35.7348H16.1833L19.0507 44.2723L21.8054 35.7348ZM28.6257 39.1426C27.4895 37.9519 25.6534 39.5939 26.6374 40.8476C27.7476 42.2612 29.8249 40.4008 28.6257 39.1426Z" fill="white"/>
                            </g>
                            <defs>
                            <clipPath id="clip0_323_4429">
                            <rect width="38" height="47.8701" fill="white"/>
                            </clipPath>
                            </defs>
                            </svg>

                        </div>
                    </div>
                    <p class=" text-center md:text-left">Nuestras habitaciones están equipadas para
                        asegurar el <strong>monitoreo constante y seguro</strong> de tu recuperación, mientras que
                        nuestro staff de médicos y enfermeras altamente calificados te acompaña en cada etapa del proceso, brindando
                        cercanía y apoyo permanente.</p>
                </section>
            </div>
        </section>

        <section class="bg-white mb-12">
            <div class="container mx-auto md:px-4 px-7 flex flex-col md:flex-row gap-6">
                
                    <h2 class="title-section text-center lg:text-left ">Nuestra infraestructura
                        hospitalaria</h2>
                    <ul class="grid grid-cols-1 sm:grid-cols-2 gap-x-12 gap-y-5 text-lg">
                        <li class="flex items-center"><span
                                class="w-2.5 h-2.5 bg-yellow-500 rounded-full mr-4 flex-shrink-0"></span><span>45 Habitaciones</span>
                        </li>
                        <li class="flex items-center"><span
                                class="w-2.5 h-2.5 bg-yellow-500 rounded-full mr-4 flex-shrink-0"></span><span>UCI Completamente
                                equipadas</span></li>
                        <li class="flex items-center"><span
                                class="w-2.5 h-2.5 bg-yellow-500 rounded-full mr-4 flex-shrink-0"></span><span>3 Salas de
                                Operaciones</span></li>
                        <li class="flex items-center"><span
                                class="w-2.5 h-2.5 bg-yellow-500 rounded-full mr-4 flex-shrink-0"></span><span>Endoscopia Alta y
                                Baja</span></li>
                        <li class="flex items-center"><span
                                class="w-2.5 h-2.5 bg-yellow-500 rounded-full mr-4 flex-shrink-0"></span><span>Sala de Partos</span>
                        </li>
                        <li class="flex items-center"><span
                                class="w-2.5 h-2.5 bg-yellow-500 rounded-full mr-4 flex-shrink-0"></span><span>Sala de
                                Neonatología</span></li>
                    </ul>
             
            </div>
        </section>

        <section class="bg-white mb-12">
            <div class="container-med mx-auto md:px-4 px-7">
                <div class="bg-gray-100/80 p-8 rounded-2xl text-center">
                    <p class="text-gray-700 italic text-lg">En Clínica Montefiori, cada detalle refleja nuestro compromiso: ofrecerte un
                        servicio hospitalario <strong class="font-semibold not-italic">humano, confiable y accesible</strong>, porque
                        creemos que el bienestar de una persona es el bienestar de una familia.</p>
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