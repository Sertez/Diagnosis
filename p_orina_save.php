<?php

include("db.php");

if ((isset($_POST['p_orina_save'])) and (isset($_GET['examen_id']))){
    $examen_id=$_GET['examen_id'];
    $color= $_POST['color'];
    $aspecto= $_POST['aspecto'];
    $ph= $_POST['ph'];
    $densidad= $_POST['densidad'];
    $proteinas= $_POST['proteinas'];
    $glucosa= $_POST['glucosa'];
    $cetonas= $_POST['cetonas'];
    $sangre= $_POST['sangre'];
    $bilirrubinas= $_POST['bilirrubinas'];
    $urobilinogeno= $_POST['urobilinogeno'];
    $nitritos= $_POST['nitritos'];
    $cel_epiteliales= $_POST['cel_epiteliales'];
    $moco= $_POST['moco'];
    $bacterias= $_POST['bacterias'];
    $leucocitos= $_POST['leucocitos'];
    $piocitos= $_POST['piocitos'];
    $hematies= $_POST['hematies'];
    $cristales= $_POST['cristales'];
    $cilindros= $_POST['cilindros'];
    $bacteriologo= $_POST['bacteriologo'];

    $query="INSERT INTO p_orina(examen_id,color,aspecto,ph,densidad,proteinas,glucosa,cetonas,sangre,bilirrubinas,
    urobilinogeno,nitritos,cel_epiteliales,moco,bacterias,leucocitos,piocitos,hematies,cristales,
    cilindros,bacteriologo) 
    VALUES('$examen_id','$color','$aspecto','$ph','$densidad','$proteinas','$glucosa','$cetonas',
    '$sangre','$bilirrubinas','$urobilinogeno','$nitritos','$cel_epiteliales','$moco','$bacterias',
    '$leucocitos','$piocitos','$hematies','$cristales','$cilindros','$bacteriologo')";
    $result = mysqli_query($conn, $query);
    if (!$result) {
        $_SESSION['message'] = 'Error Inesperado';
        $_SESSION['message_type'] = 'danger';
        header("Location: examenes.php");
        die();
    }

    $_SESSION['message'] = 'Operacion relizada con éxito';
    $_SESSION['message_type'] = 'success';

    header("Location: examenes.php");
}

?>