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
                $titulo = preg_split('/<br\s*\/?>/i', $rslide->titulo);
            ?>
            <li class="splide__slide">
                <div class="relative">
                    <div class="text-slider2">
                        <div class="text-slider__top mb-0">
                            <div class="text-slider__text1 bg-site"><?php echo $titulo[0] ?? ''; ?></div><br>
                            <div class="text-slider__text2 bg-site"><?php echo $titulo[1] ?? ''; ?></div>
                        </div>
                        <p class="text-slider__text3 bg-site"><?php echo $rslide->bajada?></p>
                    </div>
                    <picture>
                        <source media="(width <= 767px)" srcset="<?php echo HOST_VAR  ?>uploads/slider/<?php echo $rslide->imgmovil?>" />
                        <img src="<?php echo HOST_VAR  ?>uploads/slider/<?php echo $rslide->imgdesktop?>" alt="<?php echo $rslide->bajada?>" width="1253" height="472" class="slide-image-cover">
                    </picture>
                </div>
            </li>
            <?php } } } ?>
        </ul>
    </div>
</div>