<?php 
include ('../cms/php/var.php');
include ('../cms/modelo/function.php');

$idEspecialidad = isset($_GET['idEspecialidad']) && $_GET['idEspecialidad'] !== '' ? $_GET['idEspecialidad'] : null;

$url_seccion = 'medicos';
include ('../modelo/metas.php');
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <?php include('../vista/head.php');?>
<style>
/* CSS para un solo buscador */
.md\:grid-cols-3 {
    grid-template-columns: auto!important;
}
.max-w-sm {
    max-width: 100%!important;
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

                <?php include('../vista/slider-interno-sin-fondo-amarillo.php')?>

                <?php if (!isset($_GET['idEspecialidad']) || empty($_GET['idEspecialidad'])){ ?>
                <div class="pt-8">
                    <div class="grid grid-cols-1 md:grid-cols-3 divide-y md:divide-y-0 md:divide-x divide-slate-300">
                        <div class="px-8 flex flex-col items-center justify-center space-y-5 pb-7 md:pb-0 ">
                            <h2 class="text-xl font-semibold text-center ">Busca tu médico o especialidad</h2>
                            <div class="w-full max-w-sm">
                                 <!-- <div id="search-2" class=""></div> -->

                                <div class="relative w-full">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg width="29" height="31" viewBox="0 0 29 31" fill="none"><g clip-path="url(#clip0_361_436)"><path d="M16.9288 2.33766C18.7725 2.58838 20.4929 3.39298 21.4085 4.8353C22.378 6.36289 22.3012 8.20168 21.8932 9.85827C23.0284 10.2744 23.1027 11.458 22.9718 12.3923C22.813 13.5249 21.9177 14.0045 20.6357 13.9032C20.5867 15.6858 19.2945 17.556 17.4406 18.3467L18.449 20.3386C21.7581 20.9129 24.9692 21.1177 26.6778 23.9994C27.3889 25.199 28.3019 28.7833 28.4632 30.1688C28.5266 30.7169 28.3323 30.9785 27.6744 31.0004H0.875831C0.378373 30.9647 0.0354724 30.8714 0 30.3889C0.911304 27.4817 0.700158 23.9673 3.79302 22.0207C5.64265 20.8568 7.94667 20.7868 10.1037 20.3408L11.1054 18.4488C9.25915 17.4335 7.97707 15.8331 7.82505 13.9083C6.86054 14.0271 5.74569 13.5716 5.57424 12.6868C5.50414 12.3246 5.50329 11.2641 5.57424 10.9034C5.65447 10.496 6.0244 10.1644 6.38757 9.92897C6.23808 8.2425 6.38166 6.37455 7.36391 4.8834C9.00662 2.3916 13.6079 0.200789 16.8883 0.0120267C19.6652 -0.148312 17.6154 1.39968 16.9296 2.33766H16.9288ZM16.3393 1.17521C12.4838 1.83551 8.16541 3.94032 7.67218 7.62082C7.5835 8.27966 7.51086 9.08937 7.65613 9.72563C8.33602 10.133 10.3563 8.55734 10.6814 8.03697C10.939 7.62519 10.8748 6.78269 11.5792 6.7805C11.836 6.7805 12.7321 7.59823 13.0133 7.79136C14.5361 8.83866 16.5622 9.87358 18.569 9.90637C19.2176 9.9173 19.8527 9.70085 20.5098 9.75697L20.6804 9.68627C21.5132 7.17187 20.8316 4.32805 17.5842 3.55405C17.0741 3.43234 15.7202 3.4061 15.4575 3.13498C14.8629 2.52205 16.0513 1.68829 16.3393 1.17448V1.17521ZM19.3299 10.9216H17.645C17.2641 10.9216 15.9702 10.5375 15.5589 10.3954C14.2304 9.93552 12.9897 9.17975 11.9145 8.37733L10.8639 9.5048L9.10712 10.6068C9.10712 13.1642 8.54294 15.7398 11.4086 17.3257C14.852 19.2315 19.1492 17.2528 19.4558 13.7953C19.5141 13.1408 19.547 11.8042 19.4608 11.1738C19.4465 11.0681 19.4507 10.9865 19.3299 10.9231V10.9216ZM7.83012 12.8129V10.8852C7.83012 10.6942 7.08435 10.7722 6.89939 10.9544C6.65024 11.1986 6.63926 12.5702 6.9602 12.7458L7.83012 12.8129ZM20.7201 12.8129C21.9194 13.0213 21.8215 12.0688 21.7362 11.3174C21.6787 10.8123 21.2395 10.7664 20.7201 10.7766V12.8129ZM16.8367 22.1162L17.2641 20.7846L16.2557 18.881C14.895 19.2148 13.5682 19.2373 12.216 18.8518C12.1054 19.3554 11.2481 20.4319 11.2236 20.8619C11.2177 20.9705 11.6535 22.0761 11.7186 22.1111L16.8359 22.1162H16.8367ZM1.4265 29.9064H13.39L10.064 21.4624L5.72289 22.2692L6.05734 23.1802C7.78535 23.291 8.89767 24.1401 9.38837 25.5416C9.54546 25.9905 9.93059 27.0043 9.03871 27.0473C8.32926 27.0815 8.29295 25.9417 8.04295 25.4665C7.73299 24.8805 7.20681 24.3973 6.43318 24.3113C5.84282 24.2457 5.71866 24.3325 5.456 24.7647C5.02864 25.468 5.19333 26.2828 5.51512 26.9948C5.73978 27.4919 6.55649 28.2433 6.2347 28.7104C5.5962 29.6389 4.6224 27.9211 4.4197 27.5043C3.90535 26.4482 3.7094 25.3032 4.36057 24.2552C4.47037 24.0788 4.86986 23.7217 4.88253 23.6117C4.89435 23.5162 4.63169 22.8384 4.58692 22.8501C1.96872 24.4367 2.13088 27.4795 1.4265 29.905V29.9064ZM15.1594 29.9064H27.1229C26.7327 28.5596 26.5477 27.11 26.139 25.7733C25.5545 23.8595 24.0486 22.3982 21.7311 22.0513L21.8282 24.2581C24.0917 25.4818 22.4895 28.5122 19.9853 27.7404C17.6999 27.0356 18.2472 24.1838 20.6264 24.0089C20.6627 23.2699 20.6357 22.4835 20.2953 21.7991L18.4854 21.4631L15.1585 29.9079L15.1594 29.9064ZM16.3393 23.1416H12.1265L14.2751 28.6704L16.3393 23.1416ZM21.4498 25.3484C20.5985 24.5773 19.2227 25.6407 19.96 26.4526C20.7919 27.368 22.3485 26.1632 21.4498 25.3484Z" fill="#5C6671"></path></g><defs><clipPath id="clip0_361_436"><rect width="28.4742" height="31" fill="white"></rect></clipPath></defs></svg>
                                    </div>
                                    <input  id="search-medico" 
                                    type="text" 
                                    placeholder="Ej. Cardiología, Pediatría, Pérez..." 
                                    class="w-full border rounded-full pl-12 pr-4 py-4 focus:outline-none focus:ring-2 focus:ring-amber-400 focus:border-amber-400"
                                    autocomplete="off"
                                    >
                                </div>


                             </div>                           
                        </div>
                        <input  id="search-malestar" 
                                    type="hidden" 
                                    >  
                        <!-- <div class="px-8 flex flex-col items-center justify-center space-y-5 md:pt-0 pt-5">
                            <h2 class="text-xl font-semibold text-center">¿Qué te preocupa hoy?</h2>
                            <div class="w-full max-w-sm">
                                <div class="relative w-full">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                        </svg>
                                    </div>
                                    <input  id="search-malestar" 
                                    type="text" 
                                    placeholder="Ej. dolor de cabeza, fiebre, alergia, tos..." 
                                    class="w-full border rounded-full pl-12 pr-4 py-4 focus:outline-none focus:ring-2 focus:ring-amber-400 focus:border-amber-400"
                                    autocomplete="off"
                                    >
                                </div>

                            </div>
                        </div> -->
                    </div>
                </div>
            <?php } else{  ?>
                <input  id="search-medico" 
                                    type="hidden" 
                                    >
                <input  id="search-malestar" 
                                    type="hidden" 
                                    >                                    
            <?php } ?>    

                
            </div>

        </section>
        <div class="hidden pl-16"></div>

        <section class="bg-white mb-12">
            <div class="container-med mx-auto md:px-4 px-4">
                <header class="mb-10 text-left">
                    <h1 class="title-section">Siempre listos para cuidarte</h1>
                    <p class="mt-2 text-slate-500">Más de 150 profesionales en más de 35 especialidades.</p>
                </header>
                
                <main>
                    <div class="flex flex-col gap-4">
                        <?php
                            $servicio = "medicos-web";
                            $response = getData($servicio);
                            $medicos = (!$response->isError && isset($response->result)) ? $response->result : [];
                        ?>

                        <script>
                        const MEDICOS = <?= json_encode($medicos, JSON_UNESCAPED_UNICODE) ?>;
                        const ID_ESPECIALIDAD = <?= json_encode($idEspecialidad) ?>;
                        </script>


                        <div id="medicos-container" class="flex flex-col gap-4"></div>
                        <div id="paginacion" class="flex items-center space-x-4 p-6 justify-center"></div>
                       
                    </div>



                </main>

            </div>
        </section>


        <div class="container mx-auto md:px-4 px-7">
            <div class="border-t mb-10"></div>
        </div>

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
document.addEventListener("DOMContentLoaded", () => {

    const container = document.getElementById("medicos-container");
    const paginacion = document.getElementById("paginacion");

    const inputMedico = document.getElementById("search-medico");
    const inputMalestar = document.getElementById("search-malestar");

    let paginaActual = 1;
    const porPagina = 6;

    // ===== FILTRAR DATA =====
    function getFiltrados() {

        let lista = MEDICOS;

        // filtrar por idEspecialidad si viene
        if (ID_ESPECIALIDAD) {
            lista = lista.filter(m => 
                String(m.urlEspecialidad) === String(ID_ESPECIALIDAD)
            );
        }

        const filtroMedico = inputMedico.value.toLowerCase().trim();
        const filtroMalestar = inputMalestar.value.toLowerCase().trim();

        return lista.filter(m => {

            const nombre = (m.medico || "").toLowerCase();
            const especialidad = (m.especialidad || "").toLowerCase();

            const coincideMedico =
                nombre.includes(filtroMedico) ||
                especialidad.includes(filtroMedico);

            const coincideMalestar =
                especialidad.includes(filtroMalestar);

            return coincideMedico && coincideMalestar;
        });
    }

    // ===== RENDER =====
    function renderMedicos() {

        container.innerHTML = "";

        const filtrados = getFiltrados();

        const totalPaginas = Math.max(1, Math.ceil(filtrados.length / porPagina));

        if (paginaActual > totalPaginas) paginaActual = totalPaginas;
        if (paginaActual < 1) paginaActual = 1;

        const inicio = (paginaActual - 1) * porPagina;
        const items = filtrados.slice(inicio, inicio + porPagina);

        if (items.length === 0) {
            container.innerHTML = `
                <div class="text-center py-10 text-gray-500">
                    No se encontraron médicos.
                </div>
            `;
            paginacion.innerHTML = "";
            return;
        }

        items.forEach(m => {

            const div = document.createElement("div");
            div.className = "bg-gray-site rounded-3xl p-4 w-full flex flex-col md:flex-row items-center justify-between gap-4 md:gap-6 md:pr-8";

            div.innerHTML = `
                <div class="flex items-center gap-5 w-full md:w-auto">
                    <img src="${m.imgMedico || '<?php echo HOST_VAR  ?>img/avatar-medico.webp'}"
                         class="rounded-full object-cover"
                         width="109" height="109"
                         style="height:109px">
                    <div class="flex-grow">
                        <h3 class="text-lg md:text-xl font-bold">${m.medico}</h3>
                        <p class="text-slate-500">${m.especialidad}</p>
                    </div>
                </div>

                <div class=" md:flex gap-4">
                    <a href="${m.urlMedico || '#'}"
                        class="meta-medico-result px-5 py-3 text-sm font-bold text-slate-700 bg-white rounded-full border border-slate-300 hover:bg-slate-100">
                        Conócelo aquí
                    </a>
                    <a target="_blank" href="https://citas.montefiori.com.pe/home"
                        class="px-5 py-3 text-sm font-bold text-white bg-slate-600 rounded-full hover:bg-amber-400">
                        Haz una cita
                    </a>
                </div>
            `;

            container.appendChild(div);
        });

        renderPaginacion(totalPaginas);
    }

    


function renderPaginacion(totalPaginas) {

    paginacion.innerHTML = "";

    const maxVisible = 5;

    // Determinar bloque actual
    const bloqueActual = Math.floor((paginaActual - 1) / maxVisible);
    const inicio = bloqueActual * maxVisible + 1;
    const fin = Math.min(inicio + maxVisible - 1, totalPaginas);

    // ===== Flecha izquierda =====
    if (inicio > 1) {

        const prev = document.createElement("button");
        prev.innerHTML = "‹";

        prev.className =
            "w-8 h-8 rounded-full flex items-center justify-center bg-amber-400 text-white hover:bg-amber-500 transition-all duration-300";

        prev.addEventListener("click", () => {
            paginaActual = inicio - 1;
            renderMedicos();
        });

        paginacion.appendChild(prev);
    }

    // ===== Números =====
    for (let i = inicio; i <= fin; i++) {

        const btn = document.createElement("button");
        btn.textContent = i;

        if (i === paginaActual) {
            btn.className =
                "w-8 h-8 rounded-full flex items-center justify-center text-sm bg-slate-700 text-white";
        } else {
            btn.className =
                "w-8 h-8 rounded-full flex items-center justify-center text-sm border border-slate-300 text-slate-500 hover:bg-slate-100 transition-all duration-300";

            btn.addEventListener("click", () => {
                paginaActual = i;
                renderMedicos();
            });
        }

        paginacion.appendChild(btn);

        // puntito separador
        if (i < fin) {
            const dot = document.createElement("div");
            dot.className = "w-1 h-1 rounded-full bg-amber-400";
            paginacion.appendChild(dot);
        }
    }

    // ===== Flecha derecha =====
    if (fin < totalPaginas) {

        const next = document.createElement("button");
        next.innerHTML = "›";

        next.className =
            "w-8 h-8 rounded-full flex items-center justify-center bg-amber-400 text-white hover:bg-amber-500 transition-all duration-300";

        next.addEventListener("click", () => {
            paginaActual = fin + 1;
            renderMedicos();
        });

        paginacion.appendChild(next);
    }
}









    // ===== EVENTOS =====
    inputMedico.addEventListener("input", () => {
        paginaActual = 1;
        renderMedicos();
    });

    inputMalestar.addEventListener("input", () => {
        paginaActual = 1;
        renderMedicos();
    });

    // Primera carga
    renderMedicos();
    //renderPaginacion(5, 1);

});
</script>


</body>

</html>