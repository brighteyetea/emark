<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
	// Calling function from within a loop
	function temperatureConvert($floTemp, $strType) {
		if($strType == "F") {
			$floCelsius = (5 / 9) * ($floTemp - 32);
			echo "<p>$floTemp<sup>o</sup>F = $floCelsius<sup>o</sup>C</p>";	
		} else if($strType == "C"){
			$floFahrenheit = (9 / 5) * $floTemp + 32;
			echo "<p>$floTemp<sup>o</sup>C = $floFahrenheit<sup>o</sup>F</p>";
		}
	}
	
	echo "<h2>Some nice holiday temperatures: </h2>";
	for($intCount = 25; $intCount < 41; $intCount++) {
		temperatureConvert($intCount, "C");	
	}
?>
</body>
</html>