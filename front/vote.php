<fieldset>
    <legend>目前位置：首頁 > 問卷調查 > <span><?= $Que->find($_GET['parent'])['text']; ?></span></legend>
    <?= $Que->find($_GET['parent'])['text']; ?>
    <form action="api/vote.php" method="post">
        <?php
        $rows = $Que->all(['parent' => $_GET['parent']]);
        foreach ($rows as $row) {
        ?>
            <input type="radio" name="id" value="<?= $row['id']; ?>"><?= $row['text']; ?><br>
        <?php } ?>
        <input type="hidden" name="parent" value="<?= $_GET['parent']; ?>">
        <button class="cent">我要投票</button>
    </form>

</fieldset>