<?php
	require('dbconnect.php');

	$id=$_GET['id'];

	$dbc->delete($id);

?>
<h3>Запись удалена!</h3>
<a href="/addnew.php">добавить новую запись</a> <br>
<a href="/">на главную</a>
