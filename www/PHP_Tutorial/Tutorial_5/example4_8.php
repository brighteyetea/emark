<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Untitled Document</title>

</head>

<body>
<?php 
	$strName1 = "Alan Schenk";
	$strName2 = "Allan Schenk";
	$strName3 = "Alan Shenk";
	$strName4 = "Alan Smith";
	
	similar_text($strName1, $strName2, $percent);
	echo "<p>The degree of similarity between string1 and string2 is $percent percent</p>";
	
	similar_text($strName1, $strName3, $percent);
	echo "<p>The degree of similarity between string1 and string3 is $percent percent</p>";
	
	similar_text($strName1, $strName4, $percent);
	echo "<p>The degree of similarity between string1 and string4 is $percent percent</p>";
	
	similar_text($strName1, $strName3, $percent);
	$percent = Round($percent);
	echo "<p>The degree of similarity between string1 and string3 is $percent percent</p>";
?>
</body>
</html>
