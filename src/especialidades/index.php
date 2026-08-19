<?php 
include ('../cms/php/var.php');
include ('../cms/modelo/function.php');

$url_seccion = 'especialidades';

include ('../modelo/metas.php');
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <?php include('../vista/head.php');?>
    <style>
        /* Pequeñas utilidades para el slider */
        .slider-wrap { position: relative; }
        .slider-arrow {
            position: absolute;
            top: 50%;
            font-size: 35px;
            transform: translateY(-50%);
            z-index: 40;
            width: 60px;
            height: 60px;
            border-radius: 9999px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            box-shadow: 0 6px 18px rgba(2,6,23,0.15);
            background: rgba(17,24,39,0.85);
            color: #fff;
        }
        .slider-arrow.disabled { opacity: 0.35; cursor: default; pointer-events: none; }

        .slider-arrow-left { left: -72px; } /* ajusta según diseño */
        .slider-arrow-right { right: -72px; } /* ajusta según diseño */

        /* Animación simple al cambiar página */
        .anim-out {
            transform: translateX(-30px);
            opacity: 0;
            transition: transform 300ms ease, opacity 300ms ease;
        }
        .anim-in {
            transform: translateX(0);
            opacity: 1;
            transition: transform 300ms ease, opacity 300ms ease;
        }

        .text-especialidades {
            font-size: 15px!important;
        }

        /* en pantallas muy pequeñas mover flechas dentro del contenedor */
        @media (max-width: 768px) {
            .slider-arrow-left { left: 6px; top: calc(100% + 10px); transform: none; }
            .slider-arrow-right { right: 6px; top: calc(100% + 10px); transform: none; }
            #prev-slide,#next-slide { display: none !important; }
            .pt-8 { padding-bottom: 2rem; }
        }



    </style>
</head>
<body>

<header class="header-site backdrop-blur-md fixed top-0 left-0 right-0 z-50">
    <?php include('../vista/header.php')?>
</header>

<main>

<!-- Hero -->
<section class="hero-section relative md:pt-28 pt-20 md:pb-10 overflow-hidden mb-6">
    <div class="container mx-auto px-4 z-10 relative">

        <!-- Slider -->
        <?php include('../vista/slider-interno-sin-fondo-amarillo.php')?>

        <header class="pt-8 flex flex-col md:flex-row items-center justify-center gap-4">

                    <div class="relative w-full">
                        <!-- Lupa dentro del input -->
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </div>
                        <input  id="search-input" 
                                type="text" 
                                placeholder="¿Qué especialidad necesitas? (ej. Ginecología)" 
                                class="w-full border rounded-full pl-12 pr-4 py-4 focus:outline-none focus:ring-2 focus:ring-amber-400 focus:border-amber-400"
                                autocomplete="off"
                                >
                    </div>
        </header>

    </div>
</section>

<?php
$servicio = "especialidades-web";
$response = getData($servicio);

$especialidades = (!$response->isError && isset($response->result)) 
                    ? $response->result 
                    : [];

?>

<script>
const ESPECIALIDADES = <?= json_encode($especialidades, JSON_UNESCAPED_UNICODE) ?>;
</script>

<!-- Especialidades -->
<section class="bg-white mb-12">
    <div class="container-med mx-auto md:px-4 px-7">
        
        <!-- Wrap para poder posicionar flechas -->
        <div class="slider-wrap">

            <!-- Flecha izquierda -->
            <button id="prev-slide" aria-label="Anterior" class="slider-arrow slider-arrow-left">
                ‹
            </button>

            <!-- Contenedor donde se inyectan los items -->
            <div id="especialidades-container"
                 class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 md:gap-9 gap-6 anim-in">
            </div>

            <!-- Flecha derecha -->
            <button id="next-slide" aria-label="Siguiente" class="slider-arrow slider-arrow-right">
                ›
            </button>

        </div>

        <!-- PAGINACIÓN -->
        <div id="paginacion" class="flex items-center space-x-3 p-4 justify-center mt-10"></div>

    </div>
</section>

<div class="container mx-auto md:px-4 px-7">
    <div class="border-t mb-10"></div>
</div>

<section class="py-20 pt-0">
    <?php include('../vista/horarios.php')?>
</section>

