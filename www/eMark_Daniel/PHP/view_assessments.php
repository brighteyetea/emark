<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>View an Assessment | e-Mark Assesment and Marking Application</title>
<meta name="description" content="e-Mark is a web application that allows you to mark assessments in detail." />
<link rel="stylesheet" type="text/css" href="../css/emark_style.css"/>
<style>
#div_AssessmentItems {
	width: 80%;
	height: 80%;
	padding: 10px;
	background-color: #FFFFFF;
	border: 1px solid #709CD2;
	margin: 10px auto;
	text-align: center;
	position: absolute;
	top: 20%;
	left: 9.5%;
	border-radius: 15px;
}
</style>
<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript">
function doDelete(assessmentID) {
	var ans = confirm("Do you really want to delete record: " + assessmentID + "?");	
	if(ans) {
		console.log("About to delete a record from Assessment table...");
		location.href = "../DAL/db_delete_assessment.php?assessmentID=" + assessmentID;	
		//alert("Deletion Successful");
	}
}

$(document).ready(function(e) {
	// Parse data returned from Ajax request and display it in a pop-up div
	function renderData(data) {
		var table = "<table id='tblAssessmentItems' border='0' cellpadding='0' cellspacing='0' class='tableborder'>";
		table += "<tr><th scope='col'>Assessment Item ID</th><th scope='col'>Assessment Item</th></tr>";
        table += "</table>";
		$("#div_AssessmentItems").html(table);
		
		if(data.length != 0) {
			var tblStr = "";
			$.each(data, function(k, v) {
				//console.log(v["CommentID"] + "===" + v["Comment"]);
				tblStr = "<tr>";
				tblStr += "<td>" + v["ItemID"] + "</td><td>" + v["Name"] + "</td>";
				tblStr += "</tr>";
				$("#tblAssessmentItems").find("th").parent().after(tblStr);
			});	
			$("#tblAssessmentItems").find("tr:odd").addClass("altrow");
		} else {
			$("#tblAssessmentItems").after("<p>No relevant comments found<p>");
		}
	}
	
	// Hide the div that displays relevant comments of an Assessment Item
	$("#div_AssessmentItems").hide();
	
	// Click event to get an Assessment's Items
	$("table[class='tableborder']").find("a[title='View Comments']").click(function(e) {
		$("#div_AssessmentItems").html("");
		var assessmentID = $(this).parent().attr("title");
		$.ajax({
			type: 'GET', 
			url: 'view_assessmentSubjectID.php?assessmentID=' + assessmentID,
			dataType: 'json'
		}).done(function(data) {
			renderData(data);	
		});
		$("#div_AssessmentItems").fadeIn();
		e.preventDefault();
		e.stopPropagation();
	});
	
	$(document).click(function(e) {
		$("#div_AssessmentItems").fadeOut();
	});
	$("#div_AssessmentItems").click(function(e) {
		e.stopPropagation();	
	});
	
});
</script>
<style>
table tr:hover {
	background-color: #93B4EE;
}
</style>
</head>

<body>
<div class="header">
  <div class="headerBanner">
    <p class="floatLeft"><a href="index.html"><img src="../images/eMark-logo2.png" alt="eMark Logo" /></a></p>
    <a href="#"><img class="floatImgRight" src="../images/settings.png" alt="Settings" /></a>
    <p class="floatRight">Hello, Subject Teacher<br />
      <a href="#">Your Settings</a></p>
  </div>
</div>
<?php include '../common/navbar.php'; ?>
<div class="content">
  <div class="contentMain">
    <h2>View All Assessments</h2>
    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.</p>
    <div id="div_AssessmentItems">
    </div>
  </div>
  <table border="0" cellpadding="0" cellspacing="0" class="tableborder">
    <tr>
      <th scope="col">Assessment ID</th>
      <th scope="col">Name</th>
      <th scope="col">Description</th>
      <th scope="col">Subject ID</th>
      <th scope="col">Last Modified Date</th>
      <!--<th scope="col">Last Edit Date</th>-->
      <th scope="col">&nbsp;</th>
      <th scope="col">&nbsp;</th>
    </tr>
    <?php 
		  	// Include db function library
			include '../DAL/db_delete_assessment.php';
			// Query data in table Student from database
			readAssQuery("assessment");
			// if records were found, continue to show them
			if($numRecords === 0) {
				echo "<p>No Assessment Items Found!</p>";	
			} else {
				$arrRows = NULL;
				$rowNum = 0;
				while($arrRows = $stmt->fetch(PDO::FETCH_ASSOC)) {
					if($rowNum % 2 == 0) {
						echo "<tr class='altrow'>";	
					} else {
						echo "<tr>";		
					}
					echo "<td>" . $arrRows['AssessmentID'] . "</td>";
					echo "<td>" . $arrRows['Name'] . "</td>";
					/*echo "<td><a href='#' onclick='getComments(\"$arrRows[ItemID]\");'>" . $arrRows['Description'] . "</a></td>";*/
					echo "<td title='$arrRows[AssessmentID]'><a href='#' title='View Comments'>" . $arrRows['Description'] . "</a></td>";
					echo "<td>" . $arrRows['SubjectID'] . "</td>";
					echo "<td>" . $arrRows['CreationDate'] . "</td>";
					/*echo "<td>" . $arrRows['LastEditDate'] . "</td>";*/
					echo "<td><a href='edit_assessment.php?assessmentID=$arrRows[AssessmentID]' title='Edit Assessment'>edit</a></td>";
					echo "<td><a href='#' onclick='doDelete(\"$arrRows[AssessmentID]\")' title='Delete Assessment'>del</a></td>";
					echo "</tr>";
					$rowNum++;
				}
			}
		  ?>
  </table>
  <div class="btnRight">
    <input type="button" class="btn" value="Add Assessment" onclick="location.href='add_assessment.php';"/>
  </div>
</div>
<div class="footer">
  <p><a href="#">Home</a> | <a href="#">About Us</a> | <a href="#">Contact</a><br />
    &copy; MAQ Studio 2014</p>
</div>
</body>
</html>
