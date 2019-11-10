<?php 

    include("db.php");

    if (isset($_GET['eps_id'])){
        $eps_id = $_GET['eps_id'];
        $query = "DELETE FROM epses WHERE eps_id = $eps_id";
        $result=mysqli_query($conn,$query);
        if (!$result) {
            $_SESSION['message']= 'Error inesperado';
            $_SESSION['message_type']= 'danger';
            die();
        }

        $_SESSION['message'] = 'EPS eliminada';
        $_SESSION['message_type']= 'warning';
        header("Location: epses.php");
    }

?>