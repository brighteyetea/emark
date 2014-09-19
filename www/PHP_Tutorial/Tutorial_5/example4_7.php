<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Untitled Document</title>

</head>

<body>
<?php 
	$strString1 = "PHP is widely used in Web development";
	$strString2 = "PHP is widely used in web development";
	$strString3 = "PHP is widely used in Web development";
	// doesn't match
	$intMatch = strcmp($strString1, $strString2);
	//echo "<p>The comparison value of StrString1 and StrString2: $intMatch</p>";
	if($intMatch == 0) {
		echo "<p>Sring1 matches String2.</p>";	
	} else {
		echo "<p>String1 doesnot match String2</p>";	
	}
	// should be a match
	$intMatch = strcmp($strString1, $strString3);
	//echo "<p>The comparison value of StrString1 and StrString3: $intMatch</p>";
	if($intMatch == 0) {
		echo "<p>String1 matches String3</p>";	
	} else {
		echo "<p>String1 doesnot match String3</p>";	
	}
	
	echo $intMatch;
?>
</body>
</html>
