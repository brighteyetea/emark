<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
	//Multi-Dimensional Associative Arrays (non-numerical key)
	$arrVehicles = array(
		"Type" => array("H1", "T2", "R1", "C2", "S4", "P1"),
		"Make" => array("Holden", "Toyota", "Renault", "Citroen", "Skoda", "Peugeot"),
		"Model" => array("Cruze", "Camry", "Clio", "C3", "Octavia", "308"),
		"Color" => array("Silver", "Red", "Black", "Red", "Green", "Silver"),
		"Quantity" => array(3, 5, 6, 2, 1, 3)
	);
	echo "<h3>Multi-Dimensional Associative Arrays:</h3>";
	foreach($arrVehicles["Type"] as $strKey => $strType)
	{
		$strMake = $arrVehicles["Make"][$strKey];
		$strModel = $arrVehicles["Model"][$strKey];
		$strColor = $arrVehicles["Color"][$strKey];
		$strQuantity = $arrVehicles["Quantity"][$strKey];
		echo "<p>Vehicle Type: $strType</p>";
		echo "<p>Make/Model: $strMake $strModel</p>";
		echo "<p>Colour: $strColor</p>";
		echo "<p>Quantity: $strQuantity</p>";
		echo "<br />";
	}

?>
</body>
</html>