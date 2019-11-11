<?php 

    include("db.php");

    if (isset($_GET['examen_id'])){
        $examen_id = $_GET['examen_id'];
        $query = "SELECT tipo FROM examenes WHERE examen_id=$examen_id";
        $examen_query = mysqli_query($conn, $query);
        $row = mysqli_fetch_array($examen_query);
        $tipo = $row['tipo'];

        if ($tipo="Parcial de Orina"){
            header("Location: p_orina.php?examen_id=$examen_id");
        }
    }

?>