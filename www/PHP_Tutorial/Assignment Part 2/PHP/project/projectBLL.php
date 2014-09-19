
<?php 
require_once("../../DAL/db_functions_project.php");
//	Get all projects
function queryAll() {
	// function defined in db_functions.php
	selectAll("m_project");	
}

function getProjectById($projectNo) {
	selectSingle("m_project", "Project_No", $projectNo, "char");	
}

?>
