<?php
include_once "../base.php";
var_dump($_POST);
$que=$Que->find($_POST['id']);
$que['count']++;
$Que->save($que);

$que=$Que->find($_POST['parent']);
$que['count']++;
$Que->save($que);

to("../index.php?do=result&parent=".$_POST['parent']);
