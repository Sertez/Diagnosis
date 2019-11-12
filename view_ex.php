<?php

include("db.php");

if (isset($_GET['examen_id'])) {
    $examen_id = $_GET['examen_id'];

    $query = "SELECT tipo FROM examenes WHERE examen_id=$examen_id";
    $tipo_query = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($tipo_query);
    $tipo = $row['tipo'];

    if($tipo="Parcial de Orina"){
        header("Location: p_orina_view.php?examen_id=$examen_id");
    }else{
    $_SESSION['message'] = 'Error Inesperado';
    $_SESSION['message_type'] = 'danger';

    header("Location: pacientes.php");
    die();
    }
    
}
?>
