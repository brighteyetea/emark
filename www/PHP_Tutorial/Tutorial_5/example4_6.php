<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Untitled Document</title>

</head>

<body>
<?php 
	$strParagraph = "the server-side scripting language PHP is widely used and is especially suited for web programming.";
	echo "<p>$strParagraph<p>";
	
	// convert to all upper case
	$strNewOutput = strtoupper($strParagraph);
	echo "<p>$strNewOutput</p>";
	
	// convert to all lower case
	$strNewOutput = strtolower($strParagraph);
	echo "<p>$strNewOutput</p>";
	
	// The first character will start with a capital letter
	$strNewOutput = ucfirst($strParagraph);
	echo "<p>$strNewOutput</p>";
	
	// each word starts with a capital letter
	$strNewOutput = ucwords($strParagraph);
	echo "<p>$strNewOutput</p>";
?>
</body>
</html>
