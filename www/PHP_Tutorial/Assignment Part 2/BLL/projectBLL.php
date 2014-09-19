
<?php 
require_once("../PHP/add_project.php");
//require_once("../DAL/delete_project.php");
require_once("../DAL/db_functions_project.php");
//	Get all projects
function queryAll() {
	// function defined in db_functions.php
	selectAll("m_project");	
}

function getProjectById($projectNo) {
	selectSingle("m_project", "Project_No", $projectNo, "char");	
}

function deleteProjectByNo($projectNo) {
	deleteProject("m_project", "Project_No", $projectNo, "char");
}
function addProject() {
	global $strProjectNo, $strProjectName, $strProjectDescription, $strProjectManager, $strStartDate, $strFinishDate, $strBudget, $strCostToDate, $strTrackingStatement, $strClientNo;	
	
	insertProject($strProjectNo, $strProjectName, $strProjectDescription, $strProjectManager, $strStartDate, $strFinishDate, $strBudget, $strCostToDate, $strTrackingStatement, $strClientNo);
}

function updateProjectByNo() {
	global $strProjectNo, $strProjectName, $strProjectDescription, $strProjectManager, $strStartDate, $strFinishDate, $strBudget, $strCostToDate, $strTrackingStatement, $strClientNo;	
	
	updateProject($strProjectNo, $strProjectName, $strProjectDescription, $strProjectManager, $strStartDate, $strFinishDate, $strBudget, $strCostToDate, $strTrackingStatement, $strClientNo);	
}

?>
