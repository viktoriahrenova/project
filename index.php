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
	<?php $emp = $dbc->getEmployees(); ?>
	<ul>
		<?php if(!empty($emp)): ?>
			<?php foreach ($emp as $e): ?>
				<li><?php echo $e['name']; ?> <br>
					<a href="/info.php?id=<?php echo $e['id']; ?>">просмотр</a>
					<a href="/addnew.php?id=<?php echo $e['id']; ?>">изменить</a>
					<a href="/deleteaction.php?id=<?php echo $e['id']; ?>" onclick="return confirmDelete();">удалить</a>
				</li>
			<?php endforeach; ?>
		<?php endif; ?>
	</ul>
	<a href="/addnew.php?new=true">Добавить нового</a> <br>
	<a href="/search.php">Поиск</a>
<script>
function confirmDelete() {
    if (confirm("Удалить запись о сотруднике?")) {
        return true;
    } else {
        return false;
    }
}
</script>
</body>
</html>

<!-- 
TODO: 
	1. валидация всего и вся, вывод ошибок
	+2. ещё одна табличка для сохранения, кто и когда менял (id, ip, date)
	+3. слитие действий сохранения и апдейта
	ultimate bonus level!!! AJAX
-->