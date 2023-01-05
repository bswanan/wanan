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
$repass = $_POST['repassword'];

if(check($name) === false){
    $return = array('code'=>'0','message' =>'账号不能含有特殊符号！');
    echo json_encode($return); 
    exit;
}
if(check($pass) === false){
    $return = array('code'=>'0','message' =>'密码不能含有特殊符号！');
    echo json_encode($return); 
    exit;
}
if(strlen($name) < 6){
    $return = array('code'=>'0','message' =>'账号不得小于6位或大于16位！');
    echo json_encode($return); 
    exit;
}
if(strlen($name) > 16){
    $return = array('code'=>'0','message' =>'账号不得小于6位或大于16位！');
    echo json_encode($return); 
    exit;
}
if(strlen($pass) < 6){
    $return = array('code'=>'0','message' =>'账号不得小于6位或大于16位！');
    echo json_encode($return); 
    exit;
}
if(strlen($pass) > 16){
    $return = array('code'=>'0','message' =>'账号不得小于6位或大于16位！');
    echo json_encode($return); 
    exit;
}
if($pass != $repass){
    $return = array('code'=>'0','message' =>'两次密码输入不一致！');
    echo json_encode($return); 
    exit;
}

$return = aceload('reg','name='.$name.'&pass='.$pass.'&repass='.$repass,$key);
$arr = json_decode($return,true);
echo json_encode($arr);
exit();

function check($string) {     
    if (ctype_alnum($string)) {        
        return true;     
    } else {         
        return false;     
    }
}