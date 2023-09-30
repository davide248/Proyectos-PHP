<?php

include ("database.php");

if(isset($_POST["guardar_tarea"])){
    $titulo = $_POST["titulo"];
    $descripcion = $_POST["description"];

    $sql = "INSERT INTO tareas (titulo, descripcion) VALUES ('$titulo', '$descripcion')";

    $resultado = mysqli_query($conn, $sql);

    if(!$resultado) die("Consulta fallida");

    $_SESSION["mensaje"] = "Tarea guardada correctamente";
    $_SESSION["tipo_mensaje"] = "success";

    header("Location: index.php");

 }
