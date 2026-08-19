<div class="bg-hero-banner relative mb-6  md:text-left">
    <div class="md:mb-0 mb-6">
        <div class="splide swiper-hero" data-config='{"arrows": true, "type": "loop", "autoplay":  false, "interval": 5000}'>
            <div class="splide__track">
                    <ul class="splide__list">
                        <?php
                        $jslider = lista_registros_cms('jslider_general', 'cms/json');
                                foreach ( $jslider as $rslide ){ 
                                if(($rslide->url_seccion=='home') && ($rslide->estado=='1') ){ 
                        ?>
                        <li class="splide__slide">
                            <a href="<?php echo $rslide->url?>">
                                <div class="hero-title  md:text-left mx-auto md:mx-0">
                                    <?php echo $rslide->titulo?><br>
                                    <span class="text-site"><?php echo $rslide->bajada?></span>
                                    </div>
                                <picture>
                                    <source media="(width <= 767px)" srcset="<?php echo HOST_VAR  ?>uploads/slider/<?php echo $rslide->imgmovil?>" />
                                    <img src="<?php echo HOST_VAR  ?>uploads/slider/<?php echo $rslide->imgdesktop?>" alt="<?php echo $rslide->titulo?> <?php echo $rslide->bajada?>" width="1253" height="472" class="hero-image-cover">
                                </picture>
                            </a> 
                        </li>
                        <?php } } ?>
                    </ul>
            </div>
        </div>


        <div class="bg-hero-banner__cord">
            <a href="https://citas.montefiori.com.pe/home" target="_blank" class="boton-cita-home bg-orange-400 text-white font-semibold lg:py-4 lg:px-10 py-3 px-5 rounded-full hover:bg-orange-600 transition-transform hover:scale-105 transform  inline-flex items-center space-x-3 absolute md:left-[60px] lg:left-0 left-[20px] lg:bottom-14 md:bottom-10 bottom-auto md:top-auto top-1/2 lg:text-2xl md:-translate-y-0 -translate-y-1/2">
                <svg width="37" height="39" class="lg:w-[39px] lg:h-[39px] w-[25px] h-[25px]" viewBox="0 0 37 39" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g clip-path="url(#clip0_578_748)">
                    <path d="M32.6162 39C34.6124 38.669 36.1681 37.0195 36.3728 34.8386C36.3256 25.4378 36.5134 16.0083 36.2776 6.6237C36.0622 4.96563 34.1443 3.04711 32.5806 3.04711H30.4135V0H27.5709V3.04711H8.81114V0H5.96856V3.04711H3.80147C1.99482 3.04711 0.184605 5.23943 -0.000507355 7.08449V34.9636C0.172146 35.8594 0.437359 36.655 0.992706 37.3648C1.7118 38.2845 2.67387 38.7825 3.76587 39.001H32.6162V39ZM30.4126 6.09423H32.367C32.7898 6.09423 33.5391 6.89751 33.5391 7.35066V11.2736H2.84118V7.35066C2.84118 6.89655 3.59054 6.09423 4.01328 6.09423H5.96767V9.14134H8.81025V6.09423H27.5709V9.14134H30.4135V6.09423H30.4126ZM2.84208 14.3207H33.5391V34.6965C33.5391 35.246 32.6981 36.0292 32.1561 35.9557H4.2954C3.72849 36.0636 2.84208 35.2727 2.84208 34.6965V14.3207Z" fill="white"/>
                    <path d="M28.1398 17.5195H30.9824V20.5666H28.1398V17.5195Z" fill="white"/>
                    <path d="M22.4553 17.5195H25.2979V20.5666H22.4553V17.5195Z" fill="white"/>
                    <path d="M16.7697 17.5195H19.6123V20.5666H16.7697V17.5195Z" fill="white"/>
                    <path d="M11.0861 17.5195H13.9287V20.5666H11.0861V17.5195Z" fill="white"/>
                    <path d="M5.40058 17.5195H8.24316V20.5666H5.40058V17.5195Z" fill="white"/>
                    <path d="M28.1398 23.6138H30.9824V26.6609H28.1398V23.6138Z" fill="white"/>
                    <path d="M22.4553 23.6138H25.2979V26.6609H22.4553V23.6138Z" fill="white"/>
                    <path d="M16.7697 23.6138H19.6123V26.6609H16.7697V23.6138Z" fill="white"/>
                    <path d="M11.0861 23.6138H13.9287V26.6609H11.0861V23.6138Z" fill="white"/>
                    <path d="M5.40058 23.6138H8.24316V26.6609H5.40058V23.6138Z" fill="white"/>
                    <path d="M28.1398 29.707H30.9824V32.7541H28.1398V29.707Z" fill="white"/>
                    <path d="M22.4553 29.707H25.2979V32.7541H22.4553V29.707Z" fill="white"/>
                    <path d="M16.7697 29.707H19.6123V32.7541H16.7697V29.707Z" fill="white"/>
                    <path d="M11.0861 29.707H13.9287V32.7541H11.0861V29.707Z" fill="white"/>
                    </g>
                    <defs>
                    <clipPath id="clip0_578_748">
                    <rect width="36.4" height="39" fill="white" transform="matrix(-1 0 0 1 36.4004 0)"/>
                    </clipPath>
                    </defs>
                    </svg>


                <span>Agendar Cita</span>
            </a>
        </div>
    </div>
    

    
</div>