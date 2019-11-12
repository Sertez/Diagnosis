<?php

include("db.php");

if (isset($_GET['examen_id'])) {
    $examen_id = $_GET['examen_id'];

    $query = "SELECT tipo FROM examenes WHERE examen_id=$examen_id";
    $tipo_query = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($tipo_query);
    $tipo = $row['tipo'];

    $query = "DELETE FROM examenes WHERE examen_id = $examen_id";
    $result=mysqli_query($conn,$query);

    if($tipo="Parcial de Orina"){
        $query = "DELETE FROM p_orina WHERE examen_id = $examen_id";
        $result=mysqli_query($conn,$query);
        header("Location: examenes.php");
        die();
    }

    $_SESSION['message'] = 'Error Inesperado';
    $_SESSION['message_type'] = 'danger';

    header("Location: examenes.php");
    die();
    
}
?>