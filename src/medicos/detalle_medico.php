<?php 
include ('../cms/php/var.php');
include ('../cms/modelo/function.php');
?>

<?php

if (!isset($_GET['urlMedico'])) {
    echo json_encode([
        'isError' => true,
        'message' => 'ID no proporcionado',
        'result' => []
    ]);
    exit;
}

//$id = $_GET['urlMedico'];
$id = isset($_GET['urlMedico']) && $_GET['urlMedico'] !== '' ? $_GET['urlMedico'] : null;


// Llamar a la API
$response = getData("medicosdetalle-web", ['urlMedico' => $id]);
$detalle = $response->result[0];

$img_medico = !empty($detalle->imgMedico) ? $detalle->imgMedico : '../img/avatar-medico.webp';

#SEO
$mtitle = $detalle->medico. ' - ' .$detalle->especialidad. ' | Clínica Montefiori' ;
$mdescription = 'Conoce la trayectoria y experiencia del Dr(a). '.$detalle->medico.' especialista en '.$detalle->especialidad.' en la Clínica Montefiori. Agenda tu cita y recibe atención médica de calidad.';
$canonical = canonical_url();
$imgpage = $img_medico;

$tipo_pagina = "medico";

?>

<!DOCTYPE html>
<html lang="es">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
    <?php include('../vista/head.php');?>
    <style>
        .tags-atiende {
  display: flex;
  flex-wrap: wrap;
  gap: 8px;
}

.tag {
  background: #FDB733;
  color: #fff;
  padding: 6px 12px;
  border-radius: 20px;
  font-size: 13px;
  font-weight: 500;
  white-space: nowrap;
}

    </style>
</head>

