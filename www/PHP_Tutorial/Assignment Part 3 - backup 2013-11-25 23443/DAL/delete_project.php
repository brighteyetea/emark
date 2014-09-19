
	
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
			//echo "Starting to delete project...";
			$strProjectNo = $_GET["projectNo"];	
			//	Get project details by using ProjectNo
			//echo "Deleting...$strProjectNo";
			deleteProjectByNo($strProjectNo);
			header("Location: ../PHP/view_projects.php");
		}
?>