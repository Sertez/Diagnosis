<?php

include("db.php");

if ((isset($_POST['h_esp_save'])) and (isset($_GET['examen_id']))) {
    $examen_id = $_GET['examen_id'];
    $serie_roja = $_POST['serie_roja'];
    $serie_blanca = $_POST['serie_blanca'];
    $serie_plaquetaria = $_POST['serie_plaquetaria'];
    $bacteriologo = $_POST['bacteriologo'];

    $query2 = "SELECT * FROM h_esp WHERE examen_id='$examen_id'";
    $result5 = $result = mysqli_query($conn, $query2);
    $row = mysqli_fetch_array($result5);
    if ($row['examen_id'] == $examen_id) {
        $query3 = "UPDATE h_esp SET serie_roja = '$serie_roja', serie_blanca='$serie_blanca',
        serie_plaquetaria='$serie_plaquetaria',bacteriologo='$bacteriologo' WHERE examen_id='$examen_id'";
    } else {
        $query = "INSERT INTO h_esp(examen_id,serie_roja,serie_blanca,serie_plaquetaria,bacteriologo) 
            VALUES('$examen_id','$serie_roja','$serie_blanca','$serie_plaquetaria','$bacteriologo')";
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
