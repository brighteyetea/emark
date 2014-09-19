<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>delete_branch.php</title>
</head>

<body>
<?php 
// Includes database functions library
require_once("db_functions.php");
// Collects Branch_Code value from link on view_branch.php page
if(isset($_GET["ID"])) {
	$strBranch_Code = $_GET["ID"];	
} else{
	// If there is no ID, then stops processing on this page
	die("<span class='error'>Please select a Branch_Code!</span><br/><br/>");	
}
deleteRecord("m_branch", "Branch_Code", $strBranch_Code, "varchar");
header("Location: ../PHP/view_branch.php");
?>
</body>
</html>