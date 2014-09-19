<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link rel="stylesheet" type="text/css" href="../CSS/mavis.css" />
<link rel="stylesheet" type="text/css" href="../CSS/style.css" />
<link href='http://fonts.googleapis.com/css?family=Varela' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Orbitron:400,500,700,900' rel='stylesheet' type='text/css'>
</head>

<body>
<header class="12u-first" >
			
    <h1><span>Mc</span>Millian IT System Management</h1>
    
    <div class="menu-top"></div>
    
    <nav class="menu">
        
        <ul id="menu">
        
            <li><a href="../HTML/index.html" title="">Home</a></li>
                                    
            <li><a href="../PHP/view_projects.php" title="">View Projects</a></li>
            
            <li><a href="../PHP/view_consultants.php" title="">View Consultants</a></li>
            
            <li><a href="../PHP/view_projects_consultant.php" title="">View Project Staffing</a></li>
            
        </ul>
        
    </nav>

</header>
<h2>Add a Consultant to a Project</h2>
<?php 
// Include database function library
require_once("../BLL/projectBLL.php");
//require_once("../DAL/db_functions.php");
// A variable to keep track of when to clear the form
$blnblankForm = 0;
if(isset($_POST["submit"])) {
	$strConsultant_Id = $_POST["strConsultant_Id"];
	$strProject_No = $_POST["strProject_No"];	
	$strDate_Assigned = $_POST["strDate_Assigned"];
	$strDate_Completed = $_POST["strDate_Completed"];
	$strRole = $_POST["strRole"];
	$strHours_Worked = $_POST["strHours_Worked"];
	addProjectConsultant();
	// Setting to value 1 will clear the content of the form
	$blnblankForm = 1;
	
}
if(!isset($_POST["submit"]) or $blnblankForm = 1) {
	// Reset variables so form will be blank
	$strConsultant_Id = "";
	// Keep the value of Project_No
	$strProject_No = $_POST["strProject_No"];	
	// If it is the first the page has run or if we indicate we want to clear the page reset the variables, with the exception of the branch code which we want keep the same.
	$strDate_Assigned = "";
	$strdate_Completed = "";
	$strRole = "";
	$strHours_Worked = "";
	$strLocation = "";
	// The form has been cleaned. There is no need to clear page again.
	$blnblankForm = 0;
	echo "<form action='add_projects_consultant.php' method='post'><table id='mavis'>";
	echo "<tr><th>Consultant Id</th>";
	//echo "<td><input type='text' name='strConsultant_Id' size='20' value='" . $strConsultant_Id . "'/></td></tr>";
	
	getAllConsultants();
	echo "<td><select name='strConsultant_Id'>";
	while($arrRows = $stmt->fetch(PDO::FETCH_ASSOC)) {
		echo "<option value={$arrRows['Consultant_Id']}>{$arrRows['Consultant_Id']}</option>";
	}
	echo "</select></td></tr>";
	
	echo "<tr><th>Project No</th><td>";
	// Create and populate option list from the database
	//readQuery("m_project");
	getAllProjects();
	echo "<select name='strProject_No'>";
	while($arrRows = $stmt->fetch(PDO::FETCH_ASSOC)) {
		// Loop through the database values
		echo "<option value=\"{$arrRows['Project_No']}\"";
		if($strProject_No == $arrRows['Project_No']) {
			echo "selected=\"selected\"";	
		}
		echo ">{$arrRows['Project_No']} - {$arrRows['Project_Name']}</option>";	
	}
	echo "</select></td></tr>";
	
	echo "<tr><th>Date Assigned</th><td><input type='text' name='strDate_Assigned' size='10' value='" . $strDate_Assigned . "' /></td></tr>";
	
	echo "<tr><th>Date Completed</th><td><input type='text' name='strDate_Completed' size='10' value='" . $strDate_Completed . "' /></td></tr>";
	// Create and populate a list with fixed values
	echo "<tr><th>Role</th><td>";
	echo "<select name='strRole'>";
	echo "<option value='Programmer'>Programmer</option>";
	echo "<option value='Analyst'>Analyst</option>";
	echo "<option value='Software Architect'>Software Architect</option>";
	echo "<option value='Project Manager'>Project Manager</option>";
	echo "<option value='Database Designer'>Database Designer</option>";
	echo "<option value='Network Engineer'>Network Engineer</option>";
	echo "<option value='Database Administrator'>Database Administrator</option>";
	echo "</select>";
	echo "</td></tr>";
	
	echo "<tr><th>Hours Worked</th><td><input type='text' name='strHours_Worked' size='5' value='" . $strHours_Worked . "' /></td></tr>";
	
	echo "<tr><td></td><td><input type='submit' name='submit' value='Add New Project_Consultant' /></td></tr></table></form>";
	echo "<br/><a href='view_projects_consultant.php?ID=$strProject_No'>Return to View Project_Consultant</a></td></tr>";
}


?>
</body>
</html>