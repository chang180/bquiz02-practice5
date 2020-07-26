<?php
include_once "../base.php";
if(!empty($_POST['title'])){
    $Que->save(['text'=>$_POST['title']]);
$parent=$Que->find(['text'=>$_POST['title']])['id'];
foreach($_POST['text'] as $p){
    $Que->save(['text'=>$p,'parent'=>$parent]);
}
}
to("../admin.php?do=que");