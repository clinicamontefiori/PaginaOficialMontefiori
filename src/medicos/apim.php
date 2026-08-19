<?php
header('Content-Type: application/json');

include ('../cms/php/var.php');
include ('../cms/modelo/function.php');

$servicio = "medicos-web";
$response = getData($servicio);

$salida = [];

if (!$response->isError && isset($response->result)) {

    foreach ($response->result as $medico) {

        // keywords automáticos
        $keywords = strtolower(
            trim($medico->medico . " " . $medico->especialidad. " " . $medico->keywords)
        );

        $salida[] = [
            'name'       => $medico->medico ?? '',
            'specialty'  => $medico->especialidad ?? '',
            'imageUrl'   => !empty($medico->imgMedico) ? $medico->imgMedico : '../img/avatar-medico.webp',
            'idMedico'   => $medico->idMedico ?? '',
            'keywords'   => $keywords
        ];
    }
}

echo json_encode($salida);
