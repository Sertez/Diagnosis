<?php

include("db.php");

if ((isset($_POST['m_bk_save'])) and (isset($_GET['examen_id']))){
    $examen_id=$_GET['examen_id'];
    $baciloscopia= $_POST['baciloscopia'];    
    $bacteriologo= $_POST['bacteriologo'];
    $query2 = "SELECT * FROM m_bk WHERE examen_id='$examen_id'";
    $result5 = $result = mysqli_query($conn, $query2);
    $row = mysqli_fetch_array($result5);
    echo $row['examen_id'];
    if ($row['examen_id']==$examen_id) {
        $query3 = "UPDATE m_bk SET baciloscopia = '$baciloscopia', bacteriologo='$bacteriologo' WHERE examen_id='$examen_id'";
        mysqli_query($conn, $query3);
    }else{
    $query="INSERT INTO m_bk(examen_id,baciloscopia,bacteriologo) 
    VALUES('$examen_id','$baciloscopia','$bacteriologo')";
    $result = mysqli_query($conn, $query);
    if (!$result) {
    $_SESSION['message'] = 'Error Inesperado';
    $_SESSION['message_type'] = 'danger';
    $previous_page = $_SESSION['current_page'];
    header("Location: $previous_page");
    die();
    }
        
    }   
    $_SESSION['message'] = 'Operacion relizada con éxito';
    $_SESSION['message_type'] = 'success';
    $previous_page = $_SESSION['current_page'];
    header("Location: $previous_page");
    
}

?>