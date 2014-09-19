<?php 

include 'db_assessmentitem.php';

$itemID = "";

if(isset($_GET["assessmentItemID"])) {	// GET method to delete an assessment item
	$itemID = $_GET["assessmentItemID"];
	deleteAssessmentItem();
	if($numRecords == 1) {
		echo "<script type=\"text/jscript\">alert(\"Deleting Successful!\"); location.href=\"../PHP/view_assessmentitems.php\";</script>";	
	} else {
			echo "<script type=\"text/jscript\">alert(\"Deleting Failed!\");</script>";	
	}
	//header("location: ../PHP/view_students.php");
} else if(isset($_GET["opt"])) {
	if($_GET["opt"] == "checkItemID") {
		$itemID = $_GET["itemID"];
		getAssessmentItemByItemID();
		echo '{"rowsAffected":"' . $numRecords . '"}';		
	}	
}
//echo $classID . " " . $stuResID . " will be deleted";

	
?>