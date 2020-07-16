<?php 
        session_start();
        $usuario = $_SESSION['username'];

        if(isset($usuario)){
        	session_destroy();
            header('location: index.php');
        }
    ?>