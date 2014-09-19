<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>edit_project_consultant.php</title>
<link rel="stylesheet" type="text/css" href="../CSS/mavis.css" />
<link rel="stylesheet" type="text/css" href="../CSS/style.css" />
</head>

<body>
<header class="12u-first" >
			
    <h1><span>Mc</span>Millian IT System Management</h1>
    
    <div class="menu-top"></div>
    
    <nav class="menu">
        
        <ul id="menu">
        
            <li><a href="../index.html" title="">Home</a></li>
                                    
            <li><a href="../../PHP/view_projects.php" title="">View Projects</a></li>
            
            <li><a href="../../PHP/view_consultants.php" title="">View Consultants</a></li>
            
            <li><a href="../../PHP/view_projects_consultant.php" title="">View Project Staffing</a></li>
            
        </ul>
        
    </nav>

</header>
<h2>Updating Staffing Details</h2>
<?php 
// Include bussiness logic layer library
require_once("../BLL/projectBLL.php");
// Define global variables that will be used to update 
$strConsultant_Id = "";
$strProject_No = "";
$strDate_Assigned = "";
$strDate_Completed = "";
$strRole = "";
$strHours_Worked = "";

$blnblankForm = 0;

// Each variable keeps track of individual fields so that error messages can be shown
$booConsultant_Id = 0;
$booProject_No = 0;
$booDate_Assigned = 0;
$booDate_Completed = 0;
$booRole = 0;
$booHours_Worked = 0;
// This variable will be set to false if any value is missing
$booOK = 1;
// If the submit button has been pressed, it is updating. Otherwise it is just retrieving data from database
if(isset($_POST["submit"])) {
	// Updating	
	$strConsultant_Id = $_POST["strConsultant_Id"];
	$strProject_No = $_POST["strProject_No"];
	$strDate_Assigned = $_POST["strDate_Assigned"];
	$strDate_Completed = $_POST["strDate_Completed"];
	$strRole = $_POST["strRole"];
	$strHours_Worked = $_POST["strHours_Worked"];
	
	updateSingleProjectConsultant();
	
} else {
	// Getting a record from database based on its primary key and store the values of each column to variables
	if(isset($_GET["consultantID"])) {
		$strConsultant_Id = $_GET["consultantID"];	
	}
	if(isset($_GET["projectNo"])) {
		$strProject_No = $_GET["projectNo"];	
	}
	getSingleProjectConsultant($strConsultant_Id, $strProject_No);
	if($numRecords == 0) {
		echo "<span class='error'>No Matching Project_Consultant Record Found!</span><br/><br/>";	
	} else {
		// Resetting the variable that will hold the record to null
		$arrRows = NULL;
		// Gets first (and only result) from database
		$arrRows = $stmt->fetch(PDO::FETCH_ASSOC);
		// Assigns values into variables for later use
		$strDate_Assigned = $arrRows['Date_Assigned'];
		$strDate_Completed = $arrRows['Date_Completed'];
		$strRole = $arrRows['Role'];
		$strHours_Worked = $arrRows['Hours_Worked'];
		
	}
}

// Creates table for project_consultant and populates it with the data 
echo "<form action='edit_projects_consultant.php' method='post'>";
echo "<table id='mavis'>";
echo "<tr><th>Consultant Id</th><td>";

// Select menu for Consultant_Id 
echo "<select name='strConsultant_Id'>";
getAllConsultants();	// Getting data from m_consultant table
while($arrRows = $stmt->fetch(PDO::FETCH_ASSOC)) {
	echo "<option value='{$arrRows['Consultant_Id']}' ";
	if($strConsultant_Id == $arrRows['Consultant_Id']) {
		echo "selected='selected'";	
	}
	echo ">{$arrRows['Consultant_Id']}</option>";	
}
echo "</select></td></tr>";
echo "<tr><th>Project No</th><td><input type='text' name='strProject_No' value='{$strProject_No}' disabled='disabled' /></td></tr>";
echo "<tr><th>Date Assigned</th><td><input type='text' name='strDate_Assigned' value='{$strDate_Assigned}' size='10' /></td>";
echo "<tr><th>Date Completed</th><td><input type='text' name='strDate_Completed' value='{$strDate_Completed}' size='10'/></td>";

// Select menu for Role
echo "<tr><th>Role</th><td><select name='strRole'>";
echo "<option value='Programmer' ";
if($strRole == 'Programmer') echo "selected='selected'";
echo ">Programmer</option>";
echo "<option value='Analyst' ";
if($strRole == 'Analyst') echo "selected='selected'";
echo ">Analyst</option>";
echo "<option value='Software Architect' ";
if($strRole == 'Software Architect') echo "selected='selected'";
echo ">Software Architect</option>";
echo "<option value='Project Manager'";
if($strRole == 'Project Manager') echo "selected=\"selected\"";	
echo ">Project Manager</option>";
echo "<option value='Database Designer' ";
if($strRole == 'Database Designer') echo "selected='selected'";
echo ">Database Designer</option>";
echo "<option value='Network Engineer' ";
if($strRole == 'Network Engineer') echo "selected='selected'";
echo ">Network Engineer</option>";
echo "<option value='Database Administrator' ";
if($strRole == 'Database Administrator') echo "selected=\"selected\"";
echo ">Database Administrator</option>";
echo "</select></td>";

echo "<tr><th>Hours Worked</th><td><input type='text' name='strHours_Worked' value='{$strHours_Worked}' /></td>";
echo "<tr><td></td><td><input type='submit' name='submit' value='Update Project_Consultant Details'/></td></tr>";
echo "</table></form>";

?>
</body>
</html>