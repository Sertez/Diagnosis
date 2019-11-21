<?php

include("db.php");

if (isset($_GET['examen_id'])) {
    $examen_id = $_GET['examen_id'];

    $query = "SELECT tipo FROM examenes WHERE examen_id=$examen_id";
    $tipo_query = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($tipo_query);
    $tipo = $row['tipo'];
    $result2= "";

    if($tipo="Parcial de Orina"){
        $query = "DELETE FROM p_orina WHERE examen_id = $examen_id";
        $result2=mysqli_query($conn,$query);
        header("Location: examenes.php");
    }
    if ($tipo="Microbiología"){
        $query = "DELETE FROM m_bk WHERE examen_id = $examen_id";
        $result2=mysqli_query($conn,$query);
        header("Location: examenes.php");
    }
    if ($tipo="Hematología"){
        $query = "DELETE FROM h_hematologia WHERE examen_id = $examen_id";
        $result2=mysqli_query($conn,$query);
        header("Location: examenes.php");
    }
    if ($tipo="Urocultivo"){
        $query = "DELETE FROM m_uro_positivo WHERE examen_id = $examen_id";
        $result2=mysqli_query($conn,$query);
        header("Location: examenes.php");
    }    
    if ($tipo="Inmunología"){
        $query = "DELETE FROM i_gravindex WHERE examen_id = $examen_id";
        $result2=mysqli_query($conn,$query);
        header("Location: examenes.php");
    }
    if ($tipo="Química"){
        $query = "DELETE FROM q_quimica WHERE examen_id = $examen_id";
        $result2=mysqli_query($conn,$query);
        header("Location: examenes.php");
        
    }
    if ($tipo="PT PTT"){
        $query = "DELETE FROM h_pt_ptt WHERE examen_id = $examen_id";
        $result2=mysqli_query($conn,$query);
        header("Location: examenes.php");
    }
    if ($tipo="Ionograma"){
        $query = "DELETE FROM q_ionograma WHERE examen_id = $examen_id";
        $result2=mysqli_query($conn,$query);
        header("Location: examenes.php");
    }
    if ($tipo="HTO HB"){
        $query = "DELETE FROM h_hto_hb WHERE examen_id = $examen_id";
        $result2=mysqli_query($conn,$query);
        header("Location: examenes.php");
    }
    if ($tipo="UrocultivoN"){
        $query = "DELETE FROM m_uro_negativo WHERE examen_id = $examen_id";
        $result2=mysqli_query($conn,$query);
        header("Location: examenes.php");
    }
    if($result2=""){        
        $_SESSION['message'] = 'Error Inesperado';
        $_SESSION['message_type'] = 'danger';
    }else{
        $query = "DELETE FROM examenes WHERE examen_id = $examen_id";
        $result=mysqli_query($conn,$query);
        $_SESSION['message'] = 'Eliminación Completa';
        $_SESSION['message_type'] = 'success';
    }
    header("Location: examenes.php");
    die();

}
?>
