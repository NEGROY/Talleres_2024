<?php
/* require_once '../../.env';

$db_host = $_ENV['DDBB_HOST'];
$db_user = $_ENV['DDBB_USER'];
$db_password = $_ENV['DDBB_PASSWORD'];
$db_name = $_ENV['DDBB_NAME'];
$db_name_general = $_ENV['DDBB_NAME_GENERAL'];
$type_host = $_ENV['BANDERA'];
$type_timezone = $_ENV['BANDERA_TIMEZONE'];*/

// Parámetros de conexión
$servidor = "127.0.0.1";   
$usuario = "root"; 
$clave = "";   
$base_de_datos = "db_talleres";  

// Crear la conexión
$conexion = mysqli_connect($servidor, $usuario, $clave, $base_de_datos);

if (mysqli_connect_errno()) {
    // Si ocurre un error en la conexión, muestra el error
    echo "Error de conexión a la base de datos: " . mysqli_connect_error();
} 

?>