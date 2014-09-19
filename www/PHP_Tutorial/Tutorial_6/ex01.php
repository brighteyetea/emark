<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
	//Simple Indexed Arrays
	echo "<h3>Simple Indexed Arrays:</h3>";
	$author = array("Patterson", "Saylor", "Gerritson", "Webster");
	foreach($author as $val) {
		echo $val . "<br/>";	
	}

?>
</body>
</html>