<?php include("db.php"); ?>
<?php include("includes/header.php"); ?>

<?php
if (isset($_GET['paciente_id'])) {
    $paciente_id = $_GET['paciente_id'];
    ?>
    <div class="container p-4 con" id="contenido">
        <div class="card card-body" id="card">
            <div class="row">
                <div class="col-sm-3">
                    <div class="card" id="formulario">
                        <div class="card-header" id="cardtitle">
                            Añadir Paciente
                        </div>
                        <div class="card-body">
                            <?php 
                                $query="SELECT * FROM pacientes WHERE paciente_id=$paciente_id";
                                $paciente = mysqli_query($conn, $query);
                                $row = mysqli_fetch_array($paciente);
                                $nombre = $row['nombre'];
                                $doc = $row['identificacion'];
                                $datebirth = $row['fechanac'];
                                $eps = $row['eps'];
                                $entidad = $row['entidad'];
                                $direccion = $row['direccion'];
                                $telefono = $row['telefono'];
                                $email = $row['email'];
                                $obs = $row['observaciones'];
                            ?>
                                <div class="form-group">
                                    <label for="patient-name">Nombres y Apellidos</label>
                                    <input type="text" name="pname" class="form-control" value="<?php echo $nombre?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="document">Número de Documento</label>
                                    <input type="int" name="doc" class="form-control" value="<?php echo $doc ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="birth-date">Fecha de Nacimiento</label>
                                    <input type="date" name='bthdate' class="form-control" value="<?php echo $datebirth ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="eps">EPS</label>
                                    <input type="text" name="eps" class="form-control" value="<?php echo $eps ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="entity">Entidad</label>
                                    <input type="text" name="entity" class="form-control" value="<?php echo $entidad ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="address">Dirección</label>
                                    <input type="text" name="address" class="form-control" value="<?php echo $direccion ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="phone-number">Número de Telefono</label>
                                    <input type="int" name="phonenum" class="form-control" value="<?php echo $telefono ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="e-mail">Correo Electrónico</label>
                                    <input type="text" name="email" class="form-control" value="<?php echo $email ?>"readonly>
                                </div>
                                <div class="form-group">
                                    <label for="observations">Observaciones</label>
                                    <textarea name="obs" rows="3" class="form-control" readonly><?php echo $obs ?></textarea>
                                </div>
                        </div>
                    </div>
                </div>
                <div class="col-l-8">
                    <div class="card">
                        <div class="card-header" id="cardtitle">
                            Lista de Examenes
                        </div>
                        <div class="card card-body">
                            <table class="table table-bordered" id="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Tipo de Examen</th>
                                        <th>Fecha de Creacion</th>
                                        <th>Acción</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $query = "SELECT * FROM examenes WHERE paciente_id=$paciente_id ORDER BY fecha DESC";
                                        $ex_table = mysqli_query($conn, $query);
                                        $numero = 0;
                                        unset($row);
                                        while ($row = mysqli_fetch_array($ex_table)) { ?>
                                        <?php $numero += 1; ?>
                                        <tr>
                                            <td><?php echo $numero ?></td>
                                            <td><?php echo $row['tipo'] ?></td>
                                            <td><?php echo $row['fecha'] ?></td>
                                            <td>
                                                <a href="view_ex.php?examen_id=<?php echo $row['examen_id'] ?>" class="btn btn-success">
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
<?php unset($_GET); } ?>
<?php include("includes/footer.php"); ?>