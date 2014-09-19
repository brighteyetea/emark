<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>CHESSBOARD</title>
</head>

<body>
<?php
	//example2.13.php - CHESS BOARD
	$b_isWhite = true;
	echo "<table border='1'>";
	for($intRow = 1; $intRow <= 8; $intRow++) {
		echo "<tr>";
		for($intColumn = 1; $intColumn <= 8; $intColumn++) {
			if($b_isWhite) {
				echo "<td><img src='whiteSquare.gif' width='30' heigh='30' alt='whiteSquare' align='top'/></td>";
			} else {
				echo "<td><img src='blackSquare.gif' width='30' heigh='30' alt='blackSquare' align='top'/></td>";
			}
			if($b_isWhite) {
				$b_isWhite = false;
			} else {
				$b_isWhite = true;
			}
		}
		echo "</tr>";
		if($b_isWhite) {
			$b_isWhite = false;
		} else {
			$b_isWhite = true;
		}
	}
	echo "</table>";
?>
</body>
</html>
