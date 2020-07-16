<?php
    require 'conexion2.php';

    $nom = $_POST['NombreM'];
    $especial = $_POST['Espe'];
    $curp = $_POST['CURPM'];
    $HI = $_POST['HI'];
    $HF = $_POST['HF'];
    $HC = $_POST['HC'];
    $emailx = $_POST['EmailM'];
    $ced = $_POST['CM'];
    $apell = $_POST['AM'];

    $agregarA = $mysqli->prepare("call new_med(?,?,?,?,?,?,?,?,?);");
    $agregarA->bind_param('ssssssiii', $curp, $nom, $apell, $emailx, $ced, $especial, $HI, $HF, $HC);
    $agregarA->execute();
    $agregarA->close();
    $mysqli->close();

    header("location:UsuarioA.php?c=$curp");
?>