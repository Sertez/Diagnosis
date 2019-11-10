<?php 

    include("db.php");

    if (isset($_GET['entidad_id'])){
        $entidad_id = $_GET['entidad_id'];
        $query = "DELETE FROM entidades WHERE entidad_id = $entidad_id";
        $result=mysqli_query($conn,$query);
        if (!$result) {
            $_SESSION['message']= 'Error inesperado';
            $_SESSION['message_type']= 'danger';
            die();
        }

        $_SESSION['message'] = 'Entidad eliminada';
        $_SESSION['message_type']= 'warning';
        header("Location: entidades.php");
    }

?>