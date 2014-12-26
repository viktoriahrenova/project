<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/bootstrap.css">
	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<title>База данных сотрудников</title>
</head>
<body>
	<?php require('dbconnect.php'); ?>
	<?php $emp = $dbc->getHistory($_GET['id']); ?>
	<ul>
		<?php if(!empty($emp)): ?>
			<?php foreach ($emp as $e): ?>
				<li>
					<span>Изменён: <?php echo date('l jS F Y \в h:i:s A', $e['date']); ?> c IP-адреса <?php echo $e['IP']; ?></span> <br>
				</li>
			<?php endforeach; ?>
		<?php else: ?>
			<p>Запись не изменялась</p>
		<?php endif; ?>
	</ul>
	<a href="/info.php?id=<?php echo $_GET['id']; ?>">назад</a> <br>
	<a href="/">на главную</a>

</body>
</html>