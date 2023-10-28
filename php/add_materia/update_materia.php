<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require "../conexion.php";

    $id_materia = $_POST["id_materia"];
    $nombre_materia = $_POST["nombre_materia"];

    $id_materia = $conexion->real_escape_string($id_materia);
    $nombre_materia = $conexion->real_escape_string($nombre_materia);

    $sql = "UPDATE materia SET nombre_materia = '$nombre_materia' WHERE id_materia = '$id_materia'";

    if ($conexion->query($sql) === TRUE) {
        echo "Nombre de materia cambiado a:\n'$nombre_materia'";
    } else {
        echo "Error al actualizar Datos: " . $conexion->error;
    }

    $conexion->close();
}
?>
