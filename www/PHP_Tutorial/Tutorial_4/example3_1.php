<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
	$strFirstname = $_POST["strFirstname"];
	$strSurname = $_POST["strSurname"];
	$intAge = $_POST["intAge"];
	echo "<p>Hello $strFirstname $strSurname</p>";
	echo "<p>Your age is $intAge</p>";
?>
</body>
</html>