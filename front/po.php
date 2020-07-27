<style>
    .contain {
        display: flex;
        width:100%;
    }
</style>
目前位置：首頁 > 分類網誌 > <span id="now"></span>
<div class="contain">
    <fieldset style="width:30%">
        <legend>分類網誌</legend>
        <div class="ct" onclick="showList(1)">健康新知</div>
        <div class="ct" onclick="showList(2)">菸害防治</div>
        <div class="ct" onclick="showList(3)">癌症防治</div>
        <div class="ct" onclick="showList(4)">慢性病防治</div>
    </fieldset>
    <fieldset style="width:60%">
        <legend>文章列表</legend>
        <div class="list"></div>
        <div class="post"></div>
    </fieldset>
</div>
<script>
    showList(1);

    function showList(type) {
        let el = [
            '健康新知',
            '菸害防治',
            '癌症防治',
            '慢性病防治'
        ];
        $("#now").html(el[(type-1)]);
        $.get("api/get_list.php", {
            type
        }, function(res) {
            $(".list").html(res);
            $(".list").show();
            $(".post").hide();
        })
    }

    function showPost(id) {
        $.get("api/get_post.php", {
            id
        }, function(res) {
            $(".post").html(res);
            $(".post").show();
            $(".list").hide();
        })
    }
</script>