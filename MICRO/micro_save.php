<?php

include("db.php");

if ((isset($_POST['micro_save'])) and (isset($_GET['examen_id']))){
    $examen_id=$_GET['examen_id'];
    $BK1= $_POST['BK1'];    
    $bacteriologo= $_POST['bacteriologo'];
    $query2 = "SELECT * FROM p_bk WHERE examen_id='$examen_id'";
    $result5 = $result = mysqli_query($conn, $query2);
    $row = mysqli_fetch_array($result5);
    echo $row['examen_id'];
    if ($row['examen_id']==$examen_id) {
        $query3 = "UPDATE p_bk SET BK1 = '$BK1', bacteriologo='$bacteriologo' WHERE examen_id='$examen_id'";
        mysqli_query($conn, $query3);
    }else{
    $query="INSERT INTO p_bk(examen_id,BK1,bacteriologo) 
    VALUES('$examen_id','$BK1','$bacteriologo')";
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