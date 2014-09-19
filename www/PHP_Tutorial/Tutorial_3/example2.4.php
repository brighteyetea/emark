<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>The IF Construct</title>
</head>

<body>
<?php
	//example2.4.php - IF/ELSE Construct
	$strColor = "blue";
	if($strColor == "green") {
		echo "<p>The color is green</p>";
		echo "<p>Green is a nice color</p>";
		echo "<p>We have the color of grass</p>";
	} else {
		echo "<p>We don't know what color we have</p>";
		echo "<p>Other than it is not green</p>";
	}
?>
</body>
</html>
