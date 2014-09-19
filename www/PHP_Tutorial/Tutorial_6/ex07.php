<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
	// Navigating through an associative array
	$arrVehicles = array(
		"Type" => array("H1", "T2", "R1", "C2", "S4", "P1"),
		"Make" => array("Holden", "Toyota", "Renault", "Citroen", "Skoda", "Peugeot"),
		"Model" => array("Cruze", "Camry", "Clio", "C3", "Octavia", "308"),
		"Color" => array("Silver", "Red", "Black", "Red", "Green", "Silver"),
		"Quantity" => array(3, 5, 6, 2, 1, 3)
	);
	echo "<h3>Navigating the vehicles array:";
	echo "<p>The current row is: ".current($arrVehicles["Type"])."</p>";
	echo "<p>The next row is: ".next($arrVehicles["Type"]) . "</p>";
	echo "<p>The previous row is: ".prev($arrVehicles["Type"]) . "</p>";
	echo "<p>The last row is: ".end($arrVehicles["Type"]) . "</p>";
	echo "<p>The first row is: ".reset($arrVehicles["Type"]) . "</p>";
?>
</body>
</html>