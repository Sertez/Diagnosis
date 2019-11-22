<?php

include("db.php");

if ((isset($_POST['p_orina_save'])) and (isset($_GET['examen_id']))) {
    $examen_id = $_GET['examen_id'];
    $color = $_POST['color'];
    $consistencia = $_POST['consistencia'];
    $moco = $_POST['moco'];
    $sangre = $_POST['sangre'];
    $ph = $_POST['ph'];
    $azucares_red = $_POST['azucares_red'];
    $rest_alimentos = $_POST['rest_alimentos'];
    $olor = $_POST['olor'];
    $leucocitos = $_POST['leucocitos'];
    $hematies = $_POST['hematies'];
    $almidones = $_POST['almidones'];
    $fibra_muscular = $_POST['fibra_muscular'];
    $fibra_vegetal = $_POST['fibra_vegetal'];
    $grasas = $_POST['grasas'];
    $lev_sueltas = $_POST['lev_sueltas'];
    $lev_gemacion = $_POST['lev_gemacion'];
    $pseudomicellius = $_POST['pseudomicellius'];
    $h_ascaris = $_POST['h_ascaris'];
    $h_tricocefalo = $_POST['h_tricocefalo'];
    $h_uncinaria = $_POST['h_uncinaria'];
    $h_oxiuro = $_POST['h_oxiuro'];
    $h_tenia = $_POST['h_tenia'];
    $h_himenolepis_nana = $_POST['h_himenolepis_nana'];
    $larva_strongiloides = $_POST['larva_strongiloides'];
    $e_histolytica = $_POST['e_histolytica'];
    $e_coli = $_POST['e_coli'];
    $e_nana = $_POST['e_nana'];
    $giardia_lamblia = $_POST['giardia_lamblia'];
    $balantidium_coli = $_POST['balantidium_coli'];
    $chilomastix = $_POST['chilomastix'];
    $blostocystis = $_POST['blostocystis'];
    $observaciones = $_POST['observaciones'];
    $bacteriologo = $_POST['bacteriologo'];
    $query2 = "SELECT * FROM p_copro WHERE examen_id='$examen_id'";
    $result5 = $result = mysqli_query($conn, $query2);
    $row = mysqli_fetch_array($result5);
    echo $row['examen_id'];
    if ($row['examen_id'] == $examen_id) {
        $query3 = "UPDATE p_copro SET color ='$color', consistencia = '$consistencia', moco = '$moco',
        sangre = '$sangre', ph = '$ph', azucares_red = '$azucares_red', rest_alimentos = '$rest_alimentos',
        olor = '$olor', leucocitos = '$leucocitos', hematies = '$hematies', almidones = '$almidones',
        fibra_muscular = '$fibra_muscular', fibra_vegetal = '$fibra_vegetal', grasas = '$grasas', 
        lev_sueltas = '$lev_sueltas', lev_gemacion = '$lev_gemacion', pseudomicellius = '$pseudomicellius', 
        h_ascaris = '$h_ascaris', h_tricocefalo = '$h_tricocefalo', h_uncinaria = '$h_uncinaria', 
        h_oxiuro = '$h_oxiuro', h_tenia = '$h_tenia', h_himenolepis_nana = '$h_himenolepis_nana', 
        larva_strongiloides = '$larva_strongiloides', e_histolytica = '$e_histolytica', e_coli = '$e_coli',
        e_nana = '$e_nana', giardia_lamblia = '$giardia_lamblia', balantidium_coli = '$balantidium_coli',
        chilomastix = '$chilomastix', blostocystis = '$blostocystis', observaciones = '$observaciones', 
        bacteriologo='$bacteriologo' WHERE examen_id='$examen_id'";
        mysqli_query($conn, $query3);
    } else {
        $query = "INSERT INTO p_copro(examen_id,color,consistencia,moco,sangre,ph	azucares_red,
        rest_alimentos,olor,leucocitos,hematies,almidones,fibra_muscular,fibra_vegetal,grasas,lev_sueltas,
        lev_gemacion,pseudomicellius,h_ascaris,h_tricocefalo,h_uncinaria,h_oxiuro,h_tenia,h_himenolepis_nana,
        larva_strongiloides,e_histolytica,e_coli,e_nana,giardia_lamblia,balantidium_coli,chilomastix,
        blostocystis,observaciones,bacteriologo)
        VALUES('$examen_id','$color','$consistencia','$moco','$sangre',$ph','$azucares_red','$rest_alimentos',
        '$olor','$leucocitos','$hematies','$almidones','$fibra_muscular','$fibra_vegetal','$grasas','$lev_sueltas',
        '$lev_gemacion','$pseudomicellius','$h_ascaris','$h_tricocefalo','$h_uncinaria','$h_oxiuro','$h_tenia',
        '$h_himenolepis_nana','$larva_strongiloides','$e_histolytica','$e_coli','$e_nana','$giardia_lamblia',
        '$balantidium_coli','$chilomastix','$blostocystis','$observaciones','$bacteriologo')";
        $result = mysqli_query($conn, $query);
        if (!$result) {
            $_SESSION['message'] = 'Error Inesperado';
            $_SESSION['message_type'] = 'danger';
            $previous_page = $_SESSION['current_page'];
            header("Location: $previous_page");
            die();
        }
    }
    $_SESSION['message'] = 'Operacion relizada con éxito';
    $_SESSION['message_type'] = 'success';
    $previous_page = $_SESSION['current_page'];
    header("Location: $previous_page");
}
