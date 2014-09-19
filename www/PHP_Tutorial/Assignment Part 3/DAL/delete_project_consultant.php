<?php 
// Include business logical layer library
//require_once("../BLL/projectBLL.php");
require_once("db_functions.php");
// Global variables 
$strConsultant_Id = ""; 
$strProject_No = ""; 

$strDate_Assigned = "";
$strDate_Completed = ""; 
$strRole = ""; 
$strHours_Worked = "";
if(isset($_GET["consultantID"])) {
	$strConsultant_Id = $_GET["consultantID"];	
}
if(isset($_GET["projectNo"])) {
	$strProject_No = $_GET["projectNo"];	
}
//deleteSingleProjectConsultant();
deleteProjectConsultant("m_project_consultant", "Consultant_Id", $strConsultant_Id, "char", "Project_No", $strProject_No, "char");
if($numRecords > 0) {
	echo "<script language=\"JavaScript\">alert('Deletion Successful');location.replace(\"../PHP/view_projects_consultant.php?ID=$strProject_No\");</script>";	
} else {
	echo "<script language=\"JavaScript\">alert('Deletion Failed');location.replace(\"../PHP/view_projects_consultant.php?ID=$strProject_No\");</script>";	
}

//header("Location: ../PHP/view_projects_consultant.php?ID=$strProject_No");
echo "<br/><a href='../PHP/view_projects_consultant.php?ID=$strProject_No'>Return to View Project_Consultant</a>";
?>