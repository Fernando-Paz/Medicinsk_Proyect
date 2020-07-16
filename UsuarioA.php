<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Administrador</title>

    <!-- css -->
    <link href="css/estilos.css" rel="stylesheet">
    <link href="fontawesome/css/all.css" rel="stylesheet" type="text/css" />

</head>

<body>
    <?php 
        session_start();
        $usuario = $_SESSION['username'];
        $name = $_SESSION['name'];

        if(!isset($usuario)){
            header('location: principal.php');
        }

        $curp=($_GET['c']);
 
    ?>
    <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
        <div class="top-area">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-md-6">
                        <p class="bold text-left"> </p>
                    </div>
                </div>
            </div>
        </div>


        <div class="tab">

        </div>

    </nav>

    <br><br><br><br><br><br><br><br>

    <div class="contenido">
        
            <h1><span class="fa fa-user-plus"></span>&nbsp;&nbsp;Nuevo Usuario</h1>
            <div class="contenedor">
                <form action="AltaUA.php" autocomplete="off" method="post">
                    <div id="B1" class="row">
                        <div class="row">
                            <span id="icon-co" class="fa fa-user fa-6x icon-co"></span>
                            <label for="fname">
                                <h1>&nbsp;&nbsp;USUARIO</h1>
                            </label>
                            <br>
                            <input type="text" id="fname" name="ID" placeholder="<?php echo $curp?>" value="<?php echo $curp?>"  style="text-align:center">
                        </div>
                    </div>
                    <div id="B2" class="row">
                        <div class="row">
                            <div class="col-75">
                                <label for="lname">Contraseña</label>
                            </div>
                            <input type="text" id="fname" name="PASSA" placeholder="Ej. 549micontra">
                            <div class="col-75">
                                <label for="lname">Confirmar Contraseña</label>
                            </div>
                            <input type="text" id="fname" placeholder="Ej. 549micontra">
                            <br><br>
                        </div>
                        <div class="col-75">
                            <input type="submit" value="Submit">
                    </div>
                </form>
            </div>
    </div>


    <!-- Core JavaScript Files -->
    <script src="acciones/validaciones.js"></script>
    <script>
        function myFunction() {
            var x = document.getElementById("myTopnav");
            if (x.className === "topnav") {
                x.className += " responsive";
            } else {
                x.className = "topnav";
            }
        }
    </script>
</body>

</html>
