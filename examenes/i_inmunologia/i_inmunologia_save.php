<?php

include("db.php");

if ((isset($_POST['i_inmunologia_save'])) and (isset($_GET['examen_id']))) {
    $examen_id = $_GET['examen_id'];
    $asto = $_POST['asto'];
    $pcr = $_POST['pcr'];
    $ra_tes = $_POST['ra_tes'];
    $bacteriologo = $_POST['bacteriologo'];
    $query2 = "SELECT * FROM i_inmunologia WHERE examen_id='$examen_id'";
    $result = mysqli_query($conn, $query2);
    $row = mysqli_fetch_array($result);
    echo $row['examen_id'];
    if ($row['examen_id'] == $examen_id) {
        $query3 = "UPDATE i_inmunologia SET asto = '$asto', pcr='$pcr',
        ra_tes='$ra_tes', bacteriologo='$bacteriologo' 
        WHERE examen_id='$examen_id'";
        mysqli_query($conn, $query3);
    } else {
        $query = "INSERT INTO i_inmunologia(examen_id,asto,pcr,
        ra_tes,bacteriologo) 
    VALUES('$examen_id','$asto','$pcr','$ra_tes','$bacteriologo')";
        $result = mysqli_query($conn, $query);
    }
}
if (!$result) {
    $_SESSION['message'] = 'Error Inesperado';
    $_SESSION['message_type'] = 'danger';
    $previous_page = $_SESSION['current_page'];
    header("Location: $previous_page");
    die();
}
$_SESSION['message'] = 'Operacion relizada con éxito';
$_SESSION['message_type'] = 'success';
$previous_page = $_SESSION['current_page'];
header("Location: $previous_page");
