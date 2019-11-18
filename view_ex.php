<?php 
    include("db.php");
    if (isset($_GET['examen_id'])){
        $examen_id = $_GET['examen_id'];
        $query = "SELECT tipo FROM examenes WHERE examen_id=$examen_id";
        $examen_query = mysqli_query($conn, $query);
        $row = mysqli_fetch_array($examen_query);
        $tipo = $row['tipo'];
        if ($tipo=="Parcial de Orina"){
            header("Location: p_orina_view.php?examen_id=$examen_id");
            die();
        }
        if ($tipo=="Microbiología"){
            header("Location: m_bk_view.php?examen_id=$examen_id");
            die();
        }
        if ($tipo=="Hematología"){
            header("Location: h_hematologia_view.php?examen_id=$examen_id");
            die();
        }
        if ($tipo=="Urocultivo"){
            header("Location: m_uro_positivo_view.php?examen_id=$examen_id");
            die();
        }
        if ($tipo=="Inmunología"){
            header("Location: i_gravindex_view.php?examen_id=$examen_id");
            die();
        }
    }
?>
