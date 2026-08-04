<?php

require_once "../config/conexion.php";

$id = $_GET["id"];

try {

    $sql = "DELETE FROM socios WHERE id = $id";

    mysqli_query($conexion, $sql);

    header("Location: listar.php");
    exit();

} catch (mysqli_sql_exception $e) {

    echo "No se puede eliminar este socio porque tiene préstamos registrados.";

}

?>