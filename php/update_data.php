<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require "conexion.php";

    // Obtén los datos del formulario
    $id = $_POST["id_update"];
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $telefono = $_POST["telefono"];
    $email = $_POST["email"];
    $materias = $_POST["materias"];

    // Escapa los datos para evitar SQL Injection
    $id = $conexion->real_escape_string($id);
    $nombre = $conexion->real_escape_string($nombre);
    $apellido = $conexion->real_escape_string($apellido);
    $telefono = $conexion->real_escape_string($telefono);
    $email = $conexion->real_escape_string($email);
    $materias = $conexion->real_escape_string($materias);

    // Realiza la inserción en la base de datos (ejemplo)
    $sql = "UPDATE alumno SET nombre_alumno = '$nombre', apellido_alumno = '$apellido', telefono_alumno = '$telefono', email_alumno = '$email', materia_alumno = '$materias' WHERE id_alumno = '$id'";

    if ($conexion->query($sql) === TRUE) {
        echo "Datos actualizados correctamente";
    } else {
        echo "Error al actualizar Datos: " . $conexion->error;
    }

    // Cierra la conexión
    $conexion->close();
}

?>
