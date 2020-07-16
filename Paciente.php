<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <title>Paciente</title>

    <!-- css -->
    <link href="css/estilos.css" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css">
    <link href="fontawesome/css/all.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="jquery-ui-1.12.1.custom/jquery-ui.css">

</head>

<body>
    <?php 
        session_start();
        $usuario = $_SESSION['username'];
        $name = $_SESSION['name'];
        $contra = $_SESSION['pass'];

        if(!isset($usuario)){
            header('location: principal.php');
        }
    ?>
    <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
        <div class="top-area">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-md-6">
                        <p class="bold text-left"> </p>
                    </div>
                    <div class="col-sm-6 col-md-6" align="right">
                        <p class="bold text-right"><span class="fa fa-sign-out-alt"></span>&nbsp;<a
                                href="salir.php">Cerrar sesión</a>
                            &nbsp;&nbsp;&nbsp;
                    </div>
                </div>
            </div>
        </div>


        <div class="tab">
            <div class="topnav" id="myTopnav">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <img src="img/logo.png" alt="" width="150" height="60" />
                <button class="tablinks" onclick="openTab(event, 'Usuario')"><span
                        class="fa fa-user-cog"></span>&nbsp;&nbsp;Cuenta</button>
                <button class="tablinks" onclick="openTab(event, 'Expe')"><span
                        class="fa fa-file-medical-alt"></span>&nbsp;&nbsp;Expedientes</button>
                <button class="tablinks" onclick="openTab(event, 'Cita')" id="defaultOpen"><span
                        class="fa fa-calendar-alt"></span>&nbsp;&nbsp;Agendar cita</button>
                <button href="javascript:void(0);" class="icon" onclick="myFunction()">
                    <i class="fa fa-bars"></i></button>
            </div>
        </div>

    </nav>

    <br><br><br><br><br><br><br><br>

    <div class="contenido">

        <div id="Cita" class="tabcontent">
            <div id="B1" class="row">
                <h1>¡Bienvenido, <?php echo ($name); ?>!</h1>
                <div class="row">
                    <form action="AgendarC.php" method="post" autocomplete="off">
                        <div class="col-75P">
                            <label for="lname" id="etiquetas">Médico:</label>
                        </div>
                        <select name="medico" id="OMedico" class="form-control input-md" data-rule="required">
                            <option value="LOAN990304MDFPGD00">Nadia Aguilar</option>
                        </select>
                        <div class="col-75P">
                            <label for="lname" id="etiquetas">Fecha:</label>
                        </div>
                        <input type="text" id="calendario" name="fecha" value="20-05-2020">
                        <div class="col-75P">
                            <label for="lname" id="etiquetas">Horario:</label>
                        </div>
                        <select name="hora" id="OHora" class="form-control input-md" data-rule="required">
                            <option value="9000">9:00</option>
                            <option value="1200">12:00</option>
                            <option value="1600">16:00</option>
                        </select>
                        <br><br>
                        <input type="hidden" id="curp" name="curp" value="<?php echo ($usuario); ?>">
                        <div class="col-75">
                            <input type="submit" value="Generar Cita">
                        </div>
                    </form>
                </div>
            </div>
            <div id="B2" class="row">
                <h2><span id="icon-co" class="fa fa-calendar-times icon-co"></span>&nbsp;&nbsp;Programa tu cita</h2>
                <div class="calendar">
                    <div class="calendar__info">
                        <div class="calendar__prev" id="prev-month">&#9664;</div>
                        <div class="calendar__month" id="month"></div>
                        <div class="calendar__year" id="year"></div>
                        <div class="calendar__next" id="next-month">&#9654;</div>
                    </div>

                    <div class="calendar__week">
                        <div class="calendar__day calendar__item">Mon</div>
                        <div class="calendar__day calendar__item">Tue</div>
                        <div class="calendar__day calendar__item">Wed</div>
                        <div class="calendar__day calendar__item">Thu</div>
                        <div class="calendar__day calendar__item">Fri</div>
                        <div class="calendar__day calendar__item">Sat</div>
                        <div class="calendar__day calendar__item">Sun</div>
                    </div>

                    <div class="calendar__dates" id="dates"></div>
                </div>
            </div>
        </div>

        <div id="Expe" class="tabcontent">
        <?php 
                require 'conexion.php';

                $idpc = "SELECT id_exped, curp_med, fecha FROM expediente WHERE curp_pat='$usuario'";
                $conpc = mysqli_query($conexion,$idpc);

            
            ?>             
            <div id="TMR">
                <h1 id="tituloPR"><span class="fa fa-file-medical"></span>&nbsp;&nbsp;Tus expedientes</h1><br>
                <table>
                    <tr>
                        <th>ID</th>
                        <th>Médico</th>
                        <th>Fecha</th>
                        <th>Descargar</th>
                    </tr>
                    <?php 
                        while($muestrapc = mysqli_fetch_array($conpc)){
                        ?>
                        <tr>
                            <td><?php echo $muestrapc[0] ?></td>
                            <td><?php echo $muestrapc[1] ?></td>
                            <td><?php echo $muestrapc[2] ?></td>                     
                            <td><form method="post" action="Descargar.php"><input type="submit" value="descargar"><input type="hidden" name="descarga" value="<?php echo $muestrapc[0]?>"></form></td>                            
                        </tr>
                        <?php 
                            }
                        ?>
                </table>
            </div>
        </div>

        <div id="Usuario" class="tabcontent">
            <h1><span class="fa fa-user-cog"></span>&nbsp;&nbsp;Configuración de tu cuenta</h1>
            <div class="contenedor">
                <form action="/action_page.php">
                    <div id="B1" class="row">
                        <div class="row">
                            <br><br><br>
                            <span id="icon-co" class="fa fa-user fa-6x icon-co"></span>
                            <label for="fname">
                                <h1>&nbsp;&nbsp;USUARIO</h1>
                            </label>
                            <br>
                            <input type="text" id="fname" name="firstname" placeholder="<?php echo ($name); ?>" disabled>
                        </div>
                        <br><br><br><br>
                        <div class="col-75">
                            <input type="submit" value="Guardar Cambios">
                        </div>
                    </div>
                    <div id="B2" class="row">
                        <div class="row">
                            <form autocomplete="off">
                                <div class="col-75P">
                                    <label for="lname" id="etiquetas">Email:</label>
                                </div>
                                <input type="text" id="fname" name="firstname" placeholder="henry.escom@gmail.com">
                                <button id="bconfig2"><span id="icon-co" class="fa fa-edit icon-co"></span></button>
                                <div class="col-75P">
                                    <label for="lname" id="etiquetas">Dirección:</label>
                                </div>
                                <input type="text" id="fname" name="firstname" placeholder="San Pedro de los Pinos, Col. Benito Juarez">
                                <button id="bconfig2"><span id="icon-co" class="fa fa-edit icon-co"></span></button>
                                <div class="col-75P">
                                    <label for="lname" id="etiquetas">Teléfono:</label>
                                </div>
                                <input type="text" id="fname" name="firstname" placeholder="554935904">
                                <button id="bconfig2"><span id="icon-co" class="fa fa-edit icon-co"></span></button>
                                <div class="col-75P">
                                    <label for="lname" id="etiquetas">Contraseña:</label>
                                </div>
                                <input type="text" id="fname" name="firstname" placeholder="<?php echo ($contra); ?>">
                                <button id="bconfig2"><span id="icon-co" class="fa fa-edit icon-co"></span></button>
                                <br><br>
                            </form>
                        </div>
                    </div>
            </div>
        </div>
    </div>

    <!-- Core JavaScript Files -->
    <script src="acciones/validaciones.js"></script>
    <script src="js/scripts.js"></script>
    <script src="jquery-ui-1.12.1.custom/jquery-3.3.1.min.js"></script>
    <script src="jquery-ui-1.12.1.custom/jquery-ui.js"></script>
    <script>
        function openTab(evt, cityName) {
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }
            document.getElementById(cityName).style.display = "block";
            evt.currentTarget.className += " active";
        }

        document.getElementById("defaultOpen").click();
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
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
    <script type="text/javascript">
        $(function () {
            $("#calendario").datepicker();
        });
    </script>
</body>

</html>
