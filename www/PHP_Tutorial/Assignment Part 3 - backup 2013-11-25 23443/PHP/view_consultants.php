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
function confirmDeletion() {
	if(confirm("Do you really want to delete this consultant?")) {
		//	delete consultant
	}
}
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
	<h2>View Consultant Details</h2>
    <?php 
		require_once("../BLL/consultantBLL.php");
		// Get all Consultants, function defined in consultantBLL.php
		$resultSet = queryAll();
		
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
			echo "<th>Consultant ID</th>";
			echo "<th>First Name</th>";
			echo "<th>Last Name</th>";
			echo "<th>Home Phone</th>";
			echo "<th>Mobile</th>";
			echo "<th>Email</th>";
			echo "<th>Date Commenced</th>";
			echo "<th>Date of Birth</th>";
			echo "<th>Street Address</th>";
			echo "<th>Suburb</th>";
			echo "<th>Post Code</th>";
			echo "<th>Links</th>";
			echo "</tr>";
		}
		
		//	Content of table
		function tableContent() {
			global $numRecords, $resultSet;
			$arrRow = $resultSet->fetch(PDO::FETCH_ASSOC);
			while($arrRow){
				echo "<tr>";
				echo "<td>" . $arrRow["Consultant_Id"] . "</td>";
				echo "<td>" . $arrRow["First_Name"] . "</td>";
				echo "<td>" . $arrRow["Last_Name"] . "</td>";
				echo "<td>" . $arrRow["Home_Phone"] . "</td>";
				echo "<td>" . $arrRow["Mobile"] . "</td>";
				echo "<td>" . $arrRow["Email"] . "</td>";
				echo "<td>" . $arrRow["Date_Commenced"] . "</td>";
				echo "<td>" . $arrRow["DOB"] . "</td>";
				echo "<td>" . $arrRow["Street_Address"] . "</td>";
				echo "<td>" . $arrRow["Suburb"] . "</td>";
				echo "<td>" . $arrRow["Post_Code"] . "</td>";
				echo "<td><a href='edit_consultant.php?consultantID=$arrRow[Consultant_Id]'>Edit</a> <a href='delete_consultant.php?consultantID=$arrRow[Consultant_Id]' >Delete</a></td>";
				echo "</tr>";
				$arrRow = $resultSet->fetch(PDO::FETCH_ASSOC);
			}
			echo "</table>";
			
			echo "<form action='../HTML/add_consultant.html' method='post'>";
			echo "<input type='submit' name='submit' value='Add a New Consultant' />";
			echo "</form>";
			echo $numRecords . " Records";
		
		}
	?>
</body>
</html>