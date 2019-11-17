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
        <div class="card card-body" id="card">
            <div class="card-header" id="extitle">
                Hematología
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
                $query = "SELECT * FROM h_hematologia WHERE examen_id='$examen_id'";
                $ex_query = mysqli_query($conn, $query);
                $row = mysqli_fetch_array($ex_query);
                $hematocrito= $row['hematocrito'];
                $hemoglobina= $row['hemoglobina'];   
                $leucocitos= $row['leucocitos']; 
                $neutrofilos= $row['neutrofilos'];
                $linfocitos= $row['linfocitos'];
                $eosinofilos= $row['eosinofilos'];
                $monocitos= $row['monocitos'];
                $basofilas= $row['basofilas'];
                $plaquetas= $row['plaquetas'];
                $reticulocitos= $row['reticulocitos'];
                $vsg= $row['vsg'];
                $t_sangria= $row['t_sangria'];
                $t_coagulacion= $row['t_coagulacion'];
                $t_protrombina= $row['t_protrombina'];    
                $t_p_tromboplastina= $row['t_p_tromboplastina'];
                $grupo= $row['grupo'];
                $rh= $row['rh'];
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
                            Cuadro Hemático
                        </div>
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="hematocrito" class="col-sm-4 col-form-label">Hematocrito</label>
                                <div class="col-sm-4">
                                    <input type="text" name="hematocrito" class="form-control" value="<?php echo $hematocrito ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="hemoglobina" class="col-sm-4 col-form-label">Hemoglobina</label>
                                <div class="col-sm-4">
                                    <input type="text" name="hemoglobina" class="form-control" value="<?php echo $hemoglobina ?>" readonly>                                    
                                </div>
                                <label for="ref" class="col-sm-4 col-form-label">M:12-14; H:14-16gr/dl</label>
                            </div>
                            <div class="form-group row">
                                <label for="leucocitos" class="col-sm-4 col-form-label">Leucocitos</label>
                                <div class="col-sm-4">
                                    <input type="text" name="leucocitos" class="form-control" value="<?php echo $leucocitos ?>" readonly>                                    
                                </div>
                                <label for="ref" class="col-sm-4 col-form-label">5.000-10.000 /mm</label>
                            </div>
                            <div class="form-group row">
                                <label for="neutrofilos" class="col-sm-4 col-form-label">Neutrofilos</label>
                                <div class="col-sm-4">
                                    <input type="text" name="neutrofilos" class="form-control" value="<?php echo $neutrofilos ?>" readonly>
                                </div>                                
                                <label for="ref" class="col-sm-4 col-form-label">45-50%</label>
                            </div>
                            <div class="form-group row">
                                <label for="linfocitos" class="col-sm-4 col-form-label">Linfocitos</label>
                                <div class="col-sm-4">
                                    <input type="text" name="linfocitos" class="form-control" value="<?php echo $linfocitos ?>" readonly>
                                </div>
                                <label for="ref" class="col-sm-4 col-form-label">20-40%</label>
                            </div>
                            <div class="form-group row">
                                <label for="eosinofilos" class="col-sm-4 col-form-label">Eosinofilos</label>
                                <div class="col-sm-4">
                                    <input type="text" name="eosinofilos" class="form-control" value="<?php echo $eosinofilos ?>" readonly>
                                </div>
                                <label for="ref" class="col-sm-4 col-form-label">1-5%</label>
                            </div>
                            <div class="form-group row">
                                <label for="monocitos" class="col-sm-4 col-form-label"> Monocitos</label>
                                <div class="col-sm-4">  
                                    <input type="text" name="monocitos" class="form-control" value="<?php echo $monocitos ?>" readonly>
                                </div>
                                <label for="ref" class="col-sm-4 col-form-label">0-5%</label>
                            </div>
                            <div class="form-group row">
                                <label for="basofilas" class="col-sm-4 col-form-label">Basofilas</label>
                                <div class="col-sm-4">
                                    <input type="text" name="basofilas" class="form-control" value="<?php echo $basofilas ?>" readonly>
                                </div>
                                <label for="ref" class="col-sm-4 col-form-label">0-2%</label>
                            </div>
                            <div class="form-group row">
                                <label for="plaquetas" class="col-sm-4 col-form-label">Plaquetas</label>
                                <div class="col-sm-4">
                                    <input type="text" name="plaquetas" class="form-control" value="<?php echo $plaquetas ?>" readonly>
                                </div>
                                <label for="ref" class="col-sm-4 col-form-label">150.000-450.000/mm</label>
                            </div>
                        </div>
                    </div>
                </div>
                                
                <div class="col-sm-4">
                    <div class="card" id="formulario">
                        <div class="card-header" id="cardtitle">
                            Otros Exámenes
                        </div>
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="reticulocitos" class="col-sm-4 col-form-label">Reticulocitos</label>
                                <div class="col-sm-4">
                                    <input type="text" name="reticulocitos" class="form-control" value="<?php echo $reticulocitos ?>" readonly>
                                </div>
                                <label for="ref" class="col-sm-4 col-form-label">0.5-1.5%</label>
                            </div>
                            <div class="form-group row">
                                <label for="vsg" class="col-sm-4 col-form-label">V.S.G</label>
                                <div class="col-sm-4">
                                    <input type="text" name="vsg" class="form-control" value="<?php echo $vsg ?>" readonly>
                                </div>
                                <label for="ref" class="col-sm-4 col-form-label">1-20mm/1Hora</label>
                            </div>
                            <div class="form-group row">
                                <label for="t_sangria" class="col-sm-4 col-form-label">Tiempo de Sangría</label>
                                <div class="col-sm-4">
                                    <input type="text" name="t_sangria" class="form-control" value="<?php echo $t_sangria ?>" readonly>
                                </div>
                                <label for="ref" class="col-sm-4 col-form-label">1-3 Minutos</label>
                            </div>
                            <div class="form-group row">
                                <label for="t_coagulacion" class="col-sm-4 col-form-label">Tiempo de Coagulación</label>
                                <div class="col-sm-4">
                                    <input type="text" name="t_coagulacion" class="form-control" value="<?php echo $t_coagulacion ?>" readonly>
                                </div>
                                <label for="ref" class="col-sm-4 col-form-label">9-15 Minutos</label>
                            </div>
                            <div class="form-group row">
                                <label for="t_protombina" class="col-sm-4 col-form-label">Tiempo de Protombina  </label>
                                <div class="col-sm-4">
                                    <input type="text" name="t_protombina" class="form-control" value="<?php echo $t_protrombina ?>" readonly>
                                </div>
                                <label for="ref" class="col-sm-4 col-form-label">+/- 2 Seg del control'</label>
                            </div>
                            <div class="form-group row">
                                <label for="t_p_tromboplastina" class="col-sm-4 col-form-label">Tiempo Parcial de Tromboplastina</label>
                                <div class="col-sm-4">
                                    <input type="text" name="t_p_tromboplastina" class="form-control" value="<?php echo $t_p_tromboplastina ?>" readonly>
                                </div>
                                <label for="ref" class="col-sm-4 col-form-label">+/- 2 Seg del control'</label>
                            </div>
                            <div class="form-group row">
                                <label for="grupo" class="col-sm-4 col-form-label">Grupo Sanguíneo</label>
                                <div class="col-sm-4">
                                    <input type="text" name="grupo" class="form-control" value="<?php echo $grupo ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="rh" class="col-sm-4 col-form-label">Factor RH</label>
                                <div class="col-sm-4">
                                    <input type="text" name="rh" class="form-control" value="<?php echo $rh ?>" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group mb-2 row" id="bac_space">
                <label for="bacteriologo" class="col-form-label">Bacteriologo</label>
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
