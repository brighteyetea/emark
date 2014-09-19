<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Validation Function</title>
</head>

<body>
<?php 
require_once("edit_branch.php");

$strBranch_Code = "";
$strBranch_name = "";
$strManager = "";
$strBranch_Address = "";
$strSuburb = "";
$strState = "";
$strPost_code = "";
$strPhone = "";
$strFax = "";


$booBranch_code = 0;
$booBranch_name = 0;
$booManager = 0;
$booBranch_Address = 0;
$booSuburb = 0;
$booState = 0;
$booPost_code = 0;
$booPhone = 0;
$booFax = 0;
$booOK = 1;	

function validateBranch($operationType, $strBranch_Code, $strBranch_name, $strManager, $strBranch_Address, $strSuburb, $strState, $strPost_code, $strPhone, $strFax) {

	global $booBranch_code, 
		$booBranch_name,
		$booManager,
		$booBranch_Address,
		$booSuburb,
		$booState,
		$booPost_code,
		$booPhone,
		$booFax,
		$booOK;
	
	if($operationType == "insert") {
		// check Branch_Code for insert operation
		if($strBranch_Code == NULL) {
			$booBranch_code = 1;
			$booOK = 0;	
		} else {
			$strBranch_Code = $_POST["strBranch_Code"];	
		}
	} else if($operationType == "update") {
		//	no need to check Branch_Code for update operation, simply set $booBranch_code = 0 and $booOK = 1
		$booBranch_code = 0;
		$booOK = 1;
	}
	//	Branch_name validation
	if($branchName == NULL) {
		$booBranch_name = 1;
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



?>
</body>
</html>