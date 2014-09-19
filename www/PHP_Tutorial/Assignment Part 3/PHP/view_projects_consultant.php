<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>View Consultants</title>
<link rel="stylesheet" type="text/css" href="../CSS/mavis.css" />
<link rel="stylesheet" type="text/css" href="../CSS/style.css" />
<link href='http://fonts.googleapis.com/css?family=Varela' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Orbitron:400,500,700,900' rel='stylesheet' type='text/css'>
<script type="text/javascript">

</script>
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
	<h2>View Project Staffing</h2>
<?php 
// Include bussiness logic layer library
require_once("../BLL/projectBLL.php");
//require_once("../DAL/db_functions.php");
// Run query on m_project table

getAllProjects();
// Only show this text if the submit button hasn't been pressed
if(!isset($_POST["show_projects_consultant"])) {
	echo "<h4>Please select a Project</h4>";	
}
// If there are any projects in the database then continue
if($numRecords === 0) {
	echo "<p>No Project_Consultant records Found!</p>";	
} else {
	$arrRows = NULL;
	// If there are projects from database, create Select Menu
	echo "<form action='view_projects_consultant.php' method='post'>";
	echo "<select name='select_project'>";
	// Run query on m_project table
	getAllProjects();
	// Loop through Branch records and add Branch_Code to the list
	while($arrRows = $stmt->fetch(PDO::FETCH_ASSOC)) {
		// Values for options are Branch_Code
		echo "<option value=\"{$arrRows['Project_No']}\"";
		
		// Coming back from Add form
		if(isset($_GET["ID"])) {
			if($arrRows['Project_No'] === $_GET["ID"]) {
				echo "selected='" . $_GET["ID"] . "'";	
			}	
		}
		
		if(isset($_POST["show_projects_consultant"])) {
			// If the form is running for a second time after the show_projects_consultant button has pressed, this code keeps the Project_No that was previous selected.
			if($arrRows['Project_No'] === $_POST["select_project"]) {
				echo "selected=\"selected\"";	
			}
		}
		echo ">{$arrRows['Project_No']} - {$arrRows['Project_Name']}</option>";
	}
	
	// Finish Select Menu
	echo "</select><input type=\"submit\" name=\"show_projects_consultant\" value=\"Show Projects Consultant\" /></form><br/><br/>";
}

// Create the table of m_project_consultant relating to selected Project_No
if(isset($_POST["show_projects_consultant"])) {
	
	// Run Query on Vehicle table
	getProjectsByProjectNo($_POST["select_project"]);
	//readQuerySingle("m_project_consultant", "Project_No", $_POST["select_project"], "NonNumeric");
	// If there are any vehicle details in the  database, then continue
	if($numRecords === 0) {
		echo "<div class='error'>No Project_Consultant records Found!</div>";	
		//echo $numRecords;
	} else {

		$arrRows = NULL;
		// Create Table Heading
		echo "<table id='mavis'>";	
		echo "<tr>";
		echo "<th>Consultant ID</th>";
		echo "<th>Project No</th>";
		echo "<th>Date Assigned</th>";
		echo "<th>Date Completed</th>";
		echo "<th>Role</th>";
		echo "<th>Hours Worked</th>";
		echo "<th></th>";
		echo "</tr>";
		
		// Loop through vehicles and add rows to table for each record
		while($arrRows = $stmt->fetch(PDO::FETCH_ASSOC)) {
			echo "<tr>";
			echo "<td>". $arrRows['Consultant_Id'] . "</td>";
			echo "<td>". $arrRows['Project_No'] . "</td>";
			echo "<td>". $arrRows['Date_Assigned'] . "</td>";
			echo "<td>". $arrRows['Date_Completed'] . "</td>";
			echo "<td>". $arrRows['Role'] . "</td>";
			echo "<td>". $arrRows['Hours_Worked'] . "</td>";
			
			// Add links with Branch_Code passed as variable to edit and delete page
			echo "<td><a href=\"edit_projects_consultant.php?consultantID={$arrRows['Consultant_Id']}&projectNo={$arrRows['Project_No']}\">Edit</a>";
			echo "<br/><a href=\"../DAL/delete_project_consultant.php?consultantID={$arrRows['Consultant_Id']}&projectNo={$arrRows['Project_No']}\" onclick=\"return confirm('Delete this record?')\" target=\"_blank\">Delete</a></td></tr>";
		}
		echo "</table>";
		// Button to add new Project_Consultant
		echo "<form action='add_projects_consultant.php' method='post'>";
		echo "<input type='hidden' name='strProject_No' value='" . $_POST["select_project"] . "'>";
		echo "<input type='submit' value='Add a Consultant to a Project'>";
		echo "</form>";
		
	}
}
?>
</body>
</html>