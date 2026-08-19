<?php 
include ('../cms/php/var.php');
include ('../cms/modelo/function.php');

$idEspecialidad = isset($_GET['idEspecialidad']) && $_GET['idEspecialidad'] !== '' ? $_GET['idEspecialidad'] : null;

// Llamar a la API
$response_especialidad = getData("especialidades-web", ['urlEspecialidad' => $idEspecialidad]);
$detalle_especialidad = $response_especialidad->result[0];

// $url_seccion = 'especialidades';
// include ('../modelo/metas.php');

$mtitle = $detalle_especialidad->especialidad.' | Especialistas Médicos y Atención Integral';
$mdescription = 'Consulta con especialistas en '.$detalle_especialidad->especialidad.'. Brindamos diagnóstico, tratamiento y seguimiento médico con tecnología moderna y un enfoque integral para cuidar tu salud y bienestar.';
$imgpage = rtrim(HOST_VAR, '/') . '/img/sede-montefiori.webp';
$canonical = canonical_url();


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
        <section class="hero-section relative md:pt-10 pb-10 overflow-hidden mb-12">
            <!-- <div class="container mx-auto px-4 z-10 relative">


                
                                                 


                
            </div> -->

        </section>
        <!-- <div class="hidden pl-16"></div> -->

        <input  id="search-medico" type="hidden">
                <input  id="search-malestar" type="hidden">   

        <section class="bg-white mb-12">
            <div class="container-med mx-auto md:px-4 px-4">
                <header class="mb-10 text-left">
                    <h1 class="title-section"><?php echo mb_convert_case($detalle_especialidad->especialidad, MB_CASE_TITLE, "UTF-8"); ?></h1>
                    <p class="mt-2 text-slate-500">La especialidad de <strong><?php echo $detalle_especialidad->especialidad; ?></strong> ofrece atención médica especializada orientada a la prevención, evaluación, diagnóstico y tratamiento oportuno de distintas condiciones de salud. Contamos con profesionales altamente capacitados y tecnología médica moderna para brindar una atención segura, cercana y centrada en las necesidades de cada paciente.</p>
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
                    <a href="<?php echo HOST_VAR  ?>medicos/${m.urlMedico || '#'}"
                        class="px-5 py-3 text-sm font-bold text-slate-700 bg-white rounded-full border border-slate-300 hover:bg-slate-100">
                        Conócelo aquí
                    </a>
                    <a href="citas/?idMedico=${m.idMedico}"
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