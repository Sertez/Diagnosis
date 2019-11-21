<?php

include("db.php");

if ((isset($_POST['m_frotis_save'])) and (isset($_GET['examen_id']))){
    $examen_id=$_GET['examen_id'];
    $color= $_POST['color'];
    $olor_amino = $_POST['olor_amino'];
    $ph = $_POST['ph'];
    $cel_epiteliales = $_POST['cel_epiteliales'];
    $bacterias = $_POST['bacterias'];
    $leucocitos = $_POST['leucocitos'];
    $hematies = $_POST['hematies'];
    $pseudomicellios = $_POST['pseudomicellios'];
    $trico_vaginales = $_POST['trico_vaginales'];
    $lev_sueltas = $_POST['lev_sueltas'];
    $lev_gemacion = $_POST['lev_gemacion'];
    $gram = $_POST['gram'];
    $pmn = $_POST['pmn'];
    $celulas_guias = $_POST['celulas_guias'];
    $bacteriologo = $_POST['bacteriologo'];
    $query2 = "SELECT * FROM m_frotis WHERE examen_id='$examen_id'";
    $result = mysqli_query($conn, $query2);
    $row = mysqli_fetch_array($result);
    echo $row['examen_id'];
    if ($row['examen_id']==$examen_id) {
        $query3 = "UPDATE m_frotis SET color ='$color',olor_amino = '$olor_amino', ph ='$ph',
        cel_epiteliales = '$cel_epiteliales', bacterias = '$bacterias', leucocitos = '$leucocitos',
        hematies = '$hematies', pseudomicellios = '$pseudomicellios', trico_vaginales = '$trico_vaginales',
        lev_sueltas = '$lev_sueltas', lev_gemacion = '$lev_gemacion', gram = '$gram', pmn = '$pmn',
        celulas_guias = '$celulas_guias', bacteriologo = '$bacteriologo' WHERE examen_id='$examen_id'";
        mysqli_query($conn, $query3);
    }else{
        $query="INSERT INTO m_frotis(examen_id,color,olor_amino,ph,cel_epiteliales,bacterias,leucocitos,
        hematies,pseudomicellios,trico_vaginales,lev_sueltas,lev_gemacion,gram,pmn,celulas_guias,bacteriologo)
        VALUES('$examen_id','$color','$olor_amino','$ph','$cel_epiteliales','$bacterias','$leucocitos','$hematies',
        '$pseudomicellios','$trico_vaginales','$lev_sueltas','$lev_gemacion','$gram','$pmn','$celulas_guias',
        '$bacteriologo')";
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
    
    ?>
