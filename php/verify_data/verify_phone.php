<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require "../conexion.php";

    $phone = $_POST['phone'];
    $phone = $conexion->real_escape_string($phone);

    $sql = "SELECT * FROM alumno WHERE telefono_alumno = '$phone'";
    $resultado = mysqli_query($conexion, $sql);

    if (mysqli_num_rows($resultado) > 0) {
        echo "El teléfono ya está registrado";
    } else {
        echo "El teléfono no está registrado";
    }

    $conexion->close();
}
?>