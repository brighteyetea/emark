<?php
$PHP_SELF = $_SERVER['PHP_SELF'];	// Get the current file path
$url='http://' . $_SERVER['HTTP_HOST'] . substr($PHP_SELF, 0, strrpos($PHP_SELF) + 1);	// Return: http://localhost/
$str = substr($_SERVER['REQUEST_URI'], 1);	// Get the current request URI
$arr = explode("/", $str);	// Split the string into an array 
$path = $url . $arr[0];	// The first element is the name of the web site

?>
<div>
  <ul>
    <li><a href="<?php echo $path; ?>/index.php">Home</a></li>
    <li><a href="<?php echo $path; ?>/PHP/view_students.php">Students</a></li>
    <li><a href="<?php echo $path; ?>/PHP/view_assessments.php">Assessments</a></li>
    <li><a href="<?php echo $path; ?>/PHP/view_assessmentitems.php">Assessment Items</a></li>
  </ul>
</div>