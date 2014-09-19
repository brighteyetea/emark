<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
	// Returning a value from a function
	function temperatureConvert($floTemp, $strType = "C") {
		if($strType == "F") {
			$floAnswer = (5 / 9) * ($floTemp - 32);	
		} else {
			$floAnswer = (9 / 5) * $floTemp + 32;	
		}
		return $floAnswer;
	}
	echo "<h2>Some nice holiday temperatures:</h2>";
	for($intCount = 25; $intCount < 41; $intCount++) {
		$floFahrenheit = temperatureConvert($intCount);
		echo "<p>$intCount<sup>o</sup>C = $floFahrenheit<sup>o</sup>F</p>";	
	}
?>
</body>
</html>