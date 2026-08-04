<?php

require_once "../config/conexion.php";

$id = $_GET["id"];

$fecha_devolucion = date("Y-m-d");

$sql = "UPDATE prestamos
        SET fecha_devolucion = '$fecha_devolucion'
        WHERE id = $id";

mysqli_query($conexion, $sql);

header("Location: listar.php");
exit();

?>