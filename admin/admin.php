<form action="api/edit.php" method="post">
    <fieldset>
        <legend>帳號管理</legend>
        <table>
            <tr>
                <td width="40%">帳號</td>
                <td width="30%">密碼</td>
                <td width="30%">刪除</td>
            </tr>
    <?php
    $rows=$User->all();
    foreach($rows as $row){
    if($row['acc']!='admin'){
    ?>
            <tr>
                <td><?=$row['acc'];?></td>
                <td><?=str_repeat("*",strlen($row['pw']));?></td>
                <td><input type="checkbox" name="del[]" value="<?=$row['id'];?>"></td>
            </tr>
    <?php } }?>
        </table>
        <div class="ct">
            <button>確定刪除</button><button>清空選取</button>
        </div>
    </form>
    <form action="api/regadmin.php" method="post">
        <h2>新增會員</h2>
        <h3>*請設定您要註冊的帳號及密碼(最長12個字元)</h3>
        <label for="acc">Step1:登入帳號</label><input type="text" name="acc" id="acc" required><br>
        <label for="pw">Step2:登入密碼</label><input type="password" name="pw" id="pw" required><br>
        <label for="pw2">Step3:再次確認密碼</label><input type="password" name="pw2" id="pw2" required><br>
        <label for="email">Step4:信箱(忘記密碼時使用)</label><input type="password" name="email" id="email" required><br>
        <button>新增</button><button type="reset">清除</button>
</form>
    </fieldset>