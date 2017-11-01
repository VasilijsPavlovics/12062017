<?php
    session_start();
    if(!(isset($_SESSION['email'])) && !(isset($_SESSION['name'])))
    {
        header('location: index.php');
        exit();
    }
	echo "<h1>Ieraksta pārnešanas panelis</h1>";
	echo "<br>";
?>