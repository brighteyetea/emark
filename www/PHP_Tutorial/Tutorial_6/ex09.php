<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
	// Show the content of a multi-dimensional indexed in a table
	echo "<h3>Multi-Dimensional indexed arrays:</h3>";
$arrVehicles = array(
array("H1", "T2", "R1", "C2", "S4", "P1"),
array("Holden", "Toyota", "Renault", "Citroen", "Skoda", "Peugeot"),
array("Cruze", "Camry", "Clio", "C3", "Octavia", "308"),
array("Silver", "Red", "Black", "Red", "Green", "Silver"),
array(3, 5, 6, 2, 1, 3));
echo "<table border='1'>";
echo "<th>No.</th><th>Make</th><th>Model</th><th>Color</th><th>Quantity</th>";
for($intCount = 0; $intCount < 6; $intCount++)
{
$strMake = $arrVehicles[1][$intCount];
$strModel = $arrVehicles[2][$intCount];
$strColour = $arrVehicles[3][$intCount];
$strQuantity = $arrVehicles[4][$intCount];
echo "<tr>";
echo "<td>$intCount</td>";
echo "<td>$strMake</td>";
echo "<td>$strModel</td>";
echo "<td>$strColour</td>";
echo "<td>$strQuantity</td>";
echo "</tr>";
}
echo "</table>";
	
?>
</body>
</html>