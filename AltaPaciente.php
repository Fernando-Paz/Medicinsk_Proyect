<?php
    require 'conexion2.php';

    $nom = $_POST['NombreP'];
    $apell = $_POST['ApelliP'];
    $curp = $_POST['CURPP'];
    $tel = $_POST['TelefP'];
    $direcc = $_POST['DireccP'];
    $email = $_POST['EmailP'];

    echo $nom;


    $agregarA = $mysqli->prepare("call new_paci(?,?,?,?,?,?);");
    $agregarA->bind_param('ssssis', $curp, $nom, $apell, $email, $tel, $direcc);
    $agregarA->execute();
    $agregarA->close();
    $mysqli->close();
    
    echo "<script type='text/javascript'>";
    echo "window.history.back(-1)";
    echo "</script>";
?>