<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
	// Removing elements from the end of an associative array using array_pop()
	$arrVehicles = array(
		"Type" => array("H1", "T2", "R1", "C2", "S4", "P1"),
		"Make" => array("Holden", "Toyota", "Renault", "Citroen", "Skoda", "Peugeot"),
		"Model" => array("Cruze", "Camry", "Clio", "C3", "Octavia", "308"),
		"Colour" => array("Silver", "Red", "Black", "Red", "Green", "Silver"),
		"Quantity" => array(3, 5, 6, 2, 1, 3)
	);
	echo "<h3>Associative Arrays:</h3>";
	echo "Before using array_pop(), the length of each array is: " . count($arrVehicles["Type"]);
	foreach($arrVehicles["Type"] as $key => $value) {
		$strType = $value;
		$strMake = $arrVehicles["Make"][$key];
		$strModel = $arrVehicles["Model"][$key];
		$strColor = $arrVehicles["Color"][$key];
		$strQuantity = $arrVehicles["Quantity"][$key];
		echo "<p>Vehicle Type: $strType ";
		echo "Make: $strMake Model: $strModel ";
		echo "Color: $strColor ";
		echo "Quantity: $strQuantity ";
		echo "<p></p>";
	}
	array_pop($arrVehicles["Type"]);
	array_pop($arrVehicles["Make"]);
	array_pop($arrVehicles["Model"]);
	array_pop($arrVehicles["Color"]);
	array_pop($arrVehicles["Quantity"]);
	echo "After using array_pop(), the length of each array is: " . count($arrVehicles["Type"]);
	foreach($arrVehicles["Type"] as $key => $value) {
		$strType = $value;
		$strMake = $arrVehicles["Make"][$key];
		$strModel = $arrVehicles["Model"][$key];
		$strModel = $arrVehicles["Color"][$key];
		$strModel = $arrVehicles["Quantity"][$key];
		echo "<p>Vehicle Type: $strType ";
		echo "Make: $strMake Model: $strModel ";
		echo "Color: $strColor ";
		echo "Quantity: $strQuantity ";
		echo "<p></p>";
	}
?>


</body>
</html>