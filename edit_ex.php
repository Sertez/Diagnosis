<?php 
    include("db.php");
    if (isset($_GET['examen_id'])){
        $examen_id = $_GET['examen_id'];
        $query = "SELECT tipo FROM examenes WHERE examen_id=$examen_id";
        $examen_query = mysqli_query($conn, $query);
        $row = mysqli_fetch_array($examen_query);
        $tipo = $row['tipo'];
        if ($tipo=="Parcial de Orina"){
            header("Location: p_orina.php?examen_id=$examen_id");
            die();
        }
        if ($tipo=="Microbiología"){
            header("Location: m_bk.php?examen_id=$examen_id");
            die();
        }
        if ($tipo=="Hematología"){
            header("Location: h_hematologia.php?examen_id=$examen_id");
            die();
        }
        if ($tipo=="Urocultivo"){
            header("Location: m_uro_positivo.php?examen_id=$examen_id");
            die();
        }
        if ($tipo=="Inmunología"){
            header("Location: i_gravindex.php?examen_id=$examen_id");
            die();
        }
    }
?>
