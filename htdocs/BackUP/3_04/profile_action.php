<?php

	// Подключение к БД
	$hostname = 'localhost';	
	$username = 'root';
	$passwordname = 'Baguvix!';
	$basename = 'barbershop';
	$connection = new mysqli($hostname, $username, $passwordname, $basename) or die ('Nezināmā kļūda savienošanas procesā!');
	session_start();
	//------------------------------------------------------------------------------------------------------
	
	if($_SESSION['email']==NULL)
	{
		echo "<h1>Pieeja liegta! Tiešā adresācija</h1>";
		exit();
	}

	$email = $_SESSION['email'];
	$name = $_SESSION['name'];

	//echo "<h1> Sveiki, $name !";
	//-------------------------------------

	$query="SELECT `H_ID` FROM `hairdresser` WHERE `E_mail`='$email'";
	//$query_result=$connection->query($query);
	//$data=mysqli_fetch_array($query_result);
	$result=mysqli_query($connection, $query);
	$row_cnt=mysqli_num_rows($result);
	//if (mysqli_num_rows($data)>0)
	if($row_cnt>0)
	{
		header("location: system_profile.php");
		exit();
	}
	else
	{
		header("location: user_profile.php");
		exit();
	}

?>