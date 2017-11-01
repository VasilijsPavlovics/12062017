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


              <div id="content">
                <div class="container background-white">
                    <div class="row margin-vert-30">
                        <!-- Register Box -->
                        <div class="col-md-12 ">
                            <form class="cab-page"  method="POST">
<?php
    
    if(!(isset($_SESSION['email'])) && !(isset($_SESSION['name'])))
    {
        header('location: index.php');
        exit();
    }

?>

<blockquote class="TabbedPanelsTabGroup"> 
  <p><strong>Lietotāja vadības panelis</strong></p>
  <?php echo "<p><strong>Sveiki, ".$_SESSION['name']. "!</strong></p>";?>
</blockquote>
<div id="TabbedPanels1" class="TabbedPanels">
  <ul class="TabbedPanelsTabGroup">
    <li class="TabbedPanelsTab" tabindex="0">Konta informācija</li>
    <li class="TabbedPanelsTab" tabindex="0">Privātuma iestatījumi</li>
    <li class="TabbedPanelsTab" tabindex="0">Pieteikumi</li>
    <li class="TabbedPanelsTab" tabindex="0">Untitled</li>
  </ul>
  <div class="TabbedPanelsContentGroup">
    <div class="TabbedPanelsContent">
      <p>Vispārīgā informācija</p>
      <hr />
      <?php
        $hostname = 'localhost';    
        $username = 'root';
        $passwordname = 'Baguvix!';
        $basename = 'barbershop';
        $connection = new mysqli($hostname, $username, $passwordname, $basename) or die ('Nezināmā kļūda savienošanas procesā!');
        $email=$_SESSION['email'];
        $query="SELECT * FROM `hairdresser` WHERE `E_mail`='$email'";
        $query_result= $connection->query($query);
        while ($db1 = mysqli_fetch_assoc($query_result))
        {
          echo "<p><b>Vārds:</b> ".$_SESSION['name']."</p>";
          echo "<p><b>Uzvārds:</b> ".$db1['Surname']."</p>";
          echo "<p><b>Lietotāja ID:</b> ".$db1['H_ID']."</p>";
          echo "<p><b>e-pasts:</b> ".$_SESSION['email']."</p>";
          echo "<p><b>Adrese:</b> ".$db1['Address']."</p>";
          echo "<p><b>Status:</b> AKTĪVS </p>";
          echo "<p><b>Piezīmes:</b> ".$db1['Notes']."</p>";
          echo "<p><b>Lietotāja izveidošanas datums: </b>".$db1['Timestamp']."</p>";
        }

      ?>
      <p>&nbsp;</p>
    </div>
    <div class="TabbedPanelsContent">
      <p><b>Epasta adrese</b></p>
      <hr />
      <p>&nbsp;</p>
      <p>
        <label for="email"></label>
        <?php $email= $_SESSION['email']; echo '<input type="text" name="email" id="email" value="$email"/>'; ?>
      </p>
      <p>Paroles maiņa</p>
      <hr />
<p>Pašreizējā parole</p>
      <p>
        <label for="old_password"></label>
        <input type="text" name="old_password" id="old_password" />
      </p>
      <p>Jaunā parole</p>
      <p>
        <label for="new_password"></label>
        <input type="text" name="new_password" id="new_password" />
      </p>
      <p>Atkārtot jauno paroli</p>
      <p>
        <label for="new_password_check"></label>
        <input type="text" name="new_password_check" id="new_password_check" />
      </p>
      <p>
        <input type="submit" name="change_password" id="change_password" value="Mainīt paroli" />
      </p>
    </div>
    <div class="TabbedPanelsContent">
      <p><b>Pieteikties atvalinājumam</b></p>
      <hr />
      <p>Norādiet datumu, līdz atvalinājuma beigām:</p>
      <p>&nbsp;</p>
      <p><b>Deaktivizēt lietotāju</b></p>
      <hr />
      <p>Profils kļūs neaktīvs pārējiet lietotājiem</p>
      <p>
        <input type="submit" name="deactive" id="deactive" value="Deaktivizēt lietotāju" />
      </p>
      <p>&nbsp;</p>
      <p><b>Laicīgi nav pieejama</b></p>
      <hr />
      <p>&nbsp;</p>
      <p>&nbsp;</p>
    </div>
    <div class="TabbedPanelsContent">Content 4</div>
  </div>
</div>
</form>

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
            <script src="SpryAssets/SpryTabbedPanels.js" type="text/javascript"></script>
            <link href="SpryAssets/SpryTabbedPanels.css" rel="stylesheet" type="text/css" />  
            <script type="text/javascript">var TabbedPanels1 = new Spry.Widget.TabbedPanels("TabbedPanels1");</script>
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