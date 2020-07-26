<?php
include_once "../base.php";
$email=$_POST['email'];
$chk=$User->count(['email'=>$email]);
if($chk>0){
    echo "您的密碼為：".$User->find(['email'=>$email])['pw'];
}else{
    echo "查無此資料";
}