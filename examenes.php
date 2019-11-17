<?php include("db.php"); ?>
<?php include("includes/header.php"); $url = basename($_SERVER['PHP_SELF']);
$query = $_SERVER['QUERY_STRING'];
if($query){
$url .= "?".$query;
}
$_SESSION['current_page'] = $url;?>
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
                <div class="col-md-3">
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
					<option value="Microbiología">Microbiología</option>
                                        <option value="Hematología">Hematología</option>
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
                            Buscar Examenes
                    </div>
                    <div class="card card-body">
                        <form action="" method="POST">
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <select class="form-control" name="tipo1">
                                        <option value="Parcial de Orina">Parcial de Orina</option>
                                        <option value="Hemograma">Hemograma</option>
                                        <option value="Coprologico">Coprologico</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col">
									<input type="date" name="inicio1" class="form-control" value="1999-01-01" min="1999-01-01" max="2050-01-01" step="1">
							    </div>
							    <div class="col">
									<input type="date" name="fin1" class="form-control" value="2050-01-01" min="1999-01-01" max="2050-01-01" step="1">
							    </div>
                                <div class="col">
									<input type="submit" class="btn btn-success btn-block" name="buscarex" value="Buscar">
								</div>
                            </div>
                        </form>
                    </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="cardtitle">
                            Lista Examenes
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <th>#</th>
                                    <th>Nombre del Paciente</th>
                                    <th>Documento del Paciente</th>
                                    <th>Tipo de Examen</th>
                                    <th>Fecha de Creacion</th>
                                    <th>Acción</th>
                                </thead>
                                <tbody>
                                    <?php
                                    if (isset($_POST['buscarex'])) {
                                        $tipo = $_POST['tipo1'];
                                        $inicio1 = $_POST['inicio1'];
                                        $fin1= $_POST['fin1'];
                                        $query10= "SELECT * FROM examenes WHERE tipo='$tipo' and fecha >= '$inicio1' AND fecha <= '$fin1'";
                                        $examenes1 = mysqli_query($conn, $query10);
                                        $numero = 0;
                                    while ($row = mysqli_fetch_array($examenes1)) { ?>
                                        <?php $numero += 1; 
                                        $doc=$row['doc_paciente'];
                                        $query2 = "SELECT * FROM pacientes WHERE identificacion=$doc";
                                        $paciente_query = mysqli_query($conn, $query2);
                                        $paciente_info = mysqli_fetch_array($paciente_query);
                                        $paciente_name = $paciente_info['nombre'];
                                        ?>
                                        <tr>
                                            <td><?php echo $numero ?></td>
                                            <td><?php echo $paciente_name?></td>
                                            <td><?php echo $row['doc_paciente']?></td>
                                            <td><?php echo $row['tipo'] ?></td>
                                            <td><?php echo $row['fecha'] ?></td>
                                            <td>
                                                <a href="edit_ex.php?examen_id=<?php echo $row['examen_id'] ?>" class="btn btn-secondary">
                                                    <i class="fas fa-marker"></i>
                                                </a>
                                                <a href="del_ex.php?examen_id=<?php echo $row['examen_id'] ?>" class="btn btn-danger">
                                                    <i class="far fa-trash-alt"></i>
                                                </a>
                                                <a href="view_ex.php?examen_id=<?php echo $row['examen_id'] ?>" class="btn btn-success">
                                                    <i class="far fa-eye"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php }
                                    }else{
                                    $query = "SELECT * FROM examenes ORDER BY fecha DESC";
                                    $examenes = mysqli_query($conn, $query);
                                    $numero = 0;
                                    while ($row = mysqli_fetch_array($examenes)) { ?>
                                        <?php $numero += 1; 
                                        $doc=$row['doc_paciente'];
                                        $query2 = "SELECT * FROM pacientes WHERE identificacion=$doc";
                                        $paciente_query = mysqli_query($conn, $query2);
                                        $paciente_info = mysqli_fetch_array($paciente_query);
                                        $paciente_name = $paciente_info['nombre'];
                                        ?>
                                        <tr>
                                            <td><?php echo $numero ?></td>
                                            <td><?php echo $paciente_name?></td>
                                            <td><?php echo $row['doc_paciente']?></td>
                                            <td><?php echo $row['tipo'] ?></td>
                                            <td><?php echo $row['fecha'] ?></td>
                                            <td>
                                                <a href="edit_ex.php?examen_id=<?php echo $row['examen_id'] ?>" class="btn btn-secondary">
                                                    <i class="fas fa-marker"></i>
                                                </a>
                                                <a href="del_ex.php?examen_id=<?php echo $row['examen_id'] ?>" class="btn btn-danger">
                                                    <i class="far fa-trash-alt"></i>
                                                </a>
                                                <a href="view_ex.php?examen_id=<?php echo $row['examen_id'] ?>" class="btn btn-success">
                                                    <i class="far fa-eye"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php }
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php');?>
