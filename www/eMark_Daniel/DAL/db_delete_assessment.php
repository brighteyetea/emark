<!-- Created by Daniel M on 2014.08.25 -->
<?php 

include 'db_assessment.php';

$assessmentID = "";

if(isset($_GET["assessmentID"])) {
	$assessmentID = $_GET["assessmentID"];
	deleteAssessment();
	if($numRecords == 1) {
		echo "<script type=\"text/jscript\">alert(\"Deleting Successful!\"); location.href=\"../PHP/view_assessments.php\";</script>";	
	} else {
			echo "<script type=\"text/jscript\">alert(\"Deleting Failed!\");</script>";	
	}
	//header("location: ../PHP/view_students.php");
	
}
//echo $classID . " " . $stuResID . " will be deleted";

	
?>