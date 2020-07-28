<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Medi</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- <link rel="manifest" href="site.webmanifest"> -->
    <link rel="shortcut icon" type="image/x-icon" href="A.medi/img/favicon.png">
    <!-- Place favicon.ico in the root directory -->

    <!-- CSS here -->
      <!-- Font Awesome -->
  <link rel="stylesheet" href="adminlte/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
  <link rel="stylesheet" href="adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="adminlte/dist/css/adminlte.min.css">
  
    <link rel="stylesheet" href="A.medi/css/bootstrap.min.css">
    <link rel="stylesheet" href="A.medi/css/owl.carousel.min.css">
    <link rel="stylesheet" href="A.medi/css/magnific-popup.css">
    <link rel="stylesheet" href="A.medi/css/font-awesome.min.css">
    <link rel="stylesheet" href="A.medi/css/themify-icons.css">
    <link rel="stylesheet" href="A.medi/css/nice-select.css">
    <link rel="stylesheet" href="A.medi/css/flaticon.css">
    <link rel="stylesheet" href="A.medi/css/gijgo.css">
    <link rel="stylesheet" href="A.medi/css/animate.css">
    <link rel="stylesheet" href="A.medi/css/slicknav.css">
    <link rel="stylesheet" href="A.medi/css/style.css">
    <!-- <link rel="stylesheet" href="css/responsive.css"> -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->


    <!-- header-start -->
    <header>
        <div class="header-area ">
            <div id="sticky-header" class="main-header-area">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-3 col-lg-3">
                            <div class="logo-img">
                                <a href="A.medi/index.html">
                                    <img src="A.medi/img/Clinica.png" alt="" width="225" height="125">
                                </a>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- header-end -->

    <!-- slider_area_start -->
