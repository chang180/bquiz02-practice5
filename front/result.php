<style>
    .contain {
        display: flex;
        margin:2px;
        margin:20px;
    }
    .que{
        width:40%;
    }
    .line{
        width:45%;
        height:20px;
        background:#ccc;
        align-self: center;
    }
    .vote{
        align-self:center;
    }
</style>

<fieldset>
    <legend>目前位置：首頁 > 問卷調查 > <span><?= $Que->find($_GET['parent'])['text']; ?></span></legend>
    <?= $Que->find($_GET['parent'])['text']; ?>
        <?php
$total=($Que->find($_GET['parent'])['count']==0)?1:$Que->find($_GET['parent'])['count'];
$rows = $Que->all(['parent' => $_GET['parent']]);
foreach ($rows as $row) {
    $num=$row['count'];
    $rate=$num/$total;
        ?>
            <div class="contain">
                <div class="que"><?= $row['text']; ?></div>
                <div class="line" style="width:<?=round($rate*45);?>%"></div>
                <div class="vote"><?= $row['count']; ?>票(<?= round($rate * 100); ?>%)</div>
            </div>
        <?php } ?>
        <button class="cent" onclick="location.href='index.php?do=que'">返回</button>

</fieldset>