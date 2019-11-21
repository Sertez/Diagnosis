<?php include("db.php"); ?>
<?php include("includes/header.php"); ?>

<?php
function calculaedad($fechanacimiento)
{
    list($ano, $mes, $dia) = explode("-", $fechanacimiento);
    $ano_diferencia  = date("Y") - $ano;
    $mes_diferencia = date("m") - $mes;
    $dia_diferencia   = date("d") - $dia;
    if ($mes_diferencia < 0) {
        $ano_diferencia--;
    } else {
        if ($mes_diferencia == 0 and $dia_diferencia < 0)
            $ano_diferencia--;
    }
    return $ano_diferencia;
}
?>

<?php if (isset($_GET['examen_id'])) { ?>
    <div class="container p-4 con" id="contenido">
        <div class="card card-body">
            <div class="card-header" id="extitle">
                Quimica Especial
            </div>
            <?php
                $examen_id = $_GET['examen_id'];
                ?>
            <?php
                $query = "SELECT * FROM examenes WHERE examen_id=$examen_id";
                $ex_query = mysqli_query($conn, $query);
                $row = mysqli_fetch_array($ex_query);
                $paciente_id = $row['paciente_id'];
                $tipo = $row['tipo'];
                $fecha = $row['fecha'];
                $query = "SELECT * FROM pacientes WHERE paciente_id=$paciente_id";
                $pac_query = mysqli_query($conn, $query);
                $row = mysqli_fetch_array($pac_query);
                $eps = $row['eps'];
                $nombre = $row['nombre'];
                $doc = $row['identificacion'];
                $fechanac = $row['fechanac'];
                $edad = calculaedad($fechanac);
                ?>
            <?php
                $query = "SELECT * FROM i_inmunologia WHERE examen_id=$examen_id";
                $ex_query = mysqli_query($conn, $query);
                $row = mysqli_fetch_array($ex_query);
                $asto = $row['asto'];
                $pcr = $row['pcr'];
                $ra_tes = $row['ra_tes'];
                $bacteriologo = $row['bacteriologo'];
                ?>
            <div class="card-body">
                <div class="card card-body">
                    <div class="row">
                        <div class="col">
                            <label for="patient-name">Nombres y Apellidos</label>
                            <input type="text" name="pname" class="form-control" value="<?php echo $nombre ?>" readonly>
                        </div>
                        <div class="col">
                            <label for="document">Documento</label>
                            <input type="int" name="doc" class="form-control" value="<?php echo $doc ?>" readonly>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="eps">EPS</label>
                            <input type="text" name="eps" class="form-control" value="<?php echo $eps ?>" readonly>
                        </div>
                        <div class="col">
                            <label for="date">Fecha</label>
                            <input type="date" name="date" class="form-control" value="<?php echo $fecha ?>" readonly>
                        </div>
                        <div class="col">
                            <label for="age">Edad</label>
                            <input type="int" name="edad" class="form-control" value="<?php echo $edad ?>" readonly>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-8">
                    <div class="card" id="formulario">
                        <div class="card-header" id="cardtitle">
                            Inmunologia
                        </div>
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="asto" class="col-sm-4 col-form-label">Asto</label>
                                <div class="col-sm-4">
                                    <input type="text" name="asto" class="form-control" value="<?php echo $asto ?>" readonly>
                                </div>
                                <label for="ref" class="col-sm-4 col-form-label">MENOR DE 200UI/m</label>
                            </div>
                            <div class="form-group row">
                                <label for="pcr" class="col-sm-4 col-form-label">Pcr</label>
                                <div class="col-sm-4">
                                    <input type="text" name="pcr" class="form-control" value="<?php echo $pcr ?>" readonly>
                                </div>
                                <label for="ref" class="col-sm-4 col-form-label">< MENOR DE 6.0 mg/L </label> 
                            </div> 
                            <div class="form-group row">
                                <label for="ra_tes" class="col-sm-4 col-form-label">R.A Tes</label>
                                    <div class="col-sm-4">
                                        <input type="text" name="ra_tes" class="form-control" value="<?php echo $ra_tes ?>" readonly>
                                    </div>
                                    <label for="ref" class="col-sm-4 col-form-label">MENOR DE 8.0UI/ml</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group mb-2 row" id="bac_space">
               <label for="bacteriologo" class="col-form-label">Bacteriologo</label>
                    <input type="text" name="bacteriologo" class="form-control" value="<?php echo $bacteriologo ?>" readonly>
            </div>
        </div>
   </div>
   <?php } else {
     $_SESSION['message'] = 'Error Inesperado';
     $_SESSION['message_type'] = 'danger';
    header("Location:pacientes.php");
    die();
  }
   ?>
  <?php include("includes/footer.php"); ?>