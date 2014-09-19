<?php 
// Include database function library
require_once("db_functions.php");
// Use isset() to check if the submit button has been pressed
if(isset($_POST["submit"])) {
	// Create global variables and assign them the values held in $_POST array which was passed from the add_branch.htm form
	$strConsultant_Id = $_POST["strConsultant_Id"];
	$strBranch_name = $_POST["strBranch_name"];	
	$strManager = $_POST["strManager"];
	$strBranch_Address = $_POST["strBranch_Address"];
	$strSuburb = $_POST["strSuburb"];
	$strState = $_POST["strState"];
	$intPost_code = $_POST["intPost_code"];
	$strPhone = $_POST["strPhone"];
	$strFax = $_POST["strFax"];
	echo "$$strBranch_Code, $strBranch_name, $strManager, $strBranch_Address, $strSuburb, $strState, $strPost_code, $strPhone, $strFax";
	insertBranch();
	header("Location: ../PHP/view_branch.php");
}
	
?>