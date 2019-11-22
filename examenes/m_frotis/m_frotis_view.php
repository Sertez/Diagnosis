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
                Frotis Vaginal
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
                $query = "SELECT * FROM m_frotis WHERE examen_id=$examen_id";
                $ex_query = mysqli_query($conn, $query);
                $row = mysqli_fetch_array($ex_query);
                $color = $row['color'];
                $olor_amino = $row['olor_amino'];
                $ph = $row['ph'];
                $cel_epiteliales = $row['cel_epiteliales'];
                $bacterias = $row['bacterias'];
                $leucocitos = $row['leucocitos'];
                $hematies = $row['hematies'];
                $pseudomicellios = $row['pseudomicellios'];
                $trico_vaginales = $row['trico_vaginales'];
                $lev_sueltas = $row['lev_sueltas'];
                $lev_gemacion = $row['lev_gemacion'];
                $gram = $row['gram'];
                $pmn = $row['pmn'];
                $celulas_guias = $row['celulas_guias'];
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
                            Examen Secreción Vaginal
                        </div>
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="color" class="col-sm-6 col-form-label">Color</label>
                                <div class="col-sm-6">
                                    <input type="text" name="color" value="<?php echo $color ?>" class="form-control" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="olor_amino" class="col-sm-6 col-form-label">Olor Amino</label>
                                <div class="col-sm-6">
                                    <input type="text" name="olor_amino" value="<?php echo $olor_amino ?>" class="form-control" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="ph" class="col-sm-6 col-form-label">PH</label>
                                <div class="col-sm-6">
                                    <input type="text" name="ph" value="<?php echo $ph ?>" class="form-control" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="card" id="margentop">
                            <div class="card-header" id="cardtitle">
                                Examen por coloración de Gram
                            </div>
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="gram" class="col-sm-6 col-form-label">GRAm</label>
                                    <div class="col-sm-6">
                                        <input type="text" name="gram" class="form-control" value="<?php echo $gram ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="pmn" class="col-sm-6 col-form-label">PMN</label>
                                    <div class="col-sm-6">
                                        <input type="text" name="pmn" class="form-control" value="<?php echo $pmn ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="celulas_guias" class="col-sm-6 col-form-label">Células Guias</label>
                                    <div class="col-sm-6">
                                        <input type="text" name="celulas_guias" class="form-control" value="<?php echo $celulas_guias ?>" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card" id="formulario">
                        <div class="card-header" id="cardtitle">
                            Examen Microscópico
                        </div>
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="cel_epiteliales" class="col-sm-6 col-form-label">Células Epiteliales</label>
                                <div class="col-sm-6">
                                    <input type="text" name="cel_epiteliales" class="form-control" value="<?php echo $cel_epiteliales ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="bacterias" class="col-sm-6 col-form-label">Bacterias</label>
                                <div class="col-sm-6">
                                    <input type="text" name="bacterias" class="form-control" value="<?php echo $bacterias ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="leucocitos" class="col-sm-6 col-form-label">Leucocitos</label>
                                <div class="col-sm-6">
                                    <input type="text" name="leucocitos" class="form-control" value="<?php echo $leucocitos ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="hematies" class="col-sm-6 col-form-label">Hematies</label>
                                <div class="col-sm-6">
                                    <input type="text" name="hematies" class="form-control" value="<?php echo $hematies ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="pseudomicellios" class="col-sm-6 col-form-label">Pseudomicellios</label>
                                <div class="col-sm-6">
                                    <input type="text" name="pseudomicellios" class="form-control" value="<?php echo $pseudomicellios ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="trico_vaginales" class="col-sm-6 col-form-label">Tricomonas Vaginales</label>
                                <div class="col-sm-6">
                                    <input type="text" name="trico_vaginales" class="form-control" value="<?php echo $trico_vaginales ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="lev_sueltas" class="col-sm-6 col-form-label">Levaduras Sueltas</label>
                                <div class="col-sm-6">
                                    <input type="text" name="lev_sueltas" class="form-control" value="<?php echo $lev_sueltas ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="lev_gemacion" class="col-sm-6 col-form-label">Levaduras en Gemación</label>
                                <div class="col-sm-6">
                                    <input type="text" name="lev_gemacion" class="form-control" value="<?php echo $lev_gemacion ?>" readonly>
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