<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Add Consultant</title>
</head>

<body>
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