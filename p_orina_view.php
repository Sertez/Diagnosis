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
                Parcial de Orina
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
                $query = "SELECT * FROM p_orina WHERE examen_id=$examen_id";
                $ex_query = mysqli_query($conn, $query);
                $row = mysqli_fetch_array($ex_query);
                $color = $row['color'];
                $aspecto = $row['aspecto'];
                $ph = $row['ph'];
                $densidad = $row['densidad'];
                $proteinas = $row['proteinas'];
                $glucosa = $row['glucosa'];
                $cetonas = $row['cetonas'];
                $sangre = $row['sangre'];
                $bilirrubinas = $row['bilirrubinas'];
                $urobilinogeno = $row['urobilinogeno'];
                $nitritos = $row['nitritos'];
                $cel_epiteliales = $row['cel_epiteliales'];
                $moco = $row['moco'];
                $bacterias = $row['bacterias'];
                $leucocitos = $row['leucocitos'];
                $piocitos = $row['piocitos'];
                $hematies = $row['hematies'];
                $cristales = $row['cristales'];
                $cilindros = $row['cilindros'];
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
                            Examen Físico
                        </div>
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="color" class="col-sm-6 col-form-label">Color</label>
                                <div class="col-sm-6">
                                    <input type="text" name="color" class="form-control" value="<?php echo $color ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="aspecto" class="col-sm-6 col-form-label">Aspecto</label>
                                <div class="col-sm-6">
                                    <input type="text" name="aspecto" class="form-control" value="<?php echo $aspecto ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="ph" class="col-sm-6 col-form-label">PH</label>
                                <div class="col-sm-6">
                                    <input type="text" name="ph" class="form-control" value="<?php echo $ph ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="densidad" class="col-sm-6 col-form-label">Densidad</label>
                                <div class="col-sm-6">
                                    <input type="text" name="densidad" class="form-control" value="<?php echo $densidad ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="proteinas" class="col-sm-6 col-form-label">Proteinas</label>
                                <div class="col-sm-6">
                                    <input type="text" name="proteinas" class="form-control" value="<?php echo $proteinas ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="glucosa" class="col-sm-6 col-form-label">Glucosa</label>
                                <div class="col-sm-6">
                                    <input type="text" name="glucosa" class="form-control" value="<?php echo $glucosa ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="cetonas" class="col-sm-6 col-form-label">Cetonas</label>
                                <div class="col-sm-6">
                                    <input type="text" name="cetonas" class="form-control" value="<?php echo $cetonas ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="sangre" class="col-sm-6 col-form-label">Sangre</label>
                                <div class="col-sm-6">
                                    <input type="text" name="sangre" class="form-control" value="<?php echo $sangre ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="bilirrubinas" class="col-sm-6 col-form-label">Bilirrubinas</label>
                                <div class="col-sm-6">
                                    <input type="text" name="bilirrubinas" class="form-control" value="<?php echo $bilirrubinas ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="urobilinogeno" class="col-sm-6 col-form-label">Urobilinogeno</label>
                                <div class="col-sm-6">
                                    <input type="text" name="urobilinogeno" class="form-control" value="<?php echo $urobilinogeno ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nitritos" class="col-sm-6 col-form-label">Nitritos</label>
                                <div class="col-sm-6">
                                    <input type="text" name="nitritos" class="form-control" value="<?php echo $nitritos ?>" readonly>
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
                                <label for="cel_epiteliales" class="col-sm-6 col-form-label">Celulas Epiteliales</label>
                                <div class="col-sm-6">
                                    <input type="text" name="cel_epiteliales" class="form-control" value="<?php echo $cel_epiteliales ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="moco" class="col-sm-6 col-form-label">Moco</label>
                                <div class="col-sm-6">
                                    <input type="text" name="moco" class="form-control" value="<?php echo $moco ?>" readonly>
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
                                <label for="piocitos" class="col-sm-6 col-form-label">Piocitos</label>
                                <div class="col-sm-6">
                                    <input type="text" name="piocitos" class="form-control" value="<?php echo $piocitos ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="hematies" class="col-sm-6 col-form-label">Hematies</label>
                                <div class="col-sm-6">
                                    <input type="text" name="hematies" class="form-control" value="<?php echo $hematies ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="cristales" class="col-sm-6 col-form-label">Cristales</label>
                                <div class="col-sm-6">
                                    <input type="text" name="cristales" class="form-control" value="<?php echo $cristales ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="cilindros" class="col-sm-6 col-form-label">Cilindros</label>
                                <div class="col-sm-6">
                                    <input type="text" name="cilindros" class="form-control" value="<?php echo $cilindros ?>" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group mb-2 row" id="bac_space">
                <label for="bacteriologo" class="col-form-label">Bacteriologo</label>
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