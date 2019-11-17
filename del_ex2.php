<?php

include("db.php");

if (isset($_GET['examen_id'])) {
    $examen_id = $_GET['examen_id'];

    $query = "SELECT * FROM examenes WHERE examen_id=$examen_id";
    $tipo_query = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($tipo_query);
    $tipo = $row['tipo'];
    $p_id= $row['paciente_id'];

    $query = "DELETE FROM examenes WHERE examen_id = $examen_id";
    $result=mysqli_query($conn,$query);

    if($tipo=="Parcial de Orina"){
        $query = "DELETE FROM p_orina WHERE examen_id = $examen_id";
        $result=mysqli_query($conn,$query);
        header("Location: view_pac.php?paciente_id=$p_id");
        die();
    }
    if ($tipo=="Microbiología"){
        $query = "DELETE FROM m_bk WHERE examen_id = $examen_id";
        $result=mysqli_query($conn,$query);
        header("Location: view_pac.php?paciente_id=$p_id");
        die();
    }
    if ($tipo=="Hematología"){
        $query = "DELETE FROM h_hematologia WHERE examen_id = $examen_id";
        $result=mysqli_query($conn,$query);
        header("Location: view_pac.php?paciente_id=$p_id");
        die();
    }
    $_SESSION['message'] = 'Error Inesperado';
    $_SESSION['message_type'] = 'danger';
    header("Location: pacientes.php");
    die();
    
}
?>