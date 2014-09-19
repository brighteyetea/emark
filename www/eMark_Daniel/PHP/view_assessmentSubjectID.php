<?php 
/* Created by Daniel M on 2014.08.25 */
/* This page is created to handle ajax requests from HTTP GET method, as well as to delete record from AssessmentItem table */
include '../DAL/db_assessment.php';

$assessmentID = "";
if(isset($_GET["assessmentID"])) {
	$assessmentID = $_GET["assessmentID"];
	getItemsByAssessmentID($assessmentID);
	$rs = $stmt->fetchAll(PDO::FETCH_OBJ);
	echo json_encode($rs);	// return json data to client
	
} else if(isset($_GET["opt"]) && $_GET["opt"] == "getAllSubjectIDs") 
{
	getAllSubjectIDs();
	$rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
	echo json_encode($rs);	// return json data to client
} 
?>
