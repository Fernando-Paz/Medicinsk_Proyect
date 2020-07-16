<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Proyecto de Ingeniería de Software">
  <meta name="author" content="Medicinsk">

  <title>Registro</title>

  <!-- css -->
  <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" type="text/css" href="plugins/cubeportfolio/css/cubeportfolio.min.css">
  <link href="css/nivo-lightbox.css" rel="stylesheet" />
  <link href="css/nivo-lightbox-theme/default/default.css" rel="stylesheet" type="text/css" />
  <link href="css/owl.carousel.css" rel="stylesheet" media="screen" />
  <link href="css/owl.theme.css" rel="stylesheet" media="screen" />
  <link href="css/animate.css" rel="stylesheet" />
  <link href="css/style.css" rel="stylesheet">

  <!-- boxed bg -->
  <link id="bodybg" href="bodybg/bg1.css" rel="stylesheet" type="text/css" />
  <!-- template skin -->

</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-custom">
  <div id="wrapper">
    <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
      <div class="top-area">
        <div class="container">
          <div class="row">
            <div class="col-sm-6 col-md-6">
              <p class="bold text-left">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp </p>
            </div>
            <div class="col-sm-6 col-md-6" align="right">
              <p class="bold text-right"><a href="login.php"> Inicia Sesión </a></p>
            </div>
          </div>
        </div>
      </div>
      <div class="container navigation">
        <div class="navbar-header page-scroll">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
            <i class="fa fa-bars"></i>
          </button>
          <a class="navbar-brand" href="index.php">
            <img src="img/logo.png" alt="" width="150" height="40" />
          </a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="index.php">Inicio</a></li>
            <li><a href="index.php#callaction">Servicio</a></li>
            <li><a href="index.php#doctor">Doctores</a></li>
            <li><a href="index.php#facilities">Facilidades</a></li>
            <li><a href="#end">Contacto</a></li>
          </ul>
        </div>
        <!-- /.navbar-collapse -->
      </div>
      <!-- /.container -->
    </nav>

    <!-- Section: intro -->
    <section id="intro" class="intro">
      <div class="intro-content">
        <div class="container">
          <div class="section-heading text-center">
            <div class="wow fadeInDown" data-wow-offset="0" data-wow-delay="0.1s">
              <h2 class="h-ultra">Grupo Médico Medicinsk</h2>
            </div>
            <div class="section-heading text-center">
              <div class="form-wrapper">
                <div class="wow fadeInRight" data-wow-duration="2s" data-wow-delay="0.2s">
                  <div class="panel panel-skin">
                    <div class="panel-heading">
                      <h3 class="panel-title"><span class="fa fa-pencil-square-o"></span>Registro Paciente</h3>
                    </div>
                    <div class="panel-body">
                      <div id="sendmessage">Tu mensaje se ha enviado cocn éxito, Gracias!</div>
                      <div id="errormessage"></div>
                      <form action="AltaPaciente.php" method="post" role="form" class="contactForm lead">
                        <div class="row">
                          <div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="form-group">
                              <label>Nombre(s)</label>
                              <input type="text" name="NombreP" id="Nombres_Paciente" class="form-control input-md" data-rule="minlen:2" data-msg="Por favor introduzca al menos dos caracteres">
                              <div class="validation"></div>
                            </div>
                          </div>
                          <div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="form-group">
                              <label>Apellidos</label>
                              <input type="text" name="ApelliP" id="Apellidos_Paciente" class="form-control input-md" data-rule="minlen:3" data-msg="Por favor introduzca al menos 3 caracteres">
                              <div class="validation"></div>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="form-group">
                              <label>Correo</label>
                              <input type="email" name="EmailP" id="Email_Paciente" class="form-control input-md" data-rule="email" data-msg="Por favor introduzca un correo válido">
                              <div class="validation"></div>
                            </div>
                          </div>
                          <div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="form-group">
                              <label>Teléfono</label>
                              <input type="tel" name="TelefP" id="Telefono_Paciente" class="form-control input-md" data-rule="required" data-msg="El teléfono es obligatorio">
                              <div class="validation"></div>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="form-group">
                            <label>Dirección</label>
                            <input type="text" name="DireccP" id="Direccion_Paciente" class="form-control input-md" data-rule="minlen:3" data-msg="Por favor introduzca al menos 10 caracteres">
                            <div class="validation"></div>
                          </div>
                        </div>
                        <div class="button">
                          <div class="row">
                            <div class="form-group">
                              <label>Curp</label>
                              <input type="text" name="CURPP" id="Usuarios_Curp_Usuario" class="form-control input-md" data-rule="required" maxlength="18" data-msg="El Curp es obligatorio">
                              <div class="validation"></div>
                            </div>
                          </div>
                        </div>
                        <div class="button">
                          <div class="row">
                            <div class="form-group">
                              <input type="submit" value="Registrar" class="btn btn-skin btn-block btn-lg">
                            </div>
                          </div>
                        </div> 
                        <p class="lead-footer">Tu Doctor se contactará contigo después de tu registro.</p>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- /Section: intro -->  

    <footer id="end" class="home-section paddingbot-60">
      <div class="container">
        <div class="row">
          <div class="col-sm-6 col-md-4">
            <div class="wow fadeInDown" data-wow-delay="0.1s">
              <div class="widget">
                <h5>Sobre Medicinsk</h5>
                <p>
                  Software relacionado al ámbito médico.
                </p>
              </div>
            </div>
            <div class="wow fadeInDown" data-wow-delay="0.1s">
              <div class="widget">
                <h5>Información</h5>
                <ul>
                  <li><a href="index.php" class="light">Inicio</a></li>
                  <!-- <li><a href="#" class="light">Tratamiento Médico</a></li> -->
                  <li><a href="#" class="light">Terminos y condiciones</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-md-4">
            <div class="wow fadeInDown" data-wow-delay="0.1s">
            </div>
          </div>
          <div class="col-sm-6 col-md-4">
            <div class="wow fadeInDown" data-wow-delay="0.1s">
              <div class="widget">
                <h5>Plataforma Medicinsk</h5>
                <p>
                  Te ofrecemos la mejor calidad de salud.
                </p>
                <ul>
                  <li>
                    <span class="fa-stack fa-lg">
                  <i class="fa fa-circle fa-stack-2x"></i>
                  <i class="fa fa-calendar-o fa-stack-1x fa-inverse"></i>
                </span> Lunes - Sábado, 8am a 10pm
                  </li>
                  <li>
                    <span class="fa-stack fa-lg">
                  <i class="fa fa-circle fa-stack-2x"></i>
                  <i class="fa fa-phone fa-stack-1x fa-inverse"></i>
                </span> +52 1 55 6798 9086
                  </li>
                  <li>
                    <span class="fa-stack fa-lg">
                  <i class="fa fa-circle fa-stack-2x"></i>
                  <i class="fa fa-at fa-stack-1x fa-inverse"></i>
                </span> doctor@medicinsk.com
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="sub-footer">
        <div class="container">
          <div class="row">
            <div class="col-sm-6 col-md-6 col-lg-6">
              <div class="wow fadeInLeft" data-wow-delay="0.1s">
                <div class="text-left">
                  <p>&copy;Copyright - Medicinsk. Todos los derechos reservados.</p>
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-6">
              <div class="wow fadeInRight" data-wow-delay="0.1s">
                <div class="text-right">
                  <div class="credits">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </footer>
  </div>
  <!-- <a href="#" class="scrollup"><i class="fa fa-angle-up active"></i></a> -->

  <!-- Core JavaScript Files -->
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

</body>

</html>