<section class="section-contact">
    <?php include('../vista/contacto.php')?>
</section>

</main>

<footer class="bg-white pt-12 pb-8">
    <?php include('../vista/footer.php')?>
</footer>

<?php include('../vista/whatsapp.php')?>
<?php include('../vista/script.php')?>


<script>
function slugify(text) {
    return text
        .toString()
        .normalize("NFD")                 // separa acentos
        .replace(/[\u0300-\u036f]/g, "")  // elimina acentos
        .toLowerCase()                    // todo minúsculas
        .replace(/[^a-z0-9\s-]/g, "")     // elimina caracteres raros
        .trim()                           // elimina espacios al inicio/fin
        .replace(/\s+/g, "-")             // espacios → guiones
        .replace(/-+/g, "-");             // evita guiones duplicados
}


document.addEventListener("DOMContentLoaded", () => {

    const contenedor = document.getElementById("especialidades-container");
    const paginacion = document.getElementById("paginacion");
    const input = document.getElementById("search-input");

    const prevArrow = document.getElementById("prev-slide");
    const nextArrow = document.getElementById("next-slide");

    let paginaActual = 1;
    const porPagina = 8;
    let lastDirection = 'right'; // para la animación

    // ====== RENDERIZAR ITEMS ======
    function renderEspecialidades() {
        // animación de salida
        contenedor.classList.remove('anim-in');
        contenedor.classList.add('anim-out');

        // pequeño retardo para permitir la animación de salida (300ms)
        setTimeout(() => {
            contenedor.innerHTML = "";

            // Filtrar por buscador
            const filtro = input.value.toLowerCase().trim();
            const filtrados = ESPECIALIDADES.filter(e =>
                String(e.especialidad || '').toLowerCase().includes(filtro)
            );

            const total = filtrados.length;
            const totalPaginas = Math.max(1, Math.ceil(total / porPagina));

            // Evitar que la página actual quede fuera de rango
            if (paginaActual > totalPaginas) paginaActual = totalPaginas;
            if (paginaActual < 1) paginaActual = 1;

            const inicio = (paginaActual - 1) * porPagina;
            const paginaItems = filtrados.slice(inicio, inicio + porPagina);

            // ====== Pintar las especialidades ======
            // paginaItems.forEach(esp => {

            //     const urlEspecialidad = esp.urlEspecialidad ?? "";
            //     const nombre = esp.especialidad ?? "";
            //     const slugNombre = slugify(nombre) ?? "uploads/especialidades/default.svg";

            //     const div = document.createElement("div");
            //     div.className = "item-especialidad rounded-3xl text-center flex flex-col items-center justify-between transform hover:shadow-md transition-transform duration-300";
            //     div.dataset.name = nombre.toLowerCase();

            //     div.innerHTML = `
            //         <div class="circle-icon bg-white flex align-center justify-center rounded-full mb-2">
            //             <img src="uploads/especialidades/${slugNombre}.svg" alt="${nombre}" loading="lazy">
            //         </div>
            //         <div class="mb-3">
            //             <div class="text-xl text-especialidades font-bold text-white">${nombre}</div>
            //         </div>
            //         <a href="medicos/especialidad/${urlEspecialidad}" 
            //            class="bg-white text-gray-700 font-semibold py-3 px-3 md:px8 rounded-full hover:bg-gray-100 transition-colors w-full">
            //             Ver más
            //         </a>
            //     `;

            //     contenedor.appendChild(div);
            // });

            paginaItems.forEach(esp => {

                const urlEspecialidad = esp.urlEspecialidad ?? "";
                const nombre = esp.especialidad ?? "";

                const slugNombre = slugify(nombre);
                const rutaImagen = `uploads/especialidades/${slugNombre}.svg`;
                const defaultImg = `img/favicon.ico`;

                const div = document.createElement("div");
                div.className = "item-especialidad rounded-3xl text-center flex flex-col items-center justify-between transform hover:shadow-md transition-transform duration-300";
                div.dataset.name = nombre.toLowerCase();

                div.innerHTML = `
                    <div class="circle-icon bg-white flex align-center justify-center rounded-full mb-2">
                        <img class="icono-especialidad" 
                             src="../${rutaImagen}" 
                             alt="${nombre}" 
                             loading="lazy">
                    </div>
                    <div class="mb-3">
                        <div class="text-xl text-especialidades font-bold text-white">${nombre}</div>
                    </div>
                    <a href="${urlEspecialidad}" 
                       class="bg-white text-gray-700 font-semibold py-3 px-3 md:px8 rounded-full hover:bg-gray-100 transition-colors w-full">
                        Ver más
                    </a>
                `;

                // ✅ fallback si la imagen no existe
                const img = div.querySelector(".icono-especialidad");

                img.onerror = () => {
                    img.src = defaultImg;
                };

                contenedor.appendChild(div);
            });

            renderPaginacion(totalPaginas);

            // animación de entrada
            contenedor.classList.remove('anim-out');
            // ajustar dirección de entrada (se podría personalizar según lastDirection)
            contenedor.classList.add('anim-in');

            // actualizar estado de flechas
            updateArrows(totalPaginas);

            // si no hay resultados mostrar mensaje
            if (filtrados.length === 0) {
                contenedor.innerHTML = '<div class="col-span-4 text-center py-8 text-gray-500">No se encontraron especialidades</div>';
            }

        }, 0); // 220ms (ligero menos que la transición para que sea fluido)
    }

    // ====== RENDER PAGINACIÓN ======
    function renderPaginacion(totalPaginas) {
        paginacion.innerHTML = "";

        // Anterior
        if (paginaActual > 1) {
            paginacion.innerHTML += `
                <button class="w-7 h-7 rounded-full flex items-center justify-center bg-slate-200 text-slate-700 hover:bg-slate-300 transition-all"
                        onclick="cambiarPagina(${paginaActual - 1})">‹</button>
            `;
        }

        // Números
        for (let i = 1; i <= totalPaginas; i++) {
            if (i === paginaActual) {
                paginacion.innerHTML += `
                    <button class="w-7 h-7 rounded-full flex items-center justify-center bg-slate-700 text-white">${i}</button>
                `;
            } else {
                paginacion.innerHTML += `
                    <button onclick="cambiarPagina(${i})"
                        class="w-7 h-7 rounded-full flex items-center justify-center bg-white border border-slate-300 text-slate-500 hover:bg-slate-100 hover:border-slate-400">${i}</button>
                `;
            }

            if (i < totalPaginas) {
                paginacion.innerHTML += `<div class="w-1 h-1 rounded-full bg-amber-400"></div>`;
            }
        }

        // Siguiente
        if (paginaActual < totalPaginas) {
            paginacion.innerHTML += `
                <button class="w-7 h-7 rounded-full flex items-center justify-center bg-amber-400 text-white hover:bg-amber-500 transition-all"
                        onclick="cambiarPagina(${paginaActual + 1})">›</button>
            `;
        }
    }

    // ====== Cambiar página ======
    window.cambiarPagina = p => {
        if (typeof p !== 'number') return;
        lastDirection = (p > paginaActual) ? 'right' : 'left';
        paginaActual = p;
        renderEspecialidades();
        // scroll suave hacia el bloque de especialidades
        document.querySelector('section.bg-white.mb-12')?.scrollIntoView({ behavior: 'smooth', block: 'start' });
    };

    // ====== Flechas prev/next tipo slider ======
    function updateArrows(totalPaginas) {
        prevArrow.classList.toggle('disabled', paginaActual <= 1);
        nextArrow.classList.toggle('disabled', paginaActual >= totalPaginas);
    }

    prevArrow.addEventListener('click', () => {
        if (paginaActual > 1) {
            lastDirection = 'left';
            paginaActual--;
            renderEspecialidades();
        }
    });

    nextArrow.addEventListener('click', () => {
        const totalPages = Math.max(1, Math.ceil(ESPECIALIDADES.filter(e => String(e.especialidad||'').toLowerCase().includes(input.value.toLowerCase().trim())).length / porPagina));
        if (paginaActual < totalPages) {
            lastDirection = 'right';
            paginaActual++;
            renderEspecialidades();
        }
    });

    // ====== Buscador ======
    input.addEventListener("input", () => {
        paginaActual = 1;
        renderEspecialidades();
    });

    // Primera carga
    renderEspecialidades();
});
</script>

</body>
</html>
