<?php 
include ('cms/php/var.php');
include ('cms/modelo/function.php');

$url_seccion = 'home';

include ('modelo/metas.php');
?>
<!DOCTYPE html>
<html lang="es">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
    <?php include('vista/head.php');?>
    <link rel="preload" href="<?php echo HOST_VAR  ?>css/carrusel.css?v<?php echo $cache; ?>" as="style">
    <link rel="stylesheet" href="<?php echo HOST_VAR  ?>css/carrusel.css?<?php echo $cache; ?>">
</head>
<body>

    <noscript> <img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=403452915317130&ev=PageView&noscript=1" /> </noscript>
    
    <!-- Header -->
    <header class="header-site backdrop-blur-md fixed top-0 left-0 right-0  z-50 ">
        <?php include('vista/header.php')?>
    </header>

    <main>
        <!-- Hero Section -->
        <section class="hero-section relative md:pt-28 pt-20 pb-2">
            <div class="container mx-auto md:px-4 px-7 z-10 relative">            

                <?php include('vista/slider.php')?>

                <?php include('vista/popup.php'); ?>
                
                <div class="md:mb-6 mb-4">
                    <span class="flex items-center space-x-2 font-semibold justify-center">
                            <svg width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M14.2042 10.5H0V8.16667H14.2042L7.67083 1.63333L9.33333 0L18.6667 9.33333L9.33333 18.6667L7.67083 17.0333L14.2042 10.5Z" fill="#FF8F30"/>
                            </svg>

                            <span>¿En qué podemos ayudarte?</span>
                        </span>
                </div>
                <div class="mb-6">
                    <div class="relative w-full  mx-auto lg:mx-0">
                            
                            <div id="search-1" class="w-full"></div>
                        
                        </div>
                </div>
                
            </div>
       
        </section>

        <!-- Quick Actions Section -->
        <section class="bg-white md:py-16 py-12">
            <?php include('vista/ayuda.php')?>
        </section>

        <!-- Services Section -->
        <section class="bg-gray-site md:py-20 py-10">
            <?php include('vista/servicios.php')?>           
        </section>

        <!-- Why Us Section -->
        <section class="bg-white md:pt-[66px] py-10">
            <?php include('vista/porque.php')?>
        </section>

        <!-- Insurance Info Section -->
        <section class="bg-white md:py-5 py-10">
            <?php include('vista/info.php')?>
        </section>


        <!-- Blog Section -->
        <section class="bg-white md:py-18 py-10">
            <?php //include('vista/blog.php')?>
        </section>

        <!-- <div class="container mx-auto md:px-4 px-7">
            <div class="border-t mb-10"></div>
        </div> -->

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

    <script>
/* SearchComponent con filtro robusto para keywords (acentos, nulls, tokens) */
new SearchComponent('search-1', {
    endpoint: 'medicos/api.php',
    placeholder: '¿Qué especialidad o médico estás buscando? (ej. Ginecología o Pérez)',
    iconoSvg: '<svg xmlns="http://www.w3.org/2000/svg" class="absolute left-4 top-1/2 -translate-y-1/2 w-5 h-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>',

    /* filtro mejorado */
    filter: (doctor, query) => {
        // helper: normalizar (minusculas y quitar acentos)
        const norm = s => (String(s || '').normalize('NFD').replace(/[\u0300-\u036f]/g, '')).toLowerCase().trim();

        const q = norm(query);
        if (!q) return true; // si no hay query mostramos todo

        const name = norm(doctor.name || doctor.medico || '');
        const specialty = norm(doctor.specialty || doctor.especialidad || '');
        const keywords = norm(doctor.keywords || '');

        // coincidencia simple en nombre o especialidad
        if (name.includes(q) || specialty.includes(q)) return true;

        // buscar dentro de keywords por tokens (split por comas, punto y coma, espacios)
        if (keywords) {
            const tokens = keywords.split(/[\s,;]+/).filter(Boolean);
            // coincidencia si al menos un token contiene la query o la query contiene el token (parcial)
            for (let t of tokens) {
                if (t.includes(q) || q.includes(t)) return true;
            }
        }

        return false;
    },

    onSelect: (item) => {
        if (typeof fbq === 'function') {
            fbq('track', 'Search');
        }
        window.location.href = "medicos/" + item.urlMedico;
    },

    renderItem: (doctor, query) => `
        <div class="flex items-center gap-6 p-4">
            <img src="${doctor.imageUrl}" alt="${doctor.name}" class="w-16 h-16 rounded-full object-cover border-2 border-white shadow-sm" />
            <div class="flex flex-col md:flex-row md:items-center gap-1 md:gap-2 text-lg flex-wrap">
                <div class="flex items-center gap-2">
                    ${highlightText(doctor.specialty, query, true)}
                    <span class="hidden md:inline text-gray-300">|</span>
                </div>
                ${highlightText(doctor.name, query, false)}
            </div>
        </div>
    `
});
</script>










</body>
</html>
