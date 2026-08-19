<div class="container mx-auto md:px-4 px-7">
    <div class="block-rimac">
        <h2 class="title-section font-bold  mb-3">Atención de accidentes con SCTR y SOAT</h2>
        <p class="title-section-sub mb-8">Principal clínica de alta complejidad en Lima Este servicio de Emergencias para accidentes laborales y automovilísticos.</p>
        <div class="block-rimac__box flex flex-col lg:flex-row items-center bg-white overflow-hidden">
            <div class="block-rimac__info">
                
                <div class="md:px-16 px-6 p-6 space-y-4 md:text-left text-center">
                    <div class="flex items-center pb-4 border-b justify-center md:justify-start">
                        <svg width="42" height="42" viewBox="0 0 42 42" fill="none" class="flex-shrink-0">
                                <circle cx="21" cy="21" r="21" fill="#FDB733"/>
                                <path d="M30.3781 13.864C32.1178 13.5573 32.6039 15.3905 31.4825 16.7081L18.1651 29.8184C17.4299 30.3734 16.6713 30.767 15.9764 29.9354L10.7058 22.6166C9.62167 20.6992 11.8787 19.2466 13.3018 21.1692C13.9092 21.8308 16.9375 26.4501 17.2843 26.4101L29.6923 14.2635C29.8935 14.075 30.1128 13.9074 30.3753 13.8638L30.3781 13.864Z" fill="white"/>
                            </svg>
                        <span class="text-1xl md:text-2xl font-semibold ml-3">Disponibles 24/7</span>
                    </div>


                    <div class="flex items-center pb-4 border-b justify-center md:justify-start">
                        <svg width="42" height="42" viewBox="0 0 42 42" fill="none" class="flex-shrink-0">
                                <circle cx="21" cy="21" r="21" fill="#FDB733"/>
                                <path d="M30.3781 13.864C32.1178 13.5573 32.6039 15.3905 31.4825 16.7081L18.1651 29.8184C17.4299 30.3734 16.6713 30.767 15.9764 29.9354L10.7058 22.6166C9.62167 20.6992 11.8787 19.2466 13.3018 21.1692C13.9092 21.8308 16.9375 26.4501 17.2843 26.4101L29.6923 14.2635C29.8935 14.075 30.1128 13.9074 30.3753 13.8638L30.3781 13.864Z" fill="white"/>
                            </svg>
                        <span class="text-1xl md:text-2xl font-semibold ml-3">Cobertura con todos los seguros</span>
                    </div>
                    
                    <!-- <div class="flex items-center pt-4 justify-center md:justify-start ">
                        <span class="text-1xl md:text-2xl font-semibold ">Cobertura con todos los seguros</span>
                    </div> -->
                    <br><br>
                    <!-- <a href="nosotros#convenios" class="mt-8 inline-block border-2 border-gray-400 text-gray-700 font-semibold py-3 px-8 rounded-full hover:bg-gray-100 transition-colors">Conoce más</a> -->

                    <a href="nosotros#convenios"  class="item-service__btn font-semibold py-3 md:px-8 px-4 rounded-full transition-colors border border-gray-300 text-gray-700">Conoce más</a>

                </div>
            </div>

            <!-- <div class="block-rimac__cover">
                    <img src="<?php echo HOST_VAR  ?>img/logo_rimac.jpg" width="335" height="288" loading="lazy" alt="RIMAC Seguros" class="">
            </div> -->

            <div class="block-rimac__cover splide" data-config='{"arrows": false, "type": "loop", "autoplay":  true, "interval": 5000}'>
                <div class="splide__track">
                    <ul class="splide__list">
                         <?php
                                    $jlogos = lista_registros_cms('jconvenios', 'cms/json');
                                    foreach ( $jlogos as $rlogo ){
                                        if (!empty($rlogo->imgmovil)) {
                                    ?>

                        <li class="splide__slide">
                                <picture>
                                    <source media="(width <= 767px)" srcset="<?php echo HOST_VAR  ?>uploads/logos/<?php echo $rlogo->imgmovil?>" />
                                    <img src="<?php echo HOST_VAR  ?>uploads/logos/<?php echo $rlogo->imgmovil?>" alt="Aseguradoras" width="335" height="288">
                                </picture>
                        </li>
                        <?php } }  ?>
                        <!-- <li class="splide__slide">
                                <picture>
                                    <source media="(width <= 767px)" srcset="<?php echo HOST_VAR  ?>img/logo_rimac.jpg" />
                                    <img src="<?php echo HOST_VAR  ?>img/logo_rimac.jpg" alt="Aseguradoras" width="335" height="288">
                                </picture>
                        </li> -->
                    </ul>
                </div>
            </div>

        </div>
    </div>
</div>