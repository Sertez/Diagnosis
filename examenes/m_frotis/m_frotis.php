<?php include("db.php"); ?>
<?php include("includes/header.php"); ?>
<?php if (isset($_GET['examen_id'])) {
    $id1 = $_GET['examen_id'];
    $color1 = "";
    $olor_amino1 = "";
    $ph1 = "";
    $cel_epiteliales1 = "";
    $bacterias1 = "";
    $leucocitos1 = "";
    $hematies1 = "";
    $pseudomicellios1 = "";
    $trico_vaginales1 = "";
    $lev_sueltas1 = "";
    $lev_gemacion1 = "";
    $gram1 = "";
    $pmn1 = "";
    $celulas_guias1 = "";
    $bacteriologo1 = "";
    $query = "SELECT * FROM m_frotis WHERE examen_id='$id1'";
    $result2 = mysqli_query($conn, $query);
    if (mysqli_num_rows($result2) == 1) {
        $row = mysqli_fetch_array($result2);
        $color1 = $row['color'];
        $olor_amino1 = $row['olor_amino'];
        $ph1 = $row['ph'];
        $cel_epiteliales1 = $row['cel_epiteliales'];
        $bacterias1 = $row['bacterias'];
        $leucocitos1 = $row['leucocitos'];
        $hematies1 = $row['hematies'];
        $pseudomicellios1 = $row['pseudomicellios'];
        $trico_vaginales1 = $row['trico_vaginales'];
        $lev_sueltas1 = $row['lev_sueltas'];
        $lev_gemacion1 = $row['lev_gemacion'];
        $gram1 = $row['gram'];
        $pmn1 = $row['pmn'];
        $celulas_guias1 = $row['celulas_guias'];
        $bacteriologo1 = $row['bacteriologo'];
    }
    ?>

    <div class="container p-4 con" id="contenido">
        <form action="m_frotis_save.php?examen_id=<?php echo $_GET['examen_id'] ?>" method="POST">
            <div class="card card-body">
                <div class="card-header" id="extitle">
                    Frotis Vaginal
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
                                Examen Secreción Vaginal
                            </div>
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="color" class="col-sm-6 col-form-label">Color</label>
                                    <div class="col-sm-6">
                                        <input type="text" name="color" value="<?php echo $color1 ?>" class="form-control" placeholder="" autofocus>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="olor_amino" class="col-sm-6 col-form-label">Olor Amino</label>
                                    <div class="col-sm-6">
                                        <input type="text" name="olor_amino" value="<?php echo $olor_amino1 ?>" class="form-control" placeholder="   " autofocus>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="ph" class="col-sm-6 col-form-label">PH</label>
                                    <div class="col-sm-6">
                                        <input type="text" name="ph" value="<?php echo $ph1 ?>" class="form-control" placeholder="" autofocus>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card" id="margentop">
                            <div class="card-header" id="cardtitle">
                                Examen por coloración de Gram
                            </div>
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="gram" class="col-sm-6 col-form-label">Gram</label>
                                    <div class="col-sm-6">
                                        <input type="text" name="gram" value="<?php echo $gram1 ?>" class="form-control" placeholder="" autofocus>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="pmn" class="col-sm-6 col-form-label">PMN</label>
                                    <div class="col-sm-6">
                                        <input type="text" name="pmn" value="<?php echo $pmn1 ?>" class="form-control" placeholder="" autofocus>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="celulas_guias" class="col-sm-6 col-form-label">Celulas Guías</label>
                                    <div class="col-sm-6">
                                        <input type="text" name="celulas_guias" value="<?php echo $celulas_guias1 ?>" class="form-control" placeholder="" autofocus>
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
                                        <input type="text" name="cel_epiteliales" value="<?php echo $cel_epiteliales1 ?>" class="form-control" placeholder="" autofocus>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="bacterias" class="col-sm-6 col-form-label">Bacterias</label>
                                    <div class="col-sm-6">
                                        <input type="text" name="bacterias" value="<?php echo $bacterias1 ?>" class="form-control" placeholder="" autofocus>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="leucocitos" class="col-sm-6 col-form-label">Leucocitos</label>
                                    <div class="col-sm-6">
                                        <input type="text" name="leucocitos" value="<?php echo $leucocitos1 ?>" class="form-control" placeholder="" autofocus>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="hematies" class="col-sm-6 col-form-label">Hematies</label>
                                    <div class="col-sm-6">
                                        <input type="text" name="hematies" value="<?php echo $hematies1 ?>" class="form-control" placeholder="" autofocus>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="pseudomicellios" class="col-sm-6 col-form-label">Pseudomicellios</label>
                                    <div class="col-sm-6">
                                        <input type="text" name="pseudomicellios" value="<?php echo $pseudomicellios1 ?>" class="form-control" placeholder="" autofocus>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="trico_vaginales" class="col-sm-6 col-form-label">Tricomonas Vaginales</label>
                                    <div class="col-sm-6">
                                        <input type="text" name="trico_vaginales" value="<?php echo $trico_vaginales1 ?>" class="form-control" placeholder="" autofocus>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="lev_sueltas" class="col-sm-6 col-form-label">Levaduras Sueltas</label>
                                    <div class="col-sm-6">
                                        <input type="text" name="lev_sueltas" value="<?php echo $lev_sueltas1 ?>" class="form-control" placeholder="" autofocus>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="lev_gemacion" class="col-sm-6 col-form-label">Levaduras en Gemación</label>
                                    <div class="col-sm-6">
                                        <input type="text" name="lev_gemacion" value="<?php echo $lev_gemacion1 ?>" class="form-control" placeholder="" autofocus>
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
                <input type="submit" class="btn btn-success btn-block" name="m_frotis_save" value="Agregar o Editar Examen">
            </div>
        </form>
    </div>
<?php } else {
    header("Location:examenes.php");
    die();
}
?>


<?php include("includes/footer.php"); ?>