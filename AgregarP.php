<?php
    require 'conexion2.php';

    $curpe = $_POST['alta'];

    echo($curpe);

    $agregarA = $mysqli->prepare("call paci_alt(?);");
    $agregarA->bind_param('s', $curpe);
    $agregarA->execute();
    $agregarA->close();
    $mysqli->close();

    echo "<script type='text/javascript'>";
    echo "window.history.back(-1)";
    echo "</script>";
?>