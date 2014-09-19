<?php 
/* Created by Jian on 2014-8-22 */
/* This page is created to handle ajax request to get comments of an assessment item, as well as to populate select menu in edit_assessmentitem.php */
include '../DAL/db_assessmentitem.php';

$itemID = "";
if(isset($_GET["assessmentItemID"])) {
	$itemID = $_GET["assessmentItemID"];
	getCommentsByAssessmentItemID($itemID);
	$rs = $stmt->fetchAll(PDO::FETCH_OBJ);
	echo json_encode($rs);	// return json data to client
	
} else if(isset($_GET["opt"]) && $_GET["opt"] == "getAllAssessmentIDs") {
	getAllAssessmentIDs();
	$rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
	echo json_encode($rs);	// return json data to client
	
} 
?>
