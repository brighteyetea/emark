<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
	// Sort an Associative Array
	$arrVehicles = array(
		"Type" => array("H1", "T2", "R1", "C2", "S4", "P1"),
		"Make" => array("Holden", "Toyota", "Renault", "Citroen", "Skoda", "Peugeot"),
		"Model" => array("Cruze", "Camry", "Clio", "C3", "Octavia", "308"),
		"Colour" => array("Silver", "Red", "Black", "Red", "Green", "Silver"),
		"Quantity" => array(3, 5, 6, 2, 1, 3)
	);
	echo "<h3>Associative Arrays:</h3>";
	echo "<p>Unsorted</p>";
	foreach($arrVehicles["Type"] as $strKey => $strType) {
		$strMake = $arrVehicles["Make"][$strKey];
		$strModel = $arrVehicles["Model"][$strKey];
		$strColour = $arrVehicles["Colour"][$strKey];
		$intQuantity = $arrVehicles["Quantity"][$strKey];
		echo "Vehicle Type: $strType, ";
		echo "Make: $strMake, Model: $strModel, ";
		echo "Colour: $strColour, ";
		echo "Quantity: $intQuantity";
		echo "<p></p>";
	}
	echo "<br /><br />";
	array_multisort(
	$arrVehicles["Type"], SORT_ASC, SORT_STRING,
	$arrVehicles["Make"], SORT_ASC, SORT_STRING,
	$arrVehicles["Model"], SORT_ASC, SORT_STRING,
	$arrVehicles["Colour"], SORT_ASC, SORT_STRING,
	$arrVehicles["Quantity"], SORT_NUMERIC);
	
	echo "<p>Sorted</p>";
	foreach($arrVehicles["Type"] as $strKey => $strType) {
		$strMake = $arrVehicles["Make"][$strKey];
		$strModel = $arrVehicles["Model"][$strKey];
		$strColour = $arrVehicles["Colour"][$strKey];
		$intQuantity = $arrVehicles["Quantity"][$strKey];
		echo "Vehicle Type: $strType ";
		echo "Make: $strMake Model: $strModel ";
		echo "Colour: $strColour ";
		echo "Quantity: $intQuantity";
		echo "<p></p>";
	}
?>


</body>
</html>