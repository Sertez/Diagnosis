<?php include("db.php"); ?>
<?php include("includes/header.php"); ?>
<?php if (isset($_GET['examen_id'])) {
    $id1= $_GET['examen_id'];
    $hematocrito1= "";
    $hemoglobina1= "";   
    $leucocitos1= "";
    $neutrofilos1= "";
    $linfocitos1= "";
    $eosinofilos1= "";
    $monocitos1= "";
    $basofilas1= "";
    $plaquetas1= "";
    $reticulocitos1= "";
    $rh1= "";
    $vsg1= "";
    $t_sangria1= "";
    $t_coagulacion1= "";
    $t_protombina1= "";
    $t_p__tromboplastina1= "";
    $grupo1= "";
    $bacteriologo1= "";
    $query = "SELECT * FROM h_hematologia WHERE examen_id='$id1'";
    $result2 = mysqli_query($conn, $query);
    if(mysqli_num_rows($result2) == 1){
        $row = mysqli_fetch_array($result2);
        $hematocrito1= $row['hematocrito'];
        $hemoglobina1= $row['hemoglobina'];
	    $leucocitos1= $row['leucocitos'];
        $neutrofilos1= $row['neutrofilos'];
        $linfocitos1= $row['linfocitos'];
        $eosinofilos1= $row['eosinofilos'];
        $monocitos1= $row['monocitos'];
        $basofilas1= $row['basofilas'];
        $plaquetas1= $row['plaquetas'];
        $reticulocitos1= $row['reticulocitos'];        
	    $vsg1= $row['vsg'];
        $t_sangria1= $row['t_sangria'];
        $t_coagulacion1= $row['t_coagulacion'];
        $t_protombina1= $row['t_protombina'];
        $t_p__tromboplastina1= $row['t_p__tromboplastina'];
        $grupo1= $row['grupo'];
        $rh1= $row['rh'];
        $bacteriologo1= $row['bacteriologo']; 
    }
    ?>
    
    <div class="container p-4 con" id="contenido">
        <form action="h_hematologia_save.php?examen_id=<?php echo $_GET['examen_id'] ?>" method="POST">
            <div class="card card-body">
                <div class="card-header" id="extitle">
                    Crear o Editar Hematología
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
                                Cuadro Hemático
                            </div>
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="hematocrito" class="col-sm-6 col-form-label">Hematocrito</label>
                                    <div class="col-sm-6">
                                        <input type="text" name="hematocrito" value="<?php echo $hematocrito1?>" class="form-control" placeholder="hematocrito" autofocus>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="hemoglobina" class="col-sm-6 col-form-label">Hemoglobina</label>
                                    <div class="col-sm-6">
                                        <input type="text" name="hemoglobina" value="<?php echo $hemoglobina1?>" class="form-control" placeholder="hemoglobina" autofocus>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="leucocitos" class="col-sm-6 col-form-label">Leucocitos</label>
                                    <div class="col-sm-6">
                                        <input type="text" name="leucocitos" value="<?php echo $leucocitos1?>" class="form-control" placeholder="leucocitos" autofocus>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="neutrofilos" class="col-sm-6 col-form-label">Neutrofilos</label>
                                    <div class="col-sm-6">
                                        <input type="text" name="neutrofilos" value="<?php echo $neutrofilos1?>" class="form-control" placeholder="neutrofilos" autofocus>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="linfocitos" class="col-sm-6 col-form-label">Linfocitos</label>
                                    <div class="col-sm-6">
                                        <input type="text" name="linfocitos" value="<?php echo $linfocitos1?>" class="form-control" placeholder="linfocitos" autofocus>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="eosinofilos" class="col-sm-6 col-form-label">Eosinofilos</label>
                                    <div class="col-sm-6">
                                        <input type="text" name="eosinofilos" value="<?php echo $eosinofilos1?>" class="form-control" placeholder="eosinofilos" autofocus>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="monocitos" class="col-sm-6 col-form-label">Monocitos</label>
                                    <div class="col-sm-6">
                                        <input type="text" name="monocitos" value="<?php echo $monocitos1?>" class="form-control" placeholder="monocitos" autofocus>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="basofilas" class="col-sm-6 col-form-label">Basofilas</label>
                                    <div class="col-sm-6">
                                        <input type="text" name="basofilas" value="<?php echo $basofilas1?>" class="form-control" placeholder="basofilas" autofocus>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="plaquetas" class="col-sm-6 col-form-label">Plaquetas</label>
                                    <div class="col-sm-6">
                                        <input type="text" name="plaquetas" value="<?php echo $plaquetas1?>" class="form-control" placeholder="plaquetas" autofocus>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="reticulocitos" class="col-sm-6 col-form-label">Reticulocitos</label>
                                    <div class="col-sm-6">
                                        <input type="text" name="reticulocitos" value="<?php echo $reticulocitos1?>" class="form-control" placeholder="reticulocitos" autofocus>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="card" id="formulario">
                            <div class="card-header" id="cardtitle">
                                Otros Exámenes
                            </div>
                            <div class="card-body">                                
                                <div class="form-group row">
                                    <label for="vsg" class="col-sm-6 col-form-label">V.S.G</label>
                                    <div class="col-sm-6">
                                        <input type="text" name="vsg" value="<?php echo $vsg1?>" class="form-control" placeholder="vsg" autofocus>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="t_sangria" class="col-sm-6 col-form-label">Tiempod de Sangria</label>
                                    <div class="col-sm-6">
                                        <input type="text" name="t_sangria" value="<?php echo $t_sangria1?>" class="form-control" placeholder="t_sangria" autofocus>
                                    </div>
                                </div>                               
                                <div class="form-group row">
                                    <label for="t_coagulacion" class="col-sm-6 col-form-label">Tiempo de Coagulacion</label>
                                    <div class="col-sm-6">
                                        <input type="text" name="t_coagulacion" value="<?php echo $t_coagulacion1?>" class="form-control" placeholder="t_coagulacion" autofocus>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="t_protombina" class="col-sm-6 col-form-label">Tiempo de Protombina</label>
                                    <div class="col-sm-6">
                                        <input type="text" name="t_protombina" value="<?php echo $t_protombina1?>"class="form-control" placeholder="t_protombina" autofocus>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="t_p__tromboplastina" class="col-sm-6 col-form-label">Tiempo Parcial de Tromboplastina</label>
                                    <div class="col-sm-6">
                                        <input type="text" name="t_p__tromboplastina" value="<?php echo $t_p__tromboplastina1?>" class="form-control" placeholder="t_p__tromboplastina" autofocus>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="grupo" class="col-sm-6 col-form-label">Grupo</label>
                                    <div class="col-sm-6">
                                        <input type="text" name="grupo" value="<?php echo $grupo1?>" class="form-control" placeholder="grupo" autofocus>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="rh" class="col-sm-6 col-form-label">RH</label>
                                    <div class="col-sm-6">
                                        <input type="text" name="rh" value="<?php echo $rh1?>" class="form-control" placeholder="rh" autofocus>
                                    </div>
                                </div>
                            </div>
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
                <input type="submit" class="btn btn-success btn-block" name="h_hematologia_save" value="Agregar o Editar Examen">
            </div>
        </form>
    </div>
<?php } else {
    header("Location:examenes.php");
    die();
}
?>


<?php include("includes/footer.php"); ?>
