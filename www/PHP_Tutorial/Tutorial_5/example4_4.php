<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Untitled Document</title>

</head>

<body>
<?php 
	$strSubjectName = "Web 2 Programming";
	$strFinder = strstr($strSubjectName, 'P');
	echo "<p>$strFinder</p>";
	
	$strFinder = strstr($strSubjectName, 'p');
	/* 
	if($strFinder == false) {
		echo "<p>No Match</p>";
	} else {
		echo "<p>$strFinder</p>";	
	}
	*/
	if(strlen($strFinder) > 0) {
		echo "<p>$strFinder</p>";
	} else {
		echo "No Match";	
	}
	
	$strFinder = stristr($strSubjectName, 'p');
	echo "<p>$strFinder</p>";
?>
</body>
</html>
