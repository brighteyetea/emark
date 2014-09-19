<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>../DAL/Add Branch.php</title>
</head>
<link rel="stylesheet" type="text/css" href="../CSS/mavis.css" />
<body>
<h2>Add a New Branch</h2>
<?php 
//	Include function library
require_once("../DAL/db_functions.php");
require_once("../BLL/validation_functions.php");

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


if(isset($_POST["submit"])) {
	
	
	validateBranch();
	//$strBranch_name = $_POST["strBranch_name"];
//	$strManager = $_POST["strManager"];
//	$strBranch_Address = $_POST["strBranch_Address"];
//	$strSuburb = $_POST["strSuburb"];
//	$strState = $_POST["strState"];
//	$intPost_code = $_POST["intPost_code"];
//	$strPhone = $_POST["strPhone"];
//	$strFax = $_POST["strFax"];
	if($booOK) {
		//	if validation successful, inserting...
		insertBranch();
		//	Redirect to the view branch page
		header("Location: ../PHP/view_branch.php");
	} 
} 

//	Create table and populate it with data
echo "<form action='add_branch.php' method='post'><table id='mavis'>";
echo "<tr><th>Branch Code</th><td><input type='text' name='strBranch_Code' size='20' value='$strBranch_Code' /></td>";
if($booBranch_code) echo "<td>Please enter a Branch Code!</td>";
echo "</tr><tr><th>Branch Name</th><td><input type='text' name='strBranch_name' size='20' value='$strBranch_name' /></td>";
if($booBranch_name) echo "<td>Please enter a Branch Name!</td>";
echo "</tr><tr><th>Manager</th><td><input type='text' name='strManager' size='20' value='$strManager' /></td>";
if($booManager) echo "<td>Please enter a Manager!</td>";
echo "</tr><tr><th>Branch Address</th><td><input type='text' name='strBranch_Address' size='30' value='$strBranch_Address' /></td>";
if($booBranch_Address) echo "<td>Please enter a Branch address!</td>";
echo "</tr><tr><th>Suburb</th><td><input type='text' name='strSuburb' size='20' value='$strSuburb' /></td>";
if($booSuburb) echo "<td>Please enter a Suburb!</td>";
echo "</tr><tr><th>State</th><td><input type='text' name='strState' size='20' value='$strState' /></td>";
if($booState) echo "<td>Please enter a State!</td>";
echo "</tr><tr><th>Post Code</th><td><input type='text' name='strPost_code' size='20' value='$strPost_code' /></td>";
if($booPost_code) echo "<td>Please enter a Post_Code!</td>";
echo "</tr><tr><th>Phone</th><td><input type='text' name='strPhone' size='20' value='$strPhone' /></td>";
if($booPhone) echo "<td>Please enter a Phone Number!</td>";
echo "</tr><tr><th>Fax</th><td><input type='text' name='strFax' size='20' value='$strFax' /></td>";
if($booFax) echo "<td>Please enter a Fax Number!</td>";
echo "<tr><td><input type='hidden' name='strBranch_Code' value='$strBranch_Code' /></td></tr>";
echo "<tr><td></td><td><input type='submit' name='submit' value='Submit New Details' /></td></tr></table></form>";
?>
</body>
</html>