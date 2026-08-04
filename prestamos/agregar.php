<?php

require_once "../config/conexion.php";


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $libro_id = $_POST["libro_id"];
    $socio_id = $_POST["socio_id"];
    $fecha_prestamo = $_POST["fecha_prestamo"];
    $fecha_devolucion = $_POST["fecha_devolucion"];

    // Verificar si el libro ya está prestado
    $sqlVerificar = "SELECT id 
                     FROM prestamos 
                     WHERE libro_id = $libro_id 
                     AND fecha_devolucion IS NULL";

    $resultadoVerificar = mysqli_query($conexion, $sqlVerificar);

    if (mysqli_num_rows($resultadoVerificar) > 0) {

        echo "No se puede registrar el préstamo. El libro ya está prestado.";

    } else {

        if ($fecha_devolucion == "") {
            $fecha_devolucion = NULL;
        }

        $sql = "INSERT INTO prestamos 
                (libro_id, socio_id, fecha_prestamo, fecha_devolucion)
                VALUES ('$libro_id', '$socio_id', '$fecha_prestamo', " .
                ($fecha_devolucion === NULL ? "NULL" : "'$fecha_devolucion'") . ")";

        mysqli_query($conexion, $sql);

        header("Location: listar.php");
        exit();
    }
}


$sqlLibros = "SELECT * FROM libros";
$resultadoLibros = mysqli_query($conexion, $sqlLibros);

$sqlSocios = "SELECT * FROM socios";
$resultadoSocios = mysqli_query($conexion, $sqlSocios);

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registrar Préstamo</title>
</head>

<body>

    <h1>Registrar Préstamo</h1>

    <form method="POST">

        <label for="libro_id">Libro:</label>

        <select name="libro_id" id="libro_id" required>

            <option value="">Seleccionar libro</option>

            <?php while ($libro = mysqli_fetch_assoc($resultadoLibros)) { ?>

                <option value="<?php echo $libro['id']; ?>">
                    <?php echo $libro['titulo']; ?>
                </option>

            <?php } ?>

        </select>

        <br><br>


        <label for="socio_id">Socio:</label>

        <select name="socio_id" id="socio_id" required>

            <option value="">Seleccionar socio</option>

            <?php while ($socio = mysqli_fetch_assoc($resultadoSocios)) { ?>

                <option value="<?php echo $socio['id']; ?>">
                    <?php echo $socio['nombre'] . " " . $socio['apellido']; ?>
                </option>

            <?php } ?>

        </select>

        <br><br>


        <label for="fecha_prestamo">Fecha de préstamo:</label>

        <input 
            type="date" 
            id="fecha_prestamo" 
            name="fecha_prestamo"
            required
        >

        <br><br>


        <label for="fecha_devolucion">Fecha de devolución:</label>

        <input 
            type="date" 
            id="fecha_devolucion" 
            name="fecha_devolucion"
        >

        <br><br>


        <button type="submit">Registrar préstamo</button>

    </form>

    <br>

    <a href="listar.php">Volver al listado</a>

</body>
</html>