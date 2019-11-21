<?php

include("db.php");

if ((isset($_POST['q_perfil_save'])) and (isset($_GET['examen_id']))) {
    $examen_id = $_GET['examen_id'];
    $glicemia = $_POST['glicemia'];
    $colesterol = $_POST['colesterol'];
    $trigliceridos = $_POST['trigliceridos'];
    $colesterol_hdl = $_POST['colesterol_hdl'];
    $colesterol_ldl = $_POST['colesterol_ldl'];   
    $bacteriologo = $_POST['bacteriologo'];
    $query2 = "SELECT * FROM q_perfil WHERE examen_id='$examen_id'";
    $result = mysqli_query($conn, $query2);
    $row = mysqli_fetch_array($result);
    echo $row['examen_id'];
    if ($row['examen_id'] == $examen_id) {
        $query3 = "UPDATE q_perfil SET glicemia = '$glicemia', colesterol='$colesterol',
        trigliceridos='$trigliceridos',colesterol_hdl = '$colesterol_hdl',colesterol_ldl = '$colesterol_ldl', bacteriologo='$bacteriologo' 
        WHERE examen_id='$examen_id'";
        mysqli_query($conn, $query3);
    } else {
        $query = "INSERT INTO q_perfil(examen_id,glicemia,colesterol,
        trigliceridos,colesterol_hdl,colesterol_ldl,bacteriologo) 
    VALUES('$examen_id','$glicemia','$colesterol','$trigliceridos','$colesterol_hdl','$colesterol_ldl','$bacteriologo')";
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