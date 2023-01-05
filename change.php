<?php
include 'config.php';
$card =$_POST['card'];
if(strlen($card) < 30){
    $return = array('code'=>'0','message' =>'礼品卡号错误');
    echo json_encode($return); 
    exit; 
}
$return = aceload('change','card='.$card,$key);
$arr = json_decode($return,true);
echo json_encode($arr);
exit();
