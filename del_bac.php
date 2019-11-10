<?php 

    include("db.php");

    if (isset($_GET['bacteriologo_id'])){
        $bacteriologo_id = $_GET['bacteriologo_id'];
        $query = "DELETE FROM bacteriologos WHERE bacteriologo_id = $bacteriologo_id";
        $result=mysqli_query($conn,$query);
        if (!$result) {
            $_SESSION['message']= 'Error inesperado';
            $_SESSION['message_type']= 'danger';
            die();
        }

        $_SESSION['message'] = 'Bacteriologo eliminado';
        $_SESSION['message_type']= 'warning';
        header("Location: bacteriologos.php");
    }

?>