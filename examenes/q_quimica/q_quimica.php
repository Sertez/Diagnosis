<?php include("db.php"); ?>
<?php include("includes/header.php"); ?>
<?php if (isset($_GET['examen_id'])) {
    $id1 = $_GET['examen_id'];
    $glicemia1 = "";
    $colesterol1 = "";
    $colesterol_hdl1 = "";
    $colesterol_ldl1 = "";
    $trigliceridos1 = "";
    $acido_urico1 = "";
    $nitrogeno_ureico1 = "";
    $creatinina1 = "";
    $tasa_filtracion_glomerular1 = "";
    $fosfatasa_alcalina1 = "";
    $alanino_aminotrans1 = "";
    $aspartato_aminotrans1 = "";
    $bacteriologo1 = "";
    $query = "SELECT * FROM q_quimica WHERE examen_id='$id1'";
    $result2 = mysqli_query($conn, $query);
    if (mysqli_num_rows($result2) == 1) {
        $row = mysqli_fetch_array($result2);
        $glicemia1 = $row['glicemia'];
        $colesterol1 = $row['colesterol'];
        $colesterol_hdl1 = $row['colesterol_hdl'];
        $colesterol_ldl1 = $row['colesterol_ldl'];
        $trigliceridos1 = $row['trigliceridos'];
        $acido_urico1 = $row['acido_urico'];
        $nitrogeno_ureico1 = $row['nitrogeno_ureico'];
        $creatinina1 = $row['creatinina'];
        $tasa_filtracion_glomerular1 = $row['tasa_filtracion_glomerular'];
        $fosfatasa_alcalina1 = $row['fosfatasa_alcalina'];
        $alanino_aminotrans1 = $row['alanino_aminotrans'];
        $aspartato_aminotrans1 = $row['aspartato_aminotrans'];
        $bacteriologo1 = $row['bacteriologo'];
    }
    ?>

    <div class="container p-4 con" id="contenido">
        <form action="q_quimica_save.php?examen_id=<?php echo $_GET['examen_id'] ?>" method="POST">
            <div class="card card-body">
                <div class="card-header" id="extitle">
                    Química General
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
                                Examen
                            </div>
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="glicemia" class="col-sm-6 col-form-label">Glicemia</label>
                                    <div class="col-sm-6">
                                        <input type="text" name="glicemia" value="<?php echo $glicemia1 ?>" class="form-control" placeholder="" autofocus>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="colesterol" class="col-sm-6 col-form-label">Colesterol</label>
                                    <div class="col-sm-6">
                                        <input type="text" name="colesterol" value="<?php echo $colesterol1 ?>" class="form-control" placeholder="" autofocus>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="colesterol_hdl" class="col-sm-6 col-form-label">Colesterol HDL</label>
                                    <div class="col-sm-6">
                                        <input type="text" name="colesterol_hdl" value="<?php echo $colesterol_hdl1 ?>" class="form-control" placeholder="" autofocus>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="colesterol_ldl" class="col-sm-6 col-form-label">Colesterol LDL</label>
                                    <div class="col-sm-6">
                                        <input type="text" name="colesterol_ldl" value="<?php echo $colesterol_ldl1 ?>" class="form-control" placeholder="" autofocus>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="trigliceridos" class="col-sm-6 col-form-label">Triglicéridos</label>
                                    <div class="col-sm-6">
                                        <input type="text" name="trigliceridos" value="<?php echo $trigliceridos1 ?>" class="form-control" placeholder="" autofocus>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="acido_urico" class="col-sm-6 col-form-label">Acido Úrico</label>
                                    <div class="col-sm-6">
                                        <input type="text" name="acido_urico" value="<?php echo $acido_urico1 ?>" class="form-control" placeholder="" autofocus>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="nitrogeno_ureico" class="col-sm-6 col-form-label">Nitrógeno Uerico</label>
                                    <div class="col-sm-6">
                                        <input type="text" name="nitrogeno_ureico" value="<?php echo $nitrogeno_ureico1 ?>" class="form-control" placeholder="" autofocus>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="creatinina" class="col-sm-6 col-form-label">Creatinina</label>
                                    <div class="col-sm-6">
                                        <input type="text" name="creatinina" value="<?php echo $creatinina1 ?>" class="form-control" placeholder="" autofocus>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="tasa_filtracion_glomerular" class="col-sm-6 col-form-label">Tasa de Filtración Glomerular</label>
                                    <div class="col-sm-6">
                                        <input type="text" name="tasa_filtracion_glomerular" value="<?php echo $tasa_filtracion_glomerular1 ?>" class="form-control" placeholder="" autofocus>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="fosfatasa_alcalina" class="col-sm-6 col-form-label">Fosfatasa Alcalina</label>
                                    <div class="col-sm-6">
                                        <input type="text" name="fosfatasa_alcalina" value="<?php echo $fosfatasa_alcalina1 ?>" class="form-control" placeholder="" autofocus>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="alanino_aminotrans" class="col-sm-6 col-form-label">Alanino Aminotransferasa</label>
                                    <div class="col-sm-6">
                                        <input type="text" name="alanino_aminotrans" value="<?php echo $alanino_aminotrans1 ?>" class="form-control" placeholder="" autofocus>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="aspartato_aminotrans" class="col-sm-6 col-form-label">Aspartato Aminotransferasa</label>
                                    <div class="col-sm-6">
                                        <input type="text" name="aspartato_aminotrans" value="<?php echo $aspartato_aminotrans1 ?>" class="form-control" placeholder="" autofocus>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-2 row" id="bac_space">
                                <label for="bacteriologo" class="col-form-label">Bacteriólogo</label>
                                <div class="mx-sm-4 mb-2">
                                    <select class="form-control" id="sel_width" name="bacteriologo">
                                        <option selected="true" disabled="disabled" value="<?php echo $bacteriologo1 ?>"><?php echo $bacteriologo1 ?></option>
                                        <?php
                                            $query = "SELECT * FROM bacteriologos";
                                            $bac_table = mysqli_query($conn, $query);
                                            while ($row = mysqli_fetch_array($bac_table)) { ?>
                                            <option value="<?php echo $row['nombre'] ?>"><?php echo $row['nombre'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <input type="submit" class="btn btn-success btn-block" name="q_quimica_save" value="Agregar o Editar Examen">
                        </div>
        </form>
    </div>
<?php } else {
    header("Location:examenes.php");
    die();
}
?>


<?php include("includes/footer.php"); ?>
