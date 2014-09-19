<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
	//Multi-Dimensional indexed arrays
	echo "<h3>Multi-Dimensional indexed arrays:</h3>";
	$arrVehicle = array(
		array("H1", "T2", "R1", "C2", "S4", "P1"),
		array("Holden", "Toyota", "Renault", "Citroen", "Skoda", "Peugeot"),
		array("Cruze", "Camry", "Clio", "C3", "Octavia", "308"),
		array("Silver", "Red", "Black", "Red", "Green", "Silver"),
		array(3, 5, 6, 2, 1, 3)
	);
	//echo $arrVehicle[1][1];
	for($intCount = 0; $intCount < 6; $intCount++) {
		$strType = $arrVehicle[0][$intCount];
		$strMake = $arrVehicle[1][$intCount];
		$strModel = $arrVehicle[2][$intCount];
		$strColor = $arrVehicle[3][$intCount];
		$strQuantity = $arrVehicle[4][$intCount];
		echo "<p>Vehicle Type: $strType</p>";
		echo "<p>Make/Model: $strMake $strModel</p>";
		echo "<p>Color: $strColor</p>";
		echo "<p>Quantity: $strQuantity</p>";
	}
	
?>
</body>
</html>