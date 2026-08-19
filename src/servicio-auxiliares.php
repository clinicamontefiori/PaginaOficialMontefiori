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
                
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-14 items-center mb-20 md:mb-28">
                <div class="text-center lg:text-left md:px-0 px-4">
                    <h1 class="title-section mb-6 text-left md:text-center">Servicios Auxiliares</h1>
                    <p class="text-gray-600 leading-relaxed text-left">En Clínica Montefiori sabemos que un diagnóstico confiable es clave para cuidar tu salud con la confianza, calidez y rapidez que nos caracteriza. Por eso, contamos con servicios auxiliares de alta calidad, respaldados por tecnología moderna y aliados estratégicos de primer nivel:</p>
                </div>
                <div class="flex gap-4 md:gap-6 justify-center">
                    <div class=""><img alt="Servicios Auxiliares" class="rounded-2xl shadow-lg object-cover"
                            src="uploads/img/SERV. AUXILIARES.webp" width="531" height="273" style="height: 273px;"></div>
                   
                </div>
            </div>
            </div>
        </section>

        <section class="bg-white mb-12">
            <div class="container-med mx-auto md:px-4 px-7">
                <header class="mb-12">
                    <div class="relative px-6 mx-auto">
                        <p class="text-slate-600 text-center text-base md:text-lg leading-relaxed"><span
                                class="text-5xl text-amber-400 font-thin absolute left-0 top-0">
                                <svg width="17" height="51" viewBox="0 0 17 51" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect x="4" width="50" height="4" rx="2" transform="rotate(90 4 0)" fill="#FDB733"/>
                                    <rect x="17" y="4" width="17" height="4" rx="2" transform="rotate(-180 17 4)" fill="#FDB733"/>
                                    <rect x="17" y="51" width="17" height="4" rx="2" transform="rotate(-180 17 51)" fill="#FDB733"/>
                                </svg>

                            </span>Todos estos servicios complementan nuestras atenciones médicas, asegurando decisiones rápidas y tratamientos efectivos en beneficio de cada paciente.<span
                                class="text-5xl text-amber-400 font-thin absolute right-0 top-0">
                                <svg width="17" height="51" viewBox="0 0 17 51" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect width="50" height="4" rx="2" transform="matrix(4.37114e-08 1 1 -4.37114e-08 13 0)" fill="#FDB733"/>
                                <rect width="17" height="4" rx="2" transform="matrix(1 -8.74228e-08 -8.74228e-08 -1 0 4)" fill="#FDB733"/>
                                <rect width="17" height="4" rx="2" transform="matrix(1 -8.74228e-08 -8.74228e-08 -1 0 51)" fill="#FDB733"/>
                                </svg>

                            </span></p>
                    </div>
                </header>

                    <main>
          <div class="space-y-4">


            <!-- Item: Integrales -->
            <div class="transition-all duration-300 ease-in-out border bg-white rounded-4xl border-slate-200">
              <div class="flex items-center justify-between w-full cursor-pointer accordion-header p-3 pl-6 pr-4" role="button" aria-expanded="false">
                <h2 class="text-lg font-medium text-slate-700">Integrales</h2>
                <div class="flex-shrink-0 h-10 w-10 flex items-center justify-center bg-slate-100 rounded-full">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5 text-slate-500 plus-icon"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m6-6H6"></path></svg>
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5 text-slate-500 minus-icon" style="display: none;"><path stroke-linecap="round" stroke-linejoin="round" d="M18 12H6"></path></svg>
                </div>
              </div>
              <div class="overflow-hidden transition-all duration-500 ease-in-out max-h-0">
                <div class="px-6 pb-6 pt-0">
                  <ul class="space-y-1">
                    <li class="p-3 text-slate-600 rounded-lg flex items-center hover:bg-slate-100"><span class="text-slate-400 mr-3 text-xs">&#x25CF;</span>Laboratorio clínico</li>
                    <li class="p-3 text-slate-600 rounded-lg flex items-center hover:bg-slate-100"><span class="text-slate-400 mr-3 text-xs">&#x25CF;</span>Resonancia Magnética</li>
                    <li class="p-3 text-slate-600 rounded-lg flex items-center hover:bg-slate-100"><span class="text-slate-400 mr-3 text-xs">&#x25CF;</span>Tomografía</li>
                    <li class="p-3 text-slate-600 rounded-lg flex items-center hover:bg-slate-100"><span class="text-slate-400 mr-3 text-xs">&#x25CF;</span>Ecografía</li>
                    <li class="p-3 text-slate-600 rounded-lg flex items-center hover:bg-slate-100"><span class="text-slate-400 mr-3 text-xs">&#x25CF;</span>Rayos X</li>
                  </ul>
                </div>
              </div>
            </div>

            

            <!-- Item: Ginecología (Open by default) -->
            <div class="transition-all duration-300 ease-in-out border bg-slate-50 rounded-4xl border-slate-200 shadow-sm open">
              <div class="flex items-center justify-between w-full cursor-pointer accordion-header p-6" role="button" aria-expanded="false">
                <h2 class="text-lg font-medium text-slate-700">Ginecología</h2>
                <div class="flex-shrink-0 h-10 w-10 flex items-center justify-center bg-slate-100 rounded-full">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5 text-slate-500 plus-icon" style="display: none;"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m6-6H6"></path></svg>
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5 text-slate-500 minus-icon"><path stroke-linecap="round" stroke-linejoin="round" d="M18 12H6"></path></svg>
                </div>
              </div>
              <div class="overflow-hidden transition-all duration-500 ease-in-out max-h-[500px]">
                <div class="px-6 pb-6 pt-0">
                  <ul class="space-y-1">
                    <li class="p-3 text-slate-600 rounded-lg flex items-center hover:bg-slate-100"><span class="text-slate-400 mr-3 text-xs">&#x25CF;</span>Mamografía</li>
                    <li class="p-3 text-slate-600 rounded-lg flex items-center hover:bg-slate-100"><span class="text-slate-400 mr-3 text-xs">&#x25CF;</span>Ecografía core de mama</li>
                    <li class="p-3 text-slate-600 rounded-lg flex items-center hover:bg-slate-100"><span class="text-slate-400 mr-3 text-xs">&#x25CF;</span>Histerosonografías</li>
                    <li class="p-3 text-slate-600 rounded-lg flex items-center hover:bg-slate-100"><span class="text-slate-400 mr-3 text-xs">&#x25CF;</span>Papanicolau </li>
                    <li class="p-3 text-slate-600 rounded-lg flex items-center hover:bg-slate-100"><span class="text-slate-400 mr-3 text-xs">&#x25CF;</span>Ecografías 3D </li>
                  </ul>
                </div>
              </div>
            </div>

            

            <!-- Item: Cardiología -->
            <div class="transition-all duration-300 ease-in-out border bg-white rounded-4xl border-slate-200">
              <div class="flex items-center justify-between w-full cursor-pointer accordion-header p-3 pl-6 pr-4" role="button" aria-expanded="false">
                <h2 class="text-lg font-medium text-slate-700">Cardiología</h2>
                <div class="flex-shrink-0 h-10 w-10 flex items-center justify-center bg-slate-100 rounded-full">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5 text-slate-500 plus-icon"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m6-6H6"></path></svg>
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5 text-slate-500 minus-icon" style="display: none;"><path stroke-linecap="round" stroke-linejoin="round" d="M18 12H6"></path></svg>
                </div>
              </div>
              <div class="overflow-hidden transition-all duration-500 ease-in-out max-h-0">
                <div class="px-6 pb-6 pt-0">
                  <ul class="space-y-1">
                    <li class="p-3 text-slate-600 rounded-lg flex items-center hover:bg-slate-100"><span class="text-slate-400 mr-3 text-xs">&#x25CF;</span>Prueba de Esfuerzo</li>
                    <li class="p-3 text-slate-600 rounded-lg flex items-center hover:bg-slate-100"><span class="text-slate-400 mr-3 text-xs">&#x25CF;</span>Ecodoppler cardíaco y vascular (descarte de varices)</li>
                  </ul>
                </div>
              </div>
            </div>

            <!-- Item: Neurología -->
            <div class="transition-all duration-300 ease-in-out border bg-white rounded-4xl border-slate-200">
                <div class="flex items-center justify-between w-full cursor-pointer accordion-header p-3 pl-6 pr-4" role="button" aria-expanded="false">
                    <h2 class="text-lg font-medium text-slate-700">Neurología</h2>
                    <div class="flex-shrink-0 h-10 w-10 flex items-center justify-center bg-slate-100 rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5 text-slate-500 plus-icon"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m6-6H6"></path></svg>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5 text-slate-500 minus-icon" style="display: none;"><path stroke-linecap="round" stroke-linejoin="round" d="M18 12H6"></path></svg>
                    </div>
                </div>
                <div class="overflow-hidden transition-all duration-500 ease-in-out max-h-0">
                    <div class="px-6 pb-6 pt-0">
                        <ul class="space-y-1">
                            <li class="p-3 text-slate-600 rounded-lg flex items-center hover:bg-slate-100"><span class="text-slate-400 mr-3 text-xs">&#x25CF;</span>Electroencefalogramas</li>
                            <li class="p-3 text-slate-600 rounded-lg flex items-center hover:bg-slate-100"><span class="text-slate-400 mr-3 text-xs">&#x25CF;</span>Electromiografías</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Item: Gastroenterología -->
            <div class="transition-all duration-300 ease-in-out border bg-white rounded-4xl border-slate-200">
                <div class="flex items-center justify-between w-full cursor-pointer accordion-header p-3 pl-6 pr-4" role="button" aria-expanded="false">
                    <h2 class="text-lg font-medium text-slate-700">Gastroenterología</h2>
                    <div class="flex-shrink-0 h-10 w-10 flex items-center justify-center bg-slate-100 rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5 text-slate-500 plus-icon"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m6-6H6"></path></svg>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5 text-slate-500 minus-icon" style="display: none;"><path stroke-linecap="round" stroke-linejoin="round" d="M18 12H6"></path></svg>
                    </div>
                </div>
                <div class="overflow-hidden transition-all duration-500 ease-in-out max-h-0">
                    <div class="px-6 pb-6 pt-0">
                        <ul class="space-y-1">
                            <li class="p-3 text-slate-600 rounded-lg flex items-center hover:bg-slate-100"><span class="text-slate-400 mr-3 text-xs">&#x25CF;</span>Endoscopía, Colonoscopía</li>
                            <li class="p-3 text-slate-600 rounded-lg flex items-center hover:bg-slate-100"><span class="text-slate-400 mr-3 text-xs">&#x25CF;</span>Colposcopías</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Item: Traumatología -->
            <div class="transition-all duration-300 ease-in-out border bg-white rounded-4xl border-slate-200">
                <div class="flex items-center justify-between w-full cursor-pointer accordion-header p-3 pl-6 pr-4" role="button" aria-expanded="false">
                    <h2 class="text-lg font-medium text-slate-700">Traumatología</h2>
                    <div class="flex-shrink-0 h-10 w-10 flex items-center justify-center bg-slate-100 rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5 text-slate-500 plus-icon"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m6-6H6"></path></svg>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5 text-slate-500 minus-icon" style="display: none;"><path stroke-linecap="round" stroke-linejoin="round" d="M18 12H6"></path></svg>
                    </div>
                </div>
                <div class="overflow-hidden transition-all duration-500 ease-in-out max-h-0">
                    <div class="px-6 pb-6 pt-0">
                        <ul class="space-y-1">
                            <li class="p-3 text-slate-600 rounded-lg flex items-center hover:bg-slate-100"><span class="text-slate-400 mr-3 text-xs">&#x25CF;</span>Ecografía de partes blandas</li>
                            <li class="p-3 text-slate-600 rounded-lg flex items-center hover:bg-slate-100"><span class="text-slate-400 mr-3 text-xs">&#x25CF;</span>Densitometría ósea</li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <!-- Item: Oftalmología -->
            <div class="transition-all duration-300 ease-in-out border bg-white rounded-4xl border-slate-200">
                <div class="flex items-center justify-between w-full cursor-pointer accordion-header p-3 pl-6 pr-4" role="button" aria-expanded="false">
                    <h2 class="text-lg font-medium text-slate-700">Oftalmología</h2>
                    <div class="flex-shrink-0 h-10 w-10 flex items-center justify-center bg-slate-100 rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5 text-slate-500 plus-icon"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m6-6H6"></path></svg>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5 text-slate-500 minus-icon" style="display: none;"><path stroke-linecap="round" stroke-linejoin="round" d="M18 12H6"></path></svg>
                    </div>
                </div>
                <div class="overflow-hidden transition-all duration-500 ease-in-out max-h-0">
                    <div class="px-6 pb-6 pt-0">
                        <ul class="space-y-1">
                           <li class="p-3 text-slate-600 rounded-lg flex items-center hover:bg-slate-100"><span class="text-slate-400 mr-3 text-xs">&#x25CF;</span>Fondo de Ojo</li>
                            <li class="p-3 text-slate-600 rounded-lg flex items-center hover:bg-slate-100"><span class="text-slate-400 mr-3 text-xs">&#x25CF;</span>Medida de Vista</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Item: Neumología -->
            <div class="transition-all duration-300 ease-in-out border bg-white rounded-4xl border-slate-200">
                <div class="flex items-center justify-between w-full cursor-pointer accordion-header p-3 pl-6 pr-4" role="button" aria-expanded="false">
                    <h2 class="text-lg font-medium text-slate-700">Neumología</h2>
                    <div class="flex-shrink-0 h-10 w-10 flex items-center justify-center bg-slate-100 rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5 text-slate-500 plus-icon"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m6-6H6"></path></svg>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5 text-slate-500 minus-icon" style="display: none;"><path stroke-linecap="round" stroke-linejoin="round" d="M18 12H6"></path></svg>
                    </div>
                </div>
                <div class="overflow-hidden transition-all duration-500 ease-in-out max-h-0">
                    <div class="px-6 pb-6 pt-0">
                        <ul class="space-y-1">
                            <li class="p-3 text-slate-600 rounded-lg flex items-center hover:bg-slate-100"><span class="text-slate-400 mr-3 text-xs">&#x25CF;</span>Broncoscopías</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Item: Otorrinolaringólogo -->
            <div class="transition-all duration-300 ease-in-out border bg-white rounded-4xl border-slate-200">
                <div class="flex items-center justify-between w-full cursor-pointer accordion-header p-3 pl-6 pr-4" role="button" aria-expanded="false">
                    <h2 class="text-lg font-medium text-slate-700">Otorrinolaringólogo</h2>
                    <div class="flex-shrink-0 h-10 w-10 flex items-center justify-center bg-slate-100 rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5 text-slate-500 plus-icon"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m6-6H6"></path></svg>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5 text-slate-500 minus-icon" style="display: none;"><path stroke-linecap="round" stroke-linejoin="round" d="M18 12H6"></path></svg>
                    </div>
                </div>
                <div class="overflow-hidden transition-all duration-500 ease-in-out max-h-0">
                    <div class="px-6 pb-6 pt-0">
                        <ul class="space-y-1">
                            <li class="p-3 text-slate-600 rounded-lg flex items-center hover:bg-slate-100"><span class="text-slate-400 mr-3 text-xs">&#x25CF;</span>Audiometría</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Item: Audiometría -->
           <!--  <div class="transition-all duration-300 ease-in-out border bg-white rounded-4xl border-slate-200">
                <div class="flex items-center justify-between w-full cursor-pointer accordion-header p-3 pl-6 pr-4" role="button" aria-expanded="false">
                    <h2 class="text-lg font-medium text-slate-700">Audiometría</h2>
                    <div class="flex-shrink-0 h-10 w-10 flex items-center justify-center bg-slate-100 rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5 text-slate-500 plus-icon"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m6-6H6"></path></svg>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5 text-slate-500 minus-icon" style="display: none;"><path stroke-linecap="round" stroke-linejoin="round" d="M18 12H6"></path></svg>
                    </div>
                </div>
                <div class="overflow-hidden transition-all duration-500 ease-in-out max-h-0">
                    <div class="px-6 pb-6 pt-0">
                        <ul class="space-y-1">
                            <li class="p-3 text-slate-600 rounded-lg flex items-center hover:bg-slate-100"><span class="text-slate-400 mr-3 text-xs">&#x25CF;</span>Chequeo General</li>
                            <li class="p-3 text-slate-600 rounded-lg flex items-center hover:bg-slate-100"><span class="text-slate-400 mr-3 text-xs">&#x25CF;</span>Análisis de Sangre</li>
                            <li class="p-3 text-slate-600 rounded-lg flex items-center hover:bg-slate-100"><span class="text-slate-400 mr-3 text-xs">&#x25CF;</span>Consulta Médica</li>
                        </ul>
                    </div>
                </div>
            </div> -->

          </div>
        </main>
                </div>
                </section>


                <script>
                    document.addEventListener('DOMContentLoaded', () => {
                    const accordionHeaders = document.querySelectorAll('.accordion-header');

                    const toggleAccordion = (clickedHeader) => {
                        const clickedItem = clickedHeader.parentElement;
                        const wasOpen = clickedItem.classList.contains('open');

                        // First, close all accordion items
                        accordionHeaders.forEach(header => {
                            const item = header.parentElement;
                            const content = header.nextElementSibling;
                            const plusIcon = header.querySelector('.plus-icon');
                            const minusIcon = header.querySelector('.minus-icon');

                            if (item.classList.contains('open')) {
                                item.classList.remove('open', 'bg-slate-50', 'shadow-sm');
                                item.classList.add('bg-white');

                                header.classList.remove('p-6');
                                header.classList.add('p-3', 'pl-6', 'pr-4');
                                header.setAttribute('aria-expanded', 'false');

                                content.classList.remove('max-h-[500px]');
                                content.classList.add('max-h-0');

                                if (plusIcon) plusIcon.style.display = 'block';
                                if (minusIcon) minusIcon.style.display = 'none';
                            }
                        });

                        // If the clicked item was not already open, then open it
                        if (!wasOpen) {
                            const content = clickedHeader.nextElementSibling;
                            const plusIcon = clickedHeader.querySelector('.plus-icon');
                            const minusIcon = clickedHeader.querySelector('.minus-icon');

                            clickedItem.classList.add('open', 'bg-slate-50',  'shadow-sm');
                            clickedItem.classList.remove('bg-white');

                            clickedHeader.classList.add('p-6');
                            clickedHeader.classList.remove('p-3', 'pl-6', 'pr-4');
                            clickedHeader.setAttribute('aria-expanded', 'true');

                            content.classList.add('max-h-[500px]');
                            content.classList.remove('max-h-0');
                            
                            if (plusIcon) plusIcon.style.display = 'none';
                            if (minusIcon) minusIcon.style.display = 'block';
                        }
                    };

                    accordionHeaders.forEach(header => {
                        header.addEventListener('click', () => toggleAccordion(header));
                    });
                });
            </script>



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
      <?php include('vista/footer.php')?>
    </footer>

    <!-- Floating WhatsApp Button -->
    <?php include('vista/whatsapp.php')?>
    <?php include('vista/script.php')?>


</body>
</html>