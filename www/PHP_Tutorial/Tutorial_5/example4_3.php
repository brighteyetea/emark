<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Untitled Document</title>

</head>

<body>
<?php 
	$strEmail = "alan.schenk@holmesglen.edu.au";
	$strDomain = strstr($strEmail, '@');
	echo "<p>$strDomain</p>";
	
	$strUser = strstr($strEmail, '@', true);
	echo "<p>$strUser</p>";
	
	$strFinding = strstr($strEmail, 'xyz');
	echo $strFinding;
?>
</body>
</html>
