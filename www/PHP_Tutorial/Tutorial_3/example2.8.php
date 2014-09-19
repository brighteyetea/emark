<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>The IF Construct</title>
</head>

<body>
<?php
	//example2.8.php - SWITCH Construct
	$intTotal = 2;
	switch($intTotal) {
		case 0:
		case 1:
		case 2:
		case 3:
		case 4:
			echo "<p>$intTotal is less than or equal to four!</p>";
			break;
		case 5:
			echo "<p>$intTotal is equal to five!</p>";
			break;
		default:
			echo "<p>$intTotal is greater than five!</p>";
	}		
	
?>
</body>
</html>
