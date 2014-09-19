<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<!--
7. Develop a PHP script that uses at least three sub string function's to perform different tasks that demonstrate the usefulness of the commands and use the echo command to display the various outputs on the screen so that person reading the script and running the script would understand the behavior and purpose of the functions. Document the script with comments that describe each section.
-->
<body>
<?php 
	$strEmail = "mikogue@hotmail.com";
	
	/*
	use strstr() to get substring depending on whether before or 
	after a specific character
	*/
	$strUserName = strstr($strEmail, '@', true);
	echo '<p>' . $strUserName . '<p>';
	$strDomain = strstr($strEmail, '@', false);
	echo '<p>' . $strDomain . '</p>';
	
	/*
	use strripos(), strrpos() to find the last occurrence of a 
	substring in a string
	*/
	$strBookTitle = "Looking for AliBrandi";
	echo "<p>$strBookTitle</p>";
	$lowercasePosition = strrpos($strBookTitle, 'o');
	if($lowercasePosition != false) {
		echo '<p>Lowercase letter \'o\' last appears at position ' . $lowercasePosition . '</p>';	
	} else {
		echo 'Nothing found';	
	}
	$uppercasePosition = strrpos($strBookTitle, 'O');
	if($uppercasePosition != false) {
		echo '<p>Uppercase letter \'0\' last appears at position ' . $uppercasePosition . '</p>';
	} else {
		echo 'Nothing found';	
	}
	$position = strripos($strBookTitle, 'a');
	if($position != false) {
		echo '<p>Character \'a\' or \'A\' last appears at position ' . $position;	
	} else {
		echo 'Nothing found';	
	}
	
	/*
	use substr() to return part of a string
	*/
	$strTest = "ABCDEFG";
	$subString = substr($strTest, 0);
	echo "<p>$subString</p>";	//ABCDEFG
	$subString = substr($strTest, 0, 4);	// ABCD
	echo "<p>$subString</p>";
	$subString = substr($strTest, 2, 3);	//CDE
	echo "<p>$subString</p>";
	$subString = substr($strTest, -4);	//DEFG
	echo "<p>$subString</p>";
	$subString = substr($strTest, -6, -2);	//BCDE
	echo "<p>$subString</p>";
?>
</body>
</html>