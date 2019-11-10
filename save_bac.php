<?php

include("db.php");

if (isset($_POST['save_bac'])){
    $bname= $_POST['bname'];
    $doc= $_POST['doc'];
    $bthdate= $_POST['bthdate'];
    $address= $_POST['address'];
    $phonenum= $_POST['phonenum'];
    $email= $_POST['email'];

    $query = "INSERT INTO bacteriologos(nombre,documento,fecha_nacimiento,direccion,telefono,email) 
    VALUES('$bname','$doc','$bthdate','$address','$phonenum','$email')";
    $result = mysqli_query($conn,$query);
    if (!$result){
        $_SESSION['message']= 'Bacteriologo no creado: el documento ingresado ya existe';
        $_SESSION['message_type']= 'danger';
        header("Location: bacteriologos.php");
        die();
    }

    $_SESSION['message']= 'Bacteriologo creado con exito';
    $_SESSION['message_type']= 'success';

    header("Location: bacteriologos.php");
}

?>