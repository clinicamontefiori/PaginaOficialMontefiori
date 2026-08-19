<?php
header('Content-Type: application/json');

include ('../cms/php/var.php');
include ('../cms/modelo/function.php');

$servicio = "medicos-web";
$response = getData($servicio);

$salida = [];

if (!$response->isError && isset($response->result)) {
    foreach ($response->result as $medico) {
        $salida[] = [
            'name'      => $medico->medico ?? '',
            'specialty' => $medico->especialidad ?? '',
            'imageUrl'  => !empty($medico->imgMedico) ? $medico->imgMedico : 'img/avatar-medico.webp',
            'idMedico'  => $medico->idMedico ?? '',
            'urlMedico'  => $medico->urlMedico ?? '',
            'keywords'  => $medico->keywords ?? ''
        ];
    }
}

// Devuelve el JSON
echo json_encode($salida);
exit;
