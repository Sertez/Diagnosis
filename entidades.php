<?php include("db.php"); ?>
<?php include("includes/header.php"); ?>

<div class="container p-4 con" id="contenido">
    <div class="row">
        <div class="col-md-4">
            <?php if (isset($_SESSION['message'])) { ?>
                <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
                    <?= $_SESSION['message'] ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php session_unset();
            } ?>
            <div class="card">
                <div class="card-header" id="cardtitle">
                    Añadir Entidad
                </div>
                <div class="card-body">
                    <form action="save_ent.php" method="POST">
                        <div class="form-group">
                            <label for="entity-name">Nombre</label>
                            <input type="text" name="entname" class="form-control" placeholder="Nombre" autofocus>
                        </div>
                        <input type="submit" class="btn btn-success btn-block" name="save_ent" value="Registrar Entidad">
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header" id="cardtitle">
                    Lista de Entidades
                </div>
                <div class="card-body">
                    <table class="table table-bordered" id="table">
                        <div>
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nombre</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query = "SELECT * FROM entidades";
                                $ent_table = mysqli_query($conn, $query);
                                $numero=0;
                                while ($row = mysqli_fetch_array($ent_table)) { ?>
                                    <?php $numero += 1; ?>
                                    <tr>
                                    <td><?php echo $numero ?></td>
                                        <td><?php echo $row['nombre'] ?></td>
                                        <td>
                                            <a href="del_ent.php?entidad_id=<?php echo $row['entidad_id'] ?>" class="btn btn-danger">
                                                <i class="far fa-trash-alt"></i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </div>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include("includes/footer.php"); ?>