<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
	// A function without parameters
	echo "<p>Fahrenheit to Celsius</p>";
	function fahrenheitToCelsius() {
		$floFahrenheit = 212;
		$floCelsius = (5 / 9) * ($floFahrenheit - 32);
		echo "<p>$floFahrenheit<sup>o</sup>F = $floCelsius<sup>o</sup>C</p>";	
	}
	fahrenheitToCelsius();
?>
</body>
</html>