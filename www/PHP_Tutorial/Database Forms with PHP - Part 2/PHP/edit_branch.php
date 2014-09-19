<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>edit_branch.php</title>
<link rel="stylesheet" type="text/javascript" href="../CSS/mavis.css"/>
</head>

<body>
<h2>Edit Branch Details</h2>
<?php 
// Include database function library
require_once("../DAL/db_functions.php");
$strBranch_Code = "";
$strBranch_name = "";
$strManager = "";
$strBranch_Address = "";
$strSuburb = "";
$strState = "";
$strPost_code = "";
$strPhone = "";
$strFax = "";

// Each variable keeps track of individual fields so that error messages can be shown
$booBranch_Code = 0;
$booBranch_name = 0;
$booManager = 0;
$booBranch_Address = 0;
$booSuburb = 0;
$booState = 0;
$booPost_code = 0;
$booPhone = 0;
$booFax = 0;
// This variable will be set to false if any value is missing
$booOK = 1;
// Use isset() to determine if the submit button has been pressed. If it did, it is updating, otherwise it is just getting data from database
if(isset($_POST["submit"])) {
	// Gets Branch_Code from hidden field of the form
	$strBranch_Code = $_POST["strBranch_Code"];
	
	if($_POST["strBranch_name"] == NULL) {
		$booBranch_name = 1;
		$booOK = 0;	
	} else {
		$strBranch_name = $_POST["strBranch_name"];	
	}
	if($_POST["strManager"] == NULL) {
		$booManager = 1;
		$booOK = 0;	
	} else {
		$strManager = $_POST["strManager"];	
	}
	if($_POST["strBranch_Address"] == NULL) {
		$booBranch_Address = 1;
		$booOK = 0;	
	} else {
		$strBranch_Address = $_POST["strBranch_Address"];	
	}
	if($_POST["strSuburb"] == NULL) {
		$booSuburb = 1;
		$booOK = 0;	
	} else {
		$strSuburb = $_POST["strSuburb"];
	}
	if($_POST["strState"] == NULL) {
		$booState = 1;
		$booOK = 0;	
	} else {
		$strState = $_POST["strState"];	
	}
	if($_POST["strPost_code"] == NULL) {
		$booPost_code = 1;
		$booOK = 0;	
	} else {
		$strPost_code = $_POST["strPost_code"];	
	}
	if($_POST["strPhone"] == NULL) {
		$booPhone = 1;
		$booOK = 0;	
	} else {
		$strPhone = $_POST["strPhone"];	
	}
	if($_POST["strFax"] == NULL) {
		$booFax = 1;
		$booOK = 0;	
	} else {
		$strFax = $_POST["strFax"];	
	}
	echo "after submitting...booOK=$booOK, booBranch_name=$booBranch_name";
	if($booOK) {
		updateBranch();

		header("Location: view_branch.php");	
	}
} else {
	// The following code activates when the form is first run before the submit button is pressed. It obtains a record from database and assigns column value to variables for later use.
	// Collect Branch_Code from link on view_branch.php page
	
	if(isset($_GET["ID"])) {
		$strBranch_Code = $_GET["ID"];	
	}	
	readQuerySingle("m_branch", "Branch_Code", $strBranch_Code, "NonNumeric");
	if($numRecords == 0) {
		echo "<span class='error'>No Matching Branch Found!</span><br/><br/>";	
	} else {
		// Resetting the variable that will hold the record to null
		$arrRows = NULL;
		// Gets first (and only result) from database
		$arrRows = $stmt->fetch(PDO::FETCH_ASSOC);
		// Assigns values into variables for later use
		$strBranch_name	= $arrRows["Branch_name"];
		$strManager = $arrRows["Manager"];
		$strBranch_Address = $arrRows["Branch_Address"];
		$strSuburb = $arrRows["Suburb"];
		$strState = $arrRows["State"];
		$strPost_code = $arrRows["Post_code"];
		$strPhone = $arrRows["Phone"];
		$strFax = $arrRows["Fax"];
	}
}
// Creates table for Branch and populates it with the data
	echo "<form action='edit_branch.php' method='post'>";
	echo "<table id='mavis'>";
	echo "<tr><th>Branch Name</th><td><input type='text' name='strBranch_name' size='20' value='" . $strBranch_name . "'/></td>";
	if($booBranch_name) {
		echo "<td>Please enter a Branch Name!</td>";	
	}
	echo "</tr><tr><th>Manager</th><td><input type='text' name='strManager' size='20' value='" . $strManager . "'/></td>";
	if($booManager) {
		echo "<td>Please enter a Manager!</td>";	
	}
	echo "</tr><tr><th>Branch Address</th><td><input type='text' name='strBranch_Address' size='30' value='" . $strBranch_Address . "'/></td>";
	if($booBranch_Address) {
		echo "<td>Please enter a Branch Address!</td>";	
	}
	echo "</tr><tr><th>Suburb</th><td><input type='text' name='strSuburb' size='20' value='" . $strSuburb . "'/></td>";
	if($booSuburb) {
		echo "<td>Please enter a Suburb!</td>";	
	}
	echo "</tr><tr><th>State</th><td><input type='text' name='strState' size='5' value='" . $strState . "'/></td>";
	if($booState) {
		echo "<td>Please enter a State!</td>";	
	}
	echo "</tr><tr><th>Post Code</th><td><input type='text' name='strPost_code' size='5' value='" . $strPost_code . "'/></td>";
	if($booPost_code) {
		echo "<td>Please enter a Post Code</td>";	
	}
	echo "</tr><tr><th>Phone</th><td><input type='text' name='strPhone' size='15' value='" . $strPhone . "'/></td>";
	if($booPhone) {
		echo "<td>Please enter a Phone Number!</td>";	
	}
	echo "</tr><tr><th>Fax</th><td><input type='text' name='strFax' size='15' value='" . $strFax . "'/></td>";
	if($booFax) {
		echo "<td>Please enter a Fax Number</td>";	
	}
	echo "</tr><tr><td></td><td><input type='hidden' name='strBranch_Code' value='" . $strBranch_Code . "'/></td></tr>";
	echo "<tr><td></td><td><input type='submit' name='submit' value='Submit New Details'/></td></tr>";
	echo "</table>";
	echo "</form>";
?>
</body>
</html>