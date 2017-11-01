<?php
	error_reporting(E_ALL & ~E_DEPRECATED);
	if(isset($_POST['Login']) && isset($_POST['Password'])) // если пришли данные
	{
		//include("db_connection.php");
		$hostname = 'localhost';
	   	$username = 'root';
   		$passwordname = 'Baguvix!';
   		$basename = 'barbershop';
   		$connection = new mysqli($hostname, $username, $passwordname, $basename) or die ('Nezināmā kļūda savienošanas procesā!');
		//-------------------------------------------------
		$login=htmlspecialchars(trim($_POST['Login']));
		$password=htmlspecialchars(trim($_POST['Password']));
		//-------------------------------------------------

		$query="SELECT * FROM `users` WHERE `Login`='$login'";
		//$query_result=mysqli_fetch_array($query);
		$query_result= $connection->query($query);
		$data=mysqli_fetch_array($query_result);

		if ($login=="" || $password=="") 
			die ("<h1>Kļuda: Tukšs laukums</h1>");
	//Если такого нет, то пишем что не
	    if(empty($data['Login']))
	        die("Lietotājs neeksistē");
	//Если пароли не совпадают
	    if($password!=$data['Password'])
	        die("Ievadītā parole nav pareizā");

		//Запускаем пользователю сессию
    	session_start();
 
		//Записываем в переменные login и id
	    //$_SESSION['login']=$data['login']; ------------------------- izmenitj
	    //$_SESSION['id']=$data['id'];

	}
	else
	{
		die("<h1>Kļūda ielogošanas laikā. #LOG_1010</h1>");
	}
?>