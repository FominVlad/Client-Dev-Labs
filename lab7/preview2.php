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

</div>
<form name="myform2" action="http://localhost/lab7/preview3.php" method="post">
<?php
	$menu = $_POST['menu'];
	$intmenu = (integer) $menu;
	$articles = $_POST['articles'];
	$intarticles = (integer) $articles;
	$_POST['articles'] = $articles;
	$_POST['menu'] = $menu;
	
	for ($i = 1; $i <= $articles; $i++) {
		echo "
		<div style=\"border: 2px solid black; width: 400px; height: 500px;text-align:center\">
		<h2>Статья номер $i</h2>
		<label>Введите секцию</label>
		<input type=\"text\" name=\"section$i\"/><br/>
		<label>Ссылка на секцию</label>
		<input type=\"text\" name=\"sectionlink$i\"/><br/>
		<label>Введите тему</label>
		<input type=\"text\" name=\"topic$i\"/><br/>
		<label>Введите дату</label>
		<input type=\"text\" name=\"date$i\"/><br/>
		<label>Ссылка на полную версию</label>
		<input type=\"text\" name=\"link$i\"/><br/>
		<label>Введите текст статьи</label>
		<input style=\"width: 350px; height: 250px;\" type=\"text\" name=\"txt$i\"/><br/>
		</div>
		<br/><br/>
		";
	}
	
	for ($i = 1; $i <= $menu; $i++) {
		echo "
		<div style=\"border: 2px solid black; width: 400px; height: 500px;text-align:center\">
		<h2>Секция меню номер $i</h2>
		<label>Введите текст ссылки</label>
		<input type=\"text\" name=\"menutxt$i\"/><br/>
		<label>Ссылка</label>
		<input type=\"text\" name=\"menulink$i\"/><br/>
		</div>
		<br/>
		";
	}
	echo "<input type=\"hidden\" name=\"menu\" value=\"$menu\">";
	echo "<input type=\"hidden\" name=\"articles\" value=\"$articles\">";
?>
<input type="submit" name="input22"  value="Далее"/>
</form>
</body>
</html>