<?php
	error_reporting(E_ALL & ~E_DEPRECATED);
	if(isset($_POST['Login']) && isset($_POST['Password'])) // если пришли данные
	{
		//include("db_connection.php");
		date_default_timezone_set('UTC+2');

		$hostname = 'localhost';
	   	$username = 'root';
   		$passwordname = 'Baguvix!';
   		$basename = 'barbershop';
   		$connection = new mysqli($hostname, $username, $passwordname, $basename) or die ('Nezināmā kļūda savienošanas procesā!');
		//-------------------------------------------------
		$login=htmlspecialchars(trim($_POST['login']));
		$password=htmlspecialchars(trim($_POST['password']));
		$name=htmlspecialchars(trim($_POST['name']));
		$surname=htmlspecialchars(trim($_POST['surname']));
		$email=htmlspecialchars(trim($_POST['email']));
		$mobile_number=htmlspecialchars(trim($_POST['mobile_number']));
		//-------------------------------------------------
		$today = date("Y-m-d H:i:s");
		//$query="SELECT * FROM `users` WHERE `Login`='$login'";
		$query="INSERT INTO `client`(`Name`, `Surname`, `Telephone`, `E_mail`) VALUES ($name,$surname,$mobile_number,$email)";
		$query_result= $connection->query($query);
		$data=mysqli_fetch_array($query_result);




		//Запускаем пользователю сессию
    	session_start();
	}
	else
	{
		die("<h1>Kļūda reģistrēšanas laikā. #LOG_1020</h1>");
	}
?>