<?php

require_once "../config/conexion.php";

$sql = "SELECT * FROM socios";

$resultado = mysqli_query($conexion, $sql);

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Socios</title>
</head>

<body>

    <?php require_once "../includes/nav.php"; ?>

    <h1>Listado de Socios</h1>

    <a href="agregar.php">Agregar socio</a>

    <br><br>

    <table border="1">

        <tr>
            <th>ID</th>
            <th>DNI</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Teléfono</th>
            <th>Email</th>
            <th>Acciones</th>
        </tr>

        <?php while ($socio = mysqli_fetch_assoc($resultado)) { ?>

            <tr>

                <td><?php echo $socio['id']; ?></td>

                <td><?php echo $socio['dni']; ?></td>

                <td><?php echo $socio['nombre']; ?></td>

                <td><?php echo $socio['apellido']; ?></td>

                <td><?php echo $socio['telefono']; ?></td>

                <td><?php echo $socio['email']; ?></td>

                <td>
                    <a href="editar.php?id=<?php echo $socio['id']; ?>">
                        Editar
                    </a>
                    |
                    <a href="eliminar.php?id=<?php echo $socio['id']; ?>">
                        Eliminar
                    </a>
                </td>

            </tr>

        <?php } ?>

    </table>

</body>
</html>