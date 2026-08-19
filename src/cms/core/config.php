<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

require_once('DotEnv.php');
require_once('Database.php');

use DevCod\DotEnv;
use DevCod\Database;

(new DotEnv(__DIR__ . '/.env'))->load();

$db = new Database(getenv('DATABASE_NAME'), getenv('DATABASE_USER'), getenv('DATABASE_PASSWORD'), getenv('DATABASE_HOST'));

/**
 * @throws \DevCod\DatabaseException
 */
function cnx()
{
    return Database::instance();
}

function cnx_json()
{
    $servername = getenv('DATABASE_HOST'); // Cambia esto por la dirección de tu servidor MySQL
    $username = getenv('DATABASE_USER'); // Cambia esto por tu nombre de usuario de MySQL
    $password = getenv('DATABASE_PASSWORD'); // Cambia esto por tu contraseña de MySQL
    $dbname = getenv('DATABASE_NAME'); // Cambia esto por el nombre de tu base de datos
    $conn = new mysqli($servername, $username, $password, $dbname);
    return $conn;
}

function cleardata($data)
{
    return htmlspecialchars(stripslashes(trim($data)));
}