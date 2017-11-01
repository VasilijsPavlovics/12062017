<?php
    /*error_reporting(E_ALL & ~E_DEPRECATED);
    $user_data['name']='';
    $user_data['surname']='';
    $fri_uzvards='';
    $fri_vards='';
    session_start();
    if(isset($_SESSION['login']) && isset($_SESSION['id']))
    {
     
        include("bd.php");
        $user=$_SESSION['login'];
        $res=mysql_query("SELECT * FROM `users` WHERE `login`='$user' ");
        $user_data=mysql_fetch_array($res);
        $fri_vards=$user_data['name'];
        $fri_uzvards=$user_data['surname'];
        echo "<h3>Sveiki, <b>". $user_data['name'].". !</b></h3>";
        echo "<center>";
        echo "</center>";
    }
    mysql_connect("localhost", "root", "Baguvix!"); // 
    mysql_select_db("client");
    $qquery="SELECT fr_vards, fr_uzvards FROM frizieres WHERE fr_vards='$fri_vards' AND fr_uzvards='$fri_uzvards';";
    $friz_klient=mysql_query($qquery);
    $nr=mysql_num_rows($friz_klient);
    if($nr>0)
    {
        echo "<h2><br><br><center>Funkcija ir atspējota, sakarā ar Jūsu statusu: Frizētāja</center></h2>";
        echo "<h2><center>Ja informācija ir kļūdaina, veršaties pie administratora</center></h2>";
        echo "<h4><center>ERR_USER_MODE_REG_KL_FR</center></h4>"; // номер проблемы 
        mysql_close();
        exit();
    }
    */
?>


<?php
    error_reporting(0);
//Проверяем пришли ли данные
if(isset($_POST['login']) && isset($_POST['password']))
{
//Записываем все в переменные
    $login=htmlspecialchars(trim($_POST['login']));
    $password=htmlspecialchars(trim($_POST['password']));
    $name=htmlspecialchars(trim($_POST['name']));
    $surname=htmlspecialchars(trim($_POST['surname']));
    $city=htmlspecialchars(trim($_POST['city']));
 
//Проверяем на пустоту
    if($login=="" || $password=="" || $name=="" || $surname=="")
    {
        die("<h1>ATTEIUKUMS REĢISTRĀCIJĀ<br>Jums jāaizpilda visus laukumus, kuri atzīmēti ar *</h1>");
        echo "Atteikums";
    }
 
//Подключаем базу данных
    include("bd.php");
 
//Достаем из БД информацию о введенном логине
    $res=mysql_query("SELECT `login` FROM `users` WHERE `login`='$login' ");
    $data=mysql_fetch_array($res);
 
//Если он не пуст, то значит такой уже есть
    if(!empty($data['login']))
    {
        die("<h1>ATTEIUKUMS REĢISTRĀCIJĀ<br>Šāds lietotājvārds ir aizņemts!</h1>");
    }
 
//Проверяем длину пароля
    if(strlen($password)<7)
    {
        die("<h1>ATTEIUKUMS REĢISTRĀCIJĀ<br>Paroles garums jābūt lielāks par 7 simboliem!</h1>");
    }
 
//Вставляем данные в БД 
    $query="INSERT INTO `users` (`login`,`password`,`name`,`surname`,`city`) VALUES('$login','$password','$name','$surname','$city') ";
    $result=mysql_query($query);
 
//Если данные успешно занесены в таблицу
    if($result==true)
    {
        echo "<h1>REĢISTRĀCIJA VEIKSMĪGA</h1><br><h2>Tagad Jūs varāt autorizēties sistēmā</h2> <br><a href='index.php'>Atgriezties mājas lapā</a>";
    }
//Если не так, то выводим ошибку
    else
    {
        echo "KĻŪDA! >> ". mysql_error();
    }
}
?>