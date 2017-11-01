<?php
	error_reporting(E_ALL & ~E_DEPRECATED);
	//if(isset($_POST['Login']) && isset($_POST['Password'])) // если пришли данные
	//{
		//include("db_connection.php");
		//date_default_timezone_set('Riga');

		$hostname = 'localhost';
	   	$username = 'root';
   		$passwordname = 'Baguvix!';
   		$basename = 'system';
   		$connection = new mysqli($hostname, $username, $passwordname, $basename) or die ('Nezināmā kļūda savienošanas procesā!');
		//-------------------------------------------------
		//$login=htmlspecialchars(trim($_POST['login']));
		$password=htmlspecialchars(trim($_POST['password']));
		$name=htmlspecialchars(trim($_POST['name']));
		$surname=htmlspecialchars(trim($_POST['surname']));
		$email=htmlspecialchars(trim($_POST['email']));
		$mobile_number=htmlspecialchars(trim($_POST['telephone']));
		//-------------------------------------------------
		date_default_timezone_set('Europe/Riga');
		$today = date("Y-m-d H:i:s");
		//$query="SELECT * FROM `users` WHERE `Login`='$login'";
		$query="INSERT INTO `client`(`Name`, `Surname`, `Telephone`, `E_mail`,`Timestamp`) VALUES ('$name','$surname','$mobile_number','$email','$today')";
		$query_result= $connection->query($query);
		$data=mysqli_fetch_array($query_result);
		//-----------------------------------------------создания записи в таблице users
		$query="INSERT INTO `users`(`Login`, `Password`) VALUES ('$email','$password')";
		echo "$query";
		$query_result= $connection->query($query);
		$data=mysqli_fetch_array($query_result);

		mysqli_close($connection)
		//Запускаем пользователю сессию
    	//session_start();
	//}
	//else
	//{
		//die("<h1>Kļūda reģistrēšanas laikā. #LOG_1020</h1>");
	//}
?>