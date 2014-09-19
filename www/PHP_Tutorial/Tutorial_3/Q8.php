<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Question 8</title>
</head>

<body>
<?php
	$intA = 3;
	$intB = 6;
	for($i = 1; $i <= 6; $i++) {
		if($intA > $intB) {
			echo "<p>A = $intA and B = $intB</p>";
		} else {
			echo "<p>B = $intB and A = $intA</p>";
		}
		$intA *= 3;
		$intB *= 2;
		if($intA > 25) {
			$int -= 10;
		}
		if($intB > 25) {
			$intB -= 10;
		}
	}
	

?>
</body>
</html>
