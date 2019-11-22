<?php include("db.php"); ?>
<?php include("includes/header.php"); ?>
<?php if (isset($_GET['examen_id'])) {
    $id1= $_GET['examen_id'];
    $color1= "";
    $consistencia1="";
    $moco1="";
    $olor1="";
    $ph1="";
    $azucares_red1="";
    $rest_alimentos1="";
    $olor1="";
    $leucocitos1="";
    $hematies1="";
    $almidones1="";
    $fibra_muscular1="";
    $fibra_vegetal1="";
    $grasas1="";
    $lev_sueltas1="";
    $lev_gemacion1="";
    $pseudomicellius1="";
    $h_ascaris1="";
    $h_tricocefalo1="";
    $h_uncinaria1="";
    $h_oxiuro1="";
    $h_tenia1="";
    $h_himenolepis_nana1="";
    $larva_strongiloides1="";
    $e_histolytica1="";
    $e_coli1="";
    $e_nana1="";
    $giardia_lamblia1="";
    $balantidium_coli1="";
    $chilomastix1="";
    $blostocystis1="";
    $observaciones1="";
    $bacteriologo1="";
    $query = "SELECT * FROM p_copro WHERE examen_id='$id1'";
    $result2 = mysqli_query($conn, $query);
    if(mysqli_num_rows($result2) == 1){
        $row = mysqli_fetch_array($result2);
        $color1= $row['color'];
        $consistencia1= $row['consistencia'];
        $moco1 = $row['moco'];
        $sangre1 = $row['sangre'];
        $ph1 = $row['ph'];
        $azucares_red1 = $row['azucares_red'];
        $rest_alimentos1 = $row['rest_alimentos'];
        $olor1 = $row['olor'];
        $leucocitos1 = $row['leucocitos'];
        $hematies1 = $row['hematies'];
        $almidones1 = $row['almidones'];
        $fibra_muscular1 = $row['fibra_muscular'];
        $fibra_vegetal1 = $row['fibra_vegetal'];
        $grasas1 = $row['grasas'];
        $lev_sueltas1 = $row['lev_sueltas'];
        $lev_gemacion1 = $row['lev_gemacion'];
        $pseudomicellius1 = $row['pseudomicellius'];
        $h_ascaris1 = $row['h_ascaris'];
        $h_tricocefalo1 = $row['h_tricocefalo'];
        $h_uncinaria1 = $row['h_uncinaria'];
        $h_oxiuro1 = $row['h_oxiuro'];
        $h_tenia1 = $row['h_tenia'];
        $h_himenolepis_nana1 = $row['h_himenolepis_nana'];
        $larva_strongiloides1 = $row['larva_strongiloides'];
        $e_histolytica1 = $row['e_histolytica'];
        $e_coli1 = $row['e_coli'];
        $e_nana1 = $row['e_nana'];
        $giardia_lamblia1 = $row['giardia_lamblia'];
        $balantidium_coli1 = $row['balantidium_coli'];
        $chilomastix1 = $row['chilomastix'];
        $blostocystis1 = $row['blostocystis'];
        $observaciones1 = $row['observaciones'];
        $bacteriologo1 = $row['bacteriologo'];
    }
    ?>
    <div class="container p-4 con" id="contenido">
        <form action="p_copro_save.php?examen_id=<?php echo $_GET['examen_id'] ?>" method="POST">
            <div class="card card-body">
                <div class="card-header" id="extitle">
                    Crear Coprologico
                </div>
                <div class="row">
                    <div class="col-sm-6">
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
                                Examen Físico
                            </div>
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="color" class="col-sm-6 col-form-label">Color</label>
                                    <div class="col-sm-6">
                                        <input type="text" name="color" value="<?php echo $color1?>" class="form-control" placeholder="" autofocus>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="consistencia" class="col-sm-6 col-form-label">Consistencia</label>
                                    <div class="col-sm-6">
                                        <input type="text" name="consistencia" value="<?php echo $consistencia1?>" class="form-control" placeholder="" autofocus>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="moco" class="col-sm-6 col-form-label">Moco</label>
                                    <div class="col-sm-6">
                                        <input type="text" name="moco" value="<?php echo $moco1?>" class="form-control" placeholder="" autofocus>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="sangre" class="col-sm-6 col-form-label">Sangre</label>
                                    <div class="col-sm-6">
                                        <input type="text" name="sangre" value="<?php echo $sangre1?>" class="form-control" placeholder="" autofocus>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="ph" class="col-sm-6 col-form-label">PH</label>
                                    <div class="col-sm-6">
                                        <input type="text" name="ph" value="<?php echo $ph1?>" class="form-control" placeholder="" autofocus>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="azucares_red" class="col-sm-6 col-form-label">Azucares Reductores</label>
                                    <div class="col-sm-6">
                                        <input type="text" name="azucares_red" value="<?php echo $azucares_red1?>" class="form-control" placeholder="" autofocus>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="rest_alimentos" class="col-sm-6 col-form-label">Restos Alimenticios</label>
                                    <div class="col-sm-6">
                                        <input type="text" name="rest_alimentos" value="<?php echo $rest_alimentos1?>" class="form-control" placeholder="" autofocus>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="olor" class="col-sm-6 col-form-label">Olor</label>
                                    <div class="col-sm-6">
                                        <input type="text" name="olor" value="<?php echo $olor1?>" class="form-control" placeholder="" autofocus>
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
                                        <input type="text" name="leucocitos" value="<?php echo $leucocitos1?>" class="form-control" placeholder="" autofocus>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="hematies" class="col-sm-6 col-form-label">Hematies</label>
                                    <div class="col-sm-6">
                                        <input type="text" name="hematies" value="<?php echo $hematies1?>" class="form-control" placeholder="" autofocus>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="almidones" class="col-sm-6 col-form-label">Almidones</label>
                                    <div class="col-sm-6">
                                        <input type="text" name="almidones" value="<?php echo $almidones1?>" class="form-control" placeholder="" autofocus>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="fibra_muscular" class="col-sm-6 col-form-label">Fibra Muscular</label>
                                    <div class="col-sm-6">
                                        <input type="text" name="fibra_muscular" value="<?php echo $fibra_muscular1?>" class="form-control" placeholder="" autofocus>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="fibra_vegetal" class="col-sm-6 col-form-label">Fibra Vegetal</label>
                                    <div class="col-sm-6">
                                        <input type="text" name="fibra_vegetal" value="<?php echo $fibra_vegetal1?>"class="form-control" placeholder="" autofocus>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="grasas" class="col-sm-6 col-form-label">Grasas</label>
                                    <div class="col-sm-6">
                                        <input type="text" name="grasas" value="<?php echo $grasas1?>" class="form-control" placeholder="" autofocus>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="lev_sueltas" class="col-sm-6 col-form-label">Levaduras Sueltas</label>
                                    <div class="col-sm-6">
                                        <input type="text" name="lev_sueltas" value="<?php echo $lev_sueltas1?>" class="form-control" placeholder="" autofocus>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="lev_gemacion" class="col-sm-6 col-form-label">Levaduras en Gemación</label>
                                    <div class="col-sm-6">
                                        <input type="text" name="lev_gemacion" value="<?php echo $lev_gemacion1?>" class="form-control" placeholder="" autofocus>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="pseudomicellius" class="col-sm-6 col-form-label">Pseudomicellius</label>
                                    <div class="col-sm-6">
                                        <input type="text" name="pseudomicellius" value="<?php echo $pseudomicellius1?>" class="form-control" placeholder="" autofocus>
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
                                        <input type="text" name="h_ascaris" value="<?php echo $h_ascaris1?>" class="form-control" placeholder="" autofocus>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="h_tricocefalo" class="col-sm-6 col-form-label">H. Tricocefalo</label>
                                    <div class="col-sm-6">
                                        <input type="text" name="h_tricocefalo" value="<?php echo $h_tricocefalo1?>" class="form-control" placeholder="" autofocus>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="h_uncinaria" class="col-sm-6 col-form-label">H. Uncinaria</label>
                                    <div class="col-sm-6">
                                        <input type="text" name="h_uncinaria" value="<?php echo $h_uncinaria1?>" class="form-control" placeholder="" autofocus>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="h_oxiuro" class="col-sm-6 col-form-label">H. Oxiuro</label>
                                    <div class="col-sm-6">
                                        <input type="text" name="h_oxiuro" value="<?php echo $h_oxiuro1?>" class="form-control" placeholder="" autofocus>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="h_tenia" class="col-sm-6 col-form-label">H. Tenia S.P</label>
                                    <div class="col-sm-6">
                                        <input type="text" name="h_tenia" value="<?php echo $h_tenia1?>" class="form-control" placeholder="" autofocus>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="h_himenolepis_nana" class="col-sm-6 col-form-label">H. Himenolepis Nana</label>
                                    <div class="col-sm-6">
                                        <input type="text" name="h_himenolepis_nana" value="<?php echo $h_himenolepis_nana1?>" class="form-control" placeholder="" autofocus>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="larva_strongiloides" class="col-sm-6 col-form-label">Larva Strongiloides</label>
                                    <div class="col-sm-6">
                                        <input type="text" name="larva_strongiloides" value="<?php echo $larva_strongiloides1?>" class="form-control" placeholder="" autofocus>
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
                                        <input type="text" name="e_histolytica" value="<?php echo $e_histolytica1?>" class="form-control" placeholder="" autofocus>
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="text" name="e_histolytica" value="<?php echo $e_histolytica1?>" class="form-control" placeholder="" autofocus>
                                    </div>
                            </div>
                            <div class="form-group row">
                                <label for="e_coli" class="col-sm-4 col-form-label">E Coli</label>
                                    <div class="col-sm-4">
                                        <input type="text" name="e_coli" value="<?php echo $e_coli1?>" class="form-control" placeholder="" autofocus>
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="text" name="e_coli" value="<?php echo $e_coli1?>" class="form-control" placeholder="" autofocus>
                                    </div>
                            </div>
                            <div class="form-group row">
                                <label for="e_nana" class="col-sm-4 col-form-label">E Nana</label>
                                    <div class="col-sm-4">
                                        <input type="text" name="e_nana" value="<?php echo $e_nana1?>" class="form-control" placeholder="" autofocus>
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="text" name="e_nana" value="<?php echo $e_nana1?>" class="form-control" placeholder="" autofocus>
                                    </div>
                            </div>
                            <div class="form-group row">
                                <label for="giardia_lamblia" class="col-sm-4 col-form-label">Giardia Lamblia</label>
                                    <div class="col-sm-4">
                                        <input type="text" name="giardia_lamblia" value="<?php echo $giardia_lamblia1?>" class="form-control" placeholder="" autofocus>
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="text" name="giardia_lamblia" value="<?php echo $giardia_lamblia1?>" class="form-control" placeholder="" autofocus>
                                    </div>
                            </div>
                            <div class="form-group row">
                                <label for="balantidium_coli" class="col-sm-4 col-form-label">Balantidium Coli</label>
                                    <div class="col-sm-4">
                                        <input type="text" name="balantidium_coli" value="<?php echo $balantidium_coli1?>" class="form-control" placeholder="" autofocus>
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="text" name="balantidium_coli" value="<?php echo $balantidium_coli1?>" class="form-control" placeholder="" autofocus>
                                    </div>
                            </div>
                            <div class="form-group row">
                                <label for="chilomastix" class="col-sm-4 col-form-label">Chilomastix Mesnilii</label>
                                    <div class="col-sm-4">
                                        <input type="text" name="chilomastix" value="<?php echo $chilomastix1?>" class="form-control" placeholder="" autofocus>
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="text" name="chilomastix" value="<?php echo $chilomastix1?>" class="form-control" placeholder="" autofocus>
                                    </div>
                            </div>
                            <div class="form-group row">
                                <label for="blostocystis" class="col-sm-4 col-form-label">Blostocystis Hominis </label>
                                    <div class="col-sm-4">
                                        <input type="text" name="blostocystis" value="<?php echo $blostocystis1?>" class="form-control" placeholder="" autofocus>
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="text" name="blostocystis" value="<?php echo $blostocystis1?>" class="form-control" placeholder="" autofocus>
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
                                    <input type="text" name="observaciones" value="<?php echo $observaciones1?>" class="form-control" placeholder="" autofocus>
                                </div>
                        </div> 
                 </div>
                <div class="form-group mb-2 row" id="bac_space">

                    <label for="bacteriologo" class="col-form-label">Bacteriologo</label>
                    <div class="mx-sm-4 mb-2">
                        <select class="form-control" id="sel_width" name="bacteriologo">
                            <option selected="true" disabled="disabled" value="<?php echo $bacteriologo1?>"><?php echo $bacteriologo1?></option>
                            <?php
                                $query = "SELECT * FROM bacteriologos";
                                $bac_table = mysqli_query($conn, $query);
                                while ($row = mysqli_fetch_array($bac_table)) { ?>
                                <option value="<?php echo $row['nombre']?>"><?php echo $row['nombre']?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <input type="submit" class="btn btn-success btn-block" name="p_copro_save" value="Agregar o Editar Examen">
            </div>
        </form>
    </div>
<?php } else {
    header("Location:examenes.php");
    die();
}
?>


<?php include("includes/footer.php"); ?>