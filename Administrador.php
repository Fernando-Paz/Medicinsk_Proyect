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
        $pass = $_SESSION['pass'];

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
                <button class="tablinks" onclick="openTab(event, 'Cuenta')"><span
                        class="fa fa-user-cog"></span>&nbsp;&nbsp;Cuenta</button>
                <button class="tablinks" onclick="openTab(event, 'Paciente')"><span
                        class="fa fa-user-injured"></span>&nbsp;&nbsp;Pacientes</button>
                <button class="tablinks" onclick="openTab(event, 'Medico')"><span
                        class="fa fa-user-md"></span>&nbsp;&nbsp;Médicos</button>
                <button class="tablinks" onclick="openTab(event, 'Admin')"><span
                        class="fa fa-user-tie"></span>&nbsp;&nbsp;Administradores</button>
                <button class="tablinks" onclick="openTab(event, 'Inicio')" id="defaultOpen"><span
                        class="fa fa-house-user"></span>&nbsp;&nbsp;Inicio</button>
                <button href="javascript:void(0);" class="icon" onclick="myFunction()">
                    <i class="fa fa-bars"></i></button>
            </div>
        </div>

    </nav>

    <br><br><br><br><br><br><br><br>

    <div class="contenido">
        <?php 
            require 'conexion.php';

            $p = "SELECT COUNT(*) AS contarp FROM paciente";
            $pp = "SELECT COUNT(*) AS contarpp FROM prepaciente";
            $m = "SELECT COUNT(*) AS contarm FROM medico";
            $a = "SELECT COUNT(*) AS  contara FROM administrador";
            $consultap = mysqli_query($conexion,$p);
            $consultapp = mysqli_query($conexion,$pp);
            $consultam = mysqli_query($conexion,$m);
            $consultaa = mysqli_query($conexion,$a);
        
            $arryp = mysqli_fetch_array($consultap);
            $arrypp = mysqli_fetch_array($consultapp);
            $arrym = mysqli_fetch_array($consultam);
            $arrya = mysqli_fetch_array($consultaa);
        ?>
        <div id="Inicio" class="tabcontent">
            <div id="d1">
                &nbsp;&nbsp;&nbsp;&nbsp;<h1 id="titulo">¡Hola de nuevo, <?php echo ($name); ?>!</h1>
                &nbsp;&nbsp;&nbsp;&nbsp;<h3>Como podrá ver en la gráfica de la izquierda, actualmente en el
                    sistema:<br><br><br>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span id="opciones"
                        class="fa fa-user-clock"></span>&nbsp;&nbsp;Existen <?php echo ($arrypp[0]); ?>
                    pacientes en espera a ser dados de alta.<br><br>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span id="opciones"
                        class="fa fa-user-injured"></span>&nbsp;&nbsp;&nbsp;Existen <?php echo ($arryp[0]); ?> pacientes dados de alta en el
                    sistema.<br><br>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span id="opciones"
                        class="fa fa-user-md"></span>&nbsp;&nbsp;&nbsp;Existen
                        <?php echo ($arrym[0]); ?> médicos registrados en el sistema.<br><br>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span id="opciones"
                        class="fa fa-user-tie"></span>&nbsp;&nbsp;&nbsp;Existen
                        <?php echo ($arrya[0]); ?> administradores registrados en el sistema.<br><br>


                </h3>
            </div>
            <div id="d2">
                <canvas id="myChart" width="300" height="300"></canvas>
            </div>
        </div>

        <div id="Paciente" class="tabcontent">
            <div id="d1">
                <div class="col-sm-6 col-md-6" id="ajusteIcon1">
                    <a onclick="openTab(event, 'FormP')"><span id="icon-co"
                            class="fa fa-user-injured fa-10x icon-co"></span></a>
                    <div class="ajusteTit">
                        <h2>Nuevo Paciente</h2>
                    </div>
                </div>
            </div>
            <div id="d2">
                <div class="col-sm-6 col-md-6" id="ajusteIcon">
                    <a onclick="openTab(event, 'TablaP')"><span id="icon-co"
                            class="fa fa-clipboard-list fa-10x icon-co"></span></a>
                    <div class="ajusteTit">
                        <h2>Registros de Pacientes</h2>
                    </div>
                </div>
            </div>
        </div>

        <div id="Medico" class="tabcontent">
            <div id="d1">
                <div class="col-sm-6 col-md-6" id="ajusteIcon1">
                    <a onclick="openTab(event, 'FormM')"><span id="icon-co"
                            class="fa fa-user-md fa-10x icon-co"></span></a>
                    <div class="ajusteTit">
                        <h2>Nuevo Médico</h2>
                    </div>
                </div>
            </div>
            <div id="d2">
                <div class="col-sm-6 col-md-6" id="ajusteIcon">
                    <a onclick="openTab(event, 'TablaM')"><span id="icon-co"
                            class="fa fa-clipboard-list fa-10x icon-co"></span></a>
                    <div class="ajusteTit">
                        <h2>Registros de Médicos</h2>
                    </div>
                </div>
            </div>
        </div>

        <div id="Admin" class="tabcontent">
            <div id="d1">
                <div class="col-sm-6 col-md-6" id="ajusteIcon1">
                    <a onclick="openTab(event, 'FormA')"><span id="icon-co"
                            class="fa fa-user-tie fa-10x icon-co"></span></a>
                    <div class="ajusteTit">
                        <h2>Nuevo Administrador</h2>
                    </div>
                </div>
            </div>
            <div id="d2">
                <div class="col-sm-6 col-md-6" id="ajusteIcon">
                    <a onclick="openTab(event, 'TablaA')"><span id="icon-co"
                            class="fa fa-clipboard-list fa-10x icon-co"></span></a>
                    <div class="ajusteTit">
                        <h2>Registros de Administradores</h2>
                    </div>
                </div>
            </div>
        </div>

        <div id="TablaP" class="tabcontent" style="overflow-x:auto;">
            <div class="TP" id="indiceP">
                <a href="#TPE"><span class="fa fa-clock"></span>&nbsp;&nbsp;Pacientes en espera</a>
                <a href="#TPR"><span class="fa fa-list"></span>&nbsp;&nbsp;Pacientes registrados</a>
            </div>
            <br><br>
            <h1 id="tituloPE">Pacientes en espera a ser dados de alta</h1><br>
            <?php 
                require 'conexion.php';

                $idpp = "SELECT * FROM prepaciente";
                $con = mysqli_query($conexion,$idpp);

            
            ?>
            <div id="TPE">
                <table>
                    <tr>
                        <th>Nombres</th>
                        <th>Apellidos</th>
                        <th>CURP</th>
                        <th>email</th>
                        <th>Dar de Alta</th>
                        <th>Eliminar</th>
                    </tr>
                    <?php 
                        while($muestra = mysqli_fetch_array($con)){
                    ?>
                    <tr>
                        <td><?php echo $muestra[0] ?></td>
                        <td><?php echo $muestra[1] ?></td>
                        <td><?php echo $muestra[2] ?></td>
                        <td><?php echo $muestra[3] ?></td>
                        <td><form method="post" action="AgregarP.php"><input type="submit" id="alta" value="Alta"><input type="hidden" name="alta" value="<?php echo $muestra[3] ?>"></form></td>
                        <td><form method="post" action="EliminarP.php"><input type="submit" id="baja" value="Eliminar"><input type="hidden" name="baja" value="<?php echo $muestra[3] ?>"></form></td>
                    </tr>
                    <?php 
                        }
                    ?>
                </table>
            </div>
            <br><br><br>
            <div id="TPR">
            <?php 
                require 'conexion.php';

                $idp = "SELECT persona.curp, persona.nombres, persona.apellidos, persona.email from persona inner join usuario on usuario.curp = persona.curp where usuario.nivel = 3";
                $conp = mysqli_query($conexion,$idp);

            
            ?>                
                <h1 id="tituloPR">Pacientes registrados en el sistema</h1><br>
                <table>
                    <tr>
                        <th>Nombres</th>
                        <th>Apellidos</th>
                        <th>CURP</th>
                        <th>email</th>
                        <th>Dar de Baja</th>
                    </tr>
                    <?php 
                        while($muestrap = mysqli_fetch_array($conp)){
                    ?>
                    <tr>
                        <td><?php echo $muestrap[0] ?></td>
                        <td><?php echo $muestrap[1] ?></td>
                        <td><?php echo $muestrap[2] ?></td>
                        <td><?php echo $muestrap[3] ?></td>
                        <td><form method="post" action="EliminarP.php"><input type="submit" id="baja" value="Eliminar"><input type="hidden" name="baja" value="<?php echo $muestrap[3] ?>"></form></td>
                    </tr>
                    <?php 
                        }
                    ?>
                </table>
            </div>
        </div>

        <div id="TablaM" class="tabcontent">
            <div class="TP" id="indiceP">
                <a href="#TMR"><span class="fa fa-list"></span>&nbsp;&nbsp;Medicos registrados</a>
            </div>
            <div id="TMR">
            <?php 
                require 'conexion.php';

                $idm ="SELECT persona.curp, persona.nombres, persona.apellidos, persona.email from persona inner join usuario on usuario.curp = persona.curp where usuario.nivel = 2";
                $conm = mysqli_query($conexion,$idm);

            
            ?>                  
                <h1 id="tituloPR">Médicos registrados en el sistema</h1><br>
                <table>
                    <tr>
                        <th>Nombres</th>
                        <th>Apellidos</th>
                        <th>CURP</th>
                        <th>email</th>
                        <th>Dar de Baja</th>
                    </tr>
                    <?php 
                        while($muestram = mysqli_fetch_array($conm)){
                    ?>
                    <tr>
                        <td><?php echo $muestram[0] ?></td>
                        <td><?php echo $muestram[1] ?></td>
                        <td><?php echo $muestram[2] ?></td>
                        <td><?php echo $muestram[3] ?></td>
                        <td><form method="post" action="EliminarP.php"><input type="submit" id="baja" value="Eliminar"><input type="hidden" name="baja" value="<?php echo $muestram[2] ?>"></form></td>
                    </tr>
                    <?php 
                        }
                    ?>
                </table>
            </div>
        </div>

        <div id="TablaA" class="tabcontent">
            <div class="TP" id="indiceP">
                <a href="#TMR"><span class="fa fa-list"></span>&nbsp;&nbsp;Administradores registrados</a>
            </div>
            <div id="TMR">
            <?php 
                require 'conexion.php';

                $ida = "SELECT persona.curp, persona.nombres, persona.apellidos, persona.email from persona inner join usuario on usuario.curp = persona.curp where usuario.nivel = 1";
                $cona = mysqli_query($conexion,$ida);

            
            ?>                   
                <h1 id="tituloPR">Administradores registrados en el sistema</h1><br>
                <table>
                    <tr>
                        <th>Nombres</th>
                        <th>Apellidos</th>
                        <th>CURP</th>
                        <th>email</th>
                        <th>Dar de Baja</th>
                    </tr>
                    <?php 
                        while($muestraa = mysqli_fetch_array($cona)){
                    ?>
                    <tr>
                        <td><?php echo $muestraa[0] ?></td>
                        <td><?php echo $muestraa[1] ?></td>
                        <td><?php echo $muestraa[2] ?></td>
                        <td><?php echo $muestraa[3] ?></td>
                        <td><form method="post" action="EliminarP.php"><input type="submit" id="baja" value="Eliminar"><input type="hidden" name="baja" value="<?php echo $muestraa[3] ?>"></form></td>
                    </tr>
                    <?php 
                        }
                    ?>
                </table>
            </div>
        </div>

        <div id="FormP" class="tabcontent">
            <h1><span class="fa fa-user-plus"></span>&nbsp;&nbsp;Registro Paciente</h1>
            <div class="contenedor">
                <form action="AltaPaciente.php" method="post" role="form" autocomplete="off">
                    <div id="B1" class="row">
                        <div class="row">
                            <div class="col-25">
                                <label for="fname">Nombre(s)</label>
                            </div>
                            <input type="text" id="NombreP" name="NombreP" placeholder="Ej. Manuel Isaac" required>
                            <div class="col-25">
                                <label for="fname">CURP</label>
                            </div>
                            <input type="text" id="CURPP" name="CURPP" placeholder="Ej. LOAN990304MDFPGD00" required>
                            <div class="col-25">
                                <label for="fname">Teléfono</label>
                            </div>
                            <input type="text" id="TelefP" name="TelefP" placeholder="Ej. 5498345869" required>

                        </div>
                    </div>
                    <div id="B2" class="row">
                        <div class="row">
                            <div class="col-75">
                                <label for="lname">Apellidos</label>
                            </div>
                            <input type="text" id="ApelliP" name="ApelliP" placeholder="Ej. Martínez Rebollar" required>
                            <div class="col-75">
                                <label for="lname">Dirección</label>
                            </div>
                            <input type="text" id="DireccP" name="DireccP" placeholder="Ej. San Pedro de los Pinos, call 23" required>
                            <div class="col-75">
                                <label for="lname">Email</label>
                            </div>
                            <input type="text" id="EmailP" name="EmailP" placeholder="Ej. usuario.correo@gmail.com" required>
                            <br><br>
                        </div>
                        <div class="col-75">
                            <input type="submit" value="Submit">
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div id="FormM" class="tabcontent">
            <h1><span id="icon-co" class="fa fa-user-md icon-co"></span>&nbsp;&nbsp;Registro Médico</h1>
            <div class="contenedor">
                <form action="AltaMedico.php" method="post" role="form" autocomplete="off">
                    <div id="B1" class="row">
                        <div class="row">
                            <div class="col-25">
                                <label for="fname">Nombre(s)</label>
                            </div> 
                            <input type="text" id="fname" name="NombreM" placeholder="Ej. Manuel Javier" required>
                            <div class="col-25">
                                <label for="fname">CURP</label>
                            </div>
                            <input type="text" id="fname" name="CURPM" placeholder="Ej. LOAN990304MDFPGD00" required>
                            <div class="col-25">
                                <label for="fname">Especialidad</label>
                            </div>
                            <input type="text" id="fname" name="Espe" placeholder="Ej. Cardiología" required>
                            <div class="col-25">
                                <label for="fname">Hora Inicio</label>
                                <label for="fname">Hora Fin</label>
                                <label for="fname">Hora Comida</label>
                            </div>

                            <input type="text" id="H" name="HI"
                                placeholder="Ej. 9">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="text" id="H" name="HF"
                                placeholder="Ej. 15">&nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="text" id="H" name="HC"
                                placeholder="Ej. 12">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </div>
                    </div>
                    <div id="B2" class="row">
                        <div class="row">
                            <div class="col-75">
                                <label for="lname">Email</label>
                            </div>
                            <input type="text" id="fname" name="EmailM" placeholder="Ej. correo.mio@gmail.com" required>
                            <div class="col-75">
                                <label for="lname">Apellidos</label>
                            </div>
                            <input type="text" id="fname" name="AM" placeholder="Ej. López López" required>
                            <div class="col-75">
                                <label for="lname">Cédula Profesional</label>
                            </div>
                            <input type="text" id="fname" name="CM" placeholder="Ej. C4WRMVSKQ" required>
                            <br><br>
                            <div class="col-75">
                                <input type="submit" value="Submit">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div id="FormA" class="tabcontent">
            <h1><span class="fa fa-user-tie"></span>&nbsp;&nbsp;Registro Administrador</h1>
            <div class="contenedor">
                <form action="AltaAdmin.php" method="post" role="form" autocomplete="off">
                    <div id="B1" class="row">
                        <div class="row">
                            <div class="col-25">
                                <label for="fname">Nombre(s)</label>
                            </div>
                            <input type="text" id="fname" name="NombreA" placeholder="Ej. Manuel Javier" required>
                            <div class="col-25">
                                <label for="fname">CURP</label>
                            </div>
                            <input type="text" id="fname" name="CURPA" placeholder="Ej. LOAN990304MDFPGD00" required>
                        </div>
                    </div>
                    <div id="B2" class="row">
                        <div class="row">
                            <div class="col-75">
                                <label for="lname">Apellidos</label>
                            </div>
                            <input type="text" id="fname" name="APA" placeholder="Ej. Pérez Juárez" required>
                            <div class="col-75">
                                <label for="lname">Email</label>
                            </div>
                            <input type="text" id="fname" name="EMA" placeholder="Ej. Javier.correo@gmail.com" required>
                            <br><br>
                        </div>
                        <div class="col-75">
                            <input type="submit" value="Submit">
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div id="Usuario" class="tabcontent">
            <h1><span class="fa fa-user-plus"></span>&nbsp;&nbsp;Nuevo Usuario</h1>
            <div class="contenedor">
                <form action="/action_page.php">
                    <div id="B1" class="row">
                        <div class="row">
                            <span id="icon-co" class="fa fa-user fa-6x icon-co"></span>
                            <label for="fname">
                                <h1>&nbsp;&nbsp;USUARIO</h1>
                            </label>
                            <br>
                            <input type="text" id="fname" name="firstname" placeholder="Ej. Manuel Javier">
                        </div>
                    </div>
                    <div id="B2" class="row">
                        <div class="row">
                            <div class="col-75">
                                <label for="lname">Contraseña</label>
                            </div>
                            <input type="text" id="fname" name="firstname" placeholder="Ej. 5498345869">
                            <div class="col-75">
                                <label for="lname">Confirmar Contraseña</label>
                            </div>
                            <input type="text" id="fname" name="firstname" placeholder="Ej. 5498345869">
                            <br><br>
                        </div>
                        <div class="col-75">
                            <input type="submit" value="Submit">
                        </div>
                    </div>
            </div>
        </div>

        <div id="Cuenta" class="tabcontent">
            <h1><span id="icon-co" class="fa fa-user-cog icon-co"></span>&nbsp;&nbsp;Configuración de cuenta</h1>
            <div id="CC">
                <div id="d1">
                    <div class="col-sm-6 col-md-6" id="ajusteIconC">
                        <span id="icon-co" class="fa fa-user fa-6x icon-co"></span>
                        <div class="ajusteTit">
                            <h2>Usuario</h2>
                            <input type="text" id="config" name="firstname" placeholder="<?php echo($name)?>" style="text-align=center" disabled>
                        </div>
                    </div>
                </div>
                <div id="d2C">
                    <div class="col-sm-6 col-md-6" id="ajusteIconC">
                        <span id="icon-co" class="fa fa-key fa-6x icon-co"></span>
                        <div class="ajusteTit">
                            <h2>Contraseña</h2>
                            <button id="bconfig"><span id="icon-co" class="fa fa-edit icon-co"></span></button>
                            <input type="text" id="config" name="firstname" placeholder="<?php echo($pass)?>" disabled>
                        </div>
                    </div>
                </div>
            </div>
            <div id="boton">
                <input type="submit" class="cuenta" value="Guardar cambios">
            </div>
        </div>
    </div>


    <!-- Core JavaScript Files -->
    <script src="acciones/validaciones.js"></script>
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
        var ctx = document.getElementById('myChart');
        var myChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ['Pacientes en espera a ser dados de alta', 'Pacientes dados de alta en el sistema', 'Medicos registrados en el sistema', 'Administradores registrados en el sistema'],
                datasets: [{
                    label: '# de usuarios',
                    data: [<?php echo ($arrypp[0]); ?>, <?php echo ($arryp[0]); ?>, <?php echo ($arrym[0]); ?>, <?php echo ($arrya[0]); ?>],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(100, 52, 100, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(29, 196, 44, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(43, 10, 92, 1)',
                        'rgba(10, 70, 92, 1)',
                        'rgba(15, 95, 23, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                legend: {
                    display: true,
                    position: 'right',
                }
            }
        });
    </script>

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
