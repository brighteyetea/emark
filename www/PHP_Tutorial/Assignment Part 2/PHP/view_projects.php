<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>View Consultants</title>
<link rel="stylesheet" type="text/css" href="../CSS/mavis.css" />
<script type="text/javascript">

</script>
</head>

<body>
	<h2>View Project Details</h2>
    <?php 
		require_once("../BLL/projectBLL.php");
		queryAll();
		if($numRecords == 0) {
			echo "<p>No records found!</p>";	
		} else {
			tableHead();
			tableContent();
		}
		
		//	Head of table
		function tableHead() {
			echo "<table border='1' id='mavis' width='100%'>";	
			echo "<tr>";
			echo "<th>Project No</th>";
			echo "<th>Project Name</th>";
			echo "<th>Project Description</th>";
			echo "<th>Project Manager</th>";
			echo "<th>Start Date</th>";
			echo "<th>Finish Date</th>";
			echo "<th>Budget</th>";
			echo "<th>Cost To Date</th>";
			echo "<th>Tracking Statement</th>";
			echo "<th>Client No</th>";
			echo "<th>Links</th>";
			echo "</tr>";
		}
		//	Content of table
		function tableContent() {
			global $numRecords, $stmt;
			$arrRow = $stmt->fetch(PDO::FETCH_ASSOC);
			while($arrRow){
				echo "<tr>";
				echo "<td>" . $arrRow["Project_No"] . "</td>";
				echo "<td>" . $arrRow["Project_Name"] . "</td>";
				echo "<td>" . $arrRow["Project_Description"] . "</td>";
				echo "<td>" . $arrRow["Project_Manager"] . "</td>";
				echo "<td>" . $arrRow["Start_Date"] . "</td>";
				echo "<td>" . $arrRow["Finish_Date"] . "</td>";
				echo "<td>" . $arrRow["Budget"] . "</td>";
				echo "<td>" . $arrRow["Cost_To_Date"] . "</td>";
				echo "<td>" . $arrRow["Tracking_Statement"] . "</td>";
				echo "<td>" . $arrRow["Client_No"] . "</td>";
				echo "<td><a href='edit_project.php?projectNo=$arrRow[Project_No]'>Edit</a> <a href='../DAL/delete_project.php?projectNo=$arrRow[Project_No]' >Delete</a></td>";
				echo "</tr>";
				$arrRow = $stmt->fetch(PDO::FETCH_ASSOC);
			}
			echo "</table>";
			
			echo "<form action='../HTML/add_project.html' method='post'>";
			echo "<input type='submit' name='submit' value='Add a New Consultant' />";
			echo "</form>";
			echo $numRecords . " Records";
		
		}
		
	?>
</body>
</html>