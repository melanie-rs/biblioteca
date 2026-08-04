<?php

require_once "../config/conexion.php";

$id = $_GET["id"];

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $dni = $_POST["dni"];
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $telefono = $_POST["telefono"];
    $email = $_POST["email"];

    $sql = "UPDATE socios
            SET dni = '$dni',
                nombre = '$nombre',
                apellido = '$apellido',
                telefono = '$telefono',
                email = '$email'
            WHERE id = $id";

    mysqli_query($conexion, $sql);

    header("Location: listar.php");
    exit();
}

$sql = "SELECT * FROM socios WHERE id = $id";

$resultado = mysqli_query($conexion, $sql);

$socio = mysqli_fetch_assoc($resultado);

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Socio</title>
</head>

<body>

    <h1>Editar Socio</h1>

    <form method="POST">

        <label for="dni">DNI:</label>
        <input 
            type="text" 
            id="dni" 
            name="dni"
            value="<?php echo $socio['dni']; ?>"
            required
        >
        <br><br>

        <label for="nombre">Nombre:</label>
        <input 
            type="text" 
            id="nombre" 
            name="nombre"
            value="<?php echo $socio['nombre']; ?>"
            required
        >
        <br><br>

        <label for="apellido">Apellido:</label>
        <input 
            type="text" 
            id="apellido" 
            name="apellido"
            value="<?php echo $socio['apellido']; ?>"
            required
        >
        <br><br>

        <label for="telefono">Teléfono:</label>
        <input 
            type="text" 
            id="telefono" 
            name="telefono"
            value="<?php echo $socio['telefono']; ?>"
            required
        >
        <br><br>

        <label for="email">Email:</label>
        <input 
            type="email" 
            id="email" 
            name="email"
            value="<?php echo $socio['email']; ?>"
            required
        >
        <br><br>

        <button type="submit">Guardar cambios</button>

    </form>

    <br>

    <a href="listar.php">Volver al listado</a>

</body>
</html>