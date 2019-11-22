<?php include("db.php"); ?>
<?php include("includes/header.php"); ?>
<?php if (isset($_GET['examen_id'])) {
    $id1 = $_GET['examen_id'];
    $hemoglobina1 = "";
    $microalbuminura1 = "";
    $creatinuria1 = "";
    $albumi_creati1 = "";
    $bacteriologo1 = "";
    $query = "SELECT * FROM q_quimica_especial WHERE examen_id='$id1'";
    $result2 = mysqli_query($conn, $query);
    if (mysqli_num_rows($result2) == 1) {
        $row = mysqli_fetch_array($result2);
        $hemoglobina1 = $row['hemoglobina'];
        $microalbuminura1 = $row['microalbuminura'];
        $creatinuria1 = $row['creatinuria'];
        $albumi_creati1 = $row['albumi_creati'];
        $bacteriologo1 = $row['bacteriologo'];
    }
    ?>

    <div class="container p-4 con" id="contenido">
        <form action="q_quimica_especial_save.php?examen_id=<?php echo $_GET['examen_id'] ?>" method="POST">
            <div class="card card-body">
                <div class="card-header" id="extitle">
                    Química Especial
                </div>
                <div class="row">
                    <div class="col-sm-8">
                        <div class="card card-body" id="center">
                            <div class="card-header" id="cardtitle">
                                Química
                            </div>
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="hemoglobina" class="col-sm-4 col-form-label">Hemoglobina</label>
                                    <div class="col-sm-4">
                                        <input type="text" name="hemoglobina" value="<?php echo $hemoglobina1 ?>" class="form-control" placeholder="" autofocus>
                                    </div>
                                    <label for="ref" class="col-sm-4 col-form-label">4.4-6.7% No diabetico <br> 6.7-7.3% Objetivo <br> 7.3-9.1% Buen control</label>
                                </div>
                                <div class="form-group row">
                                    <label for="microalbuminura" class="col-sm-4 col-form-label">Microalbuminura</label>
                                    <div class="col-sm-4">
                                        <input type="text" name="microalbuminura" value="<?php echo $microalbuminura1 ?>" class="form-control" placeholder="" autofocus>
                                    </div>
                                    <label for="ref" class="col-sm-4 col-form-label">< 20 mg/L </label> 
                                </div>
                                <div class="form-group row">
                                    <label for="creatinuria" class="col-sm-4 col-form-label">Creatinuria</label>
                                    <div class="col-sm-4">
                                        <input type="text" name="creatinuria" value="<?php echo $creatinuria1 ?>" class="form-control" placeholder="" autofocus>
                                    </div>
                                    <label for="ref" class="col-sm-4 col-form-label">39-259 mg/dl</label>
                                </div>
                                <div class="form-group row">
                                    <label for="albumi_creati" class="col-sm-4 col-form-label">Albuminuria/Creatinuria</label>
                                    <div class="col-sm-4">
                                        <input type="text" name="albumi_creati" value="<?php echo $albumi_creati1 ?>" class="form-control" placeholder="" autofocus>
                                    </div>
                                    <label for="ref" class="col-sm-4 col-form-label">< 30 mg/L </label> 
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
                    <input type="submit" class="btn btn-success btn-block" name="q_quimica_especial_save" value="Agregar o Editar Examen">
                </div>
            </form>
    </div>
<?php } else {
    header("Location:examenes.php");
    die();
}
?>


<?php include("includes/footer.php"); ?>