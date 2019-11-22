<?php include("db.php"); ?>
<?php include("includes/header.php"); ?>
<?php if (isset($_GET['examen_id'])) {
    $id1 = $_GET['examen_id'];
    $asto1 = "";
    $pcr1 = "";
    $ra_tes1 = "";
    $bacteriologo1 = "";
    $query = "SELECT * FROM i_inmunologia WHERE examen_id='$id1'";
    $result2 = mysqli_query($conn, $query);
    if (mysqli_num_rows($result2) == 1) {
        $row = mysqli_fetch_array($result2);
        $asto1 = $row['asto'];
        $pcr1 = $row['pcr'];
        $ra_tes1 = $row['ra_tes'];
        $bacteriologo1 = $row['bacteriologo'];
    }
    ?>

    <div class="container p-4 con" id="contenido">
        <form action="i_inmunologia_save.php?examen_id=<?php echo $_GET['examen_id'] ?>" method="POST">
            <div class="card card-body">
                <div class="card-header" id="extitle">
                    Inmunología
                </div>
                <div class="row">
                    <div class="col-sm-8">
                        <div class="card card-body" id="center">
                            <div class="card-header" id="cardtitle">
                                Inmunología
                            </div>
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="asto" class="col-sm-4 col-form-label">ASTO</label>
                                    <div class="col-sm-4">
                                        <input type="text" name="asto" value="<?php echo $asto1 ?>" class="form-control" placeholder="" autofocus>
                                    </div>
                                    <label for="ref" class="col-sm-4 col-form-label">Menor de 200UI/m </label>
                                </div>
                                <div class="form-group row">
                                    <label for="pcr" class="col-sm-4 col-form-label">PCR</label>
                                    <div class="col-sm-4">
                                        <input type="text" name="pcr" value="<?php echo $pcr1 ?>" class="form-control" placeholder="" autofocus>
                                    </div>
                                    <label for="ref" class="col-sm-4 col-form-label"> Menor de 6.0 mg/L </label> 
                                </div> 
                                <div class="form-group row">
                                    <label for="ra_tes" class="col-sm-4 col-form-label">R.A TES</label>
                                    <div class="col-sm-4">
                                        <input type="text" name="ra_tes" value="<?php echo $ra_tes1 ?>" class="form-control" placeholder="" autofocus>
                                    </div>
                                    <label for="ref" class="col-sm-4 col-form-label">Menor de 8.0UI/ml</label>
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
                <input type="submit" class="btn btn-success btn-block" name="i_inmunologia_save" value="Agregar o Editar Examen">
            </div>
        </form>
    </div>
<?php } else {
    header("Location:examenes.php");
    die();
}
?>


<?php include("includes/footer.php"); ?>