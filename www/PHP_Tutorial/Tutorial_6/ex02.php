<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
	//Simple Arrays with a numerical Key
	echo "<h3>Simple Arrays with a numerical Key:</h3>";
	$author = array(0 => "Patterson", 1 => "Saylor", 2 => "Gerrison", 3 => "Webster");
	for($intCount = 0; $intCount <= 3; $intCount++) {
		echo "<p>$author[$intCount]</p>";	
	}

?>
</body>
</html>