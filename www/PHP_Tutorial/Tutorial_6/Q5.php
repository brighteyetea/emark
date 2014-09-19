<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<!--
a. Creates a multi-dimensional indexed array that stores details of the laptop computers listed above. 
b. Lists the details on the screen in a table.
c. Changes the price of the C543 model to $650
d. Lists the details on the screen in a table once again with the new values.
e. Using functions you discovered in question 3 remove the B570 model from the array 
f. Lists the details on the screen in a table once again with the new values.
-->
<body>
<?php
	$arrLaptops = array(
		array("B540", "i3", "4", "559.00"),
		array("B570", "i5", "4", "660.00"),
		array("C543", "i5", "4", "670.00"),
		array("C643", "i7", "8", "1068.00")
	);
	//echo $arrLaptops[1][1];
	echo "<h3>Before changing Model C543 Price:</h3>";
	echo "<table border='1'>";
	echo "<th>Model</th>";
	echo "<th>CPU</th>";
	echo "<th>RAM(GB)</th>";
	echo "<th>Price</th>";
	for($intRow = 0; $intRow < count($arrLaptops); $intRow++) {
		echo "<tr>";
		for($intColumn = 0; $intColumn < count($arrLaptops[$intRow]); $intColumn++) {
			echo "<td>" . $arrLaptops[$intRow][$intColumn] . "</td>";
		}
		echo "<tr>";	
	}
	echo "</table>";
	
	// change price of C543 Model to $650
	for($intRow = 0; $intRow < count($arrLaptops); $intRow++) {
		for($intColumn = 0; $intColumn < 1 ; $intColumn++) {
			if($arrLaptops[$intRow][$intColumn] == "C543") {
				$arrLaptops[$intRow][3] = "650.00";	
			}	
		}	
	}
	echo "<h3>After changing Model C543 price:</h3>";
	echo "<table border='1'>";
	echo "<th>Model</th>";
	echo "<th>CPU</th>";
	echo "<th>RAM(GB)</th>";
	echo "<th>Price</th>";
	foreach($arrLaptops as $key => $value) {
		echo "<tr>";
		foreach($value as $k => $v) {
			echo "<td>" . $v . "</td>";
		}
		echo "</tr>";	
	}
	echo "</table>";
	
	// Removing Model B570
	for($intRow = 0; $intRow < count($arrLaptops); $intRow++) {
		for($intColumn = 0; $intColumn < 1; $intColumn++) {
			if($arrLaptops[$intRow][$intColumn] == "B570") {
				unset($arrLaptops[$intRow]);	
			}	
		}	
	}
	echo "<h3>After removing Model B570:</h3>";
	echo "<table border='1'>";
	echo "<th>Model</th>";
	echo "<th>CPU</th>";
	echo "<th>RAM(GB)</th>";
	echo "<th>Price</th>";
	foreach($arrLaptops as $key => $value) {
		echo "<tr>";
		foreach($value as $k => $v) {
			echo "<td>" . $v . "</td>";
		}
		echo "</tr>";	
	}
	echo "</table>";
?>


</body>
</html>