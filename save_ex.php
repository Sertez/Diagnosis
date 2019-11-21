<?php

include("db.php");

if (isset($_POST['save_ex'])) {
    $p_doc = $_POST['doc'];
    $query = "SELECT paciente_id FROM pacientes WHERE identificacion=$p_doc";
    $paciente_query = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($paciente_query);
    $paciente_id = $row['paciente_id'];
    if($paciente_id==""){
        $_SESSION['message'] = 'Digite un documento válido';
        $_SESSION['message_type'] = 'danger';
        header("Location: examenes.php");
        die();
    }
    $tipo = $_POST['tipo'];
    $query = "INSERT INTO examenes(paciente_id,doc_paciente,tipo) 
    VALUES('$paciente_id','$p_doc','$tipo')";
    $result = mysqli_query($conn, $query);
    if (!$result) {
        $_SESSION['message'] = 'Error Inesperado';
        $_SESSION['message_type'] = 'danger';
        header("Location: examenes.php");
        die();
    }
    

    $_SESSION['message'] = 'Examen creado con éxito';
    $_SESSION['message_type'] = 'success';

    header("Location: examenes.php");
}
?>
