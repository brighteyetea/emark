<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
	// Calling a function from inside another function
	function decimal($floNum) {
		$decNum = round($floNum, 2);
		return $decNum;	
	}
	function multiply($floNumber) {
		$floNumber *= 3.12;
		echo "<p>$floNumber</p>";
		$decNumber = decimal($floNumber);
		echo "<p>$decNumber</p>";
	}
	
	$floNumber = 5.0234;
	multiply($floNumber);
?>
</body>
</html>