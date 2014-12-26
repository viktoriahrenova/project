<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/bootstrap.css">
	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<title>Document</title>
</head>
<body>
	<?php require('dbconnect.php'); ?>
	<?php  $emp = $dbc->getEmployee($_GET['id']); ?>
	<form action="updateaction.php" method="post">
		<span><b>ID:</b> <?php echo $emp['id']; ?></span> <br>
		<input type="text" name="name" placeholder="ФИО" value="<?php echo $emp['name']; ?>" required>
		<span>ФИО</span> <br>
		<input type="text" name="job" placeholder="Должность" value="<?php echo $emp['job']; ?>" required>
		<span>Должность</span> <br>
		<input type="tel" name="phone" placeholder="Телефон" value="<?php echo $emp['phone']; ?>" required>
		<span>Телефон</span> <br>
		<input type="email" name="mail" placeholder="email" value="<?php echo $emp['email']; ?>" required>
		<span>Email</span> <br>
		<input type="hidden" name="id" value="<?php echo $emp['id']; ?>">
		<input type="submit" value="Отправить">
	</form>
</body>
</html>