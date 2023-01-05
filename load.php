<?php
include 'config.php';
session_start();
$_POST['pp'];

$page = $_POST['page'];

if($_SESSION['isonline'] !== true){
    $return = array('code'=>'200','message' =>"错误请求");
    echo json_encode($return); 
    exit;
}

$return = aceload('load','pp='.$_POST['pp'].'&page='.$page.'&watermark='.$watermark,$key);
$arr = json_decode($return,true);
echo json_encode($arr);
exit();
?>