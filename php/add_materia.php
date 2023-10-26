<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require "conexion.php";

    $materia = $_POST["materia"];

    $materia = $conexion->real_escape_string($materia);

    $sql = "INSERT INTO materia (nombre_materia) VALUES ('$materia')";

    if ($conexion->query($sql) === TRUE) {
        echo "Materia guardada correctamente";
    } else {
        echo "Error al intentar guardar materia:\n" . $conexion->error;
    }

    // Cierra la conexión
    $conexion->close();
}
?>