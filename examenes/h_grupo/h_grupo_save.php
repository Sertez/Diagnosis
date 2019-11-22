<?php

include("db.php");

if ((isset($_POST['h_grupo_save'])) and (isset($_GET['examen_id']))) {
    $examen_id = $_GET['examen_id'];
    $gruposanguineo = $_POST['grupo'];
    $factorrh = $_POST['rh'];
    $bacteriologo = $_POST['bacteriologo'];
    $query2 = "SELECT * FROM h_grupo WHERE examen_id='$examen_id'";
    $result5 = $result = mysqli_query($conn, $query2);
    $row = mysqli_fetch_array($result5);
    if ($row['examen_id'] == $examen_id) {
        $query3 = "UPDATE h_grupo SET grupo = '$gruposanguineo', rh='$factorrh',
        bacteriologo='$bacteriologo' WHERE examen_id='$examen_id'";
    } else {
        $query = "INSERT INTO h_grupo(examen_id,grupo,rh,bacteriologo) 
            VALUES('$examen_id','$gruposanguineo','$factorrh','$bacteriologo')";
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
