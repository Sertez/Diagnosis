<?php include("db.php"); ?>
<?php include("includes/header.php"); ?>

<?php
function calculaedad($fechanacimiento)
{
	list($ano, $mes, $dia) = explode("-", $fechanacimiento);
	$ano_diferencia  = date("Y") - $ano;
	$mes_diferencia = date("m") - $mes;
	$dia_diferencia   = date("d") - $dia;
	if ($dia_diferencia < 0 || $mes_diferencia < 0)
		$ano_diferencia--;
	return $ano_diferencia;
}
?>

<div class="container p-4 con" id="contenido">
	<div class="card card-body" id="card">
		<div class="row">
			<div class="col-sm-2">
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
						Añadir Paciente
					</div>
					<div class="card-body">
						<form action="save_pac.php" method="POST">
							<div class="form-group">
								<label for="patient-name">Nombres y Apellidos</label>
								<input type="text" name="pname" class="form-control" placeholder="Nombre" autofocus>
							</div>
							<div class="form-group">
								<label for="document">Número de Documento</label>
								<input type="int" name="doc" class="form-control" placeholder="Identificación">
							</div>
							<div class="form-group">
								<label for="birth-date">Fecha de Nacimiento</label>
								<input type="date" name='bthdate' class="form-control">
							</div>
							<div class="form-group">
								<label for="eps">EPS</label>
								<select class="form-control" name="eps">
									<?php
									$query = "SELECT * FROM epses";
									$eps_table = mysqli_query($conn, $query);
									while ($row = mysqli_fetch_array($eps_table)) { ?>
										<option value="<?php echo $row['nombre'] ?>"><?php echo $row['nombre'] ?></option>
									<?php } ?>
								</select>
							</div>
							<div class="form-group">
								<label for="rem-entity">Entidad Remitente</label>
								<select class="form-control" name="entity">
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
								<input type="text" name="address" class="form-control" placeholder="Dirección">
							</div>
							<div class="form-group">
								<label for="phone-number">Número de Telefono</label>
								<input type="int" name="phonenum" class="form-control" placeholder="Telefono">
							</div>
							<div class="form-group">
								<label for="e-mail">Correo Electrónico</label>
								<input type="text" name="email" class="form-control" placeholder="ejemplo@ejemplo.com">
							</div>
							<div class="form-group">
								<label for="observations">Observaciones</label>
								<textarea name="obs" rows="3" class="form-control" placeholder="Observaciones"></textarea>
							</div>
							<input type="submit" class="btn btn-success btn-block" name="save_pac" value="Registrar Paciente">
						</form>
					</div>
				</div>
			</div>
			<div class="col-l-8">
				<div class="card">
					<div class="card-header" id="cardtitle">
						Buscar Paciente
					</div>
					<div class="card card-body">
						<form action="" method="POST">
							<div class="row">
								<div class="col">
									<input type="text" name="nombre" class="form-control" placeholder="Buscar nombre" autofocus>
								</div>
								<div class="col">
									<input type="int" name="identificacion" class="form-control" placeholder="Buscar documento" autofocus>
								</div>
								<div class="col">
									<select class="form-control" name="eps">
										<option value="">Buscar EPS</option>
										<?php
										$query = "SELECT * FROM epses";
										$eps_table = mysqli_query($conn, $query);
										while ($row = mysqli_fetch_array($eps_table)) { ?>
											<option value="<?php echo $row['nombre'] ?>"><?php echo $row['nombre'] ?></option>
										<?php } ?>
									</select>
								</div>
								<div class="col">
									<select class="form-control" name="entidad">
										<option value="">Bucar Entidad</option>
										<?php
										$query = "SELECT * FROM entidades";
										$ent_table = mysqli_query($conn, $query);
										while ($row = mysqli_fetch_array($ent_table)) { ?>
											<option value="<?php echo $row['nombre'] ?>"><?php echo $row['nombre'] ?></option>
										<?php } ?>
									</select>
								</div>
								<div class="col">
									<input type="date" name="inicio" class="form-control" value="1999-01-01" min="1999-01-01" max="2050-01-01" step="1">
								</div>
								<div class="col">
									<input type="date" name="fin" class="form-control" value="2050-01-01" min="1999-01-01" max="2050-01-01" step="1">
								</div>
								<div class="col">
									<input type="submit" class="btn btn-success btn-block" name="buscar" value="Buscar">
								</div>
							</div>
						</form>
					</div>
				</div>
				<div class="card">
					<div class="card-header" id="cardtitle">
						Lista Pacientes
					</div>
					<div class="card card-body">
						<table class="table table-bordered" id="table">
							<thead>
								<tr>
									<th>#</th>
									<th>Nombre</th>
									<th>Documento</th>
									<th>Edad</th>
									<th>EPS</th>
									<th>Entidad</th>
									<th>Fecha Creacion</th>
									<th>Acción</th>
								</tr>
							</thead>
							<tbody>
								<?php
								if (isset($_POST['buscar'])) {
									$nombre = $_POST['nombre'];
									$docu = $_POST['identificacion'];
									$eps = $_POST['eps'];
									$entidad = $_POST['entidad'];
									$inicio = $_POST['inicio'];
									$fin = $_POST['fin'];
									$query = "SELECT * FROM pacientes WHERE nombre LIKE '%{$nombre}%' and identificacion LIKE '%{$docu}%'
									AND eps LIKE '%{$eps}%' AND entidad LIKE '%{$entidad}%' and fecha_creacion >= '$inicio' AND fecha_creacion <= '$fin' 
									ORDER BY fecha_creacion DESC";
									$pac_table = mysqli_query($conn, $query);
									$numero = 0;
									while ($row = mysqli_fetch_array($pac_table)) { ?>
										<?php $numero += 1; ?>
										<tr>
											<td><?php echo $numero ?></td>
											<td><?php echo $row['nombre'] ?></td>
											<td><?php echo $row['identificacion'] ?></td>
											<td><?php echo calculaedad($row['fechanac']) ?></td>
											<td><?php echo $row['eps'] ?></td>
											<td><?php echo $row['entidad'] ?></td>
											<td><?php echo $row['fecha_creacion'] ?></td>
											<td>
												<a href="edit_pac.php?paciente_id=<?php echo $row['paciente_id'] ?>" class="btn btn-secondary">
													<i class="fas fa-marker"></i>
												</a>
												<a href="del_pac.php?paciente_id=<?php echo $row['paciente_id'] ?>" class="btn btn-danger">
													<i class="far fa-trash-alt"></i>
												</a>
												<a href="pac_view.php?paciente_id=<?php echo $row['paciente_id'] ?>" class="btn btn-success">
													<i class="far fa-eye"></i>
												</a>
												<a href="examenes.php?paciente_id=<?php echo $row['paciente_id'] ?>" class="btn btn-primary">
													<i class="far fa-file-alt"></i>
												</a>
											</td>
										</tr>
									<?php }
										unset($_POST['nombre']);
										unset($_POST['eps']);
										unset($_POST['docu']);
										unset($_POST['entidad']);
									} else {
										$query = "SELECT * FROM pacientes ORDER BY fecha_creacion DESC";
										$pac_table = mysqli_query($conn, $query);
										$numero = 0;
										while ($row = mysqli_fetch_array($pac_table)) { ?>
										<?php $numero += 1; ?>
										<tr>
											<td><?php echo $numero ?></td>
											<td><?php echo $row['nombre'] ?></td>
											<td><?php echo $row['identificacion'] ?></td>
											<td><?php echo calculaedad($row['fechanac']) ?></td>
											<td><?php echo $row['eps'] ?></td>
											<td><?php echo $row['entidad'] ?></td>
											<td><?php echo $row['fecha_creacion'] ?></td>
											<td>
												<a href="edit_pac.php?paciente_id=<?php echo $row['paciente_id'] ?>" class="btn btn-secondary">
													<i class="fas fa-marker"></i>
												</a>
												<a href="del_pac.php?paciente_id=<?php echo $row['paciente_id'] ?>" class="btn btn-danger">
													<i class="far fa-trash-alt"></i>
												</a>
												<a href="pac_view.php?paciente_id=<?php echo $row['paciente_id'] ?>" class="btn btn-info">
													<i class="fas fa-eye"></i>
												</a>
												<a href="examenes.php?paciente_id=<?php echo $row['paciente_id'] ?>" class="btn btn-primary">
													<i class="far fa-file-alt"></i>
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
<?php include("includes/footer.php"); ?>