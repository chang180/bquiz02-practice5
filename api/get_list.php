<?php
include_once "../base.php";

$rows=$News->all(['type'=>$_GET['type']]);

foreach($rows as $r){
    echo "<div onclick='showPost(".$r['id'].")'>".$r['title']."</div>";
}