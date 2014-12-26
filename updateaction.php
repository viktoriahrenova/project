<?php
	require('dbconnect.php');

	$id=$_POST['id'];
	$name = $_POST['name'];
	$job = $_POST['job'];
	$phone = $_POST['phone'];
	$mail = $_POST['mail'];
	$date = date('U');

	$dbc->update($id, $name, $job, $phone, $mail);
	$dbc->setHistory($_SERVER['REMOTE_ADDR'], $date, $id);

?>
<h3>Запись изменена!</h3>
<a href="/addnew.php">добавить новую запись</a> <br>
<a href="/">на главную</a>
