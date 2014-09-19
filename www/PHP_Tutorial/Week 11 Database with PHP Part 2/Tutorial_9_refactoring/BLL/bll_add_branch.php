<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Add Branch in BLL</title>
</head>

<body>
<?php 
require_once("add_branch.php");

require_once("../DAL/db_functions.php");
require_once("validation_functions.php");

if(isset($_POST["submit"])) {
	$strBranch_Code = $_POST["strBranch_Code"];	
	$strBranch_name = $_POST["strBranch_name"];	
	$strManager = $_POST["strManager"];	
	$strBranch_Address = $_POST["strBranch_Address"];	
	$strSuburb = $_POST["strSuburb"];	
	$strState = $_POST["strState"];		
	$strPost_code = $_POST["strPost_code"];		
	$strPhone = $_POST["strPhone"];		
	$strFax = $_POST["strFax"];	
		
	validateBranch("insert", $strBranch_Code, $strBranch_name, $strManager, $strBranch_Address, $strSuburb, $strState, $strPost_code, $strPhone,
 $strFax);

 	if($booOK) {
		insertBranch($strBranch_Code, $strBranch_name, $strManager, $strBranch_Address, $strSuburb, $strState, $strPost_code, $strPhone, $strFax);
		//	Redirect to view_branch.php
		header("Location: ../PHP/view_branch.php");	 
	}
	
	
}

?>
</body>
</html>