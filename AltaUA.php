<?php
    require 'conexion2.php';

    $pa = $_POST['PASSA'];
    $cp = $_POST['ID'];

    echo $pa;
    echo $cp;

    $agregarA = $mysqli->prepare("call mod_usr(?,?);");
    $agregarA->bind_param('ss', $cp, $pa);
    $agregarA->execute();
    $agregarA->close();
    $mysqli->close();

    header("location:Administrador.php");
?>