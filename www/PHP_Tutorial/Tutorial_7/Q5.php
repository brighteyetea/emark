<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<!--
Create a form that collects 2 values (name the input text boxes Value_1, and Value_2) from the user and has a submit button. When the submit button is pressed PHP code should check to ensure each field has a value. 
 If either input item is empty, display a suitable specific message to the user to enter the missing value/s
If the values are present send the first value to a function named ValidateEmployee() and check that the first three characters are alphabetic, and then convert them to upper case, then check that the rest of the input is a number which is six digits long. If the value does not meet the requirements display a message to the user that tells them what the problem is and gives an example employee number. Pass the new version of the employee number back to the calling script and display the number on the screen.
Send the second value to a function named checkEmail() and include the functionality to ensure that the value has the characteristics required for an eMail address. Display a message if something is incorrect and provide an example. Pass the new version of the eMail address back to the calling script and display it on the screen.
-->
<body>
<?php
	require_once("FunctionsLibraryForQ5.php");
	$errMessage1 = "";
	$errMessage2 = "";
	$strValue1 = "";
	$strValue2 = "";
	$flag1 = 0;
	$flag2 = 0;
	if(isset($_POST["submit"])) {
		if($_POST["Value_1"] == "" || $_POST["Value_1"] == NULL) {
			$errMessage1 = "Please input value for Value1";	
			$flag1 = 0;	
		} else {
			$strValue1 = $_POST["Value_1"];
			$flag1 = 1;	// ready for submitting
		}
		if($_POST["Value_2"] == "" || $_POST["Value_2"] == NULL) {
			$errMessage2 = "Please input value for Value2";	
			$flag2 = 0;
		} else {
			$strValue2 = $_POST["Value_2"];
			$flag2 = 1;	// ready for submitting
		}
		// both Value1 and Value2 have content
		if($flag1 && $flag2) {
			// Value1 validation
			$result = ValidateEmployee($strValue1);
			$returnMessage = explode(":", $result);
			if($returnMessage[0] == "success") {
				$strValue1 = $returnMessage[1];	
			} else {
				$errMessage1 = $returnMessage[1];	
			}
			// Value2 validation
			$result = checkMail($strValue2);
			$returnMessage = explode(":", $result);
			if($returnMessage[0] == "success") {
				$strValue2 = $returnMessage[1];	
			} else {
				$errMessage2 = $returnMessage[1];	
			}
			
		}
	}
	
?>

<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
<table border="0" cellpadding="3">
	<tr>
		<td bgcolor="#CCCCCC" align="center" width="200" height="20">Name</td>
		<td bgcolor="#CCCCCC" align="center" width="200" height="20">Value</td>
        <td bgcolor="#CCCCCC" align="center" width="300" height="20">comment</td>
	</tr>
	<tr>
		<td align="left">Value1</td>
		<td align="left"><input type="text" name="Value_1" value="<?php echo $strValue1 ?>"/></td>
        <td align="left"><?php echo $errMessage1; ?></td>
	</tr>
    <tr>
		<td align="left">Value2</td>
		<td align="left"><input  type="text" name="Value_2" value="<?php echo $strValue2 ?>"/></td>
        <td align="left"><?php echo $errMessage2; ?></td>
	</tr>
    <tr>
		<td align="left"></td>
		<td align="left"><input type="submit" name="submit" /></td>
	</tr>
</form>

</body>
</html>