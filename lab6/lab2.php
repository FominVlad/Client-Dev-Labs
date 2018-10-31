<?php
	define ("WIDTH", "1200");
	define ("HEIGHT", "500");
	define ("ROWS", "10");
	define ("COLS", "11");
?>
<html>
<head>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<link rel="stylesheet" href="css/main.css" type="text/css" /> 
<style>
	TABLE {
		width: <?php echo WIDTH; ?>px;
		height: <?php echo HEIGHT; ?>px;
	}
</style>
<title>Fomin Vlad, IP-71 (lab2)</title>
</head>
<body>
<h1>Fomin Vlad, IP-71</h1>



<div>
	<form name="form" action="" method="post">
		<label>Количество рядков:</label><br/>
		<input type="text" name="rows" placeholder="Например, 7."/><br/>
		<label>Количество столбцов:</label><br/>
		<input type="text" name="cols" placeholder="Например, 7."/><br/>
		<input type="submit" name="input" value="Ввести"/>
	</form>
</div>
<?php
	echo "<div>";
		function makeTable ($result_set) {
			echo '<table style="width:30%; height:10%">';
			echo "<tr>";
			echo "<th>ID</th>";
			echo "<th>Значение ROW</th>";
			echo "<th>Значение COL</th>";
			echo "<tr/>";
			while (($mytable = $result_set->fetch_assoc()) != false) {
				echo '<tr>';
					echo "<td>";
					print_r($mytable["id"]);
					echo "</td>";
					echo "<td>"; 
					print_r($mytable["row"]);
					echo "</td>";
					echo "<td>"; 
					print_r($mytable["col"]);
					echo "</td>";
				echo '</tr>';
				}
		echo '</table>';
		}
		
		$mysqli = new mysqli ("localhost", "root", "", "lab6");
		$mysqli->query ("SET NAMES 'utf8'");
		echo "<p><font size=\"14\">Table current</font></p>";
		$result_set = $mysqli->query ("SELECT `id`, `row`, `col` FROM `curr`");
		makeTable($result_set);
		echo "<p><font size=\"14\">Table error</font></p>";
		$result_set2 = $mysqli->query ("SELECT `id`, `row`, `col` FROM `err`");
		makeTable($result_set2);
		echo "</div>";
		//$success = $mysqli->query ("INSERT INTO `current` (`id`, `value`) VALUES ('5', '82')");
		//echo $success;

		
	if (isset($_POST["input"])) {
		if (preg_match("/[a-z, а-я]/i", $_POST["rows"]) || $_POST["rows"] == "" || preg_match("/[a-z, а-я]/i", $_POST["cols"]) || $_POST["cols"] == "" || $_POST["rows"] <= 0 || $_POST["cols"] <= 0) {
			if ($_POST["rows"] != "" || $_POST["cols"] != "") {
			$row = $_POST["rows"];
			$col = $_POST["cols"];
			$myrow = $_POST["rows"];
			$mycol = $_POST["cols"];
			
			$mysqli->query ("INSERT INTO `err` (`row`, `col`) VALUES (\"$myrow\", \"$mycol\")");
			$myrow = "";
			$mycol = "";
			}

		echo "<div class=\"b-popup\">";
			echo "<div class=\"b-popup-content\">";
				echo "Ошибка!";
				echo "<p><a href=\"lab2.php\">Вернуться на главную</a></p>";
			echo "</div>";
		echo "</div>";
		
		}
		else {
			$myrow = $_POST["rows"];
			$mycol = $_POST["cols"];
			
			$mysqli->query ("INSERT INTO `curr` (`row`, `col`) VALUES (\"$myrow\", \"$mycol\")");
			$myrow = "";
			$mycol = "";
		}
		
	}
	if (!$_POST["rows"] || !$_POST["cols"]) {
		$row = ROWS;
		$col = COLS;	
	}
	else {
		$row = $_POST["rows"];
		$col = $_POST["cols"];
	}
	
		//$mysqli->query ("INSERT INTO `curr` (`row`) VALUES ('$_POST[\"rows\"]')");
		$mysqli->close();
		//$row = $_POST["rows"];
		//$col = $_POST["cols"];
?>
<div>
	<p><font size="14">Table1</font></p>
	<?php

		$tmpcol = $col - 1;
		$tmprow = $row - 1;
		$counterRows = 0;
		$counter = 1;
		echo '<table>';
		for ($i = 1; $i <= $row; $i++) {
			echo '<tr>';
				if ($counterRows == 0) {
					if ($counter % 4 == 0) {	
						echo "<td colspan=\"$col\">4 клітинка</td>";
					}
					else {	
						echo "<td colspan=\"$col\"></td>";
					}
					$counter++;
					$counterRows++;
				}
				else if ($tmpcol <= 0 && $tmprow > 0) {
					if ($counter % 4 == 0) {	
						echo "<td rowspan=\"$tmprow\">4 клітинка</td>";
					}
					else {
						echo "<td rowspan=\"$tmprow\"></td>";
					}
					$counter++;
					$tmprow = 0;
				}
				else if ($tmpcol > 0 && $tmprow > 0) {
					if ($counter % 4 == 0) {
						echo "<td rowspan=\"$tmprow\">4 клітинка</td>";
					}
					else {	
						echo "<td rowspan=\"$tmprow\"></td>";
					}
					$counter++;
					if ($counter % 4 == 0) {
						echo "<td colspan=\"$tmpcol\">4 клітинка</td>";
					}
					else {
						echo "<td colspan=\"$tmpcol\"></td>";	
					}
					$counter++;
					$tmpcol--;
					$tmprow--;
				}
			echo '</tr>';
		}
		echo '</table>';
	?>
</div>
<div>
	<p><font size="14">Table2</font></p>
	<?php

		$tmprow = $row;
		$tmpcol = $col - 1;
		$counterRow = 0;
		$counter = 1;
		echo '<table>';
		for ($i = 1; $i <= $row; $i++) {
			echo '<tr>';
			$counterRow++;
				if ($tmprow > 0 && $tmpcol > 0) {
					if ($counterRow == 5) {
						if ($counter % 4 == 0) {
							$tmpcol++;
							echo "<td colspan=\"$tmpcol\">4 клітинка</td>";
							$tmpcol--;
							$tmprow--;
						}
						else {
							$tmpcol++;
							echo "<td colspan=\"$tmpcol\"></td>";
							$tmpcol--;
							$tmprow--;
						}
						$counter++;
					}
					else {
						if ($counter % 4 == 0) {
							echo "<td rowspan=\"$tmprow\">4 клітинка</td>";
						}
						else {
							echo "<td rowspan=\"$tmprow\"></td>";
						}
						$counter++;
						if ($counter % 4 == 0) {
							echo "<td colspan=\"$tmpcol\">4 клітинка</td>";
						}
						else {
							echo "<td colspan=\"$tmpcol\"></td>";
						}
						$tmprow--;
						$tmpcol--;
						$counter++;
					}
				}
				else if ($tmpcol <= 0 && $tmprow > 0){
					if ($counter % 4 == 0) {
						echo "<td rowspan=\"$tmprow\">4 клітинка</td>";	
					}
					else {
						echo "<td rowspan=\"$tmprow\"></td>";
					}
					$counter++;
					$tmprow = 0;
				}
			echo '</tr>';
		}
		echo '</table>';
	?>
</div>
<div>
	<p><font size="14">Table3</font></p>
	<?php

		$tmprow = $row;
		$tmpcol = ($col - $col % 2) / 2;
		$counterRow = 0;
		$counter = 1;
		echo '<table>';
		for ($i = 1; $i <= $row; $i++) {
			$counterRow++;
			if ($col % 2 != 0) {
			if ($counterRow % 2 == 0) {
				echo '<tr>';
				if ($counter % 4 == 0) {
					echo "<td>4 клітинка</td>";
				}
				else {
					echo "<td></td>";
				}
				$counter++;
				$tmp = $tmpcol;
				while ($tmp != 0) {
					if ($counter % 4 == 0) {
						echo "<td colspan=\"2\">4 клітинка</td>";
					}
					else {
						echo "<td colspan=\"2\"></td>";
					}
					$counter++;
					$tmp--;
				}
				echo '</tr>';
			}
			else {
				echo '<tr>';
				$tmp = $tmpcol;
				while ($tmp != 0) {
					if ($counter % 4 == 0) {
						echo "<td colspan=\"2\">4 клітинка</td>";
					}
					else {
						echo "<td colspan=\"2\"></td>";
					}
					$counter++;
					$tmp--;
				}
				if ($counter % 4 == 0) {
					echo "<td>4 клітинка</td>";
				}
				else {
					echo "<td></td>";
				}
				$counter++;
				echo '</tr>';
			}
			}
		}
		echo '</table>';
	?>
</div>

<div>
	<p><font size="14">Table4</font></p>
	<?php
		$tmprow = $row;
		$tmpcol = $col;
		$counterRow = 1;
		$cff = 0;
		$table4 = '<tr>';
		$summ_in_first_col = 3; $next_span = 3;
		$counter = 0;
	echo "<table>";
    for($i = 0; $i < $tmpcol; $i++){
	  $counter++;
	  if($counter == 4) {
		$table4 .= '<td rowspan="'
      . $next_span . '">4 клітинка'
      
      .'</td>';
		$counter = 0;
	  }
	  else {
		$table4 .= '<td rowspan="'
      . $next_span . '">'
      
      .'</td>';
	  }
      $next_span = 3 - (($tmprow - $next_span)%3);
    }

    $inc = ($tmprow - floor($tmprow / 3)*3) == 2 ? 1 : -1;
    $shift = 3 - (($tmprow - 3)%3);
    $table4 .= '</tr>';

    for($i = 1; $i < $tmprow; $i++){
		
      $table4 .= '<tr>';

      for($j = 0;$j + $shift <= $tmpcol - 1; $j += 3){
		$counter++;
		if($counter == 4) {
			$table4 .= '<td rowspan="'
			.min(3, $tmprow - $i)
			.'">4 клітинка'
			. '</td>';
			$counter = 0;
		}
		else {
			$table4 .= '<td rowspan="'
			.min(3, $tmprow - $i)
			.'">'
			. '</td>';
		}

      }

      $shift += $inc;
      if($shift == 3) $shift = 0;
      if($shift == -1) $shift = 2;
      $table4 .= '</tr>';
    }
    echo $table4;
	echo "<table>";
    echo '<br>';
	?>
</div>

</body>
</html> 