<div class="single_slider  d-flex align-items-center slider_bg_1 overlay ">
 <div class="container padding-top-register">
  <div class="register-box">
   <div class="card">
    <div class="card-body register-card-body">
      <p class="login-box-msg">Datos Generales</p>

      <form action="../clinica/controladores/registro_clientes.php" method="post">
        <div class="input-group mb-3">
          <input type="text" name="Nombres" class="form-control"class="input-group date form-control" placeholder="Nombres">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
          <div class="input-group mb-3">
          <input type="text" name="Apellidos" class="form-control" placeholder="Apellidos">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
          <div class="input-group mb-3">
			<select name="Pais" class="form-control" >
			    <option disabled selected>País</option>
                            <option value="1">Honduras</option>
			    <option value="2">El Salvador</option>
                            <option value="3">Nicaragua</option>
                            <option value="4">Guatemala</option>
                            <option value="5">Costa Rica</option>
                            <option value="6">Panama</option>
			</select>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
         <input type="text" name="fecha_nacimiento" class="input-group date form-control" date="" data-date-format="dd-mm-yyyy" placeholder="Fecha de nacimiento 'dd-mm-yyyy'" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas"></span>
            </div>
          </div>
        </div>
          <div class="input-group mb-3">
			<select name="TipoIdentidad" class="form-control" >
			    <option disabled selected>Tipo de Identificación</option>
                            <option value="1">Identidad</option>
			    <option value="2">Pasaporte</option>
                            <option value="3">Carnet de Residencia</option>
			</select>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
         <input type="text" name="num_identidad" class="form-control" placeholder="Numero de Identificación" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas"></span>
            </div>
          </div>
        </div>
          <div class="input-group mb-3">
             <select name="genero" class="form-control">
			    <option disabled selected>Genero</option>
			    <option value="'m'">Masculino</option>
                            <option value="'f'">Femenino</option>
	     </select>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas"></span>
            </div>
          </div>
        </div>
          <div class="input-group mb-3">
             <select name="estado_civil" class="form-control">
			    <option disabled selected>Estado Civil</option>
                            <option value="'s'">Soltero</option>
			    <option value="'c'">Casado</option>
                            <option value="'u'">Unión Libre</option>
                            <option value="'v'">Viudo</option>
	     </select>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas"></span>
            </div>
          </div>
        </div>
          <div class="input-group mb-3">
         <select name="tipo_sangre" class="form-control">
			    <option disabled selected>Tipo De Sangre</option>
                            <option value="1">O-</option>
                            <option value="2">O+</option>
			    <option value="3">A-</option>
                            <option value="4">A+</option>
			    <option value="5">B-</option>
			    <option value="6">B+</option>
			    <option value="7">AB-</option>
			    <option value="8">AB+</option>
			</select>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas"></span>
            </div>
          </div>
        </div>
          <div class="input-group mb-3">
         <textarea name="direccion" class="form-control" placeholder="Dirección"></textarea>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas"></span>
            </div>
          </div>
        </div>
          <div class="input-group mb-3">
        <input type="text" name="num_telefono" class="form-control" placeholder="Telefono" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-phone"></span>
            </div>
          </div>
        </div>
          <div class="input-group mb-3">
        <input type="text" name="num_Celular" class="form-control" placeholder="Celular" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-phone"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="email" name="CorreoElectronico" class="form-control" placeholder="Correo Electronico">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="Contraseña" class="form-control" placeholder="Contraseña">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="Contraseña2" class="form-control" placeholder="Repetir Contraseña">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
          <!-- /.col -->
          <div class="col-5">
            <button type="submit" class="btn btn-primary btn-block">Registrarse</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
      <a href="../clinica/login_clientes.php" class="text-center">Ya Estoy Registrado</a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
     <footer class="footer">
        <div class="footer_top">
            <div class="container">
                <div class="row">
                    <div class="col-xl-4 col-md-6 col-lg-4 ">
                        <div class="footer_widget">
                            <div class="footer_logo">
                                <a href="#">
                                    <img src="img/logo.png" alt="">
                                </a>
                            </div>
                            <p class="address_text">puedes encontrarnos en las diferentes <br> redeces sociales disponibles  <br>
                            </p>
                            <div class="socail_links">
                                <ul>
                                    <li>
                                        <a href="#">
                                            <i class="ti-facebook"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="ti-twitter-alt"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-dribbble"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-instagram"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-6 col-lg-4">
                        <div class="footer_widget">
                            <h3 class="footer_title">
                                Nuestras Especialidades
                            </h3>
                            <ul class="links">
                                <li><a>Pediatria</a></li>
                                <li><a>Cardiología</a></li>
                                <li><a>Alergología</a></li>
                                <li><a>Psiquiatría</a></li>
                                <li><a>Oncología médica</a></li>
                                <li><a>Neumología</a></li>
                                <li><a>Cirugía plástica</a></li>
                                <li><a>Dermatología</a></li>
                                <li><a>Otorrinolaringología</a></li>
                                <li><a>Urología</a></li>
                                <li><a>Ginecología</a></li>
                                <li><a>Oftalmología</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-4  col-md-6 col-lg-4">
                        <div class="footer_widget">
                            <h3 class="footer_title">
                                Horas de atencion
                            </h3>
                            <ul class="meting_time">
                                <li class="d-flex justify-content-between "><span>Monday - Friday</span> <span>8.00 - 18.00</span></li>
                                <li class="d-flex justify-content-between "><span>Saturday	</span> <span>8.00 - 18.00</span></li>
                                <li class="d-flex justify-content-between "><span>Sunday</span> <span>8.00 - 13.00</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- JS here -->
    <script src="A.medi/js/vendor/modernizr-3.5.0.min.js"></script>
    <script src="A.medi/js/vendor/jquery-1.12.4.min.js"></script>
    <script src="A.medi/js/popper.min.js"></script>
    <script src="A.medi/js/bootstrap.min.js"></script>
    <script src="A.medi/js/owl.carousel.min.js"></script>
    <script src="A.medi/js/isotope.pkgd.min.js"></script>
    <script src="A.medi/js/ajax-form.js"></script>
    <script src="A.medi/js/waypoints.min.js"></script>
    <script src="A.medi/js/jquery.counterup.min.js"></script>
    <script src="A.medi/js/imagesloaded.pkgd.min.js"></script>
    <script src="A.medi/js/scrollIt.js"></script>
    <script src="A.medi/js/jquery.scrollUp.min.js"></script>
    <script src="A.medi/js/wow.min.js"></script>
    <script src="A.medi/js/nice-select.min.js"></script>
    <script src="A.medi/js/jquery.slicknav.min.js"></script>
    <script src="A.medi/js/jquery.magnific-popup.min.js"></script>
    <script src="A.medi/js/plugins.js"></script>
    <script src="A.medi/js/gijgo.min.js"></script>
    <!--contact js-->
    <script src="A.medi/js/contact.js"></script>
    <script src="A.medi/js/jquery.ajaxchimp.min.js"></script>
    <script src="A.medi/js/jquery.form.js"></script>
    <script src="A.medi/js/jquery.validate.min.js"></script>
    <script src="A.medi/js/mail-script.js"></script>

    <script src="A.medi/js/main.js"></script>
    <script>
        $('.datepicker').datepicker({
            iconsLibrary: 'fontawesome',
            icons: {
                rightIcon: '<span class="fa fa-calendar"></span>'
            }
        });

        $('.timepicker').timepicker({
            iconsLibrary: 'fontawesome',
            icons: {
                rightIcon: '<span class="fa fa-clock-o"></span>'
            }
        });
    $(document).ready(function() {
    $('.js-example-basic-multiple').select2();
});
    </script>
</body>

</html>
