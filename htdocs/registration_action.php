<?php
   	$date=htmlspecialchars(trim($_POST['dates']));
      $time1=$_POST['time_reg'];

      $hairdresser_name=$_COOKIE["Hairdresser_name"];
      $email=$_COOKIE["email"];
      $procedure_name=$_COOKIE["procedure_name"];     

      $hostname = 'localhost';
      $username = 'root';
      $passwordname = 'Baguvix!';
      $basename = 'system';
      $connection = new mysqli($hostname, $username, $passwordname, $basename) or die ('Nezināmā kļūda savienošanas procesā!');

      $query="SELECT `C_ID` FROM `client` WHERE `E_mail`='$email'";
      $query_result= $connection->query($query);
      $data=mysqli_fetch_array($query_result);
      $c_id=$data['C_ID'];
      echo $c_id;

      $hostname = 'localhost';
      $username = 'root';
      $passwordname = 'Baguvix!';
      $basename = 'barbershop';
      $connection = new mysqli($hostname, $username, $passwordname, $basename) or die ('Nezināmā kļūda savienošanas procesā!');        

   	$query="SELECT `H_ID` FROM `hairdresser` WHERE `Name`='$hairdresser_name'"; 
   	echo $hairdresser_name;
   	echo $query;
		$query_result= $connection->query($query);
		$data=mysqli_fetch_array($query_result);
   	$h_id=$data['H_ID'];
   	echo $h_id;

      $query="SELECT `Location` FROM `hairdresser_location` WHERE `H_ID`='$h_id' AND `Date`='$date'"; 
      echo "<br>";
      echo $query;
      $query_result= $connection->query($query);
      $data=mysqli_fetch_array($query_result);
      $location= $data['Location'];

      $query="INSERT INTO `hairdresser_client`(`H_ID`, `C_ID`,`Time`, `Date`, `Location`,`S_procedure`, `Status`) VALUES ('$h_id','$c_id','$time1','$date','$location','$procedure_name','AKTĪVS')";
      $query_result= $connection->query($query);
      $data=mysqli_fetch_array($query_result);
      echo $query;

      $query="SELECT `Rec_ID` FROM `hairdresser_client` WHERE `C_ID`='$c_id' ";
      $query_result= $connection->query($query);
      $data=mysqli_fetch_array($query_result);
      $rec_id=$data['Rec_ID'];

      $current_date=$date; 
      $table_name="H_ID_".$h_id."_".$current_date;

      $query="UPDATE `$table_name` SET `Time`='$time1',`Rec_ID`=$rec_id WHERE `Time`='$time1' ";
      $query_result= $connection->query($query);
      echo $query;
      echo "<br>";
      echo $current_date;
?>