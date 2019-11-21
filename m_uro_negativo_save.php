<?php

include("db.php");

if ((isset($_POST['m_uro_negativo_save'])) and (isset($_GET['examen_id']))){
    $examen_id=$_GET['examen_id'];
    $bacteriologo= $_POST['bacteriologo'];
    $query2 = "SELECT * FROM m_uro_negativo WHERE examen_id='$examen_id'";
    $result5 = $result = mysqli_query($conn, $query2);
    $row = mysqli_fetch_array($result5);
    echo $row['examen_id'];
    if ($row['examen_id']==$examen_id) {
        $query3 = "UPDATE m_uro_negativo SET bacteriologo='$bacteriologo' WHERE examen_id='$examen_id'";
        mysqli_query($conn, $query3);
    }else{
    $query="INSERT INTO m_uro_negativo(examen_id,bacteriologo) 
    VALUES('$examen_id','$bacteriologo')";
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