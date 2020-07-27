<?php
include_once "../base.php";
$id=$_POST['id'];
$type=$_POST['type'];
$user=$_POST['user'];
switch($type){
    case "1":
        $Log->save(['news'=>$id,'user'=>$user]);
        $news=$News->find(['id'=>$id]);
        $news['good']++;
        $News->save($news);
    break;
    case "2":
        $Log->del(['news'=>$id,'user'=>$user]);
        $news=$News->find(['id'=>$id]);
        $news['good']--;
        $News->save($news);
    break;
}