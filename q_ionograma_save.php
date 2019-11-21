<?php

include("db.php");

if ((isset($_POST['q_ionograma_save'])) and (isset($_GET['examen_id']))){
    $examen_id=$_GET['examen_id'];
    $sodio= $_POST['sodio'];    
    $cloro= $_POST['cloro'];
    $potasio = $_POST['potasio'];
    $bacteriologo= $_POST['bacteriologo'];
    $query2 = "SELECT * FROM q_ionograma WHERE examen_id='$examen_id'";
    $result5 = $result = mysqli_query($conn, $query2);
    $row = mysqli_fetch_array($result5);
    echo $row['examen_id'];
    if ($row['examen_id']==$examen_id) {
        $query3 = "UPDATE q_ionograma SET sodio = '$sodio', cloro = '$cloro', potasio = '$potasio', bacteriologo='$bacteriologo' WHERE examen_id='$examen_id'";
        mysqli_query($conn, $query3);
    }else{
    $query="INSERT INTO q_ionograma
    VALUES('$examen_id','$sodio','$cloro', '$potasio','$bacteriologo')";
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