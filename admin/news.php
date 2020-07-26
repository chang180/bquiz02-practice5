<form action="api/edit_news.php" method="post">
    <fieldset>
        <legend>最新文章管理</legend>
        <table>
            <tr>
                <td width="20%">編號</td>
                <td width="35%">標題</td>
                <td width="20%">顯示</td>
                <td width="20%">刪除</td>
            </tr>
            <?php
            $total = $News->count();
            $div = 3;
            $pages = ceil($total / $div);
            $now = $_GET['p'] ?? "1";
            $start = ($now - 1) * $div;
            $prev = (($now - 1) > 0) ? ($now - 1) : 1;
            $next = (($now + 1) <= $pages) ? ($now + 1) : $pages;

            $rows = $News->all([], " LIMIT $start,$div");
            foreach ($rows as $row) {
            ?>
                <tr>
                    <td><?= ($start + 1); ?>.</td>
                    <td><?= $row['title']; ?></td>
                    <td><input type="checkbox" name="sh[]" value="<?= $row['id']; ?>" <?= ($row['sh'] == 1) ? "checked" : ""; ?>></td>
                    <td><input type="checkbox" name="del[]" value="<?= $row['id']; ?>"></td>
                </tr>
                <input type="hidden" name="id[]" value="<?= $row['id']; ?>">
            <?php
                $start++;
            }
            ?>
        </table>
        <div class="ct">
            <a href="?do=news&p=<?= $prev; ?>"> < </a>
            <?php
            for ($i = 1; $i <= $pages; $i++) {
                $fontsize = ($now == $i) ? "30px" : "20px";
            ?>
                <a href="?do=news&p=<?= $i; ?>" style="font-size:<?=$fontsize;?>"><?= $i; ?></a>
            <?php
            }
            ?>
            <a href="?do=news&p=<?= $next; ?>"> > </a>
        </div>
        <div class="ct"><button>確定修改</button></div>
    </fieldset>
</form>