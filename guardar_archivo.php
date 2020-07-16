<?php
 require("conexion.php");
 session_start();

 $curp_med = $_SESSION["username"];
 $curp_p = $_POST["curppac"];

 $fecha = '17/06/20';

 $archivo = $_FILES["archivito"]["tmp_name"]; 
 $tamanio = $_FILES["archivito"]["size"];
 $tipo    = $_FILES["archivito"]["type"];
 $nombre  = $_FILES["archivito"]["name"];

 if ( $archivo != "none" )
 {
    $fp = fopen($archivo, "rb");
    $contenido = fread($fp, $tamanio);
    $contenido = addslashes($contenido);
    fclose($fp); 

    $qry = "INSERT INTO expediente VALUES 
            (00,'$curp_med','$curp_p','$fecha','$contenido')";


    if(mysqli_query($conexion,$qry))
       print "Se ha guardado el archivo en la base de datos.";
    else
       print "NO se ha podido guardar el archivo en la base de datos.";
 }
 else
    print "No se ha podido subir el archivo al servidor";

    header("location:Medico.php");
?>