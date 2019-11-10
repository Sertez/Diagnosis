<?php

include("db.php");

if (isset($_POST['save_pac'])){
    $pname= $_POST['pname'];
    $doc= $_POST['doc'];
    $bthdate= $_POST['bthdate'];
    $eps= $_POST['eps'];
    $entity= $_POST['entity'];
    $address= $_POST['address'];
    $phonenum= $_POST['phonenum'];
    $email= $_POST['email'];
    $obs= $_POST['obs'];

    $query = "INSERT INTO pacientes(nombre,identificacion,fechanac,eps,entidad,direccion,telefono,email,observaciones) 
    VALUES('$pname','$doc','$bthdate','$eps','$entity','$address','$phonenum','$email','$obs')";
    $result = mysqli_query($conn,$query);
    if (!$result){
        $_SESSION['message']= 'Paciente no creado: el documento ingresado ya existe';
        $_SESSION['message_type']= 'danger';
        header("Location: pacientes.php");
        die();
    }

    $_SESSION['message']= 'Paciente creado con exito';
    $_SESSION['message_type']= 'success';

    header("Location: pacientes.php");
}

?>