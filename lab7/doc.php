<html>
<?php
				$mysqli = new mysqli ("localhost", "root", "", "lab7");
				$mysqli->query ("SET NAMES 'utf8'");
				$result_title = $mysqli->query ("SELECT * FROM `title`");
				while (($mytitle = $result_title->fetch_assoc()) != false) {
					$title = $mytitle["txt"];
				}
				$result_copyright = $mysqli->query ("SELECT * FROM `copyright`");
				while (($mycopyright = $result_copyright->fetch_assoc()) != false) {
					$copyright = $mycopyright["txt"];
				}
				$result_link = $mysqli->query ("SELECT * FROM `link`");
				while (($mylink = $result_link->fetch_assoc()) != false) {
					$linktxt = $mylink["linktxt"];
				}
?>
<head> 
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<link rel="stylesheet" href="css/main.css" type="text/css" /> 
	<title>Зразок оформлення веб-сторінки</title>
</head> 
<body>
	<div id="content">
		<h1><?php echo "$title"; ?></h1>
		<ul id="menu">
		<?php
			$result_menu = $mysqli->query ("SELECT * FROM `menu`");
				while (($mymenu = $result_menu->fetch_assoc()) != false) {
					$txt = $mymenu["txt"];
					$link = $mymenu["link"];
					echo "<li><a href=\"$link\">$txt</a></li>";
				}
		?>
		</ul>
		<div class="post">
		<?php
			$result_articles = $mysqli->query ("SELECT * FROM `articles`");
			$num_rows = $result_articles->num_rows;
				while (($myarticles = $result_articles->fetch_assoc()) != false) {
					if ($num_rows == $myarticles["id"]) {
						$txt1 = $myarticles["txt"];
						$date = $myarticles["date"];
						$section = $myarticles["section"];
						$sectionlink = $myarticles["sectionlink"];
						$link = $myarticles["link"];
						$topic = $myarticles["topic"];
					}
				}
			$result_articles2 = $mysqli->query ("SELECT * FROM `articles`");
				while (($myarticles2 = $result_articles2->fetch_assoc()) != false) {
					if (($num_rows - 1) == $myarticles2["id"]) {
						$txt2 = $myarticles2["txt"];
						$date2 = $myarticles2["date"];
						$section2 = $myarticles2["section"];
						$sectionlink2 = $myarticles2["sectionlink"];
						$link2 = $myarticles2["link"];
						$topic2 = $myarticles2["topic"];
					}
				}
			$result_articles3 = $mysqli->query ("SELECT * FROM `articles`");
				while (($myarticles3 = $result_articles3->fetch_assoc()) != false) {
					if (($num_rows - 2) == $myarticles3["id"]) {
						$txt3 = $myarticles3["txt"];
						$date3 = $myarticles3["date"];
						$section3 = $myarticles3["section"];
						$sectionlink3 = $myarticles3["sectionlink"];
						$link3 = $myarticles3["link"];
						$topic3 = $myarticles3["topic"];
					}
				}
			$result_articles4 = $mysqli->query ("SELECT * FROM `articles`");
				while (($myarticles4 = $result_articles4->fetch_assoc()) != false) {
					if (($num_rows - 3) == $myarticles4["id"]) {
						$txt4 = $myarticles4["txt"];
						$date4 = $myarticles4["date"];
						$section4 = $myarticles4["section"];
						$sectionlink4 = $myarticles4["sectionlink"];
						$link4 = $myarticles4["link"];
						$topic4 = $myarticles4["topic"];
					}
				}
		?>
			<div class="details"> 
				<h2><?php echo "<a href=\"$link\">$topic</a>"; ?></h2>
				<p class="info"><?php echo "опубліковано $date у секції <a href=\"$sectionlink\">$section</a>"; ?></p>
			</div>
			<div class="body">
				<p><?php echo "$txt1"; ?></p> 
			</div>
			<div class="x"></div>
		</div>
		<div class="col">
			<h3><?php echo "<a href=\"$sectionlink2\">$topic2</a>"; ?></h3>
			<p><?php echo "$txt2"; ?></p>
			<p class="det">&not; <?php echo "<a href=\"$link2\">$linktxt</a>"; ?></p>
		</div>
		<div class="col">
			<h3><?php echo "<a href=\"$sectionlink3\">$topic3</a>"; ?></h3>
			<p><?php echo "$txt3"; ?></p>
			<p class="det">&not; <?php echo "<a href=\"$link3\">$linktxt</a>"; ?></p>
		</div>
		<div class="col last"> 
			<h3><?php echo "<a href=\"$sectionlink4\">$topic4</a>"; ?></h3>
			<p><?php echo "$txt4"; ?></p>
			<p class="det">&not; <?php echo "<a href=\"$link4\">$linktxt</a>"; ?></p>
		</div>

		<div id="footer">
			<p><?php echo "$copyright"; ?></p>
		</div>
	</div>
</body>
</html>

<?php
	$mysqli->close();
?>