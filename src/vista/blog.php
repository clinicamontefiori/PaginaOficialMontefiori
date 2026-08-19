<div class="container mx-auto md:px-4 px-7">
                <div class="text-center mb-10">
                    <h2 class="title-section font-bold">Consejos y Salud Montefiori</h2>
                    <p class="title-section-sub">En el Blog de la Clínica Montefiori encontrarás información actualizada, consejos de salud y contenidos elaborados por nuestros especialistas para cuidar de ti y de tu familia.</p>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

                        
                        <?php
                        $jblog = lista_registros_cms('jblog_general', 'cms/json');
                        foreach ( $jblog as $rblog ){
                        ?>
                        <div class="item-card bg-white overflow-hidden hover:shadow-md transition-shadow duration-300 group border">
                            <div class="item-card__cover relative">
                                <a href="blog/<?php echo $rblog->url; ?>"><img src="<?php echo HOST_VAR  ?>uploads/blog/<?php echo $rblog->imgmovil; ?>" alt="<?php echo $rblog->titulo; ?>" class="aspect-img-news object-cover transform group-hover:scale-105 transition-transform duration-300"></a>
                                <span class="absolute top-4 left-4 bg-site text-black text-xs font-semibold py-1 px-3 rounded">Nombre Etiqueta</span>
                            </div>
                            <div class="item-card__info ">
                                <h3 class="text-3xl font-bold mb-5"><?php echo $rblog->titulo; ?></h3>
                                <p class="text-gray-500 text-sm mb-8 line-clamp-4"><?php echo $rblog->bajada; ?></p>
                                <div class="flex items-center text-gray-400 text-xs space-x-4">
                                    <div class="flex items-center space-x-1.5 text-gray-600">
                                        <svg fill="none" height="13" viewBox="0 0 12 13" width="12"><g clip-path="url(#clip0_167_1221)"><path d="M10.7528 12.8571C11.4109 12.748 11.9237 12.2042 11.9912 11.4853C11.9757 8.38608 12.0376 5.27747 11.9598 2.18364C11.8888 1.63702 11.2566 1.00454 10.7411 1.00454H10.0266V0H9.08951V1.00454H2.90497V0H1.96785V1.00454H1.25343C0.657827 1.00454 0.0610542 1.72729 2.76566e-05 2.33555V11.5265C0.0569468 11.8218 0.14438 12.0841 0.32746 12.3181C0.564527 12.6213 0.88169 12.7854 1.24169 12.8575H10.7528V12.8571ZM10.0263 2.00909H10.6706C10.81 2.00909 11.057 2.2739 11.057 2.4233V3.71656H0.936849V2.4233C0.936849 2.27359 1.18389 2.00909 1.32325 2.00909H1.96756V3.01363H2.90467V2.00909H9.08951V3.01363H10.0266V2.00909H10.0263ZM0.937142 4.7211H11.057V11.4384C11.057 11.6195 10.7798 11.8778 10.6011 11.8535H1.41626C1.22937 11.8891 0.937142 11.6284 0.937142 11.4384V4.7211Z" fill="#FF8F30"></path><path d="M9.27675 5.77563H10.2139V6.78018H9.27675V5.77563Z" fill="#FF8F30"></path><path d="M7.40273 5.77563H8.33984V6.78018H7.40273V5.77563Z" fill="#FF8F30"></path><path d="M5.52871 5.77563H6.46582V6.78018H5.52871V5.77563Z" fill="#FF8F30"></path><path d="M3.65468 5.77563H4.5918V6.78018H3.65468V5.77563Z" fill="#FF8F30"></path><path d="M1.78066 5.77563H2.71777V6.78018H1.78066V5.77563Z" fill="#FF8F30"></path><path d="M9.27675 7.78479H10.2139V8.78933H9.27675V7.78479Z" fill="#FF8F30"></path><path d="M7.40273 7.78479H8.33984V8.78933H7.40273V7.78479Z" fill="#FF8F30"></path><path d="M5.52871 7.78479H6.46582V8.78933H5.52871V7.78479Z" fill="#FF8F30"></path><path d="M3.65468 7.78479H4.5918V8.78933H3.65468V7.78479Z" fill="#FF8F30"></path><path d="M1.78066 7.78479H2.71777V8.78933H1.78066V7.78479Z" fill="#FF8F30"></path><path d="M9.27675 9.79346H10.2139V10.798H9.27675V9.79346Z" fill="#FF8F30"></path><path d="M7.40273 9.79346H8.33984V10.798H7.40273V9.79346Z" fill="#FF8F30"></path><path d="M5.52871 9.79346H6.46582V10.798H5.52871V9.79346Z" fill="#FF8F30"></path><path d="M3.65468 9.79346H4.5918V10.798H3.65468V9.79346Z" fill="#FF8F30"></path></g><defs><clipPath id="clip0_167_1221"><rect fill="white" height="12.8571" transform="matrix(-1 0 0 1 12 0)" width="12"></rect></clipPath></defs></svg>

                                        <span><?php echo convertirFechaDB($rblog->fecharegistro); ?></span>
                                    </div>
                                    <!-- <div class="flex items-center space-x-1.5 text-gray-600">
                                        <svg width="13" height="13" viewBox="0 0 13 13" fill="none">
                                            <path d="M8.3125 9.1875L9.1875 8.3125L6.875 6V3.125H5.625V6.5L8.3125 9.1875ZM6.25 12.5C5.38542 12.5 4.57292 12.3359 3.8125 12.0078C3.05208 11.6797 2.39062 11.2344 1.82812 10.6719C1.26562 10.1094 0.820313 9.44792 0.492188 8.6875C0.164062 7.92708 0 7.11458 0 6.25C0 5.38542 0.164062 4.57292 0.492188 3.8125C0.820313 3.05208 1.26562 2.39062 1.82812 1.82812C2.39062 1.26562 3.05208 0.820313 3.8125 0.492188C4.57292 0.164062 5.38542 0 6.25 0C7.11458 0 7.92708 0.164062 8.6875 0.492188C9.44792 0.820313 10.1094 1.26562 10.6719 1.82812C11.2344 2.39062 11.6797 3.05208 12.0078 3.8125C12.3359 4.57292 12.5 5.38542 12.5 6.25C12.5 7.11458 12.3359 7.92708 12.0078 8.6875C11.6797 9.44792 11.2344 10.1094 10.6719 10.6719C10.1094 11.2344 9.44792 11.6797 8.6875 12.0078C7.92708 12.3359 7.11458 12.5 6.25 12.5ZM6.25 11.25C7.63542 11.25 8.8151 10.763 9.78906 9.78906C10.763 8.8151 11.25 7.63542 11.25 6.25C11.25 4.86458 10.763 3.6849 9.78906 2.71094C8.8151 1.73698 7.63542 1.25 6.25 1.25C4.86458 1.25 3.6849 1.73698 2.71094 2.71094C1.73698 3.6849 1.25 4.86458 1.25 6.25C1.25 7.63542 1.73698 8.8151 2.71094 9.78906C3.6849 10.763 4.86458 11.25 6.25 11.25Z" fill="#FF8F30"></path>
                                            </svg>

                                        <span>5:35pm</span>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                        <?php } ?>

                       
                </div>
                <div class="text-center mt-16 mb-6">
                    <a href="blog" class="border border-gray-400 border-2 text-gray-700 font-semibold py-[14px] px-12 rounded-full hover:bg-gray-100 transition-colors">Ver más</a>
                </div>
            </div>