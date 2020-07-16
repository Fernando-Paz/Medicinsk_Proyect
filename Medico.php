<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <title>Médico</title>

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
                <button class="tablinks" onclick="openTab(event, 'ExpeM')"><span
                        class="fa fa-file-medical-alt"></span>&nbsp;&nbsp;Generar Expediente</button>
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

            $pp = "SELECT COUNT(*) AS contarpp FROM prepaciente";
            $numero = "SELECT COUNT(*) AS contarp FROM citas WHERE curp_med='$usuario'";

            $consultanum = mysqli_query($conexion,$numero);
            $consultapp = mysqli_query($conexion,$pp);
        
            $arrynumer = mysqli_fetch_array($consultanum);
            $arrypp = mysqli_fetch_array($consultapp);

        ?>        

        <div id="Inicio" class="tabcontent">
            <div id="d1">
                &nbsp;&nbsp;&nbsp;&nbsp;<h1 id="titulo">¡Bienvenido, <?php echo ($name); ?>!</h1>
                &nbsp;&nbsp;&nbsp;&nbsp;<h3>Como podrá ver en la tabla de la izquierda, hoy tiene:<br><br><br>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span id="opciones"
                        class="fa fa-stethoscope"></span>&nbsp;&nbsp;<?php echo ($arrynumer[0]); ?> citas que atender.<br><br>
                    &nbsp;&nbsp;&nbsp;&nbsp;<h3>Y existen:<br><br><br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span id="opciones"
                            class="fa fa-user-injured"></span>&nbsp;&nbsp;<?php echo ($arrypp[0]); ?> pacientes en espera de ser dados de
                        alta.<br><br>
                    </h3>
            </div>
            <div id="d2C">
            <?php 
                require 'conexion.php';

                $idhc = "SELECT curp_pat, fecha_s, fecha_c, hora FROM citas WHERE curp_med='$usuario'";
                $conhc = mysqli_query($conexion,$idhc);

            
            ?>                
                <div id="TMR">
                    <h1 id="tituloPR"><span class="fa fa-clipboard-list"></span>&nbsp;&nbsp;Tus citas de hoy</h1><br>
                    <table>
                        <tr>
                            <th>Nombre(s)</th>
                            <th>Apellido</th>
                            <th>Fecha consultada la Cita</th>
                            <th>Fecha de la cita</th>
                            <th>Hora de la cita</th>
                            <th></th>
                            <th></th>
                        </tr>
                        <?php 
                        while($muestrahc = mysqli_fetch_array($conhc)){
                        ?>
                        <tr>
                            <td><?php echo $muestrahc[0] ?></td>
                            <td><?php echo $muestrahc[1] ?></td>
                            <td><?php echo $muestrahc[2] ?></td>
                            <td><?php echo $muestrahc[3] ?></td>
                            <td><?php echo $muestrahc[3] ?></td>
                            <td><form method="post" action="HistorialC.php"><input type="submit" id="alta" value="Tomada" style="text-align:center;"><input type="hidden" name="alta" value="1"></form></td>
                            <td><form method="post" action="HistorialC.php"><input type="submit" id="baja" value="Perdida" style="text-align:center;"><input type="hidden" name="baja" value="0"></form></td>
                        </tr>
                        <?php 
                            }
                        ?>
                    </table>
                </div>
            </div>
        </div>

        <div id="ExpeM" class="tabcontent">
            <div id="d1">
                <div class="col-sm-6 col-md-6" id="ajusteIcon1">
                    <a onclick="openTab(event, 'CrearE')"><span id="icon-co"
                            class="fa fa-file-medical fa-10x icon-co"></span></a>
                    <div class="ajusteTit">
                        <h2>Crear Expediente</h2>
                    </div>
                </div>
            </div>
            <div id="d2">
                <div class="col-sm-6 col-md-6" id="ajusteIcon">
                    <a onclick="openTab(event, 'SubirE')"><span id="icon-co"
                            class="fa fa-file-import fa-10x icon-co"></span></a>
                    <div class="ajusteTit">
                        <h2>Subir Expediente</h2>
                    </div>
                </div>
            </div>
        </div>

        <div id="CrearE" class="tabcontent">
            <div class="vozg"><button type="button" class="vozguarda" onclick="darle()"><span id="icon-co"class="fa fa-microphone-alt"></span>&nbsp;&nbsp;Iniciar receta</button>
                <button type="button" class="vozguarda" onclick="pararle()"><span id="icon-co"class="fa fa-stop-circle"></span>&nbsp;&nbsp;Parar receta</button></div>
            <div id="texto">Nombre del paciente: Oscar Gerardo Trejo Rivera Edad:21 Fecha:12 de junio de 2020 Cita: sin
                cita Alergias: ninguna
                Peso: 83 kg talla: 1.70 mts temperatura 37 grados Diagnóstico: Prestodol compuesto shalala
                ..................... esto es para que se haga una prueba aun mas larg
            </div>
            <div class="reporteg"><button type="button" class="reporteguarda" onclick="separar()"><span id="icon-co"class="fa fa-file-medical"></span>&nbsp;&nbsp;Crear reporte</button>
            </div>
            <div id="contenedorpdf"><iframe frameborder="0" width="600" height="700"></iframe></div>
            <!-- <div>
                <form enctype="multipart/form-data" action="guardar_archivo.php" method="post">
                    <div align="center">Descripción <input type="text" name="titulo" size="30"></div><br>
                    <div align="center">Ubicación <input type="file" name="archivito"></div><br>
                    <div align="center"><input type="submit" value="Enviar archivo"></div>
                </form>
            </div> -->
        </div>

        <div id="SubirE" class="tabcontent">
            <h1><span class="fa fa-file-pdf"></span>&nbsp;&nbsp;Agregar Expediente</h1>
            <br><br>
            <div class="contenedor">
                <!-- <form action="/action_page.php"> -->
                    <div id="B1" class="row">
                        <div class="row">
                            <br><br><br>
                            <span id="icon-co" class="fa fa-file-medical-alt fa-6x icon-co"></span>
                            <label for="fname">
                                <h1>&nbsp;&nbsp;EXPEDIENTE</h1>
                            </label>
                        </div>
                    </div>
                    <div id="B2" class="row">
                        <div class="row">
                            <form enctype="multipart/form-data" action="guardar_archivo.php" method="post" autocomplete="off">
                                <div class="col-75P">
                                    <label for="lname" id="etiquetas">CURP DEL PACIENTE:</label>
                                </div>
                                <input type="text" id="fname" name="curppac" placeholder="Ej. 5498345869">
                                <div class="col-75P">
                                    <label for="lname" id="etiquetas">Archivo:</label>
                                </div>
                                <input type="file" id="fname" name="archivito">
                                <br><br>
                                <br><br>
                                <div class="col-75">
                                    <input type="submit" value="Subir archivo">
                                </div>
                            </form>
                        </div>
                    </div>
                <!-- </form> -->
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

        <div id="Cuenta" class="tabcontent">
            <h1><span id="icon-co" class="fa fa-user-cog icon-co"></span>&nbsp;&nbsp;Configuración de cuenta</h1>
            <form action="Medico.html">
                <div id="B1" class="row">
                    <div class="row">
                        <br><br><br>
                        <span id="icon-co" class="fa fa-user fa-6x icon-co"></span>
                        <label for="fname">
                            <h1>&nbsp;&nbsp;USUARIO</h1>
                        </label>
                        <br>
                        <input type="text" id="fname" name="firstname" placeholder="Nadia">
                    </div>
                    <br><br><br><br>
                    <div class="col-75">
                        <input type="submit" value="Guardar Cambios">
                    </div>
                </div>
                <div id="B2" class="row">
                    <div class="row">
                        <br><br>
                        <form autocomplete="off">
                            <div class="col-75P">
                                <label for="lname" id="etiquetas">Email:</label>
                            </div>
                            <input type="text" id="fname" name="firstname" placeholder="nbla.escom@gmail.com">
                            <button id="bconfig2"><span id="icon-co" class="fa fa-edit icon-co"></span></button>
                            <div class="col-75P">
                                <label for="lname" id="etiquetas">Contraseña:</label>
                            </div>
                            <input type="text" id="fname" name="firstname" placeholder="456">
                            <button id="bconfig2"><span id="icon-co" class="fa fa-edit icon-co"></span></button>
                            <div class="col-75P">
                                <table id="THM">
                                    <tr>
                                        <th><label for="fname">Hora Inicio:</label></th>
                                        <th><label for="fname">Hora Fin:</label></th>
                                        <th><label for="fname">Hora Comida:</label></th>
                                    </tr>
                                    <tr>
                                        <td><input type="text" name="firstname" placeholder="7:00"></td>
                                        <td><input type="text" name="firstname" placeholder="15:00"></td>
                                        <td><input type="text" name="firstname" placeholder="12:00"></td>
                                    </tr>
                                </table>
                            </div>
                        </form>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Core JavaScript Files -->
    <script src="acciones/validaciones.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.easing.min.js"></script>
    <script src="js/wow.min.js"></script>
    <script src="js/jquery.scrollTo.js"></script>
    <script src="js/jquery.appear.js"></script>
    <script src="js/stellar.js"></script>
    <script src="plugins/cubeportfolio/js/jquery.cubeportfolio.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/nivo-lightbox.min.js"></script>
    <script src="js/custom.js"></script>
    <script src="contactform/contactform.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="acciones/doc.js"></script>
    <script type="text/javascript" src="js2/jquery/jquery-1.7.1.min.js"></script>
    <script type="text/javascript" src="js2/jquery/jquery-ui-1.8.17.custom.min.js"></script>
    <script type="text/javascript" src="js3/jspdf.js"></script>
    <script type="text/javascript" src="js3/jspdf.plugin.addimage.js"></script>
    <script type="text/javascript" src="js3/jspdf.plugin.standard_fonts_metrics.js"></script>
    <script type="text/javascript" src="js3/jspdf.plugin.split_text_to_size.js"></script>
    <script type="text/javascript" src="js3/jspdf.plugin.from_html.js"></script>
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
</body>

</html>
