<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
	// Returning multiple values from a function using an array
	function temperatureConvert($floTemp, $strType = "C") {
		if($strType == "F") {
			$floAnswer = (5 / 9) * ($floTemp - 32);
		} else {
			$floAnswer = (9 / 5) * $floTemp + 32;
		}
		$arrResult = array();
		$arrResult[] = $floAnswer; //arrResult[0]
		$arrResult[] = $strType;	//arrResult[1]
		return $arrResult;
	}
	echo "<h2>Some nice holiday temperatures:</h2>";
	$floCelsius = 99.9;
	$arrResult = temperatureConvert($floCelsius);
	echo "<p>$floCelsius<sup>o</sup>" . $arrResult[1] . " = " . $arrResult[0] . "<sup>o</sup>F</p>";
?>
</body>
</html>