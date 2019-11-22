<?php

include("db.php");

if ((isset($_POST['q_quimica_especial_save'])) and (isset($_GET['examen_id']))) {
    $examen_id = $_GET['examen_id'];
    $hemoglobina = $_POST['hemoglobina'];
    $microalbuminura = $_POST['microalbuminura'];
    $creatinuria = $_POST['creatinuria'];
    $albumi_creati = $_POST['albumi_creati'];
    $bacteriologo = $_POST['bacteriologo'];
    $query2 = "SELECT * FROM q_quimica_especial WHERE examen_id='$examen_id'";
    $result = mysqli_query($conn, $query2);
    $row = mysqli_fetch_array($result);
    echo $row['examen_id'];
    if ($row['examen_id'] == $examen_id) {
        $query3 = "UPDATE q_quimica_especial SET hemoglobina = '$hemoglobina', microalbuminura='$microalbuminura',
        creatinuria='$creatinuria',albumi_creati = '$albumi_creati', bacteriologo='$bacteriologo' 
        WHERE examen_id='$examen_id'";
        mysqli_query($conn, $query3);
    } else {
        $query = "INSERT INTO q_quimica_especial(examen_id,hemoglobina,microalbuminura,
        creatinuria,albumi_creati,bacteriologo) 
    VALUES('$examen_id','$hemoglobina','$microalbuminura','$creatinuria','$albumi_creati','$bacteriologo')";
        $result = mysqli_query($conn, $query);
    }
}
if (!$result) {
    $_SESSION['message'] = 'Error Inesperado';
    $_SESSION['message_type'] = 'danger';
    header("Location:examenes.php");
    die();
}
$_SESSION['message'] = 'Operacion relizada con éxito';
$_SESSION['message_type'] = 'success';
header("Location:examenes.php");
