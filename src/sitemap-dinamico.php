<?php
header('Content-Type: application/xml; charset=utf-8');

include ('cms/php/var.php');
include ('cms/modelo/function.php');

// Configuración
$baseUrl = 'https://www.montefiori.com.pe';
$lastmod = date('Y-m-d');

// Array de páginas estáticas
$paginas = [
    ['loc' => '/', 'priority' => '1.0', 'changefreq' => 'daily'],
    ['loc' => '/nosotros', 'priority' => '0.8', 'changefreq' => 'monthly'],
    ['loc' => '/servicios', 'priority' => '0.9', 'changefreq' => 'weekly'],
    ['loc' => '/medicos/', 'priority' => '0.9', 'changefreq' => 'weekly'],
    ['loc' => '/especialidades/', 'priority' => '0.9', 'changefreq' => 'weekly'],
    ['loc' => '/informacion-para-pacientes', 'priority' => '0.8', 'changefreq' => 'monthly'],
    // ['loc' => '/contacto', 'priority' => '0.8', 'changefreq' => 'monthly'],
    // ['loc' => '/blog', 'priority' => '0.7', 'changefreq' => 'weekly'],
    // ['loc' => '/emergencias', 'priority' => '0.9', 'changefreq' => 'monthly'],
    // ['loc' => '/seguros-medicos', 'priority' => '0.8', 'changefreq' => 'monthly'],
    // ['loc' => '/citas-medicas', 'priority' => '0.9', 'changefreq' => 'weekly'],
];

// Especialidades
$especialidad = "especialidades-web";
$response = getData($especialidad);
$especialidades = (!$response->isError && isset($response->result)) 
                    ? $response->result 
                    : [];

// Médicos
$medico = "medicos-web";
$respomedi = getData($medico);
$medicos = (!$respomedi->isError && isset($respomedi->result)) 
                    ? $respomedi->result 
                    : [];                    

// Generar XML
echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";

foreach ($paginas as $pagina) {
    echo "\t<url>\n";
    echo "\t\t<loc>" . $baseUrl . $pagina['loc'] . "</loc>\n";
    echo "\t\t<lastmod>" . $lastmod . "</lastmod>\n";
    echo "\t\t<changefreq>" . $pagina['changefreq'] . "</changefreq>\n";
    echo "\t\t<priority>" . $pagina['priority'] . "</priority>\n";
    echo "\t</url>\n";
}

// Si tienes médicos dinámicos, agrega sus URLs

if (isset($medicos) && is_array($medicos)) {
    foreach ($medicos as $medico) {
        echo "\t<url>\n";
        echo "\t\t<loc>" . $baseUrl . "/medicos/" . ($medico->urlMedico) . "</loc>\n";
        echo "\t\t<lastmod>" . $lastmod . "</lastmod>\n";
        echo "\t\t<changefreq>monthly</changefreq>\n";
        echo "\t\t<priority>0.7</priority>\n";
        echo "\t</url>\n";
    }
}


// Si tienes especialidades dinámicas, agrega sus URLs

if (isset($especialidades) && is_array($especialidades)) {
    foreach ($especialidades as $especialidad) {
        echo "\t<url>\n";
        echo "\t\t<loc>" . $baseUrl . "/especialidades/" . ($especialidad->urlEspecialidad) . "</loc>\n";
        echo "\t\t<lastmod>" . $lastmod . "</lastmod>\n";
        echo "\t\t<changefreq>monthly</changefreq>\n";
        echo "\t\t<priority>0.8</priority>\n";
        echo "\t</url>\n";
    }
}


echo '</urlset>';
?>