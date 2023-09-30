<?php include("database.php") ?>
<?php include("includes/header.php") ?>

    <div class="container">

        <div class="row">

            <div class="col-md-4 m-3">

            <?php if(isset($_SESSION["mensaje"])){ ?> <!-- Notificar estado mediante mensaje -->

                <div class="alert alert-<?= $_SESSION["tipo_mensaje"]; ?> alert-dismissible fade show" role="alert">
                    <?= $_SESSION["mensaje"] ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>

             <?php session_unset(); } ?> <!-- limpiar datos de sesión (borrar mensaje) -->

                <div class="card card-body m-3">

                    <form action="save.php" method="POST">

                        <div class="form-group m-2">
                            <input type="text" name="titulo" class="form-control"  placeholder="Título tarea" autofocus>
                        </div>
                        
                        <div class="form-group m-1">
                            <textarea name="description" id="" cols="20" rows="2" class="form-control" placeholder="Descripción"></textarea>
                        </div>
                        <input type="submit" class="btn btn-success btn-block m-1" value="Guardar" name="guardar_tarea">
                    </form>

                </div>

            </div>

            <div class="col-md-8">

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Título</th>
                            <th>Descripción</th>
                            <th>Fecha</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        $sql = "SELECT * FROM tareas";

                        $tareas = mysqli_query($conn, $sql);

                        while($fila = mysqli_fetch_array($tareas)){ ?>

                            <tr>
                                <td> <?= $fila["titulo"] ?> </td>
                                <td> <?= $fila["descripcion"] ?> </td>
                                <td> <?= $fila["fecha_creacion"] ?> </td>
                                <td>
                                    <a href="edit.php?id=<?= $fila["id"]?>" class="btn btn-secondary">
                                        <i class="fas fa-marker"></i>
                                    </a>
                                    <a href="delete.php?id=<?= $fila["id"]?>" class="btn btn-danger">
                                        <i class="far fa-trash-alt"></i>
                                    </a>
                                </td>
                            </tr>

                        <?php  } ?>
                        
                    </tbody>
                </table>

            </div>
        </div>
    </div>

    
<?php include("includes/footer.php") ?>
