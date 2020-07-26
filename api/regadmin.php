<?php
include_once "../base.php";

$acc = $_POST['acc'];
$pw = $_POST['pw'];
$pw2 = $_POST['pw2'];
$email = $_POST['email'];
$chk = $User->count(['acc' => $acc]);

if (empty($acc) || empty($pw) || empty($pw2) || empty($email)) {
    echo "<script>alert('不可空白');</script>";
    jto("../admin.php?do=admin");
} else if ($pw != $pw2) {
    echo "<script>alert('密碼錯誤');</script>";
    jto("../admin.php?do=admin");
} else if ($chk > 0) {
    echo "<script>alert('帳號重複');</script>";
    jto("../admin.php?do=admin");
} else {
    $User->save(['acc' => $acc, 'pw' => $pw]);
    jto("../admin.php?do=admin");
}