<body>
    <!-- Header -->
    <header class="header-site backdrop-blur-md fixed top-0 left-0 right-0  z-50 ">
        <?php include('../vista/header.php')?>
    </header>

    <main>
        <!-- Hero Section -->
        <section class="hero-section relative md:pt-28 pt-20 pb-12 overflow-hidden mb-12">
            <div class="container mx-auto px-4 z-10 relative">
                <section class="bg-white rounded-4xl p-6 md:p-8 border border-slate-200/50">
            <div class="flex flex-col md:flex-row items-center md:items-start md:space-x-16 mx-auto max-w-[850px]">
                <div class="flex-shrink-0 mb-6 md:mb-0">
                    <img class="w-32 h-32 md:w-[255px] md:h-[255px] rounded-full object-cover" src="<?php echo $img_medico;  ?>" alt="Dra. Rodriguez Garcia Xiomara">
                </div>
                <div class="w-full text-center md:text-left">
                    <h1 class="text-2xl md:text-[25px] font-extrabold"><?php echo "{$detalle->medico}"; ?></h1>
                    <p class="text-slate-500 text-base font-semibold md:text-xl mt-1 mb-6"><?php echo "{$detalle->especialidad}"; ?></p>
                    <p class="text-slate-500 text-base font-semibold md:text-xl mt-1 mb-6">CMP: <?php echo "{$detalle->cmp}"; ?> | RNE: <?php echo "{$detalle->rne}"; ?></p>
                    

                    <a href="https://citas.montefiori.com.pe/home" target="_blank" class="bg-orange-400 text-white font-semibold py-2 px-4 rounded-full hover:bg-orange-500 transition-colors inline-flex items-center space-x-2">
                    <svg width="14" height="15" viewBox="0 0 14 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0_578_768)">
                            <path d="M12.306 14.7143C13.0592 14.5894 13.6461 13.9671 13.7234 13.1442C13.7056 9.5974 13.7764 6.03977 13.6874 2.49905C13.6062 1.87348 12.8826 1.14964 12.2926 1.14964H11.475V0H10.4025V1.14964H3.32464V0H2.25216V1.14964H1.43454C0.752912 1.14964 0.0699387 1.97678 9.72748e-05 2.6729V13.1914C0.065238 13.5294 0.1653 13.8296 0.374825 14.0973C0.646134 14.4443 1.00911 14.6322 1.42111 14.7146H12.306V14.7143ZM11.4746 2.29929H12.212C12.3715 2.29929 12.6542 2.60236 12.6542 2.77333V4.25339H1.07224V2.77333C1.07224 2.60199 1.35496 2.29929 1.51446 2.29929H2.25183V3.44893H3.3243V2.29929H10.4025V3.44893H11.475V2.29929H11.4746ZM1.07257 5.40304H12.6542V13.0906C12.6542 13.2979 12.3369 13.5934 12.1324 13.5657H1.6209C1.40701 13.6064 1.07257 13.308 1.07257 13.0906V5.40304Z" fill="white"></path>
                            <path d="M10.617 6.60986H11.6895V7.75951H10.617V6.60986Z" fill="white"></path>
                            <path d="M8.47245 6.60986H9.54492V7.75951H8.47245V6.60986Z" fill="white"></path>
                            <path d="M6.32694 6.60986H7.39941V7.75951H6.32694V6.60986Z" fill="white"></path>
                            <path d="M4.18241 6.60986H5.25488V7.75951H4.18241V6.60986Z" fill="white"></path>
                            <path d="M2.03788 6.60986H3.11035V7.75951H2.03788V6.60986Z" fill="white"></path>
                            <path d="M10.617 8.90918H11.6895V10.0588H10.617V8.90918Z" fill="white"></path>
                            <path d="M8.47245 8.90918H9.54492V10.0588H8.47245V8.90918Z" fill="white"></path>
                            <path d="M6.32694 8.90918H7.39941V10.0588H6.32694V8.90918Z" fill="white"></path>
                            <path d="M4.18241 8.90918H5.25488V10.0588H4.18241V8.90918Z" fill="white"></path>
                            <path d="M2.03788 8.90918H3.11035V10.0588H2.03788V8.90918Z" fill="white"></path>
                            <path d="M10.617 11.208H11.6895V12.3577H10.617V11.208Z" fill="white"></path>
                            <path d="M8.47245 11.208H9.54492V12.3577H8.47245V11.208Z" fill="white"></path>
                            <path d="M6.32694 11.208H7.39941V12.3577H6.32694V11.208Z" fill="white"></path>
                            <path d="M4.18241 11.208H5.25488V12.3577H4.18241V11.208Z" fill="white"></path>
                        </g>
                        <defs>
                            <clipPath id="clip0_578_768">
                                <rect width="13.7333" height="14.7143" fill="white" transform="matrix(-1 0 0 1 13.7334 0)"></rect>
                            </clipPath>
                        </defs>
                    </svg>

                    <span>Agendar Cita</span>
                </a>
                    
                    <div class="pt-12 grid grid-cols-1 gap-x-8 gap-y-5 text-sm">
                        <div class="flex items-center space-x-3 justify-center sm:justify-start">
                            <svg width="19" height="21" viewBox="0 0 19 21" fill="none">
                                <g clip-path="url(#clip0_583_3780)">
                                <path d="M11.129 1.53694C12.341 1.70176 13.472 2.23071 14.0739 3.17889C14.7113 4.18312 14.6607 5.39194 14.3926 6.48098C15.1388 6.75455 15.1877 7.53264 15.1016 8.14687C14.9972 8.89143 14.4087 9.20669 13.5658 9.14009C13.5336 10.312 12.6841 11.5414 11.4654 12.0613L12.1284 13.3707C14.3037 13.7483 16.4147 13.8829 17.5379 15.7773C18.0054 16.566 18.6056 18.9223 18.7117 19.8331C18.7533 20.1934 18.6256 20.3654 18.1931 20.3797H0.57577C0.248741 20.3563 0.0233195 20.2949 0 19.9778C0.599089 18.0666 0.460283 15.7562 2.49352 14.4765C3.70947 13.7114 5.22412 13.6654 6.64217 13.3721L7.30067 12.1284C6.08695 11.4609 5.24411 10.4088 5.14417 9.14344C4.5101 9.22154 3.7772 8.92209 3.66449 8.34044C3.61841 8.10232 3.61785 7.4052 3.66449 7.16803C3.71724 6.90021 3.96043 6.68221 4.19918 6.52745C4.1009 5.41877 4.19529 4.19079 4.84102 3.21051C5.92093 1.5724 8.94581 0.132166 11.1023 0.00807364C12.9279 -0.0973326 11.5804 0.920317 11.1295 1.53694H11.129ZM10.7414 0.772748C8.2068 1.20683 5.36793 2.59053 5.04367 5.01008C4.98538 5.4432 4.93763 5.9755 5.03313 6.39378C5.48008 6.6616 6.80818 5.62575 7.02195 5.28366C7.19129 5.01295 7.14909 4.45909 7.61215 4.45765C7.78094 4.45765 8.37004 4.99523 8.55493 5.12219C9.556 5.81069 10.888 6.49104 12.2072 6.5126C12.6336 6.51978 13.0511 6.37749 13.4831 6.41438L13.5953 6.3679C14.1427 4.71494 13.6947 2.84542 11.5598 2.33659C11.2245 2.25658 10.3344 2.23933 10.1618 2.0611C9.77087 1.65816 10.5521 1.11005 10.7414 0.772269V0.772748ZM12.7075 7.18001H11.5998C11.3494 7.18001 10.4988 6.92752 10.2284 6.83409C9.35501 6.53176 8.53938 6.03492 7.83258 5.50741L7.14188 6.2486L5.987 6.97303C5.987 8.65426 5.61611 10.3475 7.5 11.39C9.76365 12.6429 12.5886 11.3421 12.7902 9.06918C12.8285 8.63893 12.8502 7.76022 12.7935 7.34579C12.7841 7.27631 12.7869 7.22265 12.7075 7.18097V7.18001ZM5.1475 8.42333V7.15605C5.1475 7.03053 4.65724 7.08179 4.53564 7.20157C4.37185 7.36208 4.36463 8.26378 4.57562 8.37925L5.1475 8.42333ZM13.6214 8.42333C14.4098 8.56035 14.3454 7.93414 14.2893 7.44017C14.2515 7.10814 13.9628 7.07796 13.6214 7.08467V8.42333ZM11.0684 14.5393L11.3494 13.6639L10.6864 12.4125C9.79197 12.6319 8.91971 12.6468 8.03079 12.3933C7.95806 12.7244 7.3945 13.432 7.3784 13.7147C7.37452 13.7861 7.66101 14.5129 7.70376 14.5359L11.0679 14.5393H11.0684ZM0.937777 19.6606H8.80256L6.61608 14.1095L3.76221 14.6399L3.98208 15.2388C5.11808 15.3116 5.84931 15.8698 6.1719 16.7911C6.27517 17.0863 6.52835 17.7527 5.94203 17.781C5.47564 17.8035 5.45177 17.0542 5.28742 16.7418C5.08365 16.3566 4.73775 16.0389 4.22916 15.9824C3.84106 15.9393 3.75944 15.9963 3.58676 16.2804C3.30582 16.7428 3.41409 17.2784 3.62563 17.7465C3.77332 18.0733 4.31022 18.5672 4.09868 18.8744C3.67893 19.4848 3.03875 18.3555 2.9055 18.0814C2.56737 17.3872 2.43855 16.6345 2.86663 15.9455C2.93881 15.8296 3.20143 15.5948 3.20976 15.5224C3.21754 15.4597 3.04486 15.0141 3.01543 15.0218C1.29423 16.0648 1.40084 18.0651 0.937777 19.6596V19.6606ZM9.96576 19.6606H17.8305C17.574 18.7752 17.4524 17.8222 17.1837 16.9435C16.7995 15.6853 15.8095 14.7247 14.286 14.4966L14.3498 15.9474C15.8378 16.7519 14.7846 18.744 13.1383 18.2366C11.6359 17.7733 11.9957 15.8985 13.5597 15.7836C13.5836 15.2977 13.5658 14.7808 13.3421 14.3309L12.1522 14.11L9.9652 19.6615L9.96576 19.6606ZM10.7414 15.2134H7.97194L9.38443 18.848L10.7414 15.2134ZM14.1011 16.6642C13.5414 16.1573 12.6369 16.8563 13.1217 17.39C13.6686 17.9918 14.6918 17.1998 14.1011 16.6642Z" fill="#5C6671"/>
                                </g>
                                <defs>
                                <clipPath id="clip0_583_3780">
                                <rect width="18.7189" height="20.3793" fill="white"/>
                                </clipPath>
                                </defs>
                            </svg>

                            <div class="text-left">
                                <p class="text-xl">Especialidad  <span class="font-semibold"><?php echo "{$detalle->especialidad}"; ?></span></p>
                            </div>
                        </div>
                        <div class="flex items-center space-x-3 justify-center sm:justify-start">
                            <svg width="11" height="17" viewBox="0 0 11 17" fill="none">
                                <g clip-path="url(#clip0_592_231)">
                                <path d="M10.8724 2.41597C8.10768 -0.0805325 8.2634 0.0536883 8.21235 0.0268441C8.18682 0 8.13576 0 8.11024 0C8.08471 0 8.41912 0 0.336969 0C0.155721 0 0 0.161065 0 0.348974V15.7844C0 15.9723 0.155721 16.1333 0.336969 16.1333H10.6656C10.8468 16.1333 11 15.9723 11 15.7844V2.65757C11 2.55019 10.9489 2.46966 10.8698 2.41597H10.8724ZM8.41912 1.04692L9.81295 2.3086H8.41912V1.04692ZM0.671386 15.4085V0.64426H7.77327V2.65757C7.77327 2.84548 7.92899 3.00654 8.11024 3.00654H10.3822V15.4085H0.671386Z" fill="#5C6671"/>
                                <path d="M8.72805 6.01318H2.27203C2.09078 6.01318 1.93506 6.17425 1.93506 6.36216C1.93506 6.55007 2.09078 6.71113 2.27203 6.71113H8.72805C8.9093 6.71113 9.06247 6.55007 9.06247 6.36216C9.06247 6.17425 8.90675 6.01318 8.72805 6.01318Z" fill="#5C6671"/>
                                <path d="M8.41911 9.04658C8.60036 9.04658 8.75352 8.88552 8.75352 8.69761C8.75352 8.5097 8.5978 8.34863 8.41911 8.34863H2.60894C2.42769 8.34863 2.27197 8.5097 2.27197 8.69761C2.27197 8.88552 2.42769 9.04658 2.60894 9.04658H8.41911Z" fill="#5C6671"/>
                                <path d="M8.72805 10.7109H2.27203C2.09078 10.7109 1.93506 10.872 1.93506 11.0599C1.93506 11.2478 2.09078 11.382 2.27203 11.382H8.72805C8.9093 11.382 9.06247 11.221 9.06247 11.0331C9.06247 10.8452 8.90675 10.7109 8.72805 10.7109Z" fill="#5C6671"/>
                                <path d="M7.12718 13.073H3.90045C3.7192 13.073 3.56348 13.2341 3.56348 13.422C3.56348 13.6099 3.7192 13.7709 3.90045 13.7709H7.12718C7.30843 13.7709 7.46415 13.6099 7.46415 13.422C7.43862 13.2072 7.2829 13.073 7.12718 13.073Z" fill="#5C6671"/>
                                </g>
                                <defs>
                                <clipPath id="clip0_592_231">
                                <rect width="11" height="16.1333" fill="white"/>
                                </clipPath>
                                </defs>
                            </svg>

                            <div class="text-left">
                                <p class="text-xl">Tipo de Atención  <span class="font-semibold">PRESENCIAL</span></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
            </div>
        </section>

        <?php if(       (isset($detalle->facultad) && !empty($detalle->facultad)) && 
                        (isset($detalle->residencia) && !empty($detalle->residencia)) && 
                        (isset($detalle->areaexperiencia) && !empty($detalle->areaexperiencia)) &&
                        (isset($detalle->atiendoa) && !empty($detalle->atiendoa))  ) { ?>

        <section class="bg-white mb-16 pt-4">         


            <div class="max-w-3xl mx-auto p-8 md:p-10 border rounded-3xl space-y-10">
                <p class="text-2xl md:text-[25px] font-extrabold">Formación</p>
                

                <?php if(isset($detalle->facultad) && !empty($detalle->facultad)) { ?>
                <!-- Bloque 1 -->
                <div>
                    <h3 class="text-lg md:text-xl font-semibold mb-4">Universidad</h3>
                    <ul class="space-y-3">
                        <li class="flex items-start gap-3">
                            <span class="w-2.5 h-2.5 mt-2 rounded-full bg-yellow-500"></span>
                            <?php echo "{$detalle->facultad}"; ?>
                        </li>
                    </ul>
                </div>
                <?php } ?>

                <?php if(isset($detalle->residencia) && !empty($detalle->residencia)) { ?>
                <!-- Bloque 2 -->
                <div>
                    <h3 class="text-lg md:text-xl font-semibold mb-4">Residencia</h3>
                    <ul class="space-y-3">
                        <li class="flex items-start gap-3">
                            <span class="w-2.5 h-2.5 mt-2 rounded-full bg-yellow-500"></span>
                            <?php echo "{$detalle->residencia}"; ?>
                        </li>
                    </ul>
                </div>
                <?php } ?>

                <?php if(isset($detalle->areaexperiencia) && !empty($detalle->areaexperiencia)) { ?>
                <!-- Bloque 2 -->
                <div>
                    <h3 class="text-lg md:text-xl font-semibold mb-4">Subespecialidad o Áreas de Experiencia</h3>
                    <ul class="space-y-3">
                        <li class="flex items-start gap-3">
                            <span class="w-2.5 h-2.5 mt-2 rounded-full bg-yellow-500"></span>
                            <?php echo "{$detalle->areaexperiencia}"; ?>
                        </li>
                    </ul>
                </div>
                <?php } ?>

                <?php if(isset($detalle->atiendoa) && !empty($detalle->atiendoa)) { ?>
                <!-- Bloque 2 -->
                <div>
                    <h3 class="text-lg md:text-xl font-semibold mb-4">Atiendo a</h3>
                    <?php
                            $atiende = $detalle->atiendoa; // ej: "Niños, Adultos, Adultos mayores"
                            $tags = array_map('trim', explode(',', $atiende ?? ''));

                            ?>
                            <div class="tags-atiende">
                                <?php foreach ($tags as $tag): ?>
                                    <span class="tag"><?= htmlspecialchars(ucfirst($tag)) ?></span>
                                <?php endforeach; ?>
                            </div>
                </div>
                <?php } ?>

            </div>


             
        </section>

        <?php  } ?>

        <script>
                document.addEventListener('DOMContentLoaded', () => {
                    const accordionToggles = document.querySelectorAll('.accordion-toggle');

                    // Función para cerrar todos los acordeones
                    const closeAllAccordions = () => {
                        document.querySelectorAll('.accordion-item').forEach(item => {
                            item.classList.remove('border-slate-300', 'bg-white', 'shadow-sm');
                            item.classList.add('border-slate-200', 'bg-white/50');
                            
                            const content = item.querySelector('.accordion-content');
                            content.classList.remove('open');
                            
                            const button = item.querySelector('.accordion-toggle');
                            button.setAttribute('aria-expanded', 'false');

                            item.querySelector('.plus-icon').classList.remove('hidden');
                            item.querySelector('.minus-icon').classList.add('hidden');
                        });
                    };

                    // Función para abrir un acordeón específico
                    const openAccordion = (item) => {
                        item.classList.add('border-slate-300', 'bg-white', 'shadow-sm');
                        item.classList.remove('border-slate-200', 'bg-white/50');

                        const content = item.querySelector('.accordion-content');
                        content.classList.add('open');
                        
                        const button = item.querySelector('.accordion-toggle');
                        button.setAttribute('aria-expanded', 'true');

                        item.querySelector('.plus-icon').classList.add('hidden');
                        item.querySelector('.minus-icon').classList.remove('hidden');
                    };

                    // Añadir evento de clic a cada botón del acordeón
                    accordionToggles.forEach(toggle => {
                        toggle.addEventListener('click', () => {
                            const parentItem = toggle.closest('.accordion-item');
                            const isAlreadyOpen = toggle.getAttribute('aria-expanded') === 'true';

                            closeAllAccordions();

                            if (!isAlreadyOpen) {
                                openAccordion(parentItem);
                            }
                        });
                    });
                });
            </script>

        <section class="bg-gray-site py-20 mb-12">
            <div class="container  mx-auto px-4">
                
                    <h1 class="title-section mb-10 text-center md:text-left">¿Conoces todos
                        nuestros servicios?</h1>
                    <div class="bg-white rounded-2xl overflow-hidden flex flex-col lg:flex-row w-full">
                        <div class="p-8 sm:p-12 lg:p-16 flex flex-col justify-center w-full flex-1">
                            <p class="text-slate-600 text-xl md:text-2xl leading-relaxed mb-8">Estamos preparados para brindarte una
                                atención integral y de alta complejidad.</p><a href="../servicios"
                                class="bg-orange-400 text-white font-bold py-4 px-8 rounded-full text-lg self-start hover:bg-orange-600 transition-colors duration-300 ease-in-out focus:outline-none focus:ring-2 focus:ring-orange-500 focus:ring-offset-2">Conoce
                                nuestros servicios aquí</a>
                        </div>
                        <div class="w-[395px] h-full"><img alt="Medical team attending to a patient"
                                class="w-full h-full object-cover" src="<?php echo HOST_VAR  ?>tmp/452525451.jpg"></div>
                    </div>
                
            </div>
        </section>




        <!-- Opening Hours Section -->
        <section class="py-20 pt-0">
            <?php include('../vista/horarios.php')?>
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
    
    <?php include('../vista/script.php')?>
   

</body>
</html>