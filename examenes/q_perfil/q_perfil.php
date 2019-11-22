<?php include("db.php"); ?>
<?php include("includes/header.php"); ?>
<?php if (isset($_GET['examen_id'])) {
    $id1 = $_GET['examen_id'];
    $glicemia1 = "";
    $colesterol1 = "";
    $trigliceridos1 = "";
    $colesterol_hdl1 = "";
    $colesterol_ldl1 = "";
    $bacteriologo1 = "";
    $query = "SELECT * FROM q_perfil WHERE examen_id='$id1'";
    $result2 = mysqli_query($conn, $query);
    if (mysqli_num_rows($result2) == 1) {
        $row = mysqli_fetch_array($result2);
        $glicemia1 = $row['glicemia'];
        $colesterol1 = $row['colesterol'];
        $trigliceridos1 = $row['trigliceridos'];
        $colesterol_hdl1 = $row['colesterol_hdl'];
        $colesterol_ldl1 = $row['colesterol_ldl'];
        $bacteriologo1 = $row['bacteriologo'];
    }
    ?>

    <div class="container p-4 con" id="contenido">
        <form action="q_perfil_save.php?examen_id=<?php echo $_GET['examen_id'] ?>" method="POST">
            <div class="card card-body">
                <div class="card-header" id="extitle">
                    Perfil Lipídico
                </div>
                <div class="row">
                    <div class="col-sm-8">
                        <div class="card card-body" id="center">
                            <div class="card-header" id="cardtitle">
                                Química
                            </div>
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="glicemia" class="col-sm-4 col-form-label">Glicemia</label>
                                    <div class="col-sm-4">
                                        <input type="text" name="glicemia" value="<?php echo $glicemia1 ?>" class="form-control" placeholder="" autofocus>
                                    </div>
                                    <label for="ref" class="col-sm-4 col-form-label">70-100mg/dl</label>
                                </div>
                                <div class="form-group row">
                                    <label for="colesterol" class="col-sm-4 col-form-label">Colesterol</label>
                                    <div class="col-sm-4">
                                        <input type="text" name="colesterol" value="<?php echo $colesterol1 ?>" class="form-control" placeholder="" autofocus>
                                    </div>
                                    <label for="ref" class="col-sm-4 col-form-label"> HASTA 200 mg/dl </label>
                                </div>
                                <div class="form-group row">
                                    <label for="trigliceridos" class="col-sm-4 col-form-label">Trigliceridos</label>
                                    <div class="col-sm-4">
                                        <input type="text" name="trigliceridos" value="<?php echo $trigliceridos1 ?>" class="form-control" placeholder="" autofocus>
                                    </div>
                                    <label for="ref" class="col-sm-4 col-form-label">HASTA 170 mg/dl</label>
                                </div>
                                <div class="form-group row">
                                    <label for="colesterol_hdl" class="col-sm-4 col-form-label">Colesterol HDL</label>
                                    <div class="col-sm-4">
                                        <input type="text" name="colesterol_hdl" value="<?php echo $colesterol_hdl1 ?>" class="form-control" placeholder="" autofocus>
                                    </div>
                                    <label for="ref" class="col-sm-4 col-form-label"> H:35-55 M: 45-66 mg/dl </label>
                                </div>
                                <div class="form-group row">
                                    <label for="colesterol_ldl" class="col-sm-4 col-form-label">Colesterol LDL</label>
                                    <div class="col-sm-4">
                                        <input type="text" name="colesterol_ldl" value="<?php echo $colesterol_hdl1 ?>" class="form-control" placeholder="" autofocus>
                                    </div>
                                    <label for="ref" class="col-sm-4 col-form-label">HASTA 129 mg/d </label>
                                </div>
                            </div>
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
                <input type="submit" class="btn btn-success btn-block" name="q_perfil_save" value="Agregar o Editar Examen">
            </div>
        </form>
    </div>
<?php } else {
    header("Location:examenes.php");
    die();
}
?>


<?php include("includes/footer.php"); ?>