<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require "conexion.php";

    // Obtén los datos del formulario
    $ficha = $_POST["ficha"];
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $telefono = $_POST["telefono"];
    $email = $_POST["email"];
    $materias = $_POST["materias"];

    // Escapa los datos para evitar SQL Injection
    $ficha = $conexion->real_escape_string($ficha);
    $nombre = $conexion->real_escape_string($nombre);
    $apellido = $conexion->real_escape_string($apellido);
    $telefono = $conexion->real_escape_string($telefono);
    $email = $conexion->real_escape_string($email);
    $materias = $conexion->real_escape_string($materias);


    // Realiza la inserción en la base de datos (ejemplo)
    $sql = "INSERT INTO alumno (id_alumno, nombre_alumno, apellido_alumno, telefono_alumno, email_alumno, materia_alumno) VALUES ('$ficha', '$nombre', '$apellido', '$telefono', '$email', '$materias')";

    if ($conexion->query($sql) === TRUE) {
        echo "Alumno registrado correctamente";
    } else {
        echo "Error al intentar registrar Alumno: " . $conexion->error;
    }

    // Cierra la conexión
    $conexion->close();
}
?>
