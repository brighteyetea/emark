<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Untitled Document</title>

</head>

<body>
<?php 
	$strSubject = "ICT124A Web 2 Programming";
	echo "<p>The existing details for the subject are $strSubject.</p>";
	
	$strNewOutput = str_replace("ICT124A", "ICT125", $strSubject);
	echo "<p>The new details for the subject are $strNewOutput</p>";
?>
</body>
</html>
