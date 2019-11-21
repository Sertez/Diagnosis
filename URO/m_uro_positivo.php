<?php include("db.php"); ?>
<?php include("includes/header.php"); ?>
<?php if (isset($_GET['examen_id'])) {
    $id1= $_GET['examen_id'];
    $polimorfonucleares1= "";
    $gram1= "";
    $amikacina1= "";
    $gentamicina1= "";
    $imipenem1= "";
    $meropenem1= "";
    $cefoxitina1= "";
    $ceftriazona1= "";
    $amoxacilina1= "";
    $ampicilina1= "";
    $cefepina1= "";
    $bacteriologo1= "";
    $query = "SELECT * FROM m_uro_positivo WHERE examen_id='$id1'";
    $result2 = mysqli_query($conn, $query);
    if(mysqli_num_rows($result2) == 1){
        $row = mysqli_fetch_array($result2);
        $polimorfonucleares1= $row['polimorfonucleares'];
        $gram1= $row['gram'];
        $amikacina1= $row['amikacina'];
        $gentamicina1= $row['gentamicina'];
        $imipenem1= $row['imipenem'];
        $meropenem1= $row['meropenem'];
        $cefoxitina1= $row['cefoxitina'];
        $ceftriazona1= $row['ceftriazona'];
        $amoxacilina1= $row['amoxacilina'];
        $ampicilina1= $row['ampicilina'];
        $cefepina1= $row['cefepina'];
        $bacteriologo1= $row['bacteriologo']; 
    }
    ?>
    
    <div class="container p-4 con" id="contenido">
        <form action="m_uro_positivo_save.php?examen_id=<?php echo $_GET['examen_id'] ?>" method="POST">
            <div class="card card-body">
                <div class="card-header" id="extitle">
                    Crear o Editar Urocultivo
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
                                    <label for="polimorfonucleares" class="col-sm-6 col-form-label">Polimorfonucleares</label>
                                    <div class="col-sm-6">
                                        <input type="text" name="polimorfonucleares" value="<?php echo $polimorfonucleares1?>" class="form-control" placeholder="polimorfonucleares" autofocus>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="gram" class="col-sm-6 col-form-label">Gram</label>
                                    <div class="col-sm-6">
                                        <input type="text" name="gram" value="<?php echo $gram1?>" class="form-control" placeholder="gram" autofocus>
                                    </div>
                                </div>    
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="card" id="formulario">
                            <div class="card-header" id="cardtitle">
                                Antibiograma
                            </div>
                            <div class="card-body">
                            <div class="form-group row">
                                    <label for="amikacina" class="col-sm-6 col-form-label">Amikacina</label>
                                    <div class="col-sm-6">
                                        <input type="text" name="amikacina" value="<?php echo $amikacina1?>" class="form-control" placeholder="amikacina" autofocus>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="gentamicina" class="col-sm-6 col-form-label">Gentamicina</label>
                                    <div class="col-sm-6">
                                        <input type="text" name="gentamicina" value="<?php echo $gentamicina1?>" class="form-control" placeholder="gentamicina" autofocus>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="imipenem" class="col-sm-6 col-form-label">Imipenem</label>
                                    <div class="col-sm-6">
                                        <input type="text" name="imipenem" value="<?php echo $imipenem1?>" class="form-control" placeholder="imipenem" autofocus>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="meropenem" class="col-sm-6 col-form-label">Meropenem</label>
                                    <div class="col-sm-6">
                                        <input type="text" name="meropenem" value="<?php echo $meropenem1?>" class="form-control" placeholder="meropenem" autofocus>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="cefoxitina" class="col-sm-6 col-form-label">Cefoxitina</label>
                                    <div class="col-sm-6">
                                        <input type="text" name="cefoxitina" value="<?php echo $cefoxitina1?>" class="form-control" placeholder="cefoxitina" autofocus>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="ceftriazona" class="col-sm-6 col-form-label">Ceftriazona</label>
                                    <div class="col-sm-6">
                                        <input type="text" name="ceftriazona" value="<?php echo $ceftriazona1?>" class="form-control" placeholder="ceftriazona" autofocus>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="amoxacilina" class="col-sm-6 col-form-label">Amoxacilina Acido Clavuanico</label>
                                    <div class="col-sm-6">
                                        <input type="text" name="amoxacilina" value="<?php echo $amoxacilina1?>" class="form-control" placeholder="amoxacilina" autofocus>
                                    </div>
                                </div>
                              <div class="form-group row">
                                    <label for="ampicilina" class="col-sm-6 col-form-label">Ampicilina</label>
                                    <div class="col-sm-6">
                                        <input type="text" name="ampicilina" value="<?php echo $ampicilina1?>" class="form-control" placeholder="ampicilina" autofocus>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="cefepina" class="col-sm-6 col-form-label">Cefepina</label>
                                    <div class="col-sm-6">
                                        <input type="text" name="cefepina" value="<?php echo $cefepina1?>" class="form-control" placeholder="cefepina" autofocus>
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
                <input type="submit" class="btn btn-success btn-block" name="m_uro_positivo_save" value="Agregar o Editar Examen">
            </div>
        </form>
    </div>
<?php } else {
    header("Location:examenes.php");
    die();
}
?>


<?php include("includes/footer.php"); ?>