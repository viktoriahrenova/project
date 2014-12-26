<?php
	require('dbconnect.php');

	/* Получаем данные, которые мы передали на предыдущей странице, из массива POST*/
	$name = $_POST['name'];
	$job = $_POST['job'];
	$phone = $_POST['phone'];
	$mail = $_POST['mail'];

	/* Добавляем данные в базу */
	$dbc->add($name, $job, $phone, $mail);

?>
<h3>Запись добавлена!</h3>
<a href="/addnew.php?new=true">добавить ещё одну запись</a> <br>
<a href="/">на главную</a>
