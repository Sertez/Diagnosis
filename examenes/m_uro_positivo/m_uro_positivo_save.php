<?php

include("db.php");

if ((isset($_POST['m_uro_positivo_save'])) and (isset($_GET['examen_id']))) {
    $examen_id = $_GET['examen_id'];
    $polimorfonucleares = $_POST['polimorfonucleares'];
    $gram = $_POST['gram'];
    $amikacina = $_POST['amikacina'];
    $gentamicina = $_POST['gentamicina'];
    $imipenem = $_POST['imipenem'];
    $meropenem = $_POST['meropenem'];
    $cefoxitina = $_POST['cefoxitina'];
    $ceftriazona = $_POST['ceftriazona'];
    $amoxacilina = $_POST['amoxacilina'];
    $ampicilina = $_POST['ampicilina'];
    $cefepina = $_POST['cefepina'];
    $bacteriologo = $_POST['bacteriologo'];
    $query2 = "SELECT * FROM m_uro_positivo WHERE examen_id='$examen_id'";
    $result5 = $result = mysqli_query($conn, $query2);
    $row = mysqli_fetch_array($result5);
    echo $row['examen_id'];
    if ($row['examen_id'] == $examen_id) {
        $query3 = "UPDATE m_uro_positivo SET polimorfonucleares = '$polimorfonucleares', gram='$gram',amikacina = '$amikacina',
        gentamicina = '$gentamicina',imipenem = '$imipenem',meropenem ='$meropenem',cefoxitina='$cefoxitina',ceftriazona = '$ceftriazona',
        amoxacilina = '$amoxacilina',ampicilina= '$ampicilina',cefepina='$cefepina', bacteriologo='$bacteriologo' WHERE examen_id='$examen_id'";
        mysqli_query($conn, $query3);
    } else {
        $query = "INSERT INTO m_uro_positivo VALUES('$examen_id','$polimorfonucleares','$gram','$amikacina','$gentamicina','$imipenem','$meropenem',
    '$cefoxitina','$ceftriazona','$amoxacilina','$ampicilina','$cefepina','$bacteriologo')";
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
