<?php

include("db.php");

if ((isset($_POST['h_pt_ptt_save'])) and (isset($_GET['examen_id']))){
    $examen_id=$_GET['examen_id'];
    $t_protrombina= $_POST['t_protrombina'];    
    $t_par_tromboplastina= $_POST['t_par_tromboplastina'];
    $bacteriologo= $_POST['bacteriologo'];
    $query2 = "SELECT * FROM h_pt_ptt WHERE examen_id='$examen_id'";
    $result5 = $result = mysqli_query($conn, $query2);
    $row = mysqli_fetch_array($result5);
    echo $row['examen_id'];
    if ($row['examen_id']==$examen_id) {
        $query3 = "UPDATE h_pt_ptt SET t_protrombina = '$t_protrombina', t_par_tromboplastina = '$t_par_tromboplastina', bacteriologo='$bacteriologo' WHERE examen_id='$examen_id'";
        mysqli_query($conn, $query3);
    }else{
    $query="INSERT INTO h_pt_ptt
    VALUES('$examen_id','$t_protrombina','$t_par_tromboplastina', '$bacteriologo')";
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