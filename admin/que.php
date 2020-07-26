<form action="api/que.php" method="post">
    <fieldset>
        <legend>新增問卷</legend>
        <label for="title">問卷名稱<input type="text" name="title" id="tt"></label><br>
        <label for="text">選項<input type="text" name="text[]"></label><button type="button" id="moreopt">更多</button><br>
        <button>新增</button><button type="reset">清空</button>
    </fieldset>
</form>
<script>
$("#moreopt").on("click",function(){
    let el=`
    <br><label for="text">選項<input type="text" name="text[]"></label>
    `;
    $("#tt").after(el);
})
</script>