<?php
    require 'conexion2.php';

    $nom = $_POST['NombreA'];
    $apellido = $_POST['APA'];
    $emailx = $_POST['EMA'];
    $curp = $_POST['CURPA'];

    echo($nom);
    echo($apellido);
    echo($emailx);
    echo($curp);

    $agregarA = $mysqli->prepare("call new_padmin(?,?,?,?);");
    $agregarA->bind_param('ssss', $nom, $apellido, $emailx, $curp);
    $agregarA->execute();
    $agregarA->close();
    $mysqli->close();

    header("location:UsuarioA.php?c=$curp");
?>