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
        .line-clamp-3 {
            overflow: hidden;
            display: -webkit-box;
            -webkit-box-orient: vertical;
            -webkit-line-clamp: 3;
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
       <section class="hero-section relative md:pt-28 pt-20 md:pb-10 overflow-hidden md:mb-12 pb-6 mb-6">
            <div class="container mx-auto px-4 z-10 relative">             
                <?php include('vista/slider-interno-sin-fondo-amarillo.php')?>
            </div>
        </section>

        

        <section class="bg-white mb-12">
            <h1 class="title-section text-center mb-10">Información para nuestros pacientes</h1>
            <div class="container mx-auto md:px-4 px-7">

                <div class="md:flex flex-wrap grid grid-cols-1 md:grid-cols-2 item-center justify-center md:gap-9 gap-6">
                    <!-- Action Card 1 -->
                    <div class="col">
                        <div class="item-servicio rounded-3xl text-center flex flex-col items-center justify-between transform hover:shadow-md transition-transform duration-300  h-full">
                            <div class="circle-icon bg-white p-4 flex align-center justify-center rounded-full mb-9">
                               <svg width="58" height="52" viewBox="0 0 58 52" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0_730_901)">
                                    <path d="M43.2392 9.20234V6.58599C43.2392 2.95467 39.8241 0 35.6204 0H22.3741C18.1762 0 14.7554 2.95467 14.7554 6.58599V9.20234H6.53533C2.92735 9.20234 -0.0112305 12.1175 -0.0112305 15.7094V45.4986C-0.0112305 49.0848 2.92735 52.0056 6.53533 52.0056H51.4479C55.0559 52.0056 57.9944 49.0904 57.9944 45.4986V15.7038C57.9944 12.1175 55.0615 9.1967 51.4479 9.1967H43.2278L43.2392 9.20234ZM55.3111 45.493C55.3111 47.6018 53.5866 49.3216 51.4592 49.3216H6.54667C4.425 49.3216 2.69476 47.6075 2.69476 45.493V15.7038C2.69476 13.5949 4.41933 11.8751 6.54667 11.8751H51.4592C53.5809 11.8751 55.3111 13.5892 55.3111 15.7038V45.493ZM22.3798 2.67838H35.6261C38.3434 2.67838 40.5502 4.43201 40.5502 6.58599V9.20234H36.6132V8.06897C36.6132 5.92626 34.6447 4.18391 32.2223 4.18391H25.7892C23.3669 4.18391 21.3984 5.92626 21.3984 8.06897V9.20234H17.4614V6.58599C17.4614 4.43201 19.6681 2.67838 22.3855 2.67838H22.3798ZM33.9185 9.20234H24.0874V8.06897C24.0874 7.41488 24.8646 6.86229 25.7836 6.86229H32.2167C33.1357 6.86229 33.9129 7.41488 33.9129 8.06897V9.20234H33.9185Z" fill="#FF8F30"/>
                                    <path d="M39.7273 26.389H33.7764V20.474C33.7764 20.0286 33.4134 19.6733 32.9709 19.6733H26.1123C25.6641 19.6733 25.3067 20.0342 25.3067 20.474V26.389H19.3558C18.9077 26.389 18.5503 26.7499 18.5503 27.1897V34.0069C18.5503 34.4523 18.9134 34.8076 19.3558 34.8076H25.3067V40.7226C25.3067 41.168 25.6698 41.5233 26.1123 41.5233H32.9709C33.419 41.5233 33.7764 41.1624 33.7764 40.7226V34.8076H39.7273C40.1755 34.8076 40.5329 34.4467 40.5329 34.0069V27.1897C40.5329 26.7443 40.1698 26.389 39.7273 26.389ZM38.9218 33.2062H32.9709C32.5227 33.2062 32.1653 33.5671 32.1653 34.0069V39.9219H26.9179V34.0069C26.9179 33.5614 26.5548 33.2062 26.1123 33.2062H20.1614V27.996H26.1123C26.5605 27.996 26.9179 27.6352 26.9179 27.1954V21.2804H32.1653V27.1954C32.1653 27.6408 32.5284 27.996 32.9709 27.996H38.9218V33.2062Z" fill="#FF8F30"/>
                                    </g>
                                    <defs>
                                    <clipPath id="clip0_730_901">
                                    <rect width="58" height="52" fill="white"/>
                                    </clipPath>
                                    </defs>
                                </svg>
                            </div>
                            <div class="mb-9">
                                <div class="text-xl font-bold text-white"> Programa</div>
                                <div class="md:text-3xl font-bold text-white">PROSALUD</div> 
                            </div>
                            <a href="programa-salud" class="bg-white text-gray-700 font-semibold py-3 px-8 rounded-full hover:bg-gray-100 transition-colors w-full">Ver más</a>
                        </div>
                    </div>

                    <div class="col">
                        <div class="item-servicio rounded-3xl text-center flex flex-col items-center justify-between transform hover:shadow-md transition-transform duration-300  h-full">
                            <div class="circle-icon bg-white p-4 flex align-center justify-center rounded-full mb-9">
                                <svg width="51" height="64" viewBox="0 0 51 64" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M25.0231 0C25.6944 0.18999 26.4497 0.169991 27.1523 0.286652C28.0049 0.428311 30.0285 0.626634 29.4117 1.99823C29.0159 2.87985 27.5316 2.23988 26.7961 2.14489C17.8721 0.998281 8.24564 4.57976 9.84208 15.4025C10.3418 18.789 12.4478 21.3422 13.7689 24.3737L16.5824 22.4422C14.5737 18.5707 18.141 13.9526 22.1172 16.7441C23.3294 15.2975 24.3288 13.7393 25.0825 11.9977C25.2903 11.5144 25.5212 10.2945 25.8214 9.99448C26.1694 9.64783 27.5662 9.69949 28.1435 9.59117C30.7031 9.10953 33.3847 8.09125 33.6651 5.08974C33.5166 4.55643 31.4749 3.7598 31.15 3.37316C30.5596 2.66986 31.1764 1.52159 32.161 1.84824C35.3341 2.90152 37.9629 6.87297 38.4709 10.0995C38.9343 13.0527 38.1757 14.7509 38.0124 17.4408C37.8425 20.2289 40.0294 20.5489 40.5225 22.5238C40.9909 24.3987 39.3483 25.7353 37.7518 26.2086C37.2043 28.5368 36.5215 30.8234 35.5369 32.9999C36.6304 32.9249 39.9222 33.3349 40.6116 34.1832C41.0585 34.7332 40.7188 35.6848 40.0393 35.7498C39.6616 35.7848 38.3488 35.1748 37.7683 35.0582C33.8679 34.2715 29.8735 36.7014 28.9186 40.6245C28.4898 42.3861 28.846 42.1128 29.4612 43.4527C29.6179 43.7927 30.3551 45.7459 30.459 45.8209C31.0197 46.2293 31.3545 44.3827 32.5683 44.941C33.8531 45.531 32.25 47.6125 31.2094 47.6275L32.725 51.219C34.4089 52.1756 36.5561 51.929 38.1988 51.0007C38.2928 47.4625 41.4395 46.9042 43.5686 45.1776C44.2382 44.6343 44.9985 43.1811 43.9496 42.6894C43.2734 42.3728 42.4768 43.8061 41.7231 42.8161C40.9694 41.8262 42.6698 40.6529 43.5802 40.7512C43.4202 40.0529 43.125 39.3729 42.7786 38.7496C42.4917 38.2313 41.6077 37.2597 41.5912 36.8114C41.5698 36.1731 42.1602 35.7598 42.772 35.8798C43.5488 36.0315 44.8616 38.6113 45.1205 39.3829C45.4768 40.4412 45.5708 41.1895 45.9946 42.2495C46.336 43.1061 46.3673 43.851 46.1777 44.751C49.5817 45.0343 50.2529 48.9225 50.6157 51.704C51.1138 55.5138 50.9703 59.4702 51 63.31L50.3848 64H49.7664C49.4052 63.74 49.1991 63.3917 49.1446 62.9401C48.8824 60.7285 49.4382 58.1136 49.0242 55.8754H42.5296C42.2575 55.8754 41.2877 55.5638 40.9859 55.4354C39.8744 54.9655 39.185 53.9939 38.5533 53.0122C36.9833 53.5172 35.4677 53.8922 33.8102 53.6255L37.5918 62.7434C37.7865 63.38 37.4451 63.7483 36.9025 64H36.5314L36.0317 63.6933C33.0878 57.6053 30.9653 50.8507 28.0181 44.791C26.9313 42.5545 25.1551 40.7712 22.678 40.1879C21.8929 40.0029 20.2239 40.1629 19.9254 39.4696C18.9606 37.2264 23.4415 38.3347 24.408 38.7513V34.4382C23.9924 34.0799 22.9121 33.9332 22.7307 33.3833C22.5295 32.7716 22.8066 32.05 23.4861 32.0033C23.8835 31.9767 25.8296 32.9516 26.4134 33.1583C27.8615 33.6732 29.9988 34.3165 31.5211 34.1282C33.355 33.9016 34.5111 30.9017 34.9119 29.3268C34.8607 29.1585 33.6766 28.8602 33.3913 28.7318C32.7382 28.4369 31.3496 27.4419 31.3232 26.6836C31.3001 26.0053 31.973 25.582 32.6063 25.7753C32.8355 25.8453 33.3764 26.5486 33.7211 26.7736C34.1928 27.0836 34.9547 27.4219 35.5254 27.3602C35.6853 27.2469 35.9591 25.127 36.2774 24.6837C36.6238 24.2021 37.5473 24.3154 38.0998 24.0254C39.6715 23.1971 37.9151 22.0239 37.3428 21.2406C36.7194 20.3839 36.2428 19.394 36.1603 18.3124C36.1207 17.7907 36.3632 16.5741 36.1669 16.3042C35.8239 15.8325 33.8531 15.4409 33.2495 15.3775C32.5469 15.3059 31.1929 15.6859 30.99 14.7876C30.6486 13.2793 32.3952 13.436 33.3731 13.5026C34.5095 13.581 35.6161 13.9243 36.6518 14.3759C36.9701 11.8544 36.7738 8.96287 35.2302 6.87964C34.9993 7.13963 34.9547 7.48128 34.7733 7.79126C33.1868 10.4928 30.0285 11.2227 27.1589 11.6594C26.6889 13.1293 25.9962 14.5309 25.1534 15.8175C24.7708 16.4008 23.0507 18.704 22.551 18.9357C21.2877 19.5207 21.0799 17.3591 19.3333 17.8107C16.8001 18.464 17.9002 22.4688 20.0343 23.3588C21.0172 23.7688 22.8874 23.3255 22.5262 24.9104C22.2574 26.0936 19.6566 25.302 18.8831 24.8954C18.4428 24.6637 18.0964 24.2854 17.666 24.0404L14.5671 26.1236C14.4632 26.2886 14.8524 27.6952 14.8821 28.0635C15.1509 31.32 14.1037 34.7799 13.2015 37.8647L13.3368 38.123H17.4186C17.7765 38.123 18.3867 39.4529 17.3032 39.8813C16.5066 40.1962 12.7365 39.8413 12.5452 40.0096C10.1967 46.7892 10.8151 53.7289 13.0251 60.4352C13.2312 61.0602 13.9404 62.4534 13.9915 62.9617C14.0393 63.4367 13.7458 63.745 13.3994 63.995H12.781C12.527 63.775 12.3159 63.64 12.1378 63.3317C11.6051 62.4118 10.9025 60.0035 10.5892 58.8969C8.82616 52.6623 8.72062 47.1292 10.3682 40.8712C11.549 36.3914 13.7359 31.7233 12.7777 26.9969C9.94928 28.1035 6.59642 28.3685 3.88345 26.7986C-2.38358 23.1738 -0.757448 13.5243 6.54859 12.5127C6.88174 12.466 7.75417 12.5977 7.9026 12.381C8.34294 4.65976 14.3807 0.708296 21.4872 0.114994L21.6835 0H25.0231ZM7.95373 14.3743C3.17099 14.0043 0.220539 19.2057 2.78013 23.2905C4.7328 26.407 9.11148 26.5803 12.1625 25.1837C10.4408 21.7339 7.91085 18.4307 7.95373 14.3759V14.3743ZM26.2601 35.1232V39.8096C26.2601 39.8613 27.0533 40.4496 27.1259 40.3712C27.3881 38.6913 28.376 37.1231 29.476 35.8731L26.2601 35.1215V35.1232ZM48.8956 53.9972C48.7455 51.5623 48.5031 45.1176 44.5614 46.8059C43.8176 47.1242 41.2003 48.7408 40.7353 49.3141C39.7292 50.5524 39.9849 52.5956 41.3092 53.4772C41.5566 53.6422 42.3944 53.9989 42.6484 53.9989H48.8956V53.9972Z" fill="#FF8F30"/>
                                    <path d="M24.3568 64H23.6879C23.4132 63.7726 23.1867 63.6331 22.9923 63.3144C21.4636 60.8116 20.6199 57.0445 19.0698 54.4434C18.6524 53.1223 20.2114 52.3902 20.9535 53.6563C22.4875 56.2728 23.4025 59.9228 24.9009 62.6392C25.172 63.2008 24.8527 63.6796 24.3586 63.9983L24.3568 64Z" fill="#FF8F30"/>
                                    <path d="M37.8324 42.0543C38.726 41.7692 39.2621 42.6567 38.8696 43.5528C38.351 44.7372 37.0648 45.1656 35.9191 44.9437C34.6745 44.7031 34.7192 42.9759 35.9 42.9349C36.2494 42.923 36.4744 43.1568 36.9148 42.9998C37.2994 42.8615 37.4606 42.1737 37.8308 42.056L37.8324 42.0543Z" fill="#FF8F30"/>
                                    <path d="M33.738 20.7372C32.8258 21.3661 29.6425 20.7689 29.1088 19.9702C28.7627 19.4514 29.281 18.9362 30.1165 19.0065C30.703 19.0556 31.1548 19.6763 32.1727 19.6903C32.5871 19.6962 33.0236 19.5123 33.5146 19.6646C34.0721 19.8379 34.154 20.448 33.7363 20.7361L33.738 20.7372Z" fill="#FF8F30"/>
                                </svg>
                            </div>
                            <div class="mb-9">
                                <div class="text-xl font-bold text-white">Paquete</div>
                                <div class="md:text-3xl font-bold text-white">MATERNO</div> 
                            </div>
                            <a href="servicio-paquete-materno" class="bg-white text-gray-700 font-semibold py-3 px-8 rounded-full hover:bg-gray-100 transition-colors w-full">Ver más</a>
                        </div>
                    </div>

                    <div class="col">
                        <div class="item-servicio rounded-3xl text-center flex flex-col items-center justify-between transform hover:shadow-md transition-transform duration-300  h-full">
                            <div class="circle-icon bg-white p-4 flex align-center justify-center rounded-full mb-9">
                                <img src="img/servicios/_3.svg" alt="" width="64" height="68" loading="lazy">
                            </div>
                            <div class="mb-9">
                                <div class="text-xl font-bold text-white"> Consultas</div>
                                <div class="md:text-3xl font-bold text-white">AMBULATORIAS</div> 
                            </div>
                            <a href="servicio-consultas-ambulatorias" class="bg-white text-gray-700 font-semibold py-3 px-8 rounded-full hover:bg-gray-100 transition-colors w-full">Ver más</a>
                        </div>
                    </div>

                    <div class="col">
                        <div class="item-servicio rounded-3xl text-center flex flex-col items-center justify-between transform hover:shadow-md transition-transform duration-300  h-full">
                            <div class="circle-icon bg-white p-4 flex align-center justify-center rounded-full mb-9">
                                <img src="img/servicios/_4.svg" alt="" width="64" height="68" loading="lazy">
                            </div>
                            <div class="mb-9">
                                <div class="text-xl font-bold text-white"> Servicio</div>
                                <div class="md:text-3xl font-bold text-white">HOSPITALARIO</div> 
                            </div>
                            <a href="servicio-hospitalizacion" class="bg-white text-gray-700 font-semibold py-3 px-8 rounded-full hover:bg-gray-100 transition-colors w-full">Ver más</a>
                        </div>
                    </div>

                    <div class="col">
                        <div class="item-servicio rounded-3xl text-center flex flex-col items-center justify-between transform hover:shadow-md transition-transform duration-300  h-full">
                            <div class="circle-icon bg-white p-4 flex align-center justify-center rounded-full mb-9">
                                <img src="img/servicios/_5.svg" alt="" width="64" height="68" loading="lazy">
                            </div>
                            <div class="mb-9">
                                <div class="md:text-3xl font-bold text-white">ESPECIALIDADES</div> 
                            </div>
                            <a href="especialidades" class="bg-white text-gray-700 font-semibold py-3 px-8 rounded-full hover:bg-gray-100 transition-colors w-full">Ver más</a>
                        </div>
                    </div>
                    

                </div>

            </div>
        </section>


        <div class="container mx-auto md:px-4 px-7">
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
      <?php include('vista/footer.php')?></div>
    </footer>

    <!-- Floating WhatsApp Button -->
    <?php include('vista/whatsapp.php')?>
    <?php include('vista/script.php')?>


</body>

</html>