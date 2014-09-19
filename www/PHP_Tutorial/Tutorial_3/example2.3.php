<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>The IF Construct</title>
</head>

<body>
<?php
	//example2.3.php - IF/ELSE Construct
	$intA = 9;
	$intB = 3;
	if($intA > $intB)
		echo "<p>$intA is greater than $intB</p>";
	else
		echo "<p>$intA is less than or equal to $intB</p>";
?>
</body>
</html>
