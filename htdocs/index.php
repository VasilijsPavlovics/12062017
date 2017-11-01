
<!DOCTYPE html>
<html>
 <head>
        <?php
            session_start();
        ?>
        <!-- Title -->
        <title>Reserved Online</title>
        <!-- Meta -->
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <meta name="description" content="">
        <meta name="author" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
        <!-- Favicon -->
        <link href="favicon.ico" rel="shortcut icon">
        <!-- Bootstrap Core CSS -->
        <link rel="stylesheet" href="assets/css/bootstrap.css" rel="stylesheet">
        <!-- Template CSS -->
        <link rel="stylesheet" href="assets/css/animate.css" rel="stylesheet">
        <link rel="stylesheet" href="assets/css/font-awesome.css" rel="stylesheet">
        <link rel="stylesheet" href="assets/css/nexus.css" rel="stylesheet">
        <link rel="stylesheet" href="assets/css/responsive.css" rel="stylesheet">
        <link rel="stylesheet" href="assets/css/custom.css" rel="stylesheet">
        <!-- Google Fonts-->
        <link href="http://fonts.googleapis.com/css?family=Roboto+Condensed:400,300" rel="stylesheet" type="text/css">
        <link href="http://fonts.googleapis.com/css?family=PT+Sans" type="text/css" rel="stylesheet">
        <link href="http://fonts.googleapis.com/css?family=Roboto:400,300" rel="stylesheet" type="text/css">
    </head>
<body>	
	
	<!--  perestala rabotatj hz pochemu<a href="action.php">Pieteikties apkalpošanai</a> <br> -->

          <div id="body-bg">
            <div id="pre-header" class="container" style="height:150px">
            </div>
            <div id="header">
                <div class="container">
                    <div class="row">
                        <!-- Logo -->
                        <div class="logo">
                            <a href="index.php" title="">
                                <img src="assets/img/logo_opt.png" alt="Logo" />
                            </a>
                        </div>
                        <!-- End Logo -->
                    </div>
                </div>
             </div>

<div id="hornav" class="container no-padding">
                <div class="row">
                    <div class="col-md-12 no-padding">
                        <div class="text-center visible-lg">
                            <ul id="hornavmenu" class="nav navbar-nav">
                                <li>
                                    <a href="index.php" class="fa-home">Galvenā lapa</a>
                                </li>
                              <li>
                                    <a href="services.php" class="fa-th">Servisi</a>
                                </li>
                                <?php
                                //---------------------------------------------------name/profile_
                                if(isset($_SESSION['email']) && isset($_SESSION['name']))
                                {
                                    echo "<li>";
                                    $name_show=$_SESSION['name'];
                                    echo '<a href="profile_action.php" class="fa-gears">'.$name_show.'</a>';
                                    echo "</li>";
                                }
                                else
                                {
                                    echo "<li>";
                                    echo '<a href="new_client_registration.php" class="fa-gears">Reģistrācija</a>';
                                    echo "</li>";
                                }
                                //------------------------------------------------------login/out

                                if(isset($_SESSION['email']) && isset($_SESSION['name']))
                                {
                                    echo "<li>";
                                    echo ('<a href="log_out.php" class="fa-sign-out">Iziet</a>');
                                    echo "</li>";
                                }
                                else
                                {
                                echo "<li>";
                                    echo '<a href="login.php" class="fa-sign-in">Ieiet</a>';
                                echo "</li>";
                                }
                                ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

<!-- === BEGIN CONTENT === -->
            <div id="content">
                <div class="container no-padding">
                    <div class="row">
                                                
                            

                     <div class="container background-white">
                    <div class="row margin-vert-30">
                        <!-- Main Text -->
                        <div class="col-md-12">
                            <h2 class="text-center">Laipni lūgti Reserved Online</h2>                         
                            <p class="text-center">Reserved Online ir vairāku uzņemumu apkopots serviss, kurš dod iespēju ātri reģistrēties nepiešamajā Jums pakalpojumā.  </p>
                        </div>
                        <!-- End Main Text --> 
                        </div>
                        </div>
                        <div class="container background-gray-lighter">
                    <div class="row padding-vert-20">
                        <div class="col-md-1">
                        </div>
                        <div class="col-md-10">
                            <!-- Portfolio -->
                            <ul class="portfolio-group">
                                <!-- Portfolio Item -->
                                <li class="col-md-6 portfolio-item margin-bottom-40 filer-code">
                                    <a href="royaldandy_step1.php">
                                        <figure class="animate fadeInLeft">
                                            <img alt="image1" src="assets/img/portfolio/royaldandy.jpg">
                                            <figcaption>
                                                <h3>Royal Dandy Barber Shop</h3>
                                               <!-- <span>Barber is one of the most recognized and respected professions. The work of the barbershop is to work with each person individually, it takes to get the image of his character, personality and taste. The process of creating hairdos and cuts is in relation to the works of any other form of activity. The work to do hairstyles and cuts is basically the closest thing to a sculptor of art. Hairstyle is the sculpture itself and contributes to the creation of their artistic image.</span> -->
                                            </figcaption>
                                        </figure>
                                    </a>
                                </li>
                                <!-- //Portfolio Item// -->
                                <!-- Portfolio Item -->
                                <li class="col-md-6 portfolio-item margin-bottom-40 filer-code">
                                    <a href="royaldandy_step1.php">
                                        <figure class="animate fadeInRight">
                                            <img alt="image2" src="assets/img/portfolio/royaldandy.jpg">
                                            <figcaption>
                                                <h3>Royal Dandy Barber Shop</h3>
                                                
                                            </figcaption>
                                        </figure>
                                    </a>
                                </li>
                                <!-- //Portfolio Item// -->
                                <!-- Portfolio Item -->
                                <li class="col-md-6 portfolio-item margin-bottom-40 filer-code">
                                    <a href="royaldandy_step1.php">
                                        <figure class="animate fadeInLeft">
                                            <img alt="image3" src="assets/img/portfolio/royaldandy.jpg">
                                            <figcaption>
                                                <h3>Royal Dandy Barber Shop</h3>
                                               
                                            </figcaption>
                                        </figure>
                                    </a>
                                </li>
                                <!-- //Portfolio Item// -->
                                <!-- Portfolio Item -->
                                <li class="col-md-6 portfolio-item margin-bottom-40 filer-code">
                                    <a href="royaldandy_step1.php">
                                        <figure class="animate fadeInRight">
                                            <img alt="image4" src="assets/img/portfolio/royaldandy.jpg">
                                            <figcaption>
                                                <h3>Royal Dandy Barber Shop</h3>
                                                
                                            </figcaption>
                                        </figure>
                                    </a>
                                </li>
                                <!-- //Portfolio Item// -->
                               
                               
                            </ul>
                            <!-- End Portfolio -->
                        </div>
                        <div class="col-md-1">
                        </div>
                    
                    


                   
                   
                          
                           
                         
                        </div>
                    </div>
                </div>
            </div>
            <!-- === END CONTENT === -->


           
            
            <!-- Footer Menu -->
            <div id="footer">
                <div class="container">
                    <div class="row">
                        <div id="footermenu" class="col-md-8">
                            <ul class="list-unstyled list-inline">
                                <li>
                                    <a href="#" target="_blank">Sample Link</a>
                                </li>
                                <li>
                                    <a href="#" target="_blank">Sample Link</a>
                                </li>
                                <li>
                                    <a href="#" target="_blank">Sample Link</a>
                                </li>
                                <li>
                                    <a href="#" target="_blank">Sample Link</a>
                                </li>
                            </ul>
                        </div>
                        <div id="copyright" class="col-md-4">
                            <p class="pull-right">(c) 2017 Reserved online</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Footer Menu -->
            <!-- JS -->
            <script type="text/javascript" src="assets/js/jquery.min.js" type="text/javascript"></script>
            <script type="text/javascript" src="assets/js/bootstrap.min.js" type="text/javascript"></script>
            <script type="text/javascript" src="assets/js/scripts.js"></script>
            <!-- Isotope - Portfolio Sorting -->
            <script type="text/javascript" src="assets/js/jquery.isotope.js" type="text/javascript"></script>
            <!-- Mobile Menu - Slicknav -->
            <script type="text/javascript" src="assets/js/jquery.slicknav.js" type="text/javascript"></script>
            <!-- Animate on Scroll-->
            <script type="text/javascript" src="assets/js/jquery.visible.js" charset="utf-8"></script>
            <!-- Sticky Div -->
            <script type="text/javascript" src="assets/js/jquery.sticky.js" charset="utf-8"></script>
            <!-- Slimbox2-->
            <script type="text/javascript" src="assets/js/slimbox2.js" charset="utf-8"></script>
            <!-- Modernizr -->
            <script src="assets/js/modernizr.custom.js" type="text/javascript"></script>
            <!-- End JS -->
    </body>

</html>