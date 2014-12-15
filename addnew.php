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
	<?php if($_GET['new'] != true) {
		$emp = $dbc->getEmployee($_GET['id']); 
	} ?>
	<form action="<?php echo ($_GET['new'] == true) ? 'saveaction.php'  : 'updateaction.php'; ?>" method="post"> 
		<input type="text" name="name" placeholder="ФИО" value="<?php if(!empty($emp)) echo $emp['name']; ?>" required>
		<span>ФИО</span> <br>
		<input type="text" name="job" placeholder="Должность" value="<?php if(!empty($emp)) echo $emp['job']; ?>" required>
		<span>Должность</span> <br>
		<input type="tel" name="phone" placeholder="Телефон" value="<?php if(!empty($emp)) echo $emp['phone']; ?>" required>
		<span>Телефон</span> <br>
		<input type="email" name="mail" placeholder="email" value="<?php if(!empty($emp)) echo $emp['email']; ?>" required>
		<span>Email</span> <br>
		<input type="submit" value="Отправить">
	</form>
</body>
</html>