<?php
include_once "../base.php";

$row = $News->find($_GET['id']);

echo "<pre>" . $row['text'] . "</pre>";
