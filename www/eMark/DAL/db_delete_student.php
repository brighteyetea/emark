<?php 
/* Added by Jian on 2014-8-21 */
// This file is created to handle ajax request and delete a student

//require_once 'db_student.php';
include 'db_student.php';

$stuID = NULL;
$searchStr = NULL;

if(isset($_POST["stuID"])) {	// POST method to delete a student
	$stuID = $_POST["stuID"];
	deleteStudentByID();
	echo '{"rowsAffected":"' . $numRecords . '"}';
} /*else if(isset($_GET["opt"]) && $_GET["opt"] == "getAllStudents") {
	getAllStudents();
	header("location: ../PHP/view_students.php");
} */else if(isset($_GET["opt"]) && $_GET["opt"] == "checkStudentID") {
	$stuID = $_GET["stuID"];
	getStudentByID();
	echo '{"rowsAffected":"' . $numRecords . '"}';	
}/* else if(isset($_GET["opt"]) && $_GET["opt"] == "searchStudent") {
	$searchStr = $_GET["str"];
	searchStudent();	
}*/

?>