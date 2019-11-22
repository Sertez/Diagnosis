<?php

include("db.php");

if ((isset($_POST['q_quimica_save'])) and (isset($_GET['examen_id']))) {
    $examen_id = $_GET['examen_id'];
    $glicemia = $_POST['glicemia'];
    $colesterol = $_POST['colesterol'];
    $colesterol_hdl = $_POST['colesterol_hdl'];
    $colesterol_ldl = $_POST['colesterol_ldl'];
    $trigliceridos = $_POST['trigliceridos'];
    $acido_urico = $_POST['acido_urico'];
    $nitrogeno_ureico = $_POST['nitrogeno_ureico'];
    $creatinina = $_POST['creatinina'];
    $tasa_filtracion_glomerular = $_POST['tasa_filtracion_glomerular'];
    $alanino_aminotrans = $_POST['alanino_aminotrans'];
    $aspartato_aminotrans = $_POST['aspartato_aminotrans'];
    $fosfatasa_alcanina = $_POST['fosfatasa_alcanina'];
    $bacteriologo = $_POST['bacteriologo'];
    $query2 = "SELECT * FROM q_quimica WHERE examen_id='$examen_id'";
    $result5 = $result = mysqli_query($conn, $query2);
    $row = mysqli_fetch_array($result5);
    echo $row['examen_id'];
    if ($row['examen_id'] == $examen_id) {
        $query3 = "UPDATE q_quimica SET glicemia = '$glicemia', colesterol='$colesterol',colesterol_hdl = '$colesterol_hdl',colesterol_ldl = '$colesterol_ldl',trigliceridos = '$trigliceridos',acido_urico ='$acido_urico',
        nitrogeno_ureico='$nitrogeno_ureico',creatinina = '$creatinina',tasa_filtracion_glomerular= '$tasa_filtracion_glomerular',alanino_aminotrans='$alanino_aminotrans',
        aspartato_aminotrans='$aspartato_aminotrans',fosfatasa_alcanina = '$fosfatasa_alcanina',bacteriologo='$bacteriologo' WHERE examen_id='$examen_id'";
        mysqli_query($conn, $query3);
    } else {
        $query = "INSERT INTO q_quimica
    VALUES('$examen_id','$glicemia','$colesterol','$colesterol_hdl','$colesterol_ldl','$trigliceridos','$acido_urico',
    '$nitrogeno_ureico','$creatinina','$tasa_filtracion_glomerular','$alanino_aminotrans','$aspartato_aminotrans',
    '$fosfatasa_alcanina','$bacteriologo')";
        $result = mysqli_query($conn, $query);
        if (!$result) {
            $_SESSION['message'] = 'Error Inesperado';
            $_SESSION['message_type'] = 'danger';
            header("Location: examenes.php");
            die();
        }
    }
    $_SESSION['message'] = 'Operacion relizada con éxito';
    $_SESSION['message_type'] = 'success';
    header("Location: examenes.php");
}
