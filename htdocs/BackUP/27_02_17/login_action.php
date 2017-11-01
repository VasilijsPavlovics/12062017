<?php
	error_reporting(E_ALL & ~E_DEPRECATED);
	if(isset($_POST['Login']) && isset($_POST['Password'])) // если пришли данные
	{
		include("db_connection.php");
		//-------------------------------------------------
		$login=htmlspecialchars(trim($_POST['Login']));
		$password=htmlspecialchars(trim($_POST['Password']));
		//-------------------------------------------------

		$query=mysql_query("SELECT * FROM `users` WHERE `Login`='$Login'");
		$query_result=mysql_fetch_array($query);

		if(empty($query_result['Login']))
		{
			die("<h1>Kļūda: Lietotājs neeksistē</h1>");
		}

	}
	else
	{
		die("<h1>Kļūda ielogošanas laikā. #LOG_1010</h1>");
	}
?>