<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require "conexion.php";

    $id = $_POST['id'];

    // Realiza la eliminación del registro en tu base de datos
    $sql = "DELETE FROM alumno WHERE id_alumno = $id";

    // (Asegúrate de tener una conexión a la base de datos y una consulta de eliminación adecuadas aquí)

    if ($conexion->query($sql) === TRUE) {
        echo "Alumno Eliminado";
    } else {
        echo "Error al intentar eliminar Alumno: " . $conexion->error;
    }

    // Cierra la conexión
    $conexion->close();
}
?>
