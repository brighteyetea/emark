<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>e-Mark assesment and marking application</title>
<link rel="stylesheet" type="text/css" href="../css/emark_style.css"/>
<style>
#div_ItemComments {
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
function doDelete(itemID) {
	var ans = confirm("Do you really want to delete record: " + itemID + " ?");	
	if(ans) {
		console.log("About to delete a record from AssessmentItem table...");
		location.href = "../DAL/db_delete_assessmentitem.php?assessmentItemID=" + itemID;	
		//alert("Deletion Successful");
	}
}

$(document).ready(function(e) {
	// Parse data returned from Ajax request and display it in a pop-up div
	function renderData(data) {
		var table = "<table id='tblRelevantComments' border='0' cellpadding='0' cellspacing='0' class='tableborder'>";
		table += "<tr><th scope='col'>Comment ID</th><th scope='col'>Comment</th></tr>";
        table += "</table>";
		$("#div_ItemComments").html(table);
		
		if(data.length != 0) {
			var tblStr = "";
			$.each(data, function(k, v) {
				//console.log(v["CommentID"] + "===" + v["Comment"]);
				tblStr = "<tr>";
				tblStr += "<td>" + v["CommentID"] + "</td><td>" + v["Comment"] + "</td>";
				tblStr += "</tr>";
				$("#tblRelevantComments").find("th").parent().after(tblStr);
			});	
			$("#tblRelevantComments").find("tr:odd").addClass("altrow");
		} else {
			$("#tblRelevantComments").after("<p>No relevant comments found<p>");
		}
	}
	
	// Hide the div that displays relevant comments of an Assessment Item
	$("#div_ItemComments").hide();
	
	// Click event to get relevant comments about an Assessment Item
	$("table[class='tableborder']").find("a[title='View Comments']").click(function(e) {
		$("#div_ItemComments").html("");
		var itemID = $(this).parent().attr("title");
		$.ajax({
			type: 'GET', 
			url: 'view_assessmentitem_itemcomments.php?assessmentItemID=' + itemID,
			dataType: 'json'
		}).done(function(data) {
			renderData(data);	
		});
		$("#div_ItemComments").fadeIn();
		e.preventDefault();
		e.stopPropagation();
	});
	
	$(document).click(function(e) {
		$("#div_ItemComments").fadeOut();
	});
	$("#div_ItemComments").click(function(e) {
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
<?php include '../common/header.html';?>
<?php include '../common/navbar.php'; ?>
<div class="content">
  <div class="contentMain">
    <h2>View All Assessment Items</h2>
    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.</p>
    <div id="div_ItemComments">
    </div>
  </div>
  <table border="0" cellpadding="0" cellspacing="0" class="tableborder">
    <tr>
      <th scope="col">Item ID</th>
      <th scope="col">Name</th>
      <th scope="col">Description</th>
      <th scope="col">Assessment</th>
      <th scope="col">Item Mark</th>
      <th scope="col">Institute</th>
      <th scope="col">Date Submitted</th>
      <th scope="col">&nbsp;</th>
      <th scope="col">&nbsp;</th>
    </tr>
    <?php 
		  	// Include db function library
			include '../DAL/db_delete_assessmentitem.php';
			// Query data in table Student from database
			getAllAssessmentItems();
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
					echo "<td>" . $arrRows['ItemID'] . "</td>";
					echo "<td>" . $arrRows['Name'] . "</td>";
					/*echo "<td><a href='#' onclick='getComments(\"$arrRows[ItemID]\");'>" . $arrRows['Description'] . "</a></td>";*/
					echo "<td title='$arrRows[ItemID]'><a href='#' title='View Comments'>" . $arrRows['Description'] . "</a></td>";
					echo "<td>" . $arrRows['AssessmentName'] . "</td>";
					echo "<td>" . $arrRows['ItemMark'] . "</td>";
					echo "<td>" . $arrRows['Institute'] . "</td>";
					echo "<td>" . $arrRows['DateSubmitted'] . "</td>";
					echo "<td><a href='edit_assessmentitem.php?assessmentItemID=$arrRows[ItemID]' title='Edit Assessment Item'>edit</a></td>";
					echo "<td><a href='#' onclick='doDelete(\"$arrRows[ItemID]\")' title='Delete Assessment Item'>del</a></td>";
					echo "</tr>";
					$rowNum++;
				}
			}
		  ?>
  </table>
  <div class="btnRight">
    <input type="button" class="btn" value="Add AssessmentItem" onclick="location.href='add_assessmentitem.php';"/>
  </div>
</div>
<div class="footer">
  <p><a href="#">Home</a> | <a href="#">About Us</a> | <a href="#">Contact</a><br />
    Copyright &copy;2014</p>
</div>
</body>
</html>
