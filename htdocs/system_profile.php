<!-- === BEGIN HEADER === -->
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!-->
<html lang="lv">
    <!--<![endif]-->
    <head>
    <meta charset="utf-8">
    <form action="" method="POST">
        <?php session_start();
        if(!(isset($_SESSION['email'])) && !(isset($_SESSION['name'])))
        {
            header('location: 401.php');
            exit();
        }
        if (isset($_POST['parn']))
        {
            $id_p=(int) key($_POST['parn']);
            setcookie("parn", $id_p, time() + 3600*24); 
            header("location: parcelt.php");
        }
            //exit();
        ?>
        <!-- Title -->
        <title>Reserved online</title>
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
            <div id="pre-header" class="container" style="height: 80px">
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
                                if(isset($_SESSION['email']) && isset($_SESSION['name']))
                                {
                                    echo "<li>";
                                    $email_show=$_SESSION['email'];
                                    echo '<a href="profile_action.php" class="fa-gears">'.$email_show.'</a>';
                                    echo "</li>";
                                }
                               ?>
                                <li>
                                    <a href="log_out.php" class="fa-sign-out">Iziet</a>
                                </li>
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
                    <div class="row margin-vert-40">
                        <!-- Begin Sidebar Menu -->
                        <div class="col-md-3">
                            <ul class="list-group sidebar-nav" id="sidebar-nav">
                               
                                <!-- Calendar -->
                                <li class="list-group-item">
                                    <a href="messages.php">Sarakste</a>
                                </li>
                                <li class="list-group-item">
                                    <a href="#">Lokācijas maiņa</a>
                                </li>
                                 <li class="list-group-item">
                                    <a href="#">Ierakstu arhīvs</a>
                                </li>
                                <!-- End Calendar -->
                                <!-- Some Menu -->
                                <li class="list-group-item">
                                    <a href="settings.php">Konta parametri</a>
                                </li>
                                <!-- End Some Menu-->
                                <!-- Registration -->
                                <li class="list-group-item">
                                    <a href="fregistration_action.php">Ātrā reģistrācija</a>
                                </li>
                                <!-- End Registration -->                                
                            </ul>
                        </div>
                        <!-- End Sidebar Menu -->
                        <div class="col-md-9">
                            <h2 class="margin-bottom-30"><?php echo "Sveiki, ".$_SESSION['name']."!"; ?></h2>
                            
                            <div class="margin-bottom-30">
                                <hr>
                            </div>
                            <!-- Accordion - Alternative -->
                            <div id="accordion2" class="panel-group alternative">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a class="accordion-toggle" href="#collapse2-One" data-parent="#accordion2" data-toggle="collapse">
                                                Aktīvi ieraksti
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapse2-One" class="accordion-body collapse in">
                                        <div class="panel-body">
                                            <div class="row">

                                                <div class="col-md-7">
                                                    <h3 class="no-margin no-padding">Tabula</h3>
                                                    <p>
