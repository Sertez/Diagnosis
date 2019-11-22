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
                Química Especial
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
                $query = "SELECT * FROM q_quimica_especial WHERE examen_id=$examen_id";
                $ex_query = mysqli_query($conn, $query);
                $row = mysqli_fetch_array($ex_query);
                $hemoglobina = $row['hemoglobina'];
                $microalbuminura = $row['microalbuminura'];
                $creatinuria = $row['creatinuria'];
                $albumi_creati = $row['albumi_creati'];
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
                            Química
                        </div>
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="hemoglobina" class="col-sm-4 col-form-label">Hemoglobina</label>
                                <div class="col-sm-4">
                                    <input type="text" name="hemoglobina" class="form-control" value="<?php echo $hemoglobina ?>" readonly>
                                </div>
                                <label for="ref" class="col-sm-4 col-form-label">4.4-6.7% No diabetico <br> 6.7-7.3% Objetivo <br> 7.3-9.1% Buen control</label>
                            </div>
                            <div class="form-group row">
                                <label for="microalbuminura" class="col-sm-4 col-form-label">Microalbuminura</label>
                                <div class="col-sm-4">
                                    <input type="text" name="microalbuminura" class="form-control" value="<?php echo $microalbuminura ?>" readonly>
                                </div>
                                <label for="ref" class="col-sm-4 col-form-label">< 20 mg/L </label> 
                            </div> 
                            <div class="form-group row">
                                <label for="creatinuria" class="col-sm-4 col-form-label">Creatinuria</label>
                                    <div class="col-sm-4">
                                        <input type="text" name="creatinuria" class="form-control" value="<?php echo $creatinuria ?>" readonly>
                                    </div>
                                    <label for="ref" class="col-sm-4 col-form-label">39-259 mg/dl</label>
                            </div>
                            <div class="form-group row">
                                <label for="albumi_creati" class="col-sm-4 col-form-label">Albuminuria/Creatinuria</label>
                                    <div class="col-sm-4"> 
                                        <input type="text" name="albumi_creati" class="form-control" value="<?php echo $albumi_creati ?>" readonly>
                                    </div>
                                <label for="ref" class="col-sm-4 col-form-label">< 30 mg/L </label>
                            </div> 
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group mb-2 row" id="bac_space">
               <label for="bacteriologo" class="col-form-label">Bacteriólogo</label>
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