<fieldset>
    <legend>目前位置：首頁 > 問卷調查</legend>
<table>
    <tr>
        <td style="width:10%">編號</td>
        <td style="width:40%">問卷題目</td>
        <td style="width:10%">投票總數</td>
        <td style="width:10%">結果</td>
        <td style="width:10%">狀態</td>
    </tr>

    <?php
    $rows=$Que->all(['parent'=>0]);
    $i=1;
    foreach($rows as $row){
    ?>
    <tr>
        <td><?=$i;?>.</td>
        <td><?=$row['text'];?></td>
        <td><?=$row['count'];?></td>
        <td>
<a href="?do=result&parent=<?=$row['id'];?>">結果</a>
        </td>
        <td>
<?php
if(!empty($_SESSION['login'])){
?>
    <a href="?do=vote&parent=<?=$row['id'];?>">參與投票</a>
    <?php
}else{
echo "請先登入";
}
?>
        </td>
    </tr>
<?php 
$i++;
} ?>
</table>

</fieldset>