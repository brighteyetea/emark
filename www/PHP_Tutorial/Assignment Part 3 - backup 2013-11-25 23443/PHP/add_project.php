<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Add Consultant</title>
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
if(isset($_POST["submit"])) {
	echo "Starting to add project...";
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
	addProject();
	header("Location: ../PHP/view_projects.php");
}
?>
</body>
</html>