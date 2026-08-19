<style>
    
    @media (max-width: 767px) {
        .text-slider p, .text-slider2 p {
            font-size: 14px;
            text-shadow: 0 2px 6px rgba(0,0,0,0.35);
        }
    
        .text-slider2 {
        
            top: 30px!important;
    
        }

    }



</style>


<div class="splide swiper-hero" data-config='{"arrows": false, "type": "loop", "autoplay":  true, "interval": 5000}'>
    <div class="splide__track">
        <ul class="splide__list">
            <?php
            $jslider = lista_registros_cms(
                    'jslider_general',
                    BASE_PATH . '/cms/json'
            );

            foreach ( $jslider as $rslide ){ 
                if($rslide->url_seccion===$url_seccion){ 
                    if($rslide->estado=='1'){ 
            ?>
            <li class="splide__slide">
                <div class="relative">
                    <div class="text-slider2">
                        <div class="text-slider__top mb-0">
                            <div class="md:font-bold font-semibold md:text-[60px] text-[25px]"><?php echo $rslide->titulo?></div>
                        </div>
                        <p><?php echo $rslide->bajada?></p>
                    </div>
                    <picture>
                        <source media="(width <= 767px)" srcset="<?php echo HOST_VAR  ?>uploads/slider/<?php echo $rslide->imgmovil?>" />
                        <img src="<?php echo HOST_VAR  ?>uploads/slider/<?php echo $rslide->imgdesktop?>" alt="<?php echo $rslide->titulo?>" width="1253" height="472" class="slide-image-cover">
                    </picture>
                </div>
            </li>
            <?php } } } ?>
        </ul>
    </div>
</div>  