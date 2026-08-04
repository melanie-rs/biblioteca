<?php

require_once "../config/conexion.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $dni = $_POST["dni"];
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $telefono = $_POST["telefono"];
    $email = $_POST["email"];

    $sql = "INSERT INTO socios (dni, nombre, apellido, telefono, email)
            VALUES ('$dni', '$nombre', '$apellido', '$telefono', '$email')";

    mysqli_query($conexion, $sql);

    header("Location: listar.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agregar Socio</title>
</head>

<body>

    <h1>Agregar Socio</h1>

    <form method="POST">

        <label for="dni">DNI:</label>
        <input type="text" id="dni" name="dni" required>
        <br><br>

        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required>
        <br><br>

        <label for="apellido">Apellido:</label>
        <input type="text" id="apellido" name="apellido" required>
        <br><br>

        <label for="telefono">Teléfono:</label>
        <input type="text" id="telefono" name="telefono" required>
        <br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <br><br>

        <button type="submit">Guardar socio</button>

    </form>

    <br>

    <a href="listar.php">Volver al listado</a>

</body>
</html>