<?php

function validateItemComment() {
	global $commentID, $comment, $itemID;
	global $booCommentID, $booComment, $booItemID, $booOK;
	
	if($_POST["hidAssessmentItemID"] == NULL) {
		$booItemID = 1;	// Set the value as 1 ==> an error message should be displayed
		$booOK = 0;	// Set the value as 0 ==> the validation is failed	
	} else {
		$itemID = $_POST["hidAssessmentItemID"];	
	}
	
	if($_POST["txtItemCommentID"] == NULL) {
		$booCommentID = 1;
		$booOK = 0;	
	} else {
		$commentID = $_POST["txtItemCommentID"];	
	}
	
	if($_POST["txtItemComment"] == NULL) {
		$booComment = 1;
		$booOK = 0;	
	} else {
		$comment = $_POST["txtItemComment"];	
	}
	
}

?>