<?php

function validateStudent() {
	global $stuID, $fname, $lname;
	global $booStuID, $booFName, $booLName, $booOK;
	
	if($_POST["hidStudentID"] == NULL) {
		$booStuID = 1;	// Set the value as 1 ==> an error message should be displayed
		$booOK = 0;	// Set the value as 0 ==> the validation is failed	
	} else {
		$stuID = $_POST["hidStudentID"];	
	}
	
	if($_POST["txtFirstname"] == NULL) {
		$booFName = 1;
		$booOK = 0;	
	} else {
		$fname = $_POST["txtFirstname"];	
	}
	
	if($_POST["txtLastname"] == NULL) {
		$booLName = 1;
		$booOK = 0;	
	} else {
		$lname = $_POST["txtLastname"];	
	}
	
}

?>