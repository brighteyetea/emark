<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>BLL for Consultant</title>
</head>

<body>
<?php 
require_once("../DAL/db_functions.php");

// Select all consultants
function queryAll() {
	// function defined in db_functions.php
	readQuery("m_consultant");	
}


?>

</body>
</html>