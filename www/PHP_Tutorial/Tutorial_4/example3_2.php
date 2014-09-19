<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<!-- HTML and PHP code combined together -->
<h3>Please enter the following details:</h3>
<form action="example3_2.php"  method="post">
	<p>
		<label for="strFirstname">Firstname:</label>
		<input type="text" name="strFirstname" id="strFirstname"/>
	</p>
	<p>
		<label for="stuSurname">Surname</label>
		<input type="text" name="strSurname" id="strSurname"/>
	</p>
	<p>
		<label for="intAge">Age(years)</label>
		<input type="text" name="intAge" id="intAge"/>
	</p> 
	<p>
		<input type="submit"/>
	</p>
	
</form>

<?php
	$strFirstname = $_POST["strFirstname"];
	$strSurname = $_POST["strSurname"];
	$intAge = $_POST["intAge"];
	echo "<p>Hello $strFirstname $strSurname</p>";
	echo "<p>Your age is $intAge</p>";
	
?>
</body>
</html>