<fieldset>
<legend>目前位置：首頁 > 最新文章區</legend>
<table>
    <tr>
        <td width="20%">標題</td>
        <td width="60%">內容</td>
        <td width="20%"></td>
    </tr>
<?php
$table=$_GET['do'];
$db=new DB($table);
$rows=$db->all();
foreach($rows as $row){
?>
    <tr>
        <td><?=$row['title'];?></td>
        <td><div class="part"><?=mb_substr($row['text'],0,20,"utf8");?>...<div class="all" style="display:none;"><?=$row['text'];?></div>
            
        </td>
        <td></td>
    </tr>
    <?php
    }
    ?>
</table>

</fieldset>