    <?php 
        session_start();
        $usuario = $_SESSION['username'];
        $tipo = $_SESSION['tipo'];

        if(!isset($usuario)){
            header('location: index.php');
        }else if($tipo == 1){
            header('location: Administrador.php');
        }else if($tipo == 2){
            header('location: Medico.php');
        }else if($tipo == 3){
            header('location: Paciente.php');
        }else{
            echo '<h1>Datos Incorrectos</h1>';
        }
?>
