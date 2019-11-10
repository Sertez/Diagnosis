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
								<input type="text" name="eps" class="form-control" placeholder="EPS">
							</div>
							<div class="form-group">
								<label for="rem-entity">Entidad Remitente</label>
								<input type="text" name="entity" class="form-control" placeholder="Entidad">
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
						Lista Pacientes
					</div>
					<div class="card-body">
						<table class="table table-bordered">
							<thead>
								<tr>
									<th>#</th>
									<th>Nombre</th>
									<th>Documento</th>
									<th>Edad</th>
									<th>EPS</th>
									<th>Entidad</th>
									<th>Dirección</th>
									<th>Teléfono</th>
									<th>Correo Electrónico</th>
									<th>Acción</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$query = "SELECT * FROM pacientes";
								$pac_table = mysqli_query($conn, $query);
								$numero=0;
								while ($row = mysqli_fetch_array($pac_table)) { ?>
									<?php $numero += 1; ?>
									<tr>
										<td><?php echo $numero ?></td>
										<td><?php echo $row['nombre'] ?></td>
										<td><?php echo $row['identificacion'] ?></td>
										<td><?php echo calculaedad($row['fechanac']) ?></td>
										<td><?php echo $row['eps'] ?></td>
										<td><?php echo $row['entidad'] ?></td>
										<td><?php echo $row['direccion'] ?></td>
										<td><?php echo $row['telefono'] ?></td>
										<td><?php echo $row['email'] ?></td>
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


<?php include("includes/footer.php"); ?>