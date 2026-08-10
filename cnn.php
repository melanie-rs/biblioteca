<?php

$conexion = mysqli_connect("localhost", "root", "", "biblioteca");

if (!$conexion) {
    die("Error al conectar a la base de datos");
}

mysqli_set_charset($conexion, "utf8mb4");

?>