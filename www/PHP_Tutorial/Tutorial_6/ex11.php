<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
	// Counting Array Elements
	$arrVehicles = array(
		
		0 => "Holden",
		1 => "Ford",
		
		4 => "Mazda",
		
		3 => "Toyota",
		
		2 => "Kia",
		
	);
	$intSize = count($arrVehicles);
	for($intCount = 0; $intCount < $intSize; $intCount++) {
		echo "<p>$intCount: ". $arrVehicles[$intCount]. "</p>";	
	}
	
?>


</body>
</html>