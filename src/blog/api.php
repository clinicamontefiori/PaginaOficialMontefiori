<?php
header('Content-Type: application/json');

include('../cms/php/var.php');
include('../cms/modelo/function.php');

// Obtener los blogs
$response = lista_registros_cms('jblog_general', '../cms/json');

$salida = [];

foreach ($response as $blog) {
    // keywords automáticos: título + bajada
    $keywords = strtolower(trim(($blog->titulo ?? '') . " " . ($blog->bajada ?? '')));

    // solo blogs activos
    if (($blog->estado ?? '') === '1') {
        $salida[] = [
            'idblog'       => $blog->idblog ?? '',
            'titulo'       => $blog->titulo ?? '',
            'bajada'       => $blog->bajada ?? '',
            'idcategoria'  => $blog->idcategoria ?? '',
            'url'          => $blog->url ?? '',
            'imgmovil'     => !empty($blog->imgmovil) ? $blog->imgmovil : '../img/default-blog.webp',
            'fecharegistro'=> $blog->fecharegistro ?? '',
            'destacado'    => $blog->destacado ?? '',
            'estado'       => $blog->estado ?? '',
            'keywords'     => $keywords
        ];
    }
}

// Devuelve JSON con "result" para SearchComponent
echo json_encode(['result' => $salida], JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
