<?php

require 'conexion.php';
session_start();

$usuario = $_POST['Usuario'];
$password = $_POST['Password'];

$a = "SELECT nivel FROM usuario WHERE  curp = '$usuario' AND pass = '$password'";
$b = "SELECT nombres FROM persona  WHERE  curp = '$usuario'";
$c = "SELECT pass FROM usuario WHERE  curp = '$usuario'";
// $p = "SELECT COUNT(*) as contar FROM paciente WHERE  curp = '$usuario' AND pass = '$password'";
$consultaa = mysqli_query($conexion,$a);
$consultab = mysqli_query($conexion,$b);
$consultac = mysqli_query($conexion,$c);
// $consultad = mysqli_query($conexion,$d);
// $consultap = mysqli_query($conexion,$p);
$arraya = mysqli_fetch_array($consultaa);
$arrayb = mysqli_fetch_array($consultab);
$arrayc = mysqli_fetch_array($consultac);
// $arrayd = mysqli_fetch_array($consultad);
// $arrayp = mysqli_fetch_array($consultap);


if($arraya[0] == 1){
	$tipo = 1;
	$_SESSION['username'] = $usuario;
	$_SESSION['tipo'] = $tipo;
	$_SESSION['name'] = $arrayb[0];
	$_SESSION['pass'] = $arrayc[0];
	header('location: principal.php');
}else if($arraya[0] == 2){
	$tipo = 2;
	$_SESSION['username'] = $usuario;
	$_SESSION['tipo'] = $tipo;
	$_SESSION['name'] = $arrayb[0];
	$_SESSION['pass'] = $arrayc[0];
	header('location: principal.php');
}else if($arraya[0] == 3){
	$tipo = 3;
	$_SESSION['username'] = $usuario;
	$_SESSION['tipo'] = $tipo;
	$_SESSION['name'] = $arrayb[0];
	$_SESSION['pass'] = $arrayc[0];
	header('location: principal.php');
}else{
	header('location: login.php');
}

?>