<?php
include '../config.php';
session_start();
if($_SESSION['isonline'] !== true){
    $return = array('code'=>'0','message' =>"错误请求");
    echo json_encode($return); 
    exit;
}
$name =$_POST['username'];
$pass =$_POST['password'];
if($name == '' or $pass == ''){
    $return = array('code'=>'0','message' =>'登录失败');
    echo json_encode($return);
    exit();
}
$return = aceload('login','name='.$name.'&pass='.$pass,$key);
$arr = json_decode($return,true);
echo json_encode($arr);
exit();



