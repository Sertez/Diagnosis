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
        <div class="card card-body" id="card">
            <div class="card-header" id="extitle">
                Química General
            </div>
            <?php
                $examen_id = $_GET['examen_id'];
                ?>
            <?php
                $query = "SELECT * FROM examenes WHERE examen_id='$examen_id'";
                $ex_query = mysqli_query($conn, $query);
                $row = mysqli_fetch_array($ex_query);
                $paciente_id = $row['paciente_id'];
                $tipo = $row['tipo'];
                $fecha = $row['fecha'];
                $query = "SELECT * FROM pacientes WHERE paciente_id='$paciente_id'";
                $pac_query = mysqli_query($conn, $query);
                $row = mysqli_fetch_array($pac_query);
                $eps = $row['eps'];
                $nombre = $row['nombre'];
                $doc = $row['identificacion'];
                $fechanac = $row['fechanac'];
                $edad = calculaedad($fechanac);
                ?>
            <?php
                $query = "SELECT * FROM q_quimica WHERE examen_id='$examen_id'";
                $ex_query = mysqli_query($conn, $query);
                $row = mysqli_fetch_array($ex_query);
                $glicemia = $row['glicemia'];
                $colesterol = $row['colesterol'];
                $colesterol_hdl = $row['colesterol_hdl'];
                $colesterol_ldl = $row['colesterol_ldl'];
                $trigliceridos = $row['trigliceridos'];
                $acido_urico = $row['acido_urico'];
                $nitrogeno_ureico = $row['nitrogeno_ureico'];
                $creatinina = $row['creatinina'];
                $tasa_filtracion_glomerular = $row['tasa_filtracion_glomerular'];
                $fosfatasa_alcalina = $row['fosfatasa_alcalina'];
                $alanino_aminotrans = $row['alanino_aminotrans'];
                $aspartato_aminotrans = $row['aspartato_aminotrans'];
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
                <div class="col-sm-4">
                    <div class="card" id="formulario">
                        <div class="card-header" id="cardtitle">
                            Examen
                        </div>
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="glicemia" class="col-sm-4 col-form-label">Glicemia</label>
                                <div class="col-sm-4">
                                    <input type="text" name="glicemia" class="form-control" value="<?php echo $glicemia ?>" readonly>
                                </div>
                                <label for="ref" class="col-sm-4 col-form-label">70-100mg/dl</label>
                            </div>
                            <div class="form-group row">
                                <label for="colesterol" class="col-sm-4 col-form-label">Colesterol</label>
                                <div class="col-sm-4">
                                    <input type="text" name="colesterol" class="form-control" value="<?php echo $colesterol ?>" readonly>
                                </div>
                                <label for="ref" class="col-sm-4 col-form-label">HASTA 200 mg/dl</label>
                            </div>
                            <div class="form-group row">
                                <label for="colesterol_hdl" class="col-sm-4 col-form-label">Colesterol HDL</label>
                                <div class="col-sm-4">
                                    <input type="text" name="colesterol_hdl" class="form-control" value="<?php echo $colesterol_hdl ?>" readonly>
                                </div>
                                <label for="ref" class="col-sm-4 col-form-label">BAJO : MENOR DE 40 ALTO : MAYOR DE 60</label>
                            </div>
                            <div class="form-group row">
                                <label for="colesterol_ldl" class="col-sm-4 col-form-label">Colesterol LDL</label>
                                <div class="col-sm-4">
                                    <input type="text" name="colesterol_ldl" class="form-control" value="<?php echo $colesterol_ldl ?>" readonly>
                                </div>
                                <label for="ref" class="col-sm-4 col-form-label">OPTIMO: MENOR DE 100 | CERCA DE LO OPTIMO: 100 - 129 | ALTO LIMITE: 130 - 159 | ALTO: 160 - 189 | MUY ALTO: MAYOR DE 190</label>
                            </div>
                            <div class="form-group row">
                                <label for="trigliceridos" class="col-sm-4 col-form-label">Trigliceridos</label>
                                <div class="col-sm-4">
                                    <input type="text" name="trigliceridos" class="form-control" value="<?php echo $trigliceridos ?>" readonly>
                                </div>
                                <label for="ref" class="col-sm-4 col-form-label">HASTA 170 mg/dl</label>
                            </div>
                            <div class="form-group row">
                                <label for="acido_urico" class="col-sm-4 col-form-label">Ácido Urico</label>
                                <div class="col-sm-4">
                                    <input type="text" name="acido_urico" class="form-control" value="<?php echo $acido_urico ?>" readonly>
                                </div>
                                <label for="ref" class="col-sm-4 col-form-label">H:3.6-7.7 M:2.5-6.8mg/dl</label>
                            </div>
                            <div class="form-group row">
                                <label for="nitrogeno_ureico" class="col-sm-4 col-form-label">Nitrógeno Ureico</label>
                                <div class="col-sm-4">
                                    <input type="text" name="nitrogeno_ureico" class="form-control" value="<?php echo $nitrogeno_ureico ?>" readonly>
                                </div>
                                <label for="ref" class="col-sm-4 col-form-label">9.00 - 23.00mg/dl</label>
                            </div>
                            <div class="form-group row">
                                <label for="creatinina" class="col-sm-4 col-form-label">Creatinina</label>
                                <div class="col-sm-4">
                                    <input type="text" name="creatinina" class="form-control" value="<?php echo $creatinina ?>" readonly>
                                </div>
                                <label for="ref" class="col-sm-4 col-form-label">0.90 - 1.30mg/dl</label>
                            </div>
                            <div class="form-group row">
                                <label for="tasa_filtracion_glomerular" class="col-sm-4 col-form-label">Tasa de Filtracion</label>
                                <div class="col-sm-4">
                                    <input type="text" name="tasa_filtracion_glomerular" class="form-control" value="<?php echo $tasa_filtracion_glomerular ?>" readonly>
                                </div>
                                <label for="ref" class="col-sm-4 col-form-label">97 a 137 ml/min</label>
                            </div>
                            <div class="form-group row">
                                <label for="fosfatasa_alcalina" class="col-sm-4 col-form-label">Fosfatasa Alcalina</label>
                                <div class="col-sm-4">
                                    <input type="text" name="fosfatasa_alcalina" class="form-control" value="<?php echo $fosfatasa_alcalina ?>" readonly>
                                </div>
                                <label for="ref" class="col-sm-4 col-form-label">45.00 - 129.00</label>
                            </div>
                            <div class="form-group row">
                                <label for="alanino_aminotrans" class="col-sm-4 col-form-label">Alanino Aminotransferasa</label>
                                <div class="col-sm-4">
                                    <input type="text" name="alanino_aminotrans" class="form-control" value="<?php echo $alanino_aminotrans ?>" readonly>
                                </div>
                                <label for="ref" class="col-sm-4 col-form-label">10.00 - 49.00</label>
                            </div>
                            <div class="form-group row">
                                <label for="aspartato_aminotrans" class="col-sm-4 col-form-label">Aspartato Aminotransferasa</label>
                                <div class="col-sm-4">
                                    <input type="text" name="aspartato_aminotrans" class="form-control" value="<?php echo $aspartato_aminotrans ?>" readonly>
                                </div>
                                <label for="ref" class="col-sm-4 col-form-label">1.00 - 34.00</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group mb-2 row" id="bac_space">
                <label for="bacteriologo" class="col-form-label">Bacteriólogo</label>
                <input type="text" name="rh" class="form-control" value="<?php echo $bacteriologo ?>" readonly>
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