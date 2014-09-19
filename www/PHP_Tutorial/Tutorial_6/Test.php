<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
$arrVehicles = array(
		"Type" => array("H1", "T2", "R1", "C2", "S4", "P1"),
		"Make" => array("Holden", "Toyota", "Renault", "Citroen", "Skoda", "Peugeot"),
		"Model" => array("Cruze", "Camry", "Clio", "C3", "Octavia", "308"),
		"Color" => array("Silver", "Red", "Black", "Red", "Green", "Silver"),
		"Quantity" => array(3, 5, 6, 2, 1, 3)
	);
	print_r($arrVehicles["Model"]);
	foreach($arrVehicles["Type"] as $key => $value) {
		echo $value . " " . $arrVehicles["Make"][$key] . " ".  $arrVehicles["Model"][$key] . " " . $arrVehicles["Color"][$key] . " " . $arrVehicles["Quantity"][$key] . "<br/>" ;	
	}
?>
</body>
</html>