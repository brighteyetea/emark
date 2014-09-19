<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Delete Branch</title>

</head>

<body>
<?php 
require_once("db_functions.php");
if(isset($_GET["ID"])) {
	$Branch_Code = $_GET["ID"];	
} else {
	die("<span class='error'>Please select a Branch Code!</span><br/><br/>");	
}
deleteRecord("m_branch", "Branch_Code", $Branch_Code, "varchar");

//	Redirect to view_branch.php
header("Location: ../PHP/view_branch.php");
?>
</body>
</html>