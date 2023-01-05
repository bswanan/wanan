<?php
include 'config.php';
$pp =$_POST['pp'];
$nn =$_POST['nn'];

$return = aceload('sc','pp='.$pp.'&nn='.$nn,$key);
$arr = json_decode($return,true);
echo json_encode($arr);
exit();