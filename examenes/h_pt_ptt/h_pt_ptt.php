<?php include("db.php"); ?>
<?php include("includes/header.php"); ?>
<?php if (isset($_GET['examen_id'])) {
    $id1 = $_GET['examen_id'];
    $t_protrombina = "";
    $t_par_tromboplastina = "";
    $bacteriologo1 = "";
    $query = "SELECT * FROM h_pt_ptt WHERE examen_id='$id1'";
    $result2 = mysqli_query($conn, $query);
    if (mysqli_num_rows($result2) == 1) {
        $row = mysqli_fetch_array($result2);
        $t_protrombina = $row['t_protrombina'];
        $t_par_tromboplastina = $row['t_par_tromboplastina'];
        $bacteriologo1 = $row['bacteriologo'];
    }
    ?>

    <div class="container p-4 con" id="contenido">
        <form action="h_pt_ptt_save.php?examen_id=<?php echo $_GET['examen_id'] ?>" method="POST">
            <div class="card card-body">
                <div class="card-header" id="extitle">
                    Hematología Especial
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
                                    <label for="t_protrombina" class="col-sm-6 col-form-label">Tiempo de Protrombina</label>
                                    <div class="col-sm-6">
                                        <input type="text" name="t_protrombina" value="<?php echo $t_protrombina ?>" class="form-control" placeholder="" autofocus>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="t_par_tromboplastina" class="col-sm-6 col-form-label">Tiempo Parcial de Tromboplastina</label>
                                    <div class="col-sm-6">
                                        <input type="text" name="t_par_tromboplastina" value="<?php echo $t_par_tromboplastina ?>" class="form-control" placeholder="" autofocus>
                                    </div>
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
                <input type="submit" class="btn btn-success btn-block" name="h_pt_ptt_save" value="Agregar o Editar Examen">
            </div>
        </form>
    </div>
<?php } else {
    header("Location:examenes.php");
    die();
}
?>


<?php include("includes/footer.php"); ?>