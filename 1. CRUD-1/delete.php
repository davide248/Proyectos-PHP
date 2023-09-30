<?php

include("database.php");

if(isset($_GET["id"])){
    $id = $_GET["id"];

    $sql = "DELETE FROM tareas WHERE id = $id";

    $resultado = mysqli_query($conn, $sql);

    if(!$resultado) die("Consulta fallida");

    $_SESSION["mensaje"] = "Tarea eliminada correctamente";
    $_SESSION["tipo_mensaje"] = "danger";

    header("Location: index.php");
}
