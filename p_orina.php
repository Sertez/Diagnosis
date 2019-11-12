<?php include("db.php"); ?>
<?php include("includes/header.php"); ?>
<?php if (isset($_GET['examen_id'])) {
    $id1= $_GET['examen_id'];
    $color1= "";
    $aspecto1= "";
    $ph1= "";
    $densidad1= "";
    $proteinas1= "";
    $glucosa1= "";
    $cetonas1= "";
    $sangre1= "";
    $bilirrubinas1= "";
    $uro1= "";
    $nitritos1= "";
    $cel1= "";
    $moco1= "";
    $bacterias1= "";
    $leucocitos1= "";
    $piocitos1= "";
    $hermaties1= "";
    $cristales1= "";
    $cilindros1= "";
    $bacteriologo1= "";
    $query = "SELECT * FROM p_orina WHERE examen_id='$id1'";
    $result2 = mysqli_query($conn, $query);
    if(mysqli_num_rows($result2) == 1){
        $row = mysqli_fetch_array($result2);
        $color1= $row['color'];
        $aspecto1= $row['aspecto'];
        $ph1= $row['ph'];
	    $densidad1= $row['densidad'];
        $proteinas1= $row['proteinas'];
        $glucosa1= $row['glucosa'];
        $cetonas1= $row['cetonas'];
        $sangre1= $row['sangre'];
        $bilirrubinas1= $row['bilirrubinas'];
        $uro1= $row['urobilinogeno'];
        $nitritos1= $row['nitritos'];
        $cel1= $row['cel_epiteliales'];
	    $moco1= $row['moco'];
        $bacterias1= $row['bacterias'];
        $leucocitos1= $row['leucocitos'];
        $piocitos1= $row['piocitos'];
        $hermaties1= $row['hematies'];
        $cristales1= $row['cristales'];
        $cilindros1= $row['cilindros'];
        $bacteriologo1= $row['bacteriologo']; 
    }
    ?>
    
    <div class="container p-4 con" id="contenido">
        <form action="p_orina_save.php?examen_id=<?php echo $_GET['examen_id'] ?>" method="POST">
            <div class="card card-body">
                <div class="card-header" id="extitle">
                    Crear Parcial de Orina
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
                                        <input type="text" name="color" value="<?php echo $color1?>" class="form-control" placeholder="Color" autofocus>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="aspecto" class="col-sm-6 col-form-label">Aspecto</label>
                                    <div class="col-sm-6">
                                        <input type="text" name="aspecto" value="<?php echo $aspecto1?>" class="form-control" placeholder="Aspecto" autofocus>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="ph" class="col-sm-6 col-form-label">PH</label>
                                    <div class="col-sm-6">
                                        <input type="text" name="ph" value="<?php echo $ph1?>" class="form-control" placeholder="PH" autofocus>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="densidad" class="col-sm-6 col-form-label">Densidad</label>
                                    <div class="col-sm-6">
                                        <input type="text" name="densidad" value="<?php echo $densidad1?>" class="form-control" placeholder="Densidad" autofocus>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="proteinas" class="col-sm-6 col-form-label">Proteinas</label>
                                    <div class="col-sm-6">
                                        <input type="text" name="proteinas" value="<?php echo $proteinas1?>" class="form-control" placeholder="Proteinas" autofocus>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="glucosa" class="col-sm-6 col-form-label">Glucosa</label>
                                    <div class="col-sm-6">
                                        <input type="text" name="glucosa" value="<?php echo $glucosa1?>" class="form-control" placeholder="Glucosa" autofocus>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="cetonas" class="col-sm-6 col-form-label">Cetonas</label>
                                    <div class="col-sm-6">
                                        <input type="text" name="cetonas" value="<?php echo $cetonas1?>" class="form-control" placeholder="Cetonas" autofocus>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="sangre" class="col-sm-6 col-form-label">Sangre</label>
                                    <div class="col-sm-6">
                                        <input type="text" name="sangre" value="<?php echo $sangre1?>" class="form-control" placeholder="Sangre" autofocus>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="bilirrubinas" class="col-sm-6 col-form-label">Bilirrubinas</label>
                                    <div class="col-sm-6">
                                        <input type="text" name="bilirrubinas" value="<?php echo $bilirrubinas1?>" class="form-control" placeholder="Bilirrubinas" autofocus>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="urobilinogeno" class="col-sm-6 col-form-label">Urobilinogeno</label>
                                    <div class="col-sm-6">
                                        <input type="text" name="urobilinogeno" value="<?php echo $uro1?>" class="form-control" placeholder="Urobilinogeno" autofocus>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="nitritos" class="col-sm-6 col-form-label">Nitritos</label>
                                    <div class="col-sm-6">
                                        <input type="text" name="nitritos" value="<?php echo $nitritos1?>" class="form-control" placeholder="Nitritos" autofocus>
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
                                        <input type="text" name="cel_epiteliales" value="<?php echo $cel1?>" class="form-control" placeholder="Celulas Epiteliales" autofocus>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="moco" class="col-sm-6 col-form-label">Moco</label>
                                    <div class="col-sm-6">
                                        <input type="text" name="moco" value="<?php echo $moco1?>" class="form-control" placeholder="Moco" autofocus>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="bacterias" class="col-sm-6 col-form-label">Bacterias</label>
                                    <div class="col-sm-6">
                                        <input type="text" name="bacterias" value="<?php echo $bacterias1?>" class="form-control" placeholder="Bacterias" autofocus>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="leucocitos" class="col-sm-6 col-form-label">Leucocitos</label>
                                    <div class="col-sm-6">
                                        <input type="text" name="leucocitos" value="<?php echo $leucocitos1?>" class="form-control" placeholder="Leucocitos" autofocus>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="piocitos" class="col-sm-6 col-form-label">Piocitos</label>
                                    <div class="col-sm-6">
                                        <input type="text" name="piocitos" value="<?php echo $piocitos1?>" class="form-control" placeholder="Piocitos" autofocus>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="hematies" class="col-sm-6 col-form-label">Hematies</label>
                                    <div class="col-sm-6">
                                        <input type="text" name="hematies" value="<?php echo $hermaties1?>"class="form-control" placeholder="Hematies" autofocus>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="cristales" class="col-sm-6 col-form-label">Cristales</label>
                                    <div class="col-sm-6">
                                        <input type="text" name="cristales" value="<?php echo $cristales1?>" class="form-control" placeholder="Cristales" autofocus>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="cilindros" class="col-sm-6 col-form-label">Cilindros</label>
                                    <div class="col-sm-6">
                                        <input type="text" name="cilindros" value="<?php echo $cilindros1?>" class="form-control" placeholder="Cilindros" autofocus>
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
                <input type="submit" class="btn btn-success btn-block" name="p_orina_save" value="Agregar o Editar Examen">
            </div>
        </form>
    </div>
<?php } else {
    header("Location:examenes.php");
    die();
}
?>


<?php include("includes/footer.php"); ?>