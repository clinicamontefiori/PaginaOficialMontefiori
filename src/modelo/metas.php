<?php
// 1. Cargar JSON de forma segura, independientemente del subdirectorio
$seccionesjson = lista_registros_cms(
    'jsecciones_general',
    BASE_PATH . '/cms/json'
);

// 2. Valores por defecto (si no hay coincidencia)
$mtitle = '-- Atención Médica Integral para pacientes adultos y pediátricos';
$mdescription = 'En Clínica San Felipe, nos dedicamos a brindar una atención médica integral y de calidad a todos nuestros pacientes. Ofreciendo servicios ambulatorios, hospitalarios y quirúrgicos a cargo de un staff de médicos especializados para atender a pacientes adultos y pediátricos.';
$imgpage = rtrim(HOST_VAR, '/') . '/img/sede-montefiori.webp';

//echo $url_seccion;

// 3. Buscar coincidencia dentro del JSON
if (!empty($seccionesjson)) {
    foreach ($seccionesjson as $ms) {
        if ($ms->url_seccion === $url_seccion) {
            $mtitle = $ms->meta_title ?: $mtitle;             // fallback si viene vacío
            $mdescription = $ms->meta_description ?: $mdescription;
            // Si cada sección tiene su imagen, puedes agregarlo aquí
            // $imgpage = $ms->meta_image ? rtrim(HOST_VAR,'/').'/'.$ms->meta_image : $imgpage;
            break;
        }
    }
}



?>