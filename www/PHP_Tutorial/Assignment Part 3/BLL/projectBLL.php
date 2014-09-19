
<?php 
require_once("../DAL/projectDAL.php");

// Select all projects
function getAllProjects() {
	readQuery("m_project");	
}

// Select single project by project id
function getProjectById($projectNo) {
	readQuerySingle("m_project", "Project_No", $projectNo, "char");	
}

// Update a record in m_project table
function updateProjectByNo() {
	//global $strProjectNo, $strProjectName, $strProjectDescription, $strProjectManager, $strStartDate, $strFinishDate, $strBudget, $strCostToDate, $strTrackingStatement, $strClientNo;	
	
	updateProject();	
}

// Select all project_consultant
function getAllProjectsConsultant() {
	readQuery("m_project_consultant");	
}

// Select projects_constant based on Project_No
function getProjectsByProjectNo($projectNo) {
	readQuerySingle("m_project_consultant", "Project_No", $projectNo, "NonNumeric");	
}

// Insert a record in m_project table
function addProject() {
	insertProject();	
}

// Insert a record in m_project_consultant table
function addProjectConsultant() {
	//echo "in BLL insertProjectConsultant()...";
	insertProjectConsultant();
}

// Select all Consultants
function getAllConsultants() {
	readQuery("m_consultant");	
}

// Select a record from project_consultant table based on primary key
function getSingleProjectConsultant($consultantID, $projectNo) {
	selectSingleRecord("m_project_consultant", "Consultant_Id", $consultantID, "NonNumeric", "Project_No", $projectNo, "NonNumeric");	
}

// Update a record in project_consultant table
function updateSingleProjectConsultant() {
	//global $strConsultant_Id, $strProject_No, $strDate_Assigned, $strDate_Completed, $strRole, $strHours_Worked;
	updateProjectConsultant();
}

// Delete a record in project table
function deleteProjectByNo($projectNo) {
	deleteRecord("m_project", "Project_No", $projectNo, "char");
}

// Delete a record in project_consultant table
function deleteSingleProjectConsultant() {
	global $strConsultant_Id, $strProject_No, $strDate_Assigned, $strDate_Completed, $strRole, $strHours_Worked;
	deleteProjectConsultant("m_project_consultant", "Consultant_Id", $strConsultant_Id, "char", "Project_No", $strProject_No, "char");
}
?>
