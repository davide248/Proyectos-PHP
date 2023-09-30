<?php

include("database.php");

if(isset($_GET["id"])){
    $id = $_GET["id"];

    $sql = "SELECT * FROM tareas WHERE id = $id";

    $resultado = mysqli_query($conn, $sql);

    if(mysqli_num_rows($resultado) == 1){

        $fila = mysqli_fetch_array($resultado);

        $titulo =  $fila["titulo"];
        $descripcion =  $fila["descripcion"];

    }

}

    if(isset($_POST["actulizar"])){
        $id = $_GET["id"];
        $titulo = $_POST["titulo"];
        $descripcion = $_POST["descripcion"];

        $sql = "UPDATE tareas SET titulo = '$titulo', descripcion = '$descripcion' WHERE id = $id";

        mysqli_query($conn, $sql);

        $_SESSION["mensaje"] = "Tarea editada correctamente";
        $_SESSION["tipo_mensaje"] = "warning";

        header("Location: index.php");
    }

?>


<?php include("includes/header.php") ?>

    <div class="container p-4">
        <div class="row">
            <div class="col-md-4 mx-auto">
                <div class="car card-body">
                    <form action="edit.php?id=<?= $_GET["id"]; ?>" method="POST">

                        <div class="form-group m-2">
                            <input type="text" name="titulo" value="<?= $titulo; ?>" class="form-control" placeholder="Actualiza el título">
                            </div>

                        <div class="form-group m-2">
                            <textarea name="descripcion" id="" cols="20" rows="2" class="form-control" placeholder="Actualiza la descripción" ><?= $descripcion; ?></textarea>
                        </div>

                        <button class="btn btn-success" name="actulizar">Actulizar</button>

                    </form>
                </div>
            </div>
        </div>
    </div>

<?php include("includes/footer.php") ?>