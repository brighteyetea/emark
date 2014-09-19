<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
	// Adding elements to the end of an simple indexed array
	echo "<h3>Adding elements to Indexed Array:</h3>";
	$author = array(
		"Patterson", "Saylor", "Gerritson", "Webster"
	);
	foreach($author as $val) {
		echo $val . "<br/>";	
	}
	$author[] = "North";
	print_r($author);
?>


</body>
</html>