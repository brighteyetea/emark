<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>

<body>
<?php 
$strRole1 = "Project Manager";
if($strRole1 == 'Project Manager') {
	echo "Project Manager should be selected!";		
}
echo "<br/>";
echo "<select name='strRole'>";
echo "<option value='Programmer' ";
if($strRole1 == 'Programmer') echo "selected='selected'";
echo ">Programmer</option>";
echo "<option value='Analyst' ";
if($strRole1 == 'Analyst') echo "selected='selected'";
echo ">Analyst</option>";
echo "<option value='Software Architect' ";
if($strRole1 == 'Software Architect') echo "selected='selected'";
echo ">Software Architect</option>";
echo "<option value='Project Manager' ";
if($strRole1 == 'Project Manager') echo "selected=\"selected\"";	
echo ">Project Manager</option>";
echo "<option value='Database Designer' ";
if($strRole1 == 'Database Designer') echo "selected='selected'";
echo ">Database Designer</option>";
echo "<option value='Network Engineer' ";
if($strRole1 == 'Network Engineer') echo "selected='selected'";
echo ">Network Engineer</option>";
echo "<option value='Database Administrator' ";
if($strRole1 == 'Database Administrator') echo "selected=\"selected\"";
echo ">Database Administrator</option>";
echo "</select>";
echo "<input type='text' disabled='disabled' value='test value' />";
?>
</body>
</html>