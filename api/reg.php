<?php
include_once "../base.php";

$acc = $_POST['acc'];
$pw = $_POST['pw'];
$pw2 = $_POST['pw2'];
$email = $_POST['email'];
$chk = $User->count(['acc' => $acc]);

if (empty($acc) || empty($pw) || empty($pw2) || empty($email)) {
    echo "<script>alert('不可空白');</script>";
    jto("../index.php?do=reg");
} else if ($pw != $pw2) {
    echo "<script>alert('密碼錯誤');</script>";
    jto("../index.php?do=reg");
} else if ($chk > 0) {
    echo "<script>alert('帳號重複');</script>";
    jto("../index.php?do=reg");
} else {
    $User->save(['acc' => $acc, 'pw' => $pw]);
    echo "<script>alert('註冊完成，歡迎加入');</script>";
    jto("../index.php?do=login");
}
