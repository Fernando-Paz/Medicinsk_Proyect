<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Proyecto de Ingeniería de Software">
  <meta name="author" content="Medicinsk">

  <title>Login</title>

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
  <?php 
    session_start();
    if(isset($_SESSION['username'])){
        header('location: principal.php');
    }
  ?>
  <div id="wrapper">
    <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
      <div class="top-area">
        <div class="container">
          <div class="row">
            <div align="right">
              <p class="bold text-right"><a href="login.php">&nbsp&nbsp&nbsp Iniciar Sesión </a></p>
            </div>
          </div>
        </div>
      </div>
      <div class="container navigation">

        <div class="navbar-header page-scroll">
          <a class="navbar-brand" href="index.php">
            <img src="img/logo.png" alt="" width="150" height="40" />
          </a>
        </div>

        <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="index.php">Inicio</a></li>
            <li><a href="index.php#callaction">Servicios</a></li>
            <li><a href="index.php#doctor">Doctores</a></li>
            <li><a href="index.php#facilities">Facilidades</a></li>
            <li><a href="#end">Contacto</a></li>
          </ul>
        </div>
      </div>
    </nav>


    <!-- Section: intro -->
    <section id="intro" class="intro">
      <div class="intro-content">
        <div class="container marginbot-20">
          <div class="row">
            <div class="section-heading text-center">
              <div class="col-lg-6 col-lg-offset-3">
                <div class="wow fadeInDown" data-wow-offset="0" data-wow-delay="0.1s">
                  <h2 class="h-ultra">Grupo Médico Medicinsk</h2>
                </div>
                <div class="text-center">
                  <div class="form-wrapper">
                    <div class="wow fadeInRight" data-wow-duration="2s" data-wow-delay="0.2s">
                      <div class="panel panel-skin">
                        <div class="panel-heading">
                          <h3 class="panel-title"><span class="fa fa-user"></span>Inicia Sesión</h3>
                        </div>
                        <div class="panel-body">
                          <div id="sendmessage">Tu mensaje se ha enviado con éxito, Gracias!</div>
                          <div id="errormessage"></div>
                          <form action="loguear.php" method="POST">
                          <!-- role="form" class="contactForm lead"> -->
                            <div class="button">
                              <div class="row">
                                <div class="form-group">
                                  <label>Curp</label>
                                  <input type="text" name="Usuario" id="Usuario" class="form-control input-md" data-rule="required" maxlength="18" data-msg="Ingrese su Curp">
                                  <div class="validation"></div>
                                </div>
                              </div>
                            </div>
                            <div class="button">
                              <div class="row">
                                <div class="form-group">
                                  <label>Contraseña</label>
                                  <input type="password" name="Password" id="Password" class="form-control input-md" data-rule="required" data-msg="Ingrese su contraseña">
                                  <div class="validation"></div>
                                </div>
                              </div>
                            </div>                  
                            <div class="button">
                              <div class="row">
                      	        <div class="form-group">
                                  <input type="submit" value="Ingresar" class="btn btn-skin btn-block btn-lg">
                                  <a href="forgotten.php" class="light"><p>¿Olvidaste tu contraseña?</p></a>
                                </div>
                              </div>
                            </div>
                          </form>
                        </div>
                      </div>
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
                  <li><a href="terminos_y_condiciones.php" class="light">Terminos y condiciones</a></li>
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
  <!-- <a href="#" class="scrollup"><i class="fa fa-angle-up active"></i></a> --> -->

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
