<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/bootstrap.css">
	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<title>Поиск по базе</title>
</head>
<body>
	<form action="searchaction.php" method="post"> 
		<input type="text" name="data" placeholder="поиск" required>
		<span>Введите ФИО, должность, телефон или email пользователя</span> <br>
		<input type="submit" value="Отправить">
	</form>
</body>
</html>