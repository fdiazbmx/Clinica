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
                        <div class="col-xl-9 col-lg-9">
                            <div class="menu_wrap d-none d-lg-block">
                                <div class="menu_wrap_inner d-flex align-items-center justify-content-end">
                                    <div class="main-menu">
                                        <nav>
                                            <ul id="navigation">
                                                <li><a href="A.medi/index.html">home</a></li>
                                                <li><a href="#">Clientes <i class="ti-angle-down"></i></a>
                                                <ul class="submenu">
                                                    <li><a href="A.medi/blog.html">.......</a></li>
                                                    <li><a href="A.medi/single-blog.html">.......</a></li>
                                                </ul>
                                                <li><a href="#">Administracion <i class="ti-angle-down"></i></a>
                                                    <ul class="submenu">
                                                        <li><a href="A.medi/blog.html">.......</a></li>
                                                        <li><a href="A.medi/single-blog.html">.......</a></li>
                                                    </ul>
                                                </li>
                                                <li><a href="#">Doctores <i class="ti-angle-down"></i></a>
                                                    <ul class="submenu">
                                                        <li><a href="A.medi/department.html">.....</a></li>
                                                        <li><a href="A.medi/elements.html">.....</a></li>
                                                    </ul>
                                                </li>
                                                <li><a href="A.medi/contact.html">Contact </a></li>
                                            </ul>
                                        </nav>
                                    </div>
                                    <div class="book_room">
                                        <div class="book_btn">
                                            <a class="popup-with-form" href="A.medi/#test-form">Hacer una cita</a>
                                        </div>
                                    </div>
                                </div>
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
    <div class="slider_area">
        <div class="slider_active owl-carousel">
            <div class="single_slider  d-flex align-items-center slider_bg_1 overlay">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="slider_text ">
                               <?php 
include'login_c.php'
;?>
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
                                <li><a href="#">Pediatria</a></li>
                                <li><a href="#">Cardiología</a></li>
                                <li><a href="#">Alergología</a></li>
                                <li><a href="#">Psiquiatría</a></li>
                                <li><a href="#">Oncología médica</a></li>
                                <li><a href="#">Neumología</a></li>
                                <li><a href="#">Cirugía plástica</a></li>
                                <li><a href="#">Dermatología</a></li>
                                <li><a href="#">Otorrinolaringología</a></li>
                                <li><a href="#">Urología</a></li>
                                <li><a href="#">Ginecología</a></li>
                                <li><a href="#">Oftalmología</a></li>
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
        <div class="copy-right_text">
            <div class="container">
                <div class="row">
                    <div class="bordered_1px "></div>
                    <div class="col-xl-12">
                        <p class="copy_right text-center">
                            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="ti-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                        </p>
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
