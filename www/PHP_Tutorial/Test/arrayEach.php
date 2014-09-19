<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>无标题文档</title>
</head>

<body>
<?php 
$array = array ();   
$array [1] = array ('1' => 'b1', '2' => 'i1', '3' => 'u1', '4' => 'u1', '5' => 'u1' );
$array [2] = array ('1' => 'b2', '2' => 'i2', '3' => 'u2', '4' => 'u2', '5' => 'u2' ); 
$array [3] = array ('1' => 'b3', '2' => 'i3', '3' => 'u3', '4' => 'u3', '5' => 'u3' );
$array [4] = array ('1' => 'b4', '2' => 'i4', '3' => 'u4', '4' => 'u4', '5' => 'u4' ); 
$array [5] = array ('1' => 'b5', '2' => 'i5', '3' => 'u5', '4' => 'u5', '5' => 'u5' ); 
$array [6] = array ('1' => 'b6', '2' => 'i6', '3' => 'u6', '4' => 'u6', '5' => 'u6' ); 
$array [7] = array ('1' => 'b7', '2' => 'i7', '3' => 'u7', '4' => 'u7', '5' => 'u7' ); 
echo print_r($array);
echo "<br/>==================<br/>";
echo var_dump($array);
echo "<br/>==================<br/>";
echo json_encode($array);
?>
</body>
</html>