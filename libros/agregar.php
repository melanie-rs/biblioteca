<?php

require_once "../config/conexion.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $titulo = $_POST["titulo"];
    $autor = $_POST["autor"];
    $editorial = $_POST["editorial"];
    $anio = $_POST["anio"];

    $sql = "INSERT INTO libros (titulo, autor, editorial, `año`)
            VALUES ('$titulo', '$autor', '$editorial', '$anio')";

    mysqli_query($conexion, $sql);

    header("Location: listar.php");
    exit();
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agregar Libro</title>
</head>

<body>

    <h1>Agregar Libro</h1>

    <form method="POST">

        <label for="titulo">Título:</label>
        <input type="text" id="titulo" name="titulo" required>
        <br><br>

        <label for="autor">Autor:</label>
        <input type="text" id="autor" name="autor" required>
        <br><br>

        <label for="editorial">Editorial:</label>
        <input type="text" id="editorial" name="editorial" required>
        <br><br>

        <label for="anio">Año:</label>
        <input type="number" id="anio" name="anio" required>
        <br><br>

        <button type="submit">Guardar libro</button>

    </form>

    <br>

    <a href="listar.php">Volver al listado</a>

</body>
</html>