<?php
error_reporting(0);
$conexion = mysqli_connect("localhost", "root", "", "lista_alumno");

if (!$conexion) {
    echo file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/ErrorPages/500/index.html");
    exit;
}
?>