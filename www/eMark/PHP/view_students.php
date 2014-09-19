<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>e-Mark assesment and marking application</title>
<link rel="stylesheet" type="text/css" href="../css/emark_style.css"/>
<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript">
// use ajax request to process post method for deleting a student
function doDelete(stuID) {
	var ans = confirm("Do you really want to delete record: " + stuID + " ?");	
	if(ans) {
		var ajaxURL = "../DAL/db_delete_student.php";
		$.ajax({
			type: "POST",
			url: ajaxURL,
			data: {stuID: stuID},
			dataType: 'json'
		}).done(function(data) {
			if(data.rowsAffected == 1) {
				alert("A student has been deleted!");
			} else {
				alert("Failed to delete the record!");
			}
		}).always(function() {
			location.reload(true);	// Force the current page to be reloaded from the server	
		});
	}
}

function searchStudent() {
	var searchStr = $("#txtSearchStudent").val().trim();
	if(searchStr.length == 0) {
		// Return all students	
		location.href = "view_students.php";
	} else {
		location.href = "search_students.php?str=" + searchStr;
	}
}

$(document).ready(function(e) {
	
});
</script>
<style>
table tr:hover {
	background-color: #93B4EE;	
}
</style>
</head> 

<body>
<?php include '../common/header.html'; ?>
<?php include '../common/navbar.php'; ?>
<div class="content">
  <div class="contentMain">
    <h2>View All Students</h2>
    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.</p>
  </div>
  <div class="contentMain" style="text-align: right; padding: 5px;">
  <input id="txtSearchStudent" type="search" title="Search Student" />
  <input type="button" class="btn" value="Search Student" onclick="searchStudent();"  />
  </div>
  <table border="0" cellpadding="0" cellspacing="0" class="tableborder">
    <tr>
      <th scope="col">Student ID</th>
      <th scope="col">First Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">&nbsp;</th>
      <th scope="col">&nbsp;</th>
    </tr>
    <?php 
		  	// Include db function library
			//require '../DAL/db_functions.php';
			//require '../DAL/db_student.php';
			//require '../DAL/db_delete_student.php';
			
			include '../DAL/db_delete_student.php';

			//readQuery("students");
			getAllStudents();
			// if records were found, continue to show them
			if($numRecords === 0) {
				echo "<p>No Students Found!</p>";	
			} else {
				$arrRows = NULL;
				$rowNum = 0;
				while($arrRows = $stmt->fetch(PDO::FETCH_ASSOC)) {
					if($rowNum % 2 == 0) {
						echo "<tr class='altrow'>";	
					} else {
						echo "<tr>";		
					}
					echo "<td>" . $arrRows['StudentID'] . "</td>";
					echo "<td>" . $arrRows['FirstName'] . "</td>";
					echo "<td>" . $arrRows['LastName'] . "</td>";
					echo "<td><a href='edit_student.php?stuID=$arrRows[StudentID]'>edit</a></td>";
					echo "<td><a href='#' onclick='doDelete(\"$arrRows[StudentID]\");'>del</a></td>";
					echo "</tr>";
					$rowNum++;
				}
			}
		  ?>
  </table>
  <div class="btnRight">
    <input type="button" class="btn" value="Add Student" onclick="location.href='add_student.php'"  />
  </div>
</div>
<?php include '../common/footer.html'; ?>
</body>
</html>
