<!DOCTYPE html>
<html>
<head>
	<title>Пример капчи</title>
</head>
<body>
	<form action="check.php" method="POST">
		<label>
			Имя:
			<input type="text" name="first_name">
		</label>
		<br />
		<label>
			Символы с картинки:
			<img src="img.php" />
		</label>
		<br />
		<br />
		<input type="submit" value="Я не робот">
	</form>
</body>
</html>