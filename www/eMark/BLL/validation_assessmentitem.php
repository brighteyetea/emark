<?php

function validateAssessmentItem() {
	global $itemID, $itemName, $description, $assessmentID, $itemMark, $institute;
	global $booItemID, $booItemName, $booDescription, $booAssessmentID, $booItemMark, $booInstitute, $booOK;

	if($_POST["hidItemID"] == NULL) {
		$booItemID = 1;	// Set the value as 1 ==> an error message should be displayed
		$booOK = 0;	// Set the value as 0 ==> the validation is failed	
	} else {
		$itemID = $_POST["hidItemID"];	
	}
	
	if($_POST["txtItemName"] == NULL) {
		$booItemName = 1;
		$booOK = 0;	
	} else {
		$itemName = $_POST["txtItemName"];	
	}
	
	if($_POST["txtDescription"] == NULL) {
		$booDescription = 1;
		$booOK = 0;	
	} else {
		$description = $_POST["txtDescription"];	
	}
	
	if($_POST["selectAssessmentID"] == NULL) {
		$booAssessmentID = 1;
		$booOK = 0;	
	} else {
		$assessmentID = $_POST["selectAssessmentID"];	
	}
	
	if($_POST["txtItemMark"] == NULL) {
		$booItemMark = 1;
		$booOK = 0;	
	} else {
		$itemMark = $_POST["txtItemMark"];	
	}
	
	if($_POST["txtInstitute"] == NULL) {
		$booInstitute = 1;
		$booOK = 0;	
	} else {
		$institute = $_POST["txtInstitute"];	
	}
}

?>