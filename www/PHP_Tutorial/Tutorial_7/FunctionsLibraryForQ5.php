<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
	/*
	This function checks that the first three characters are alphabetic, and then convert them to upper case. 
	Then, check that the rest of the input is a number which is six digits long. 
	If the value does not meet the requirements display a message to the user that tells them what the problem is.
	Gives an example employee number.
	*/
	function ValidateEmployee($strTemp) {
		// get the first three characters
		$str1 = substr($strTemp, 0, 3);
		// get the rest remaining characters of the string
		$str2 = substr($strTemp, 3);
		// ctype_alpha() is used to check if the provided string is alphabetic
		
		if(ctype_alpha($str1)) {
			// check the length 
			if(strlen($str2) == 6) {
				// ctype_digit is used to check if the provided string is numeric
				if(ctype_digit($str2)) {
					$str1 = strtoupper($str1);
					$strConverted = "success:" . $str1 . $str2;
					//$arrResult[] = $strConverted;
					return $arrResult = $strConverted;
				}
			}
		} 	
		$arrResult = "error:Please input content beginning with 3 alphabets and followed by 6 digits XXXDDDDDD";
		return $arrResult;
	}
	
	/*
	This functionality is to ensure that the value has the characteristics required for an eMail address. 
	Display a message if something is incorrect and provide an example. 
	Pass the new version of the eMail address back to the calling script and display it on the screen.
	*/
	
	function checkMail($strAddress) {
		$result = filter_var($strAddress, FILTER_VALIDATE_EMAIL) ? "success:$strAddress" : "error:Email format incorrect, try xxx@xxx.xxx";
		return $result;
	}
	
	
?>
</body>
</html>