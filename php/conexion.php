<?php
error_reporting(0);
$conexion = mysqli_connect("localhost", "root", "", "lista_alumno");

if (!$conexion) {
    echo file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/test_abraham_php/ErrorPages/500/index.html");
    exit;
}
?>