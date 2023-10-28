<?php
//error_reporting(0);
$servername = "localhost";
$username = "root";
$password = "";
$database = "lista_alumno";

// Crear una conexión a la base de datos
$conexion = new mysqli($servername, $username, $password, $database);

// Verificar la conexión
if (!$conexion) {
    echo file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/test_abraham_php/ErrorPages/500/index.html");
    exit;

// Cerrar la conexión cuando hayas terminado
    $conexion->close();
}
?>