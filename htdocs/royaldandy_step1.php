<!DOCTYPE html>
<html>
<head>
 <?php
            session_start();
        ?>
	<meta charset="utf-8">
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

<div id="barber-bg">
              <ul class="social-icons pull-right hidden-xs">               
                <li class="social-instagram">
                    <a href="https://www.instagram.com/royaldandybarbers/" target="_blank" title="Instagram"></a>
                </li>
                <li class="social-facebook">
                    <a href="https://www.facebook.com/royaldandy.lv/?fref=ts" target="_blank" title="Facebook"></a>
                </li>
               
            </ul>
            <div id="pre-header" class="container" style="height: 40px">
                <!-- Spacing above header -->
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
            <!-- Top Menu -->
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
            <div id="post_header" class="container" style="height: 40px">
                <!-- Spacing below header -->
            </div>
            <div id="content-top-border" class="container">
            </div>
            <!-- === END HEADER === -->


 <!-- === BEGIN CONTENT === -->
            <div id="content">
                <div class="container background-white">
                    <div class="row margin-vert-30">
                        <!-- Register Box -->
                        <div class="col-md-6 col-md-offset-3 col-sm-offset-3">
                            <form class="signup-page" action="royaldandy_step2.php" method="POST">
                                <div class="signup-header">                                    
                                </div>
                                
                                <label>Vārds                                 
                                </label>
                                <input class="form-control margin-bottom-20" type="text" name="name">

                                <label>Uzvārds                                
                                </label>
                                <input class="form-control margin-bottom-20" type="text" name="surname">


                                <label>Telefona Numurs                                   
                                </label>
                                <input class="form-control margin-bottom-20" type="text"  name="telephone">
                                 
                                
                                <label>E-pasts                                
                                </label>
                                <input class="form-control margin-bottom-20" type="text" name="email">                            


                                

                               
<?php
		
		echo "Izvēlēties Frizieri &nbsp &nbsp&nbsp ";
		
		function namesdr()
		{
			$hostname = 'localhost';
			$username = 'root';
			$passwordname = 'Baguvix!';
			$basename = 'barbershop';
   			$connection = new mysqli($hostname, $username, $passwordname, $basename) or die ('Nezināmā kļūda savienošanas procesā!');
			$query="SELECT `Name` FROM `hairdresser`";
			$query_result= $connection->query($query);
			$namesdr = array();
			while($row = mysqli_fetch_array($query_result))
			    $namesdr[] = $row;
			return $namesdr;
		}

		$namesdr = namesdr();
		echo "<select name='Hairdresser_name'>";
		foreach($namesdr as $item)
			echo "<option value='".$item['Name']." '>".$item['Name']."</option>";
		echo "</select>";

		
		echo "<br>";
		echo "<br>";
		echo "Izvēlēties Procedūru";
		echo "<a>  </a>";
		function names()
		{
			$hostname = 'localhost';
			$username = 'root';
			$passwordname = 'Baguvix!';
			$basename = 'barbershop';
   			$connection = new mysqli($hostname, $username, $passwordname, $basename) or die ('Nezināmā kļūda savienošanas procesā!');
			$query="SELECT `Name` FROM `all_procedures`";
			$query_result= $connection->query($query);
			$names = array();
			while($row = mysqli_fetch_array($query_result))
			    $names[] = $row;
			return $names;
		}

		$names = names();
		echo "<select name='Procedure_name'>";
		foreach($names as $item)
			echo "<option value='".$item['Name']." '>".$item['Name']."</option>";
		echo "</select>";
		echo "<br>";
		echo "<br>";
		echo "<br>";

?>

                                
                                <hr>
                                <div class="row">
                                    <div class="col-lg-8">
                                        
                                    </div>
                                    <div class="col-lg-4 text-right">
                                        <button class="btn btn-primary" type="submit" value="Ielogoties">Nākamais solis</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- End Register Box -->
                    </div>
                </div>
            </div>
            <!-- === END CONTENT === -->                        
     <!--<a href="royaldandy_step2.php" class="fa-gears">Next> </a>-->
               


               <!-- Footer Menu -->
         <div id="content-bottom-border" class="container">
            </div>
            <div id="footer">
                <div class="container">
                    <div class="row">
                        <div id="footermenu" class="col-md-8">
                            <ul class="list-unstyled list-inline">
                                <li>
                                    <a href="#" target="_blank">Contact Us</a>
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