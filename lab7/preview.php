<html>
<head> 
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<title>Скрипт бекенду</title>
</head>
<style>
input {
	width: 250px;
}
</style>
<body>
<div>
<?php
	if(isset($_POST["input"])) {
		$mysqli = new mysqli ("localhost", "root", "", "lab7");
		$mysqli->query ("SET NAMES 'utf8'");
		$title = $_POST["title"];
		$linktxt = $_POST["linktxt"];
		$copyright = $_POST["copyright"];
		$result_title = $mysqli->query ("UPDATE `title` set txt='$title'");
		$result_title = $mysqli->query ("UPDATE `link` set linktxt='$linktxt'");
		$result_title = $mysqli->query ("UPDATE `copyright` set txt='$copyright'");
	}
?>
<form name="form1" method="post">
		<label>Введите заголовок страницы:</label><br/>
		<input type="text" name="title" placeholder="Мой заголовок!"/><br/>
		<label>Введите текст ссылок:</label><br/>
		<input type="text" placeholder="Подробнее" name="linktxt"/><br/>
		<label>Введите текст рядка копирайта:</label><br/>
		<input type="text" placeholder="Это моя страница! Копирайт запрещен!" name="copyright"/><br/>
		<input type="submit" name="input" value="Отправить"/>
</form>
<form name="form2" action="http://localhost/lab7/preview2.php" method="post">
		<label>Введите кол-во пунктов меню:</label><br/>
		<input type="text" name="menu"/><br/>
		<label>Введите кол-во статей, которые хотите добавить:</label><br/>
		<input type="text" name="articles"/><br/>
		<input type="submit" name="input" value="Далее"/>
</form>
</div>
</body>
</html>