<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Edit Project</title>
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
    <?php 
		require_once("../BLL/projectBLL.php");
		$strProjectNo = "";
		$strProjectName = "";
		$strProjectDescription = "";
		$strProjectManager = "";
		$strStartDate = "";
		$strFinishDate = "";
		$strBudget = "";
		$strCostToDate = "";
		$strTrackingStatement = "";
		$strClientNo = "";
		//	Get ProjectNo from link 
		if(isset($_GET["projectNo"])) {
			//echo "Starting to edit project...";
			$strProjectNo = $_GET["projectNo"];	
			//	Get project details by using ProjectNo
			getProjectById($strProjectNo);
			$arrRow = $stmt->fetch(PDO::FETCH_ASSOC);
			$strProjectName = $arrRow["Project_Name"];
			$strProjectDescription = $arrRow["Project_Description"];
			$strProjectManager = $arrRow["Project_Manager"];
			$strStartDate = $arrRow["Start_Date"];
			$strFinishDate = $arrRow["Finish_Date"];
			$strBudget = $arrRow["Budget"];
			$strCostToDate = $arrRow["Cost_To_Date"];
			$strTrackingStatement = $arrRow["Tracking_Statement"];
			$strClientNo = $arrRow["Client_No"];
		} else if(isset($_POST["submit"])) {
			//echo "Starting to updating...";
			$strProjectNo = $_POST["strProjectNo"];
			$strProjectName = $_POST["strProjectName"];	
			$strProjectDescription = $_POST["strProjectDescription"];
			$strProjectManager = $_POST["strProjectManager"];
			$strStartDate = $_POST["strStartDate"];
			$strFinishDate = $_POST["strFinishDate"];
			$strBudget = $_POST["strBudget"];
			$strCostToDate = $_POST["strCostToDate"];
			$strTrackingStatement = $_POST["strTrackingStatement"];
			$strClientNo = $_POST["strClientNo"];
			//echo $strProjectNo . " " . $strProjectDescription;
			updateProjectByNo();
			header("Location: view_projects.php");
		}

		
		echo "<h2>Edit Project</h2>";
		echo "Project Details: <br/><br/>";
		echo "<form action='edit_project.php' method='post'><table id='mavis'>";
		echo "<tr><th>Project Name</th><td><input type='text' name='strProjectName' size='50' value='$strProjectName' /></td>";
		echo "</tr><tr><th>Project Description</th><td><textarea name='strProjectDescription' cols='100' rows='2'>$strProjectDescription</textarea></td>";
		echo "</tr><tr><th>Project Manager</th><td><input type='text' name='strProjectManager' size='10' value='$strProjectManager' /></td>";
		echo "</tr><tr><th>Start Date</th><td><input type='text' name='strStartDate' size='10' value='$strStartDate' /></td>";
		echo "</tr><tr><th>Finish Date</th><td><input type='text' name='strFinishDate' size='10' value='$strFinishDate' /></td>";
		echo "</tr><tr><th>Budget</th><td><input type='text' name='strBudget' size='10' value='$strBudget' /></td>";
		echo "</tr><tr><th>Cost To Date</th><td><input type='text' name='strCostToDate' size='10' value='$strCostToDate' /></td>";
		echo "</tr><tr><th>Tracking Statement</th><td><textarea name='strTrackingStatement' cols='100' rows='2'>$strTrackingStatement</textarea></td>";
		echo "</tr><tr><th>Client No</th><td><input type='text' name='strClientNo' size='5' value='$strClientNo' /></td>";
		
		echo "<tr><td><input type='hidden' name='strProjectNo' value='$strProjectNo' /></td></tr>";
		echo "<tr><td></td><td><input type='submit' name='submit' value='Submit New Details' /></td></tr></table></form>";
		
		
	?>
</body>
</html>