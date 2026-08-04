<?php

require_once "../config/conexion.php";

$sql = "SELECT * FROM libros";

$resultado = mysqli_query($conexion, $sql);

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Libros</title>
</head>

<body>

    <h1>Listado de Libros</h1>

    <table border="1">
        <tr>
            <th>ID</th>
            <th>Título</th>
            <th>Autor</th>
            <th>Editorial</th>
            <th>Año</th>
            <th>Acciones</th>
        </tr>

        <?php while ($libro = mysqli_fetch_assoc($resultado)) { ?>

            <tr>
                <td><?php echo $libro['id']; ?></td>
                <td><?php echo $libro['titulo']; ?></td>
                <td><?php echo $libro['autor']; ?></td>
                <td><?php echo $libro['editorial']; ?></td>
                <td><?php echo $libro['año']; ?></td>
                <td><a href="editar.php?id=<?php echo $libro['id']; ?>">Editar</a>
                    <a href="eliminar.php?id=<?php echo $libro['id']; ?>">Eliminar</a></td>
            </tr>

        <?php } ?>

    </table>

</body>
</html>