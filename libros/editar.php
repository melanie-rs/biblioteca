<?php

require_once "../config/conexion.php";

$id = $_GET["id"];

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $titulo = $_POST["titulo"];
    $autor = $_POST["autor"];
    $editorial = $_POST["editorial"];
    $anio = $_POST["anio"];

    $sql = "UPDATE libros 
            SET titulo = '$titulo',
                autor = '$autor',
                editorial = '$editorial',
                `año` = '$anio'
            WHERE id = $id";

    mysqli_query($conexion, $sql);

    header("Location: listar.php");
    exit();
}

$sql = "SELECT * FROM libros WHERE id = $id";

$resultado = mysqli_query($conexion, $sql);

$libro = mysqli_fetch_assoc($resultado);

?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Libro</title>
</head>

<body>

    <h1>Editar Libro</h1>

    <form method="POST">

        <label for="titulo">Título:</label>
        <input 
            type="text" 
            id="titulo" 
            name="titulo" 
            value="<?php echo $libro['titulo']; ?>" 
            required
        >
        <br><br>

        <label for="autor">Autor:</label>
        <input 
            type="text" 
            id="autor" 
            name="autor" 
            value="<?php echo $libro['autor']; ?>" 
            required
        >
        <br><br>

        <label for="editorial">Editorial:</label>
        <input 
            type="text" 
            id="editorial" 
            name="editorial" 
            value="<?php echo $libro['editorial']; ?>" 
            required
        >
        <br><br>

        <label for="anio">Año:</label>
        <input 
            type="number" 
            id="anio" 
            name="anio" 
            value="<?php echo $libro['año']; ?>" 
            required
        >
        <br><br>

        <button type="submit">Guardar cambios</button>

    </form>

    <br>

    <a href="listar.php">Volver al listado</a>

</body>
</html>