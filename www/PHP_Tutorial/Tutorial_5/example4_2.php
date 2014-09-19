<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Untitled Document</title>

</head>

<body>
<?php 
	$strSubjectCode = "ICT124A";
	$strSubjectName = "Web 2 Programming";
	$strConcat = $strSubjectCode . " " . $strSubjectName;
	$intLengthsc = strlen($strSubjectCode);
	$intLengthsn = strlen($strSubjectName);
	$intLengthc = strlen($strConcat);
	
	echo "<p>The string $strSubjectCode is $intLengthsc characters long.</p>";
	echo "<p>The string $strSubjectName is $intLengthsn characters long.</p>";
	echo "<p>The concatenated string $strConcat is $intLengthc characters long.</p>";
?>
</body>
</html>
