<form action="api/login.php" method="post">
    <fieldset>
        <legend>會員登入</legend>
        帳號：<input type="text" name="acc" required><br>
        密碼：<input type="password" name="pw" required><br>
        <button>登入</button><button type="reset">清除</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="button" onclick="location.href='?do=forget'" value="忘記密碼">|
        <input type="button" onclick="location.href='?do=reg'" value="尚未註冊">
    </fieldset>
</form>