<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require "../conexion.php";

    $email = $_POST['email'];
    $email = $conexion->real_escape_string($email);

    $sql = "SELECT * FROM alumno WHERE email_alumno = '$email'";
    $resultado = mysqli_query($conexion, $sql);

    if (mysqli_num_rows($resultado) > 0) {
        echo "El E-mail ya está registrado";
    } else {
        echo "El E-mail no está registrado";
    }

    $conexion->close();
}
?>