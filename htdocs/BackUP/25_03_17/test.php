<?php
/*
		$mysql_connect=mysqli_connect("localhost","root","Baguvix!");
		$db=mysqli_select_db("barbershop");


		$query=mysqli_query("SELECT * FROM `users`");
		$query_result=mysqli_fetch_array($query);


echo "--START";
		while ($row = mysqli_fetch_assoc($query_result))
		{
            $U_ID = $row['U_ID'];
            $Login = $row['Login'];
            $Password = $row['Password'];

            echo $U_ID;
            echo $Login;
            echo $Password;

         }

         echo "--END";
*/

    // Подключение к базе: где $hostname - сервер, $username - имя юзера БД,
   // $password - пароль юзера, $basename - имя базы с которой мы будем работать
   $hostname = 'localhost';
   $username = 'root';
   $passwordname = 'Baguvix!';
   $basename = 'barbershop';
   $conn = new mysqli($hostname, $username, $passwordname, $basename) or die       ('Невозможно открыть базу');
   // Формируем запрос из таблицы с именем blog
   $sql = "SELECT * FROM `users`";
   $result = $conn->query($sql); 
   // В цикле перебираем все записи таблицы и выводим их
   while ($row = $result->fetch_assoc())
   {
       // Оператором echo выводим на экран поля таблицы name_blog и text_blog
       echo 'Название блога: '.$row['U_ID'];
       echo 'Текст блога: '.$row['Password'];
   }
?>