<?php
	// fast registration
	$hostname = 'localhost';
	$username = 'root';
	$passwordname = 'Baguvix!';
	$basename = 'barbershop';
   	$connection = new mysqli($hostname, $username, $passwordname, $basename) or die ('Nezināmā kļūda savienošanas procesā!');
   	session_start();
   	date_default_timezone_set('Europe/Riga');

   	if($_SESSION['email']==NULL)
   	{
   		header("location: 404.php");
   		exit();
   	}

   	$email = $_SESSION['email'];
	$name = $_SESSION['name'];

	$query="SELECT `H_ID` FROM `hairdresser` WHERE `E_mail`='$email'";                                                     
	$query_result= $connection->query($query);
	$data=mysqli_fetch_array($query_result);
	$h_id=$data['H_ID'];
	$current_time=strftime('%H:%M');;
	$current_date=date("Y-m-d"); 

	echo $current_date; echo "<br>";
	echo $current_time; echo "<br>";
	

	$query="SELECT `Location` FROM `hairdresser_location` WHERE `H_ID`='$h_id' AND `Date`='$current_date'"; // kosjak!
	$query_result= $connection->query($query);
	$data=mysqli_fetch_array($query_result);
	$currect_location=$data['Location'];
	echo $query;
	echo "<location:>"; echo $currect_location; echo "<br>";

   	$query="INSERT INTO `hairdresser_client`(`H_ID`, `C_ID`,`Time`, `Date`, `Location`,`S_procedure`,`Status`) VALUES ('$h_id','0','$current_time','$current_date','$currect_location','nav zināma','OK')";
   	echo $query;
      $query_result= $connection->query($query);

      header("location: system_profile.php");
?>