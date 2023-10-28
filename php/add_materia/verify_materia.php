<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require "../conexion.php";

    $materia = $_POST['materia'];
    $materia = $conexion->real_escape_string($materia);

    $sql = "SELECT * FROM materia WHERE nombre_materia = '$materia'";
    $resultado = mysqli_query($conexion, $sql);

    if (mysqli_num_rows($resultado) > 0) {
        echo "Materia registrada";
    } else {
        echo "Materia no registrada";
    }

    $conexion->close();
}
?>