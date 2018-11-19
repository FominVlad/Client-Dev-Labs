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
<form action="http://localhost/lab7/doc.php">
	<input type="submit" name="input3"  value="Отправить"/>
</form>
<?php
	$menu = $_POST['menu'];
	$articles = $_POST['articles'];
	$mysqli = new mysqli ("localhost", "root", "", "lab7");
	$mysqli->query ("SET NAMES 'utf8'");
		for ($i = 1; $i <= $articles; $i++) {
			$section = $_POST["section$i"];
			$sectionlink = $_POST["sectionlink$i"];
			$topic = $_POST["topic$i"];
			$date = $_POST["date$i"];
			$link = $_POST["link$i"];
			
			$txt = $_POST["txt$i"];
			$mysqli->query ("INSERT INTO `articles`(`id`, `section`, `sectionlink`, `topic`, `txt`, `date`, `link`) VALUES (NULL,'$section','$sectionlink','$topic','$txt','$date','$link')");
		}
		if ($menu > 0) {
			$mysqli->query ("DELETE FROM `menu`");
		}
		for ($i = 1; $i <= $menu; $i++) {
			$menulink = $_POST["menulink$i"];
			$menutxt = $_POST["menutxt$i"];
			$mysqli->query ("INSERT INTO `menu`(`txt`, `link`) VALUES ('$menutxt','$menulink')");
		}
?>
</body>
</html>