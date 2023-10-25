<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require "../conexion.php";

    // Recibe la Ficha desde JavaScript
    $ficha = $_POST['ficha'];

    // Escapa la Ficha para evitar inyección SQL
    $ficha = $conexion->real_escape_string($ficha);

    // Realiza la consulta para verificar si la Ficha existe
    $sql = "SELECT * FROM alumno WHERE id_alumno = '$ficha'";
    $resultado = mysqli_query($conexion, $sql);

    // Comprueba si se encontró alguna fila en la consulta
    if (mysqli_num_rows($resultado) > 0) {
        // La Ficha existe en la base de datos
        echo "La ficha ya está registrada";
    } else {
        // La Ficha no existe en la base de datos
        echo "La ficha no está registrada";
    }

    // Cierra la conexión
    $conexion->close();
}
?>