<?php
#URL Site PRD
define('URL_IMG', '/');
define('DIR_SERVER', '/');

if ($_SERVER['HTTP_HOST'] === 'localhost') {
    define('HOST_VAR', 'http://localhost/www.montefiori.com.pe/');
} else {
    define('HOST_VAR', 'https://www.montefiori.com.pe/');
}

define('BASE_PATH', realpath(__DIR__ . '/../../'));


#Re-catpcha
define('SITE_KEY', '6LeFExksAAAAAIEvUNuz0sAVqnW33iARLOPseUEG');
define('SECRET_KEY', '6LeFExksAAAAADXIBBu73orj3uqkPmUW0SWc3IyA');

# Capturando pagina actual
$url_seccion = pathinfo($_SERVER['PHP_SELF'], PATHINFO_FILENAME);
//define('URL_SECCION', $url_seccion);

$canonical = "https://{$_SERVER['HTTP_HOST']}" . strtok($_SERVER["REQUEST_URI"], '?');

date_default_timezone_set('America/Lima');

$nonce = base64_encode(random_bytes(16));
?>