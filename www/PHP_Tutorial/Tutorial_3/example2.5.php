<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>The IF Construct</title>
</head>

<body>
<?php
	//example2.5.php - IF/ELSE Construct
	$intNumber1 = 100;
	$intNumber2 = 80;
	if($intNumber1 > $intNumber2) {
		echo "<p>$intNumber1 is larger than $intNumber2</p>";
	} else if($intNumber1 == $intNumber2) {
		echo "<p>$intNumber1 is equal to $intNumber2</p>";
	} else {
		echo "<p>$intNumber1 is smaller than $intNumber2</p>";
	}
?>
</body>
</html>
