<?php

	// Подключение к БД
	$hostname = 'localhost';	
	$username = 'root';
	$passwordname = 'Baguvix!';
	$basename = 'system';
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

	echo "<h1> Sveiki, $name !";

?>