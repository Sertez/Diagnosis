<?php

include("db.php");

if ((isset($_POST['h_hematologia_save'])) and (isset($_GET['examen_id']))){
    $examen_id=$_GET['examen_id'];
    $hematocrito= $_POST['hematocrito'];
    $hemoglobina= $_POST['hemoglobina'];   
    $leucocitos= $_POST['leucocitos']; 
    $neutrofilos= $_POST['neutrofilos'];
    $linfocitos= $_POST['linfocitos'];
    $eosinofilos= $_POST['eosinofilos'];
    $monocitos= $_POST['monocitos'];
    $basofilas= $_POST['basofilas'];
    $plaquetas= $_POST['plaquetas'];
    $reticulocitos= $_POST['reticulocitos'];
    $vsg= $_POST['vsg'];
    $t_sangria= $_POST['t_sangria'];
    $t_coagulacion= $_POST['t_coagulacion'];
    $t_protrombina= $_POST['t_protrombina'];    
    $t_p_tromboplastina= $_POST['t_p_tromboplastina'];
    $grupo= $_POST['grupo'];
    $rh= $_POST['rh'];    
    $bacteriologo= $_POST['bacteriologo'];
    $query2 = "SELECT * FROM h_hematologia WHERE examen_id='$examen_id'";
    $result5 = $result = mysqli_query($conn, $query2);
    $row = mysqli_fetch_array($result5);
    echo $row['examen_id'];
    if ($row['examen_id']==$examen_id) {
        $query3 = "UPDATE h_hematologia SET hematocrito = '$hematocrito', hemoglobina='$hemoglobina', leucocitos = '$leucocitos', neutrofilos = '$neutrofilos',
        linfocitos = '$linfocitos',eosinofilos = '$eosinofilos',monocitos ='$monocitos',basofilas='$basofilas',plaquetas = '$plaquetas',
        reticulocitos = '$reticulocitos',vsg= '$vsg',t_sangria='$t_sangria',t_coagulacion='$t_coagulacion',
        t_protrombina='$t_protrombina',t_p_tromboplastina= '$t_p_tromboplastina',grupo='$grupo',rh='$rh',
        bacteriologo='$bacteriologo' WHERE examen_id='$examen_id'";
        mysqli_query($conn, $query3);
    }else{
    $query="INSERT INTO h_hematologia(examen_id,hematocrito,hemoglobina,leucocitos,neutrofilos,linfocitos,eosinofilos,monocitos,basofilas,plaquetas,
    reticulocitos,vsg,t_sangria,t_coagulacion,t_protrombina,t_p_tromboplastina,grupo,rh,bacteriologo) 
    VALUES('$examen_id','$hematocrito','$hemoglobina', '$leucocitos','$neutrofilos','$linfocitos','$eosinofilos','$monocitos',
    '$basofilas','$plaquetas','$reticulocitos','$vsg','$t_sangria','$t_coagulacion','$t_protrombina',
    '$t_p_tromboplastina','$grupo','$rh','$bacteriologo')";
    $result = mysqli_query($conn, $query);
    if (!$result) {
    $_SESSION['message'] = 'Error Inesperado';
    $_SESSION['message_type'] = 'danger';
    header("Location: examenes.php");
    die();
    }
        
    }   
    $_SESSION['message'] = 'Operacion relizada con éxito';
    $_SESSION['message_type'] = 'success';
    header("Location: examenes.php");
    
}

?>
