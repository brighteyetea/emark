<?php 
$numRecord  = 0;
function say() {
	global $numRecord;
	global $var_A;
	$numRecord = 100;
	echo $var_A;	
}
?>