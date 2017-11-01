<?php
	/*$mysql_connect=mysqli_connect("localhost","root","Baguvix!");
	$db=mysqli_select_db("barbershop");*/
	$hostname = 'localhost';
   	$username = 'root';
   	$passwordname = 'Baguvix!';
   	$basename = 'barbershop';
   	$conn = new mysqli($hostname, $username, $passwordname, $basename) or die ('Nezināmā kļūda savienošanas procesā!');
?>