<?php 
include ('../cms/php/var.php');
include ('../cms/modelo/function.php');



$url_seccion = 'blog';
include ('../modelo/metas.php');
?>
<!DOCTYPE html>
<html lang="es">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
    <?php include('../vista/head.php');?>

    <style>
    .mt-12 {
        margin-top: 0rem!important; 
    }
    .gap-4 {
        margin-top: 20px;
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
        <section class="hero-section relative md:pt-28 pt-20 pb-10 overflow-hidden mb-12">
            <div class="container mx-auto px-4 z-10 relative">
                <?php include('../vista/slider-interno.php')?>
            </div>
        </section>

    

        <section class="bg-white mb-12">
            <div class="container-med mx-auto md:px-4 px-7">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-8">
                    <!-- Blog Card 1 -->
                    <?php
                        $jblog = lista_registros_cms('jblog_general', '../cms/json');
                        foreach ( $jblog as $rblog ){
                            if($rblog->destacado=='on'){
                        ?>
                    <div class="item-card bg-white overflow-hidden hover:shadow-md transition-shadow duration-300 group">
                        <div class="item-card__cover relative">
                            <a href="<?php echo $rblog->url?>"><img src="../uploads/blog/<?php echo $rblog->imgmovil; ?>" alt="<?php echo $rblog->titulo; ?>" class="aspect-img-news object-cover transform group-hover:scale-105 transition-transform duration-300"></a>
                            <span class="absolute bottom-4 left-5 bg-site text-black text-xs font-semibold py-1 px-3 rounded">Nombre Etiqueta</span>
                        </div>
                        <div class="item-card__info bg-gray-site">
                            <h3 class="text-3xl font-bold mb-5"><?php echo $rblog->titulo; ?></h3>
                            <p class="text-gray-500 text-sm mb-4 line-clamp-3"><?php echo $rblog->bajada; ?></p>
                        </div>
                    </div>
                    <?php } }  ?>
                </div>

            </div>
        </section>

        <section class="bg-gray-site mb-12 py-12">
            <div class="container-med mx-auto md:px-4 px-7">
                 

                <main class="mt-12">
                    <div class="text-center">
                    <h1 class="title-section">Blog de Salud y Bienestar</h1>
                    <p class="mt-2 text-slate-500">Últimas noticias, consejos prácticos y novedades de nuestros médicos para mantenerte informado y saludable.</p>
                    </div>

                    <header class="flex flex-col md:flex-row items-center justify-center gap-4">

                    <div class="relative w-full max-w-md">
                        <select id="select-nota" class="w-full border rounded-full pl-4 pr-10 py-4 text-lg focus:outline-none focus:ring-2 focus:ring-amber-400 focus:border-amber-400 appearance-none bg-white">
                            <option value="">Selecciona una categoría</option>
                            <?php
                            $jcategorias = lista_registros_cms('jcategoria', '../cms/json');
                            foreach ( $jcategorias as $rcate ){  
                            ?>?>
                            <option value="<?php echo $rcate->nombre?>"><?php echo $rcate->nombre?></option>
                             <?php } ?>
                        </select>

                        <!-- Icono de flecha -->
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </div>
                    </div>

                    <div class="relative w-full max-w-md">
                        <!-- Lupa dentro del input -->
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </div>
                        <input  id="search-1" 
                                type="text" 
                                placeholder="Ingresa nota" 
                                class="w-full border rounded-full pl-12 pr-4 py-4 text-lg focus:outline-none focus:ring-2 focus:ring-amber-400 focus:border-amber-400"
                                >

                            <!-- Contenedor de resultados -->
                            <div id="search-results" class="absolute z-50 bg-white w-full shadow-lg rounded-b-xl mt-1 max-h-80 overflow-y-auto hidden"></div>
                    </div>


                </header>

                    <div class="mt-10 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

                        <?php
                        $jblog = lista_registros_cms('jblog_general', '../cms/json');
                        foreach ( $jblog as $rblog ){
                        ?>
                        <div class="item-card bg-white overflow-hidden hover:shadow-md transition-shadow duration-300 group border">
                            <div class="item-card__cover relative">
                                <img src="<?php echo HOST_VAR  ?>uploads/blog/<?php echo $rblog->imgmovil; ?>" alt="<?php echo $rblog->titulo; ?>" class="aspect-img-news object-cover transform group-hover:scale-105 transition-transform duration-300">
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
                </main>

                <!-- <div class="text-center mt-14">
                    <a href="#" class="border border-gray-300 border-2 text-gray-700 font-semibold py-3 px-8 rounded-full hover:bg-gray-100 transition-colors">Ver más</a>
                </div> -->
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
    <?php include('../vista/script.php')?>



<script>
async function initSearch() {
    const input = document.getElementById('search-1');
    const resultsContainer = document.getElementById('search-results');
    if (!input || !resultsContainer) return;

    // Fetch de blogs
    let response = await fetch('api.php');
    let data = await response.json();
    const blogs = data.result || [];

    // Función para normalizar texto y quitar tildes
    function normalizeText(text) {
        return text
            .normalize("NFD") // separa acentos de las letras
            .replace(/[\u0300-\u036f]/g, "") // elimina los acentos
            .toLowerCase();
    }

    // Función para resaltar coincidencias
    function highlight(text, query) {
        const normalizedText = normalizeText(text);
        const normalizedQuery = normalizeText(query);
        if (!query) return text;

        // Reemplaza las coincidencias en el texto original
        const regex = new RegExp(`(${query})`, 'gi');
        return text.replace(regex, `<span class="bg-amber-200 px-1 rounded">$1</span>`);
    }

    input.addEventListener('input', e => {
        const query = e.target.value.trim();

        resultsContainer.innerHTML = '';

        if (query === '') {
            resultsContainer.classList.add('hidden');
            return;
        }

        const filtered = blogs.filter(blog => 
            normalizeText(blog.titulo).includes(normalizeText(query)) || 
            (blog.bajada && normalizeText(blog.bajada).includes(normalizeText(query)))
        );

        if (filtered.length === 0) {
            resultsContainer.innerHTML = `<div class="p-3 text-gray-500">No se encontraron resultados</div>`;
        } else {
            filtered.forEach(blog => {
                const item = document.createElement('a');
                item.href = blog.url;
                item.className = 'flex items-center gap-3 p-3 hover:bg-gray-100 transition-colors rounded-md';
                item.innerHTML = `
                    <img src="../uploads/blog/${blog.imgmovil || '../img/default-blog.webp'}" alt="${blog.titulo}" class="w-12 h-12 object-cover rounded-full">
                    <div class="flex flex-col">
                        <span class="font-semibold text-gray-700">${highlight(blog.titulo, query)}</span>
                        <span class="text-gray-400 text-sm">${highlight(blog.bajada || '', query)}</span>
                    </div>
                `;
                resultsContainer.appendChild(item);
            });
        }

        resultsContainer.classList.remove('hidden');
    });

    document.addEventListener('click', e => {
        if (!input.contains(e.target) && !resultsContainer.contains(e.target)) {
            resultsContainer.classList.add('hidden');
        }
    });
}

initSearch();
</script>






</body>
</html>