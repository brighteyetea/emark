<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Question 7</title>
</head>

<body>
<?php
	echo "<table border='1' >";
	for($i = 1; $i <= 10; $i++) {
		echo '<tr>';
		for($j = 1; $j <= 10; $j++) {
			echo '<td>' . $i * $j . '</td>';
		}
		echo '</tr>';
	}
	echo '</table>';
?>
</body>
</html>
