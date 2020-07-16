<?php

    $server = 'localhost';
    $username = 'root';
    $password = 'root';
    $database = 'MedicinskF';


    $mysqli = new mysqli($server,$username,$password,$database);

    if ($mysqli->connect_errno) {
        echo "Error al concectarse a la base de datos";
    }
   
?>