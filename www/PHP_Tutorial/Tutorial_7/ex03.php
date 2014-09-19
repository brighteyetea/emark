<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
	// A function with multiple parameters
	echo "<p>Temperature Converter</p>";
	function temperatureConvert($floTemp, $strType) {
		if($strType == "F") {
			$floCelsius = (5 / 9) * ($floTemp - 32);
			echo "<p>$floTemp<sup>o</sup>F = $floCelsius<sup>o</sup></p>";	
		} else if($strType == "C"){
			$floFahrenheit = (9 / 5) * $floTemp + 32;
			echo "<p>$floTemp<sup>o</sup>C = $floFahrenheit<sup>o</sup>F</p>";
		} else {
			echo "Wrong Format";	
		}
	}
	temperatureConvert(100, "F");
	temperatureConvert(100, "C");
	temperatureConvert(100, "H");
?>
</body>
</html>