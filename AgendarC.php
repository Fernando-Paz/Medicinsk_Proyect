<?php
    require 'conexion2.php';

    $hora = $_POST['hora'];
    $medico = $_POST['medico'];
    $fecha = $_POST['fecha'];
    $curp = $_POST['curp'];

    echo($hora);
    echo($medico);
    echo($fecha);
    echo($curp);


    $agregarA = $mysqli->prepare("call do_cit(?,?,?,?);");
    $agregarA->bind_param('ssss', $medico, $curp, $fecha, $hora);
    $agregarA->execute();
    $agregarA->close();
    $mysqli->close();

    header("location:Paciente.php");
?>