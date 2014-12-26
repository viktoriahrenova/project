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
	<?php $history = $dbc->getLastEdit($_GET['id']); ?>
	<dl>
		<dt>ID:</dt>
		<dd><?php echo $emp['id']; ?></dd>
		<dt>ФИО:</dt>
		<dd><?php echo $emp['name']; ?></dd>
		<dt>Должность:</dt>
		<dd><?php echo $emp['job']; ?></dd>
		<dt>Телефон:</dt>
		<dd><?php echo $emp['phone']; ?></dd>
		<dt>Email:</dt>
		<dd><?php echo $emp['email']; ?></dd>
	</dl>
	<?php if (!empty($history)): ?>
		<span>Последнее изменение: <?php echo date('l jS F Y \в h:i:s A', $history['date']); ?> c IP-адреса <?php echo $history['IP']; ?></span> <br>
		<a href="/history.php?id=<?php echo $emp['id']; ?>">полная история правок</a> <br>
	<?php endif; ?>
	
	<a href="/edit.php?id=<?php echo $emp['id']; ?>">изменить</a> <br>
	<a href="/">на главную</a>
</body>
</html>