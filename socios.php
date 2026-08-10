<?php

require_once "cnn.php";

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

    <?php require_once "menu.php"; ?>

    <h1>Listado de Socios</h1>

    <table border="1">

        <tr>
            <th>ID</th>
            <th>DNI</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Teléfono</th>
            <th>Email</th>
        </tr>

        <?php while ($socio = mysqli_fetch_assoc($resultado)) { ?>

            <tr>

                <td><?php echo $socio['id']; ?></td>

                <td><?php echo $socio['dni']; ?></td>

                <td><?php echo $socio['nombre']; ?></td>

                <td><?php echo $socio['apellido']; ?></td>

                <td><?php echo $socio['telefono']; ?></td>

                <td><?php echo $socio['email']; ?></td>

            </tr>

        <?php } ?>

    </table>

</body>
</html>