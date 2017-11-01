<!DOCTYPE html>
<html>
<head>
	<title>Jauno klientu reģistrācija</title>
</head>
<body>
	<h1>Jauno klientu reģistrācijas veidlapa</h1>
		<form action="register.php" method="POST">
		<fieldset>
			<legend>Informācija par jauno (potenciālo) klientu</legend>
			*Lietotājvārds: <br> <input type="text" name="login">
			<br>
			*Parole: <br> <input type="password" name="password">
			<br>
			*Jūsu vārds: <br> <input type="text" name="name">
			<br>
			*Uzvārds: <br> <input type="text" name="surname">
			<br>
			*Jūsu tālruņa numurs: <br> <input type="text" name="telephone">
			<br>
			*Jūsu e-pasts: <br> <input type="text" name="email">
			<br><br>
			<input type="submit" value="Reģistrēt jauno klientu">
		</fieldset>
	</form>
</body>
</html>