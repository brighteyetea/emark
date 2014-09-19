<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
	// Navigating a simple indexed array
	$author = array("Patterson", "Saylor", "Gerritson", "Webster");
	echo "<h3>Navigating a simple indexed array</h3>";
	echo "<p>The current element is: " . current($author) . "</p>";
	echo "<p>The next element is: " . next($author) . "</p>";
	echo "<p>The index of the current element is: " . key($author) . "</p>";
	echo "<p>The previous element is: " . prev($author) . "</p>";
	echo "<p>The last element is: " . end($author) . "</p>";
	echo "<p>The first element is: " . reset($author) . "</p>";
	
	
	
?>
</body>
</html>