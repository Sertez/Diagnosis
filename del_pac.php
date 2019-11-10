<?php 

    include("db.php");

    if (isset($_GET['paciente_id'])){
        $paciente_id = $_GET['paciente_id'];
        $query = "DELETE FROM pacientes WHERE paciente_id = $paciente_id";
        $result=mysqli_query($conn,$query);
        if (!$result) {
            $_SESSION['message']= 'Error inesperado';
            $_SESSION['message_type']= 'danger';
            header("Location: pacientes.php");
            die();
        }

        $_SESSION['message'] = 'Paciente eliminado';
        $_SESSION['message_type']= 'warning';
        header("Location: pacientes.php");
    }

?>