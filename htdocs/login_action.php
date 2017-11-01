<?php
	error_reporting(E_ALL & ~E_DEPRECATED);
	if(isset($_POST['Login']) && isset($_POST['Password'])) // если пришли данные
	{
		//include("db_connection.php");
		$hostname = 'localhost';
	   	$username = 'root';
   		$passwordname = 'Baguvix!';
   		$basename = 'system';
   		$connection = new mysqli($hostname, $username, $passwordname, $basename) or die ('Nezināmā kļūda savienošanas procesā!');
		//-------------------------------------------------
		$login=htmlspecialchars(trim($_POST['Login']));
		$password=htmlspecialchars(trim($_POST['Password']));
		//-------------------------------------------------

		$query="SELECT * FROM `users` WHERE `Login`='$login'"; 
		$query_result= $connection->query($query);
		$data=mysqli_fetch_array($query_result);

		if ($login=="" || $password=="") 
			die ("<h1>Kļūda: Tukšs laukums</h1>");

		//Если такого нет, то пишем что не
	    if(empty($data['Login']))
	        die("Lietotājs neeksistē");

		//Если пароли не совпадают
	    if($password!=$data['Password'])
	        die("Ievadītā parole nav pareizā");

		//Запускаем пользователю сессию
    	session_start();
	    $_SESSION['email']=$data['Login'];
	    
		$query="SELECT `Name` FROM `client` WHERE `E_mail`='$login'";
		$query_result= $connection->query($query);
		$data=mysqli_fetch_array($query_result);

		//------ если нет ответа
		if ($data['Name']==NULL)
		{
	   		$basename = 'barbershop';
	   		$connection = new mysqli($hostname, $username, $passwordname, $basename) or die ('Nezināmā kļūda savienošanas procesā!');	

	   		$query="SELECT `Name` FROM `hairdresser` WHERE `E_mail`='$login'";
	   		$query_result= $connection->query($query);
	   		$data=mysqli_fetch_array($query_result);
   		}
		//---------------------

	    $_SESSION['name']=$data['Name'];
	    header("location: profile_action.php");

	}
	else
	{
		die("<h1>Kļūda ielogošanas laikā. #LOG_1010</h1>");
	}
?>