<?php

include("db.php");

if (isset($_POST['save_ent'])){
    $entname= $_POST['entname'];

    $query = "INSERT INTO entidades(nombre) 
    VALUES('$entname')";
    $result = mysqli_query($conn,$query);
    if (!$result){
        $_SESSION['message']= 'Entidad no creada';
        $_SESSION['message_type']= 'danger';
        die();
    }

    $_SESSION['message']= 'Entidad creada con éxito';
    $_SESSION['message_type']= 'success';

    header("Location: entidades.php");
}

?>