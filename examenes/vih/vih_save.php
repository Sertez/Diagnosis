<?php

include("db.php");

if ((isset($_POST['vih_save'])) and (isset($_GET['examen_id']))) {
    $examen_id = $_GET['examen_id'];
    $prueba = $_POST['prueba'];
    $bacteriologo = $_POST['bacteriologo'];
    $query2 = "SELECT * FROM vih WHERE examen_id='$examen_id'";
    $result5 = $result = mysqli_query($conn, $query2);
    $row = mysqli_fetch_array($result5);
    if ($row['examen_id'] == $examen_id) {
        $query3 = "UPDATE vih SET prueba = '$prueba', 
        bacteriologo='$bacteriologo' WHERE examen_id='$examen_id'";
    } else {
        $query = "INSERT INTO vih(examen_id,prueba,bacteriologo) 
            VALUES('$examen_id','$prueba','$bacteriologo')";
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
