<?php include("db.php"); 

if(isset($_GET['paciente_id'])){
    $id1= $_GET['paciente_id'];
    $query = "SELECT * FROM pacientes WHERE paciente_id='$id1'";
    $result2 = mysqli_query($conn, $query);
    if(mysqli_num_rows($result2) == 1){
        $row = mysqli_fetch_array($result2);
        $nombre= $row['nombre'];
        $docu= $row['identificacion'];
        $fechanac= $row['fechanac'];
	    $eps= $row['eps'];
        $entidad= $row['entidad'];
        $dir= $row['direccion'];
        $telefono= $row['telefono'];
        $email= $row['email'];
        $observaciones= $row['observaciones'];
    }
}
if(isset($_POST['update'])){
    $id2 = $_GET['paciente_id'];
    $nombre2= $_POST['pname'];
    $docu2= $_POST['doc'];
    $fechanac2= $_POST['bthdate'];
	$eps2= $_POST['eps'];
    $entidad2= $_POST['entity'];
    $dire= $_POST['address'];
    $tele= $_POST['phonenum'];
    $emeil= $_POST['email'];
    $obse= $_POST['obs'];
    $query = "UPDATE pacientes set nombre = '$nombre2', identificacion = '$docu2', eps ='$eps2', entidad='$entidad2',
    fechanac = '$fechanac2', direccion = '$dire', telefono='$tele', email='$emeil', observaciones='$obse' WHERE paciente_id=$id2";
    mysqli_query($conn, $query);
    header("Location: pacientes.php");
}
?>


<?php include("includes/header.php") ?>

<div class="container p-4 con" id="contenido">
	<div class="card card-body" id="card">
		<div class="row">
                <div class="col-sm-3">
				<?php if (isset($_SESSION['message'])) { ?>
					<div class="alert alert-<?= $_SESSION['message_type'] ?> alert-dismissible fade show" role="alert">
						<?= $_SESSION['message'] ?>
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
				<?php session_unset();
				} ?>
				<div class="card" id="formulario">
					<div class="card-header" id="cardtitle">
						Editar Información Paciente
					</div>
					<div class="card-body">
						<form action="edit_pac.php?paciente_id= <?php echo $_GET['paciente_id']; ?>" method="POST">
							<div class="form-group">
								<label for="patient-name">Nombres y Apellidos</label>
								<input type="text" name="pname" value="<?php echo $nombre?>" class="form-control" placeholder="Nombre" autofocus>
							</div>
							<div class="form-group">
								<label for="document">Número de Documento</label>
								<input type="int" name="doc" value="<?php echo $docu?>" class="form-control" placeholder="Identificación">
							</div>
							<div class="form-group">
								<label for="birth-date">Fecha de Nacimiento</label>
								<input type="date" name='bthdate' value="<?php echo $fechanac?>" class="form-control">
							</div>
							<div class="form-group">
							<label for="eps">EPS</label>
									<select class="form-control" name="eps">
										<option value="<?php echo $eps?>"><?php echo $eps?></option>
										<?php
										$query = "SELECT * FROM epses";
										$eps_table = mysqli_query($conn, $query);
										while ($row = mysqli_fetch_array($eps_table)) { ?>
											<option value="<?php echo $row['nombre'] ?>"><?php echo $row['nombre'] ?></option>
										<?php } ?>
									</select>
								</div>
								<div class="form-group">
								<label for="entity">Entidad</label>
									<select class="form-control" name="entity">
										<option value="<?php echo $entidad?>"><?php echo $entidad?></option>
										<?php
										$query = "SELECT * FROM entidades";
										$ent_table = mysqli_query($conn, $query);
										while ($row = mysqli_fetch_array($ent_table)) { ?>
											<option value="<?php echo $row['nombre'] ?>"><?php echo $row['nombre'] ?></option>
										<?php } ?>
									</select>
								</div>
							<div class="form-group">
								<label for="address">Dirección</label>
								<input type="text" name="address" value="<?php echo $dir?>" class="form-control" placeholder="Dirección">
							</div>
							<div class="form-group">
								<label for="phone-number">Número de Telefono</label>
								<input type="int" name="phonenum" value="<?php echo $telefono?>" class="form-control" placeholder="Telefono">
							</div>
							<div class="form-group">
								<label for="e-mail">Correo Electrónico</label>
								<input type="text" name="email" value="<?php echo $email?>" class="form-control" placeholder="ejemplo@ejemplo.com">
							</div>
							<div class="form-group">
								<label for="observations">Observaciones</label>
								<textarea name="obs" rows="3" class="form-control" placeholder="Observaciones"><?php echo htmlspecialchars($observaciones); ?></textarea>
							</div>
							<input type="submit" class="btn btn-success btn-block" name="update" value="Actualizar Info">
						</form>
					</div>
				</div>
            </div>
</div>
<?php include("includes/footer.php") ?>


