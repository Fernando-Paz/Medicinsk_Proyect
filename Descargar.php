<?php

require 'conexion.php';

$docu = $_POST['descarga'];

 $qry = "SELECT curp_pat, archivo FROM expediente WHERE id_exped=$docu";
    
 $res = mysqli_query($conexion,$qry);
 $content = mysqli_fetch_array($res);

 if (!$res) {
    die('No se pudo consultar:' . mysql_error());
}
//  $tipo = mysql_result($res, 0, "CURP");
//  $contenido = mysql_result($res, 1, "CONTENIDO");

 header("Content-type: application/pdf");
 print $content[1];
 ?>