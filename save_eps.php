<?php

include("db.php");

if (isset($_POST['save_eps'])){
    $epsname= $_POST['epsname'];

    $query = "INSERT INTO epses(nombre) 
    VALUES('$epsname')";
    $result = mysqli_query($conn,$query);
    if (!$result){
        $_SESSION['message']= 'EPS no creada';
        $_SESSION['message_type']= 'danger';
        die();
    }

    $_SESSION['message']= 'EPS creada con éxito';
    $_SESSION['message_type']= 'success';

    header("Location: epses.php");
}

?>