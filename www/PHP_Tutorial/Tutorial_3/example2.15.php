<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>CONTINUE STATEMENT</title>
</head>

<body>
<?php
	//example2.15.php - CONTINUE STATEMENT
	for($intCount = 1; $intCount <= 10; $intCount++) {
		if($intCount % 2 == 0) {
			continue;
		} 
		echo "<p>$intCount is even</p>";
	}
?>
</body>
</html>
