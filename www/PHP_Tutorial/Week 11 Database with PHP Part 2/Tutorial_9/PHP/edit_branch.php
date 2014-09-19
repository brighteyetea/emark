<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Edit Branch</title>
</head>
<link rel="stylesheet" type="text/css" href="../CSS/mavis.css" />
<body>
	<h2>Edit Branch Details</h2>
<?php 
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
	$strBranch_Code = $_POST["strBranch_Code"];	
	validateBranch();
	if($booOK) {
		updateBranch();
		//	Redirect to view_branch.php
		header("Location: view_branch.php");	
	}
} else {
	//	Collect branch code from link on view_branch.php page
	if(isset($_GET["ID"])) {
		$strBranch_Code = $_GET["ID"];
	}
	readQuerySingle("m_branch", "Branch_Code", $strBranch_Code, "NonNumeric");
	//	If there is a record, continue
	if($numRecords == 0) {
		echo "<span class='error'>No Matching Branch Found!!</span><br/><br/>";	
	} else {
		$arrRows = NULL;
		// Get first (and only result) from database
		$arrRows = $stmt->fetch(PDO::FETCH_ASSOC);
		$strBranch_Code = $arrRows["Branch_Code"];	
		$strBranch_name = $arrRows["Branch_name"];
		$strManager = $arrRows["Manager"];
		$strBranch_Address = $arrRows["Branch_Address"];
		$strSuburb = $arrRows["Suburb"];
		$strState = $arrRows["State"];
		$strPost_code = $arrRows["Post_code"];
		$strPhone = $arrRows["Phone"];
		$strFax = $arrRows["Fax"];
	}
}
//	Create table and populate it with data
echo "<form action='edit_branch.php' method='post'><table id='mavis'>";
echo "<tr><th>Branch Name</th><td><input type='text' name='strBranch_name' size='20' value='$strBranch_name' /></td>";
if($booBranch_name) echo "<td>Please enter a Branch_Name!</td>";
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