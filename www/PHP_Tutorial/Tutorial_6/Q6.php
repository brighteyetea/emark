<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<!--
a. Creates a multi-dimensional associative array using the Model as the main key. The array should store details of the laptop computers listed above. 
b. Lists the details on the screen in a table.
c. Using the appropriate array function add 2 new laptops to the array. The details are
C770	i7	16	1245.00
C870	i7	16	1310.00
d. Lists the details on the screen in a table once again with the new laptop details.
-->
<body>
<?php
	$arrLaptops = array(
		"Model" => array("B540", "B570", "C543", "C643"),
		"CPU" => array("i3", "i5", "i5", "i7"),
		"RAM" => array("4", "4", "4", "8"),
		"Price" => array("559", "660", "670", "1068")
	);
	echo "<h3>Displaying laptops:</h3>";
	echo "<table border='1'>";
	echo "<th>Model</th>";
	echo "<th>CPU</th>";
	echo "<th>RAM(GB)</th>";
	echo "<th>Price</th>";
	foreach($arrLaptops["Model"] as $key => $value) {
		echo "<tr>";
		$strModel = $value;
		$strCPU = $arrLaptops["CPU"][$key];
		$strRAM = $arrLaptops["RAM"][$key];
		$strPrice = $arrLaptops["Price"][$key];	
		echo "<td>$strModel</td>";
		echo "<td>$strCPU</td>";
		echo "<td>$strRAM</td>";
		echo "<td>$strPrice</td>";
		echo "</tr>";
	}
	echo "</table>";
	
	// Adding 2 new laptops 
	array_push(
		$arrLaptops["Model"], "C770", "C870"
	);
	array_push(
		$arrLaptops["CPU"], "i7", "i7"
	);
	array_push($arrLaptops["RAM"], "16", "16");
	array_push($arrLaptops["Price"], "1245.00", "1310.00");
	
	echo "<h3>Displaying laptops:</h3>";
	echo "<table border='1'>";
	echo "<th>Model</th>";
	echo "<th>CPU</th>";
	echo "<th>RAM(GB)</th>";
	echo "<th>Price</th>";
	foreach($arrLaptops["Model"] as $key => $value) {
		echo "<tr>";
		$strModel = $value;
		$strCPU = $arrLaptops["CPU"][$key];
		$strRAM = $arrLaptops["RAM"][$key];
		$strPrice = $arrLaptops["Price"][$key];	
		echo "<td>$strModel</td>";
		echo "<td>$strCPU</td>";
		echo "<td>$strRAM</td>";
		echo "<td>$strPrice</td>";
		echo "</tr>";
	}
	echo "</table>";
	
?>


</body>
</html>