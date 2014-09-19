<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
	// Changing the values in an Associative Array element
	
	$arrVehicles = array(
		"Type" => array("H1", "T2"),
		"Make" => array("Holden", "Toyota"),
		"Model" => array("Cruze", "Camry"),
		"Color" => array("Silver", "Red"),
		"Quantity" => array(3, 5)
	);
	echo "<h3>Associative Arrays:</h3>";
	//var_dump($arrVehicles["Type"]);
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
		echo "<br />";
	}
	echo "<br/>========================<br/>";

	$arrVehicles["H1"]["Color"] = "White";
	$arrVehicles["T2"]["Quantity"] = 3;
	$strNewColor = $arrVehicles["H1"]["Color"];
	$strNewQuantity = $arrVehicles["T2"]["Quantity"];
	echo "<p>New Colour: $strNewColor</p>";
	echo "<p>New Quantity: $strNewQuantity</p>";
	
	print_r($arrVehicles);
?>


</body>
</html>