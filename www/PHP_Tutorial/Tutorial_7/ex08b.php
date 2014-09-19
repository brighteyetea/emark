<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
	// Parameters passed by reference
	function reverselt($strString) {
		$strString = strrev($strString);
	}
	$strName = "Simon";
	echo "<p>Before: strName = " . $strName . "</p>";
	reverselt($strName);
	echo "<p>After: strName = ". $strName . "</p>";
?>
</body>
</html>