<?php
    require 'conexion2.php';

    $curpe = $_POST['baja'];

    echo($curpe);

    $agregarA = $mysqli->prepare("call elim_per(?);");
    $agregarA->bind_param('s', $curpe);
    $agregarA->execute();
    $agregarA->close();
    $mysqli->close();

    echo "<script type='text/javascript'>";
    echo "window.history.back(-1)";
    echo "</script>";
?>