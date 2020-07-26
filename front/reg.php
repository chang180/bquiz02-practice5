<form action="api/reg.php" method="post">
    <fieldset>
        <legend>會員註冊</legend>
        <h3>*請設定您要註冊的帳號及密碼(最長12個字元)</h3>
        <label for="acc">Step1:登入帳號</label><input type="text" name="acc" id="acc" required><br>
        <label for="pw">Step2:登入密碼</label><input type="password" name="pw" id="pw" required><br>
        <label for="pw2">Step3:再次確認密碼</label><input type="password" name="pw2" id="pw2" required><br>
        <label for="email">Step4:信箱(忘記密碼時使用)</label><input type="password" name="email" id="email" required><br>
        <button>註冊</button><button type="reset">清除</button>
    </fieldset>
</form>