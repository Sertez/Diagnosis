<?php include("db.php"); ?>
<?php include("includes/header.php"); ?>

<div class="container p-4 con" id="contenido">
    <div class="card" id="card">
        <div class="card-body">
            <?php
            if (isset($_GET['paciente_id'])) {
                $paciente_id = $_GET['paciente_id'];
                $query = "SELECT identificacion FROM pacientes WHERE paciente_id=$paciente_id";
                $paciente_query = mysqli_query($conn, $query);
                $row = mysqli_fetch_array($paciente_query);
                $paciente_doc = $row['identificacion'];
            } else {
                $paciente_doc = "";
            }
            ?>
            <div class="row">
                <div class="col-md-4">
                    <?php if (isset($_SESSION['message'])) { ?>
                        <div class="alert alert-<?= $_SESSION['message_type'] ?> alert-dismissible fade show" role="alert">
                            <?= $_SESSION['message'] ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php session_unset();
                    } ?>
                    <div class="card">
                        <form action="save_ex.php" method="POST">
                            <div class="card-header" id="cardtitle">
                                Agregar Examen
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="documento">Documento del Paciente</label>
                                    <input name="doc" class="form-control" value="<?php echo $paciente_doc ?>" placeholder="Documento"></input>
                                </div>
                                <div class="form-group">
                                    <label for="tipo_examen">Examen a Realizar</label>
                                    <select class="form-control" name="tipo">
                                        <option value="Parcial de Orina">Parcial de Orina</option>
                                        <option value="Hemograma">Hemograma</option>
                                        <option value="Coprologico">Coprologico</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="btn btn-success btn-block" name="save_ex" value="Crear Examen">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-l-8">
                    <div class="card">
                        <div class="card-header" id="cardtitle">
                            Lista Examenes
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <th>#</th>
                                    <th>Tipo de Examen</th>
                                    <th>Fecha de Creacion</th>
                                    <th>Acción</th>
                                </thead>
                                <tbody>
                                    <?php
                                    $query = "SELECT * FROM examenes ORDER BY fecha DESC";
                                    $examenes = mysqli_query($conn, $query);
                                    $numero = 0;
                                    while ($row = mysqli_fetch_array($examenes)) { ?>
                                        <?php $numero += 1; ?>
                                        <tr>
                                            <td><?php echo $numero ?></td>
                                            <td><?php echo $row['tipo'] ?></td>
                                            <td><?php echo $row['fecha'] ?></td>
                                            <td>
                                                <a href="edit_ex.php?examen_id=<?php echo $row['examen_id'] ?>" class="btn btn-secondary">
                                                    <i class="fas fa-marker"></i>
                                                </a>
                                                <a href="ex_red.php?examen_id=<?php echo $row['examen_id'] ?>" class="btn btn-danger">
                                                    <i class="far fa-trash-alt"></i>
                                                </a>
                                                <a href="ex_red.php?examen_id=<?php echo $row['examen_id'] ?>" class="btn btn-success">
                                                    <i class="far fa-eye"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>