<?php include("db.php"); ?>
<?php include("includes/header.php"); ?>

<?php
function calculaedad($fechanacimiento)
{
    list($ano, $mes, $dia) = explode("-", $fechanacimiento);
    $ano_diferencia  = date("Y") - $ano;
    $mes_diferencia = date("m") - $mes;
    $dia_diferencia   = date("d") - $dia;
    if ($mes_diferencia < 0){
        $ano_diferencia--;
    }else{
        if($mes_diferencia == 0 and $dia_diferencia <0)
        $ano_diferencia--;
    }
    return $ano_diferencia;
}
?>

<?php if (isset($_GET['examen_id'])) { ?>
    <div class="container p-4 con" id="contenido">
        <div class="card card-body">
            <div class="card-header" id="extitle">
               Urocultivo
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
                $query = "SELECT * FROM m_uro_positivo WHERE examen_id=$examen_id";
                $ex_query = mysqli_query($conn, $query);
                $row = mysqli_fetch_array($ex_query);
                $polimorfonucleares = $row['polimorfonucleares'];
                $gram = $row['gram'];
                $amikacina = $row['amikacina'];
                $gentamicina = $row['gentamicina'];
                $imipenem = $row['imipenem'];
                $meropenem = $row['meropenem'];
                $cefoxitina = $row['cefoxitina'];
                $ceftriazona = $row['ceftriazona'];
                $amoxacilina = $row['amoxacilina'];
                $ampicilina = $row['ampicilina'];
                $cefepina = $row['cefepina'];
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
                <div class="col-sm-6">
                    <div class="card" id="formulario">
                        <div class="card-header" id="cardtitle">
                            Examen
                        </div>
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="polimorfonucleares" class="col-sm-6 col-form-label">Polimorfonucleares</label>
                                <div class="col-sm-6">
                                    <input type="text" name="polimorfonucleares" class="form-control" value="<?php echo $polimorfonucleares ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="gram" class="col-sm-6 col-form-label">Gram</label>
                                <div class="col-sm-6">
                                    <input type="text" name="gram" class="form-control" value="<?php echo $gram ?>" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card" id="formulario">
                        <div class="card-header" id="cardtitle">
                            Antibiograma
                        </div>
                        <div class="card-body"> 
                            <div class="form-group row">
                                <label for="amikacina" class="col-sm-6 col-form-label">Amikacina</label>
                                <div class="col-sm-6">
                                    <input type="text" name="amikacina" class="form-control" value="<?php echo $amikacina ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="gentamicina" class="col-sm-6 col-form-label">Gentamicina</label>
                                <div class="col-sm-6">
                                    <input type="text" name="gentamicina" class="form-control" value="<?php echo $gentamicina ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="imipenem" class="col-sm-6 col-form-label">Imipenem</label>
                                <div class="col-sm-6">
                                    <input type="text" name="imipenem" class="form-control" value="<?php echo $imipenem ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="meropenem" class="col-sm-6 col-form-label">Meropenem</label>
                                <div class="col-sm-6">
                                    <input type="text" name="meropenem" class="form-control" value="<?php echo $meropenem ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="cefoxitina" class="col-sm-6 col-form-label">Cefoxitina</label>
                                <div class="col-sm-6">
                                    <input type="text" name="cefoxitina" class="form-control" value="<?php echo $cefoxitina ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="ceftriazona" class="col-sm-6 col-form-label">Ceftriaxona</label>
                                <div class="col-sm-6">
                                    <input type="text" name="ceftriazona" class="form-control" value="<?php echo $ceftriazona ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="amoxacilina" class="col-sm-6 col-form-label">Amoxicilina-ácido Clavuánico</label>
                                <div class="col-sm-6">
                                    <input type="text" name="amoxacilina" class="form-control" value="<?php echo $amoxacilina ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="ampicilina" class="col-sm-6 col-form-label">Ampicilina</label>
                                <div class="col-sm-6">
                                    <input type="text" name="ampicilina" class="form-control" value="<?php echo $ampicilina ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="cefepina" class="col-sm-6 col-form-label">Cefepima</label>
                                <div class="col-sm-6">
                                    <input type="text" name="cefepina" class="form-control" value="<?php echo $cefepina ?>" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group mb-2 row" id="bac_space">
                <label for="bacteriologo" class="col-form-label">Bacteriólogo</label>
                <input type="text" name="cilindros" class="form-control" value="<?php echo $bacteriologo ?>" readonly>
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
