<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<!--
8. Develop a second PHP script that uses three additional string functions that would be useful to you as a PHP programmer. Once again use the echo command and comments in the code to ensure someone looking at the script would understand the nature and purpose of the functions.
-->
<body>
<?php
	/*
	use strtolower() and strtoupper() to convert a string to lowercase 
	or uppercase
	*/
	$strTest = "Hello World!";
	$strLowercase = strtolower($strTest);
	echo "<p>$strLowercase</p>";
	$strUppercase = strtoupper($strTest);
	echo "<p>$strUppercase</p>";
	
	/*
	use str_replace() to replace a substring in a string
	*/

	$strEmail1 = "mikogue@holmesglen.edu.au";
	$strEmail2 = str_replace("mikogue", "Alan.Schenk", $strEmail1);
	echo "<p>$strEmail2</p>";
	$strEmail2 = str_replace("holmesglen.edu.au", "hotmail.com", $strEmail1);
	echo "<p>$strEmail2</p>";
	
	
?>
</body>
</html>