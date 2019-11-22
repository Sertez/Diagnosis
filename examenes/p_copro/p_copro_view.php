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
                Examen Coprológico
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
                $query = "SELECT * FROM p_copro WHERE examen_id=$examen_id";
                $ex_query = mysqli_query($conn, $query);
                $row = mysqli_fetch_array($ex_query);
                $color= $row['color'];
                $consistencia= $row['consistencia'];
                $moco = $row['moco'];
                $sangre = $row['sangre'];
                $ph = $row['ph'];
                $azucares_red = $row['azucares_red'];
                $rest_alimentos = $row['rest_alimentos'];
                $olor = $row['olor'];
                $leucocitos = $row['leucocitos'];
                $hematies = $row['hematies'];
                $almidones = $row['almidones'];
                $fibra_muscular = $row['fibra_muscular'];
                $fibra_vegetal = $row['fibra_vegetal'];
                $grasas = $row['grasas'];
                $lev_sueltas = $row['lev_sueltas'];
                $lev_gemacion = $row['lev_gemacion'];
                $pseudomicellius = $row['pseudomicellius'];
                $h_ascaris = $row['h_ascaris'];
                $h_tricocefalo = $row['h_tricocefalo'];
                $h_uncinaria = $row['h_uncinaria'];
                $h_oxiuro = $row['h_oxiuro'];
                $h_tenia = $row['h_tenia'];
                $h_himenolepis_nana = $row['h_himenolepis_nana'];
                $larva_strongiloides = $row['larva_strongiloides'];
                $e_histolytica = $row['e_histolytica'];
                $e_coli = $row['e_coli'];
                $e_nana = $row['e_nana'];
                $giardia_lamblia = $row['giardia_lamblia'];
                $balantidium_coli = $row['balantidium_coli'];
                $chilomastix = $row['chilomastix'];
                $blostocystis = $row['blostocystis'];
                $observaciones = $row['observaciones'];
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
                                    <input type="text" name="color" value="<?php echo $color ?>" class="form-control"  readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="consistencia" class="col-sm-6 col-form-label">Consistencia</label>
                                <div class="col-sm-6">
                                    <input type="text" name="consistencia" class="form-control" value="<?php echo $consistencia ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="moco" class="col-sm-6 col-form-label">Moco</label>
                                <div class="col-sm-6">
                                    <input type="text" name="moco" class="form-control" value="<?php echo $moco ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="sangre" class="col-sm-6 col-form-label">Sangre</label>
                                <div class="col-sm-6">
                                    <input type="text" name="sangre" class="form-control" value="<?php echo $sangre ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="ph" class="col-sm-6 col-form-label">PH</label>
                                <div class="col-sm-6">
                                    <input type="text" name="ph" class="form-control" value="<?php echo $ph ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="azucares_red" class="col-sm-6 col-form-label">Azucares Reductores</label>
                                <div class="col-sm-6">
                                    <input type="text" name="azucares_red" class="form-control" value="<?php echo $azucares_red ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="rest_alimentos" class="col-sm-6 col-form-label">Restos Alimenticios</label>
                                <div class="col-sm-6">
                                    <input type="text" name="rest_alimentos" class="form-control" value="<?php echo $rest_alimentos ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="olor" class="col-sm-6 col-form-label">Olor</label>
                                <div class="col-sm-6">
                                    <input type="text" name="olor" class="form-control" value="<?php echo $olor ?>" readonly>
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
                                <label for="almidones" class="col-sm-6 col-form-label">Almidones</label>
                                <div class="col-sm-6">
                                    <input type="text" name="almidones" class="form-control" value="<?php echo $almidones ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="fibra_muscular" class="col-sm-6 col-form-label">Fibra Muscular</label>
                                <div class="col-sm-6">
                                    <input type="text" name="fibra_muscular" class="form-control" value="<?php echo $fibra_muscular ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="fibra_vegetal" class="col-sm-6 col-form-label">Fibra Vegetal</label>
                                <div class="col-sm-6">
                                    <input type="text" name="fibra_vegetal" class="form-control" value="<?php echo $fibra_vegetal ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="grasas" class="col-sm-6 col-form-label">Grasas</label>
                                <div class="col-sm-6">
                                    <input type="text" name="grasas" class="form-control" value="<?php echo $grasas ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="lev_sueltas" class="col-sm-6 col-form-label">Levaduras Sueltas</label>
                                <div class="col-sm-6">
                                    <input type="text" name="lev_sueltas" class="form-control" value="<?php echo $lev_sueltas ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="lev_gemacion" class="col-sm-6 col-form-label">Levaduras en Gemacion</label>
                                <div class="col-sm-6">
                                    <input type="text" name="lev_gemacion" class="form-control" value="<?php echo $lev_gemacion ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="pseudomicellius" class="col-sm-6 col-form-label">Pseudomicellius</label>
                                <div class="col-sm-6">
                                    <input type="text" name="pseudomicellius" class="form-control" value="<?php echo $pseudomicellius ?>" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-header" id="extitle">
        EXAMEN PARASITOLÓGICO
    </div>
         <div class="card-body">
             <div class="row">
                <div class="col-sm-6">
                    <div class="card" id="formulario">
                            <div class="card-header" id="cardtitle">
                                HELMINTOS
                            </div>
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="h_ascaris" class="col-sm-6 col-form-label">H. Ascaris</label>
                                    <div class="col-sm-6">
                                        <input type="text" name="h_ascaris" class="form-control" value="<?php echo $h_ascaris ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="h_tricocefalo" class="col-sm-6 col-form-label">H. Tricocefalo</label>
                                    <div class="col-sm-6">
                                        <input type="text" name="h_tricocefalo" class="form-control" value="<?php echo $h_tricocefalo ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="h_uncinaria" class="col-sm-6 col-form-label">H. Uncinaria</label>
                                    <div class="col-sm-6">
                                        <input type="text" name="h_uncinaria" value="<?php echo $h_uncinaria?>" class="form-control" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="h_oxiuro" class="col-sm-6 col-form-label">H. Oxiuro</label>
                                    <div class="col-sm-6">
                                        <input type="text" name="h_oxiuro" value="<?php echo $h_oxiuro?>" class="form-control" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="h_tenia" class="col-sm-6 col-form-label">H. Tenia S.P</label>
                                    <div class="col-sm-6">
                                        <input type="text" name="h_tenia" value="<?php echo $h_tenia?>" class="form-control" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="h_himenolepis_nana" class="col-sm-6 col-form-label">H. Himenolepis Nana</label>
                                    <div class="col-sm-6">
                                        <input type="text" name="h_himenolepis_nana" value="<?php echo $h_himenolepis_nana?>" class="form-control" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="larva_strongiloides" class="col-sm-6 col-form-label">Larva Strongiloides</label>
                                    <div class="col-sm-6">
                                        <input type="text" name="larva_strongiloides" value="<?php echo $larva_strongiloides?>" class="form-control" readonly>
                                    </div>
                                </div>
                            </div>
                    </div> 
            </div>
            <div class="col-sm-6">
                  <div class="card">
                        <div class="card-header" id="cardtitle">
                                PROTOZOOS            TROZOFOITO    -    QUISTE
                        </div>
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="e_histolytica" class="col-sm-4 col-form-label">E Histolytica</label>
                                    <div class="col-sm-4">
                                        <input type="text" name="e_histolytica" value="<?php echo $e_histolytica?>" class="form-control" readonly>
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="text" name="e_histolytica" value="<?php echo $e_histolytica?>" class="form-control" readonly>
                                    </div>
                            </div>
                            <div class="form-group row">
                                <label for="e_coli" class="col-sm-4 col-form-label">E Coli</label>
                                    <div class="col-sm-4">
                                        <input type="text" name="e_coli" value="<?php echo $e_coli?>" class="form-control" readonly>
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="text" name="e_coli" value="<?php echo $e_coli?>" class="form-control" readonly>
                                    </div>
                            </div>
                            <div class="form-group row">
                                <label for="e_nana" class="col-sm-4 col-form-label">E Nana</label>
                                    <div class="col-sm-4">
                                        <input type="text" name="e_nana" value="<?php echo $e_nana?>" class="form-control" readonly>
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="text" name="e_nana" value="<?php echo $e_nana?>" class="form-control" readonly>
                                    </div>
                            </div>
                            <div class="form-group row">
                                <label for="giardia_lamblia" class="col-sm-4 col-form-label">Giardia Lamblia</label>
                                    <div class="col-sm-4">
                                        <input type="text" name="giardia_lamblia" value="<?php echo $giardia_lamblia?>" class="form-control" readonly>
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="text" name="giardia_lamblia" value="<?php echo $giardia_lamblia?>" class="form-control" readonly>
                                    </div>
                            </div>
                            <div class="form-group row">
                                <label for="balantidium_coli" class="col-sm-4 col-form-label">Balantidium Coli</label>
                                    <div class="col-sm-4">
                                        <input type="text" name="balantidium_coli" value="<?php echo $balantidium_coli?>" class="form-control" readonly>
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="text" name="balantidium_coli" value="<?php echo $balantidium_coli?>" class="form-control" readonly>
                                    </div>
                            </div>
                            <div class="form-group row">
                                <label for="chilomastix" class="col-sm-4 col-form-label">Chilomastix Mesnilii</label>
                                    <div class="col-sm-4">
                                        <input type="text" name="chilomastix" value="<?php echo $chilomastix?>" class="form-control" readonly>
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="text" name="chilomastix" value="<?php echo $chilomastix?>" class="form-control" readonly>
                                    </div>
                            </div>
                            <div class="form-group row">
                                <label for="blostocystis" class="col-sm-4 col-form-label">Blostocystis Hominis </label>
                                    <div class="col-sm-4">
                                        <input type="text" name="blostocystis" value="<?php echo $blostocystis?>" class="form-control" readonly>
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="text" name="blostocystis" value="<?php echo $blostocystis?>" class="form-control" readonly>
                                    </div>
                            </div>   
                        </div>
                  </div>     
            </div>
        </div>
    </div>  
                 <div class="form-group mb-2 row" id="bac_space">
                        <div class="form-group row">
                            <label for="observaciones" class="col-l-4 col-form-label">Observaciones</label>
                                <div class="col-l-8">
                                    <input type="text" name="observaciones" value="<?php echo $observaciones?>" class="form-control" readonly>
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