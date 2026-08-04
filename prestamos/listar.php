<?php

require_once "../config/conexion.php";

$sql = "SELECT 
            prestamos.id,
            libros.titulo,
            socios.nombre,
            socios.apellido,
            prestamos.fecha_prestamo,
            prestamos.fecha_devolucion
        FROM prestamos
        INNER JOIN libros ON prestamos.libro_id = libros.id
        INNER JOIN socios ON prestamos.socio_id = socios.id";

$resultado = mysqli_query($conexion, $sql);

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Préstamos</title>
</head>

<body>

    <?php require_once "../includes/nav.php"; ?>

    <h1>Listado de Préstamos</h1>

    <a href="agregar.php">Registrar préstamo</a>

    <br><br>

    <table border="1">

        <tr>
            <th>ID</th>
            <th>Libro</th>
            <th>Socio</th>
            <th>Fecha de préstamo</th>
            <th>Fecha de devolución</th>
            <th>Acciones</th>
        </tr>

        <?php while ($prestamo = mysqli_fetch_assoc($resultado)) { ?>

            <tr>

                <td>
                    <?php echo $prestamo['id']; ?>
                </td>

                <td>
                    <?php echo $prestamo['titulo']; ?>
                </td>

                <td>
                    <?php echo $prestamo['nombre'] . " " . $prestamo['apellido']; ?>
                </td>

                <td>
                    <?php echo $prestamo['fecha_prestamo']; ?>
                </td>

                <td>
                    <?php
                    if ($prestamo['fecha_devolucion'] == NULL) {
                        echo "Pendiente";
                    } else {
                        echo $prestamo['fecha_devolucion'];
                    }
                    ?>
                </td>

                <td>

                    <?php if ($prestamo['fecha_devolucion'] == NULL) { ?>

                        <a href="devolver.php?id=<?php echo $prestamo['id']; ?>">
                            Devolver
                        </a>

                    <?php } else { ?>

                        Devuelto

                    <?php } ?>

                </td>

            </tr>

        <?php } ?>

    </table>

</body>
</html>