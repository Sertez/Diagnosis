<?php include("db.php"); ?>
<?php include("includes/header.php"); ?>

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
						Añadir Bacteriólogo
					</div>
					<div class="card-body">
						<form action="save_bac.php" method="POST">
							<div class="form-group">
								<label for="patient-name">Nombres y Apellidos</label>
								<input type="text" name="bname" class="form-control" placeholder="Nombre" autofocus>
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
							<input type="submit" class="btn btn-success btn-block" name="save_bac" value="Registrar Bacteriólogo">
						</form>
					</div>
				</div>
			</div>
			<div class="col-l-8">
				<div class="card">
					<div class="card-header" id="cardtitle">
						Lista Bacteriologos
					</div>
					<div class="card-body">
						<table class="table table-bordered">
							<thead>
								<tr>
									<th>Nombre</th>
									<th>Documento</th>
									<th>Fecha de Nacimiento</th>
									<th>Direccion</th>
                                    <th>Número de Telefono</th>
                                    <th>Correo Electrónico</th>
                                    <th>Acción</th>
								</tr>
							</thead>
							<tbody>
								<?php

								$query = "SELECT * FROM bacteriologos";
								$pac_table = mysqli_query($conn, $query);

								while ($row = mysqli_fetch_array($pac_table)) { ?>
									<tr>
										<td><?php echo $row['nombre'] ?></td>
										<td><?php echo $row['documento'] ?></td>
										<td><?php echo $row['fecha_nacimiento'] ?></td>
                                        <td><?php echo $row['direccion'] ?></td>
                                        <td><?php echo $row['telefono'] ?></td>
                                        <td><?php echo $row['email'] ?></td>
										<td>
											<a href="del_bac.php?bacteriologo_id=<?php echo $row['bacteriologo_id'] ?>" class="btn btn-danger">
												<i class="far fa-trash-alt"></i>
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