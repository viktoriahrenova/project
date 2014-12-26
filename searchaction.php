<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/bootstrap.css">
	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<title>Результаты поиска</title>
</head>
<body>
	<?php require('dbconnect.php'); ?>
	<?php if(!empty($_POST['data'])) {
		$emp = $dbc->search($_POST['data']); 
	} ?>
	
		<?php if(!empty($emp)): ?>
		<ul>
			<?php foreach ($emp as $e): ?>
				<li><?php echo $e['name']; ?> <br>
					<a href="/info.php?id=<?php echo $e['id']; ?>">просмотр</a>
				</li>
			<?php endforeach; ?>
		</ul>
		<?php else: ?>
		<span>Ничего не найдено по запросу "<?php echo $_POST['data']; ?>". Вернёмся на главную или попробуем ещё раз?</span> <br>
		<?php endif; ?>
		<a href="/">На главную</a> <br>
		<a href="/search.php">Новый поиск</a>
</body>
</html>

<!-- 
TODO: 
	1. валидация всего и вся, вывод ошибок
	+2. ещё одна табличка для сохранения, кто и когда менял (id, ip, date)
	+3. слитие действий сохранения и апдейта
	ultimate bonus level!!! AJAX
-->