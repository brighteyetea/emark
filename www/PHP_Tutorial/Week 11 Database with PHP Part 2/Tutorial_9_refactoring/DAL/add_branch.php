<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Add Branch</title>
</head>

<body>
<?php 
//	Include function library
require_once("db_functions.php");
if(isset($_POST["submit"])) {
	$strBranch_Code = $_POST["strBranch_Code"];
	$strBranch_name = $_POST["strBranch_name"];
	$strManager = $_POST["strManager"];
	$strBranch_Address = $_POST["strBranch_Address"];
	$strSuburb = $_POST["strSuburb"];
	$strState = $_POST["strState"];
	$intPost_code = $_POST["intPost_code"];
	$strPhone = $_POST["strPhone"];
	$strFax = $_POST["strFax"];
	
	insertBranch($strBranch_Code, $strBranch_name, $strManager, $strBranch_Address, $strSuburb, $strState, $intPost_code, $strPhone, $strFax);
	//	Redirect to the view branch page
	header("Location: ../PHP/view_branch.php");
}
?>
</body>
</html>