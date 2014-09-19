<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Add Branch</title>
<link rel="stylesheet" type="text/css" href="../CSS/mavis.css" />
</head>

<body>
<h2>Add a New Branch</h2>
    
    <!--../DAL/add_branch.php-->
    
    <?php 
	$strBranch_Code = "";
$strBranch_name = "";
$strManager = "";
$strBranch_Address = "";
$strSuburb = "";
$strState = "";
$strPost_code = "";
$strPhone = "";
$strFax = "";


$booBranch_code = 0;
$booBranch_name = 0;
$booManager = 0;
$booBranch_Address = 0;
$booSuburb = 0;
$booState = 0;
$booPost_code = 0;
$booPhone = 0;
$booFax = 0;
$booOK = 1;	
	
	?>
    <form action="../BLL/bll_add_branch.php" method="post">
    	<table id="mavis">
        	<tr><th>Branch Code</th><td><input type="text" name="strBranch_Code" size="10" /></td><?php if($booBranch_code) echo "<td>Please enter a Branch Code!</td>"; ?></tr>
            <tr><th>Branch Name</th><td><input type="text" name="strBranch_name" size="20" /></td></tr>
            <tr><th>Manager</th><td><input type="text" name="strManager" size="20" /></td></tr>
            <tr><th>Branch Address</th><td><input type="text" name="strBranch_Address" size="30" /></td></tr>
            <tr><th>Suburb</th><td><input type="text" name="strSuburb" size="20" /></td></tr>
            <tr><th>State</th><td><input type="text" name="strState" size="5" /></td></tr>
            <tr><th>Post Code</th><td><input type="text" name="intPost_code" size="5" /></td></tr>
            <tr><th>Phone</th><td><input type="text" name="strPhone" size="15" /></td></tr>
            <tr><th>Fax</th><td><input type="text" name="strFax" size="15" /></td></tr>
            <tr><td></td><td><input type="submit" name="submit" value="Submit New Details" /></td></tr>
        </table>
    </form>
</body>
</html>