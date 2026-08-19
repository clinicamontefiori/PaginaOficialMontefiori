<div class="container mx-auto md:px-4 px-7">
                <div class="flex flex-col">
                    <div class="flex gap-4 md:gap-20 text-center lg:text-left flex-row" style="z-index: 0;">
                        <div class="inline-block p-4 md:mb-6 flex-none z-10">
                            <img src="img/logo_ico.svg" class="w-[82px] h-[82px] md:w-[193px] md:h-[193px]" loading="lazy" alt="">
                        </div>
                        <div class="bg-wy-top">
                            <div class="bg-wy-top_cord"></div>
                            <h2 class="title-section font-normal  mb-4 text-left md:border-0 border-l-4 pl-3 md:pl-0 border-site ml-4 md:ml-0">¿Por qué <span class="font-bold md:inline block">elegirnos?</span></h2>
                            <p class="title-section-sub hidden md:block">Clínica Montefiori fue fundada el 6 de mayo de 1983 por profesionales de gran trayectoria con experiencia en formación de clínica.</p>
                        </div>
                    </div>
                    <div class="bg-wy-bottom">
                        <p class="title-section-sub md:hidden block mb-6 px-6">Clínica Montefiori fue fundada el 6 de mayo de 1983 por profesionales de gran trayectoria con experiencia en formación de clínica. </p>
                        
                        
                       
                        
                        <div class="flex lg:flex-row gap-8 items-center flex-col-reverse">
                       
                       
                       
                         <!-- Modal Structure -->
                        <div id="video-modal" class="fixed inset-0 z-50 flex items-center justify-center p-4 sm:p-6 transition-all duration-300 modal-enter backdrop-blur-md bg-black/80" role="dialog" aria-modal="true">
                            
                            <!-- Modal Content -->
                            <div id="modal-content" class="relative w-full max-w-5xl bg-slate-900 rounded-2xl shadow-2xl overflow-hidden border border-slate-700 transition-all duration-500 cubic-bezier(0.34, 1.56, 0.64, 1) modal-content-enter">
                                
                                <!-- Close Button -->
                                <div class="absolute top-0 right-0 z-10 p-4">
                                    <button id="close-btn" class="group bg-black/50 hover:bg-red-500/80 text-white rounded-full p-2 transition-all duration-200 backdrop-blur-sm">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 group-hover:rotate-90 transition-transform duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                        </svg>
                                    </button>
                                </div>

                                <!-- Video Wrapper (16:9) -->
                                <div class="relative aspect-video w-full bg-black">
                                    <iframe 
                                        id="youtube-iframe"
                                        class="absolute inset-0 w-full h-full" 
                                        src="" 
                                        title="YouTube video player" 
                                        frameborder="0" 
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                                        allowfullscreen>
                                    </iframe>
                                </div>
                            </div>
                        </div>
                       
                    
                        
                        <div class="max-w-100 wrap-slide">
                        

                        <section class="splide mb-6 md:mb-0" data-config='{"arrows": false, "type": "loop", "autoplay":  true, "interval": 5000}'>
                            <div class="splide__track">
                                    <ul class="splide__list">
                                        

                                        <?php
                        $jtestimonio = lista_registros_cms('jtestimonios', 'cms/json');
                        foreach ( $jtestimonio as $rtest ){
                        ?>

                                        <li class="splide__slide">
                                            <div class="flex lg:flex-row gap-8 items-center flex-col-reverse  overflow-hidden">
                                                <div class="relative  group flex-none">
                                                <span class="cursor-pointer" onclick="openModal('<?php echo $rtest->youtube; ?>')">
                                                <img src="uploads/testimonios/<?php echo $rtest->imgdesktop; ?>" alt="Patient Video" width="473" height="443" class="rounded-3xl shadow-lg">
                                                <div class="absolute inset-0 bg-black/30 rounded-3xl flex items-center justify-center">


                                                <svg width="97" height="93" viewBox="0 0 97 93" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <g clip-path="url(#clip0_52_373)">
                                                    <path d="M51.055 0L58.3673 1.03024C76.7214 4.7813 91.4878 18.98 95.3871 36.6324L96.4587 43.6648C96.3808 45.4621 96.5649 47.3069 96.4587 49.0997C94.0299 89.8326 41.0966 107.934 12.4302 77.4607C-14.6973 48.6231 5.41285 2.20571 45.4043 0H51.055ZM67.7592 44.9946L39.5034 27.5055C38.3586 26.7589 36.8315 26.9949 36.3169 28.3134L36.2603 64.3263C36.7796 65.74 38.2383 66.085 39.5034 65.2612L67.6766 47.8357C68.4626 47.1095 68.5145 45.7616 67.7568 44.9946H67.7592Z" fill="white"/>
                                                    <path d="M67.7582 44.9946C68.5159 45.7616 68.464 47.1073 67.678 47.8357L39.5048 65.2612C38.2397 66.0849 36.781 65.74 36.2617 64.3263L36.3184 28.3134C36.8329 26.9949 38.3601 26.7589 39.5048 27.5055L67.7606 44.9946H67.7582Z" fill="#FDB733"/>
                                                    </g>
                                                    <defs>
                                                    <clipPath id="clip0_52_373">
                                                    <rect width="96.4912" height="92.7236" fill="white"/>
                                                    </clipPath>
                                                    </defs>
                                                </svg>

                                                </div>
                                                </span>

                                              

                                            </div>

                                            <div>
                                                 <h3 class="title-section md:mb-8 mb-3 text-center lg:text-left">Casos de éxito</h3>
                                            
                                                <div class="item-cite relative bg-gray-50 rounded-3xl m-2">
                                                        <svg class="absolute top-7 left-9 md:w-16 md:h-16 w-10 h-10 text-orange-100" width="49" height="43" viewBox="0 0 49 43" fill="none">
                                                            <g clip-path="url(#clip0_52_404)">
                                                            <path d="M16.7317 0H17.5854L21.3415 2.91235V3.94024C14.5122 13.3625 11.0976 20.0438 11.0976 23.9841C13.4878 24.3267 15.5366 25.5259 17.0732 27.239C18.6098 28.9522 19.2927 31.1793 19.2927 33.5777C19.2927 36.1474 18.2683 38.3745 16.3902 40.259C14.5122 42.1434 12.2927 43 9.56098 43C6.82927 43 4.43902 41.9721 2.56098 40.0876C0.682927 38.2032 0 35.8048 0 32.7211C0 28.9522 1.02439 24.6693 3.41463 19.8725C5.80488 15.0757 10.2439 8.39442 16.9024 0H16.7317ZM44.561 0H45.5854L49.1707 2.91235V3.94024C42.5122 13.0199 39.0976 19.7012 38.9268 23.9841C41.3171 24.3267 43.3659 25.5259 44.9024 27.239C46.439 28.9522 47.2927 31.1793 47.2927 33.5777C47.2927 36.1474 46.2683 38.3745 44.3902 40.259C42.5122 42.1434 40.2927 43 37.561 43C34.6585 43 32.439 41.9721 30.561 40.0876C28.6829 38.2032 27.8293 35.8048 27.8293 32.7211C27.4878 25.5259 33.122 14.7331 44.3902 0L44.561 0Z" fill="#FDB733"/>
                                                            </g>
                                                            <defs>
                                                            <clipPath id="clip0_52_404">
                                                            <rect width="49" height="43" fill="white"/>
                                                            </clipPath>
                                                            </defs>
                                                        </svg>

                                                        <svg class="absolute bottom-8 right-9 md:w-16 md:h-16 w-10 h-10 text-orange-100" width="49" height="43" viewBox="0 0 49 43" fill="none">
                                                            <g clip-path="url(#clip0_52_408)">
                                                            <path d="M32.2683 43L31.4146 43L27.6585 40.0877L27.6585 39.0598C34.4878 29.6375 37.9024 22.9562 37.9024 19.0159C35.5122 18.6733 33.4634 17.4741 31.9268 15.761C30.3902 14.0478 29.7073 11.8207 29.7073 9.42231C29.7073 6.85259 30.7317 4.6255 32.6098 2.74104C34.4878 0.856578 36.7073 3.20906e-06 39.439 3.44787e-06C42.1707 3.68668e-06 44.561 1.0279 46.439 2.91236C48.3171 4.79682 49 7.19523 49 10.2789C49 14.0478 47.9756 18.3307 45.5854 23.1275C43.1951 27.9243 38.7561 34.6056 32.0976 43L32.2683 43ZM4.43902 43L3.41463 43L-0.170734 40.0876L-0.170734 39.0598C6.4878 29.9801 9.90244 23.2988 10.0732 19.0159C7.68293 18.6733 5.63415 17.4741 4.09756 15.761C2.56097 14.0478 1.70732 11.8207 1.70732 9.42231C1.70732 6.85259 2.73171 4.6255 4.60976 2.74104C6.48781 0.856576 8.70732 7.61218e-07 11.439 1.00003e-06C14.3415 1.25377e-06 16.561 1.02789 18.439 2.91236C20.3171 4.79682 21.1707 7.19522 21.1707 10.2789C21.5122 17.4741 15.878 28.2669 4.60976 43L4.43902 43Z" fill="#FDB733"/>
                                                            </g>
                                                            <defs>
                                                            <clipPath id="clip0_52_408">
                                                            <rect width="49" height="43" fill="white" transform="translate(49 43) rotate(-180)"/>
                                                            </clipPath>
                                                            </defs>
                                                            </svg>



                                                        <p class="relative text-gray-600 mb-6 z-10"><?php echo $rtest->bajada; ?></p>
                                                        <div class="flex items-center">
                                                        <img src="uploads/testimonios/<?php echo $rtest->imgdesktop; ?>" alt="<?php echo $rtest->titulo; ?>" class="w-12 h-12 rounded-full object-cover mr-4">
                                                        <div class="pr-14">
                                                            <p class="font-bold text-gray-800"><?php echo $rtest->titulo; ?></p>
                                                        </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>

                                    <?php } ?>



                                       
                                        
                                    </ul>
                            </div>
                            </section>

                    
                            
                        </div>
                        </div>
                    </div>
                </div>
            </div>









