<?php
        $hostname = 'localhost';    
        $username = 'root';
        $passwordname = 'Baguvix!';
        $basename = 'barbershop';
        $connection = new mysqli($hostname, $username, $passwordname, $basename) or die ('Nezināmā kļūda savienošanas procesā!');

        //-----------------------------------------
        // проверка на статус записи
        $email=$_SESSION['email'];
        $query="SELECT `H_ID` FROM `hairdresser` WHERE `E_mail`='$email'"; 
        $query_result= $connection->query($query);
        $data=mysqli_fetch_array($query_result);
        $h_id=$data['H_ID'];

        $current_date=date("Y-m-d"); 
        $table_name="H_ID_".$h_id."_".$current_date;
       // setcookie("table_name", $table_name, time() + 3600*24);

        $query="SELECT * FROM `hairdresser_client` WHERE `H_ID`='$h_id'";
        $query_result= $connection->query($query);       
        while ($db1 = mysqli_fetch_assoc($query_result))
        {
            $rec_id = $db1['Rec_ID'];
            $h_id = $db1['H_ID'];
            $c_id = $db1['C_ID'];
            $laiks = $db1['Time'];
            $datums = $db1['Date'];
            $location1 = $db1['Location'];
            $procedure_name = $db1['S_procedure'];
            $status = $db1['Status'];

            if(date("Y-m-d")>$datums || strcmp($status,"ANULETS")==0) // есои просрочено, тогда в другую таблицу, проверка каждый раз
            {
                $query="INSERT INTO `anul_hairdresser_client` SELECT `Rec_ID`, `H_ID`, `C_ID`,`Time`,`Date`,`Location`,`S_procedure`,`Status` FROM `hairdresser_client`  ";
                $connection->query($query);

                $query="DELETE FROM `hairdresser_client` WHERE `Rec_ID`='$rec_id'"; 
                $connection->query($query);      

                $query="DELETE FROM `$table_name` WHERE `Time`=$laiks";    
                $connection->query($query);   
            }
        }
        //anulēt
        if (isset($_POST['anul'])) 
        {
            $id = (int) key($_POST['anul']);
            $query="INSERT INTO `anul_hairdresser_client` SELECT `Rec_ID`, `H_ID`, `C_ID`,`Time`,`Date`,`Location`,`S_procedure`,`Status` FROM `hairdresser_client`  ";
            $connection->query($query);

            $query="DELETE FROM `hairdresser_client` WHERE `Rec_ID`='$id'"; 
            $connection->query($query); 

            echo "<br>";
            echo "<!> Ieraksts ID:'$id' ir veiksmīgi anulēts";

        }
        // pārcelt



        /*if (isset($_POST['anul']))
        {
            //$id = (int) key($_POST['anul']);
            echo "Vai tiešām Jūs velaties anulēt šo ierakstu? Atcelt šo darbību nebūs iespējams<br>";
            echo '<button class="btn btn-primary pull-right" name="anulet" type="submit" >Anulēt</button>';
            echo '<button class="btn btn-primary pull-right" name="atcelt" type="submit" >Atcelt</button>';

            if(isset($_POST['anulet']))
            {
                $id = (int) key($_POST['anul']);
                $query="INSERT INTO `anul_hairdresser_client` SELECT `Rec_ID`, `H_ID`, `C_ID`,`Time`,`Date`,`Location`,`S_procedure`,`Status` FROM `hairdresser_client`  ";
                $connection->query($query);

                $query="DELETE FROM `hairdresser_client` WHERE `Rec_ID`='$id'"; 
                $connection->query($query); 

                echo "<br>";
                echo "<!> Ieraksts ID:'$id' ir veiksmīgi anulēts";
            }
            if(isset($_POST['atcelt']))
            {
                echo "<!> Operācija atcelta. Ieraksts NAV anulēts!";
            }

        }*/

        //-----------------------------------------
        $email=$_SESSION['email'];
        $query="SELECT `H_ID` FROM `hairdresser` WHERE `E_mail`='$email'";
        $query_result= $connection->query($query);
        $data=mysqli_fetch_array($query_result);
        $h_id=$data['H_ID'];
        $query="SELECT * FROM `hairdresser_client` WHERE `H_ID`='$h_id'";
        $query_result= $connection->query($query);

        echo '<table cellpadding="10" border="1" width="80%">';
        echo '<thead>';
        echo '<tr>';
        echo '<th>Ieraksta ID </th>';
        echo '<th>Frizētāja ID</th>';
        echo '<th>Klienta ID</th>';
        echo '<th>Apkalpošanas laiks</th>';
        echo '<th>Apkalpošanas datums</th>';
        echo '<th>Apkalpošanas vieta</th>';
        echo '<th>Procedūras nosaukums</th>';
        echo '<th>Ieraksta statuss</th>';
        echo '<th>Anulēt ierkastu</th>';
        echo '<th>Pārnest ierakstu</th>';
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';
        while ($db1 = mysqli_fetch_assoc($query_result))
        {
            $rec_id = $db1['Rec_ID'];
            $h_id = $db1['H_ID'];
            $c_id = $db1['C_ID'];
            $laiks = $db1['Time'];
            $datums = $db1['Date'];
            $location1 = $db1['Location'];
            $procedure_name = $db1['S_procedure'];
            $status = $db1['Status'];
            echo '<tr>';
            echo '<td>' . $rec_id . '</td>';
            echo '<td>' . $h_id . '</td>';
            echo '<td>' . $c_id . '</td>';
            echo '<td>' . $laiks . '</td>';
            echo '<td>' . $datums . '</td>';
            echo '<td>' . $location1 . '</td>';
            echo '<td>' . $procedure_name . '</td>';
            echo '<td>' . $status . '</td>';
            echo '<td> <button class="btn btn-primary pull-right" name="anul['.$rec_id.']" type="submit" >Anulēt</button> </td>';
            echo '<td> <button class="btn btn-primary pull-right" name="parn['.$rec_id.']" type="submit" >Pārnest</button> </td>';
            echo '</tr>';          
        }
        echo '</tbody>';
        echo '</table>';
        //--------------------------------------------------------------------------------------------------------------
        // !!!!! Создать надо  много таблиц, так как тгда не получиться зарегистрироваться на другие дни 


        //---------------------------------------------


        $dates = array();
        $dates[] = time();
        for ($i = 1; $i < 14; $i++) 
        { 
            $weekend=date("w",strtotime("+{$i} days"));
            if ($weekend!=0 && $weekend!=6)
                $dates[] = strtotime("+{$i} days"); 
        }
        foreach ($dates as $date) 
        {
            $dates = date('Y-m-d', $date); 
            $table_name="H_ID_".$h_id."_".$dates;
            $query="CREATE TABLE `$table_name` (
                `Time` time NOT NULL,
                `Rec_ID` varchar(50),
                UNIQUE (`Time`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_latvian_ci";
            $query_result= $connection->query($query);
            //
            for ($i=10; $i<20 ; $i++) 
            { 
                $query="INSERT INTO `$table_name`(`Time`) VALUES ('$i:00')";
                $query_result= $connection->query($query);
            }
        }
?>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a class="accordion-toggle" href="#collapse2-Two" data-parent="#accordion2" data-toggle="collapse">
                                                Anulētie ieraksti
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapse2-Two" class="accordion-body collapse">
                                        <div class="panel-body">
                                            <p>Some info from Calendar or other things</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a class="accordion-toggle" href="#collapse2-Three" data-parent="#accordion2" data-toggle="collapse">
                                                Sample Heading 3
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapse2-Three" class="accordion-body collapse">
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-md-5">
                                                    <img src="assets/img/fillers/filler3.jpg" alt="filler image">
                                                </div>
                                                <div class="col-md-7">
                                                    <h3 class="no-margin no-padding">Same</h3>
                                                    <p>Same things</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Accordion - Alternative -->
                            <div class="margin-bottom-30">
                                <hr>
                            </div>
                         
                           
                        </div>
                    </div>
                </div>
            </div>
            <!-- === END CONTENT === -->
              <div id="content-bottom-border" class="container">
            </div>
              <!-- Footer Menu -->
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
            </form>
    </body>