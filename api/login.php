<?php
include_once "../base.php";
$chk = $User->count(['acc' => $_POST['acc'], 'pw' => $_POST['pw']]);
$chkacc = $User->count(['acc' => $_POST['acc']]);
if ($chk > 0 && $_POST['acc'] == 'admin') {
    $_SESSION['login'] = $_POST['acc'];
    to("../admin.php");
} else if ($chk > 0) {
    $_SESSION['login'] = $_POST['acc'];
    to("../index.php");
} else if ($chkacc > 0) {
    echo "<script>
    alert('密碼錯誤');
location.href='../index.php?do=login';
    </script>";
} else {
    echo "<script>
    alert('查無帳號');
location.href='../index.php?do=login';
    </script>";
}
