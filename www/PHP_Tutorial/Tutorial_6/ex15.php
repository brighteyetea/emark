<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
	// Adding elements to an array using array_push()
	
	$arrVehicles = array(
		"Type" => array("H1", "T2"),
		"Make" => array("Holden", "Toyota"),
		"Model" => array("Cruze", "Camry"),
		"Color" => array("Silver", "Red"),
		"Quantity" => array(3, 5)
	);
	echo "<h3>Associative Arrays: </h3>";
	print_r($arrVehicles);
	echo "<br/>";
	
	print_r($arrVehicles["Type"]);
	array_push($arrVehicles["Type"], "H5", "S4", "C2");
	echo "<br/>";
	//print_r($arrVehicles["Type"]);
	array_push($arrVehicles["Make"], "Hyundai", "Skoda", "Citroen");
	array_push($arrVehicles["Model"], "i30", "Octavia", "C3");
	array_push($arrVehicles["Color"], "Blue", "Orange", "Purple");
	array_push($arrVehicles["Quantity"], 4, 3, 2);
	echo "<br/>";
	print_r($arrVehicles);
	echo "<br/>";
	foreach($arrVehicles["Type"] as $key => $value) {
		$strType = $value;
		$strMake = $arrVehicles["Make"][$key];
		$strModel = $arrVehicles["Model"][$key];
		$strColor = $arrVehicles["Color"][$key];
		$strQuantity = $arrVehicles["Quantity"][$key];
		echo "<p>Type: $strType</p>";
		echo "<p>Make/Model: $strMake $strModel</p>";
		echo "<p>Color: $strColor</p>";
		echo "<p>Quantity: $strQuantity</p>";
	}
	
?>


</body>
</html>