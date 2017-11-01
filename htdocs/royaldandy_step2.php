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
	
      
              

        <div id="barber-bg">
            <div id="pre-header" class="container" style="height:40px">
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
  <!-- End Top Menu -->
            <div id="post_header" class="container" style="height: 40px">
                <!-- Spacing below header -->
            </div>
            <div id="content-top-border" class="container">
            </div>
            <!-- === END HEADER === -->


<!-- === BEGIN CONTENT === -->
            <div id="content">
                <div class="container background-white">
                    <div class="container">
                        <div class="row margin-vert-30">
                            <!-- Login Box -->
                            <div class="col-md-6 col-md-offset-3 col-sm-offset-3">

<form action="registration_action.php" method="POST" class="login-page">
	<?php
		// если залогинился то имя фамилия и телефон заполненый автоматически
	echo "<br>Vēlamais datums";
			error_reporting(0);
			date_default_timezone_set('Europe/Riga');
			$dates = array();
			$dates[] = time();
			for ($i = 1; $i < 14; $i++) 
			{ 
				$weekend=date("w",strtotime("+{$i} days"));
				if ($weekend!=0 && $weekend!=6)
					$dates[] = strtotime("+{$i} days"); 
			}
			$html = NULL;
			foreach ($dates as $date) 
			{ 
				$dates .= "<option value='" . date('Y-m-d', $date) . "'>" . date('Y-m-d', $date) . "</option>"; 
			}
			$html = "<select name='dates' id='dates_1'>{$dates}</select>";
			echo $html; 
			//---------------------------------
		
			//---------------------------------

echo "<br>Vēlaimais laiks";
		function namesdr1()
		{
			#echo '<script type="text/javascript">';
			#echo "	location.reload();";
			#echo "</script>";
			
			$hostname = 'localhost';
			$username = 'root';
			$passwordname = 'Baguvix!';
			$basename = 'barbershop';
   			$connection = new mysqli($hostname, $username, $passwordname, $basename) or die ('Nezināmā kļūda savienošanas procesā!');
   			//
   			$hname=htmlspecialchars(trim($_POST['Hairdresser_name']));
   			$query="SELECT `H_ID` FROM `hairdresser` WHERE `Name`='$hname' ";
   			$query_result= $connection->query($query);
			$data=mysqli_fetch_array($query_result);
   			$h_id=$data['H_ID'];
   			//echo $query;
   			//
			$current_date=date("Y-m-d"); 
        	$table_name="H_ID_".$h_id."_".$current_date;
			$query="SELECT `Time` FROM `$table_name` WHERE `Rec_ID` IS NULL";
			//echo $query;
			//
			$query_result= $connection->query($query);
			$namesdr = array();
			while($row = mysqli_fetch_array($query_result))
			    $namesdr[] = $row;
			return $namesdr;
		}

		$namesdr1 = namesdr1();
		echo '<select id="time_reg" name="time_reg" ">'; // переделать. занятое время выкинуть из списка 
		foreach($namesdr1 as $item)
			echo "<option value='".$item['Time']." '>".$item['Time']."</option>";
		echo "</select>";


		echo "<br>";


		// cookies для следующей страницы------------
		$hairdresser_name=htmlspecialchars(trim($_POST['Hairdresser_name']));
		$date=htmlspecialchars(trim($_POST['dates']));
		$email=htmlspecialchars(trim($_POST['email']));
		$time1=$_POST['time_reg'];
		$procedure_name=htmlspecialchars(($_POST['Procedure_name']));

		setcookie("Hairdresser_name", $hairdresser_name, time() + 3600*24); 
		setcookie("dates", $date, time() + 3600*24); 
		setcookie("email", $email, time() + 3600*24); 
		setcookie("time1", $time1, time() + 3600*24); 
		setcookie("procedure_name", $procedure_name, time() + 3600*24); 

		//-------------------------------------------
		?>
			<div class="col-md-6">
		 <button class="btn btn-primary pull-right" type="submit" value="register">Pieteikties apkalpošanai</button>
		 </div>
</form>

       </div>
                            <!-- End Login Box -->
                        </div>
                    </div>
                </div>
            </div>

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