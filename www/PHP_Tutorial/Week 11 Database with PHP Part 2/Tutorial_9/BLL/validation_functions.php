<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Validation</title>
</head>

<body>
<?php
require_once("../DAL/db_functions.php");
function validateBranch() {
	global 	$strBranch_Code, $strBranch_name, $strManager, $strBranch_Address, $strSuburb, $strState, $strPost_code, $strPhone, $strFax;
	global $booBranch_code, $booBranch_name, $booManager, $booBranch_Address, $booSuburb, $booState, $booPost_code, $booPhone, $booFax, $booOK;
	if($_POST["strBranch_Code"] == NULL) {
		//	setting to 1 indicats an error message should be displayed
		$booBranch_code = 1;
		//	setting to 0 indicats the validation is failed
		$booOK = 0;	
		echo "Branch Code has no value";
	} else {
		$strBranch_code = $_POST["strBranch_Code"];	
	}
	//	Branch_name validation
	if($_POST["strBranch_name"] == NULL) {
		//	setting to 1 indicats an error message should be displayed
		$booBranch_name = 1;
		//	setting to 0 indicats the validation is failed
		$booOK = 0;	
	} else {
		$strBranch_name = $_POST["strBranch_name"];	
	}
	//	Manager validation
	if($_POST["strManager"] == NULL) {
		$booManager = 1;
		$booOK = 0;	
	} else {
		$strManager = $_POST["strManager"];	
	}
	//	Address validation
	if($_POST["strBranch_Address"] == NULL) {
		$booBranch_Address = 1;
		$booOK = 0;	
	} else {
		$strBranch_Address = $_POST["strBranch_Address"];	
	}
	//echo "Branch Address: " . $strBranch_Address;
	//	Suburb validation
	if($_POST["strSuburb"] == NULL) {
		$booSuburb = 1;
		$booOK = 0;	
	} else {
		$strSuburb = $_POST["strSuburb"];	
	}
	// State validation
	if($_POST["strState"] == NULL) {
		$booState = 1;
		$booOK =0;	
	} else {
		$strState = $_POST["strState"];	
	}
	//	Post code validation
	if($_POST["strPost_code"] == NULL) {
		$booPost_code = 1;
		$booOK = 0;	
	} else {
		$strPost_code = $_POST["strPost_code"];	
	}
	//	Phone validation
	if($_POST["strPhone"] == NULL) {
		$booPhone = 1;
		$booOK = 0;	
	} else {
		$strPhone = $_POST["strPhone"];	
	}
	//	Fax validation
	if($_POST["strFax"] == NULL) {
		$booFax = 1;
		$booOK = 0;	
	} else {
		$strFax = $_POST["strFax"];	
	}
}

function checkForDeletion($table, $column, $colValue, $colType) {
	$count = 0;
	$count = readQuerySingle($table, $column, $colValue, $colType);
	if($count >= 1) {
		//	If should not be deleted, return false
		return false;	
	} else {
		//	If can be deleted, return true
		return true;	
	}
}
?>
</body>
</html>