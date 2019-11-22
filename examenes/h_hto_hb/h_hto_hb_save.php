<?php

include("db.php");

if ((isset($_POST['h_hto_hb_save'])) and (isset($_GET['examen_id']))) {
    $examen_id = $_GET['examen_id'];
    $hematocrito = $_POST['hematocrito'];
    $hemoglobina = $_POST['hemoglobina'];
    $bacteriologo = $_POST['bacteriologo'];
    $query2 = "SELECT * FROM h_hto_hb WHERE examen_id='$examen_id'";
    $result5 = $result = mysqli_query($conn, $query2);
    $row = mysqli_fetch_array($result5);
    echo $row['examen_id'];
    if ($row['examen_id'] == $examen_id) {
        $query3 = "UPDATE h_hto_hb SET hematocrito = '$hematocrito', hemoglobina = '$hemoglobina', bacteriologo='$bacteriologo' WHERE examen_id='$examen_id'";
        mysqli_query($conn, $query3);
    } else {
        $query = "INSERT INTO h_hto_hb
    VALUES('$examen_id','$hematocrito','$hemoglobina', '$bacteriologo')";
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
