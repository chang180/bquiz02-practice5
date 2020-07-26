<fieldset>
    <legend>忘記密碼</legend>
    <h3>請輸入信箱以查詢密碼</h3>
    <input type="text" name="email" id="chk"><br>
    <div class="result"></div>
    <button onclick="check()">尋找</button>
</fieldset>
<script>
    function check() {
        let email = $("#chk").val();
        $.post("api/checkemail.php", {
            email
        }, function(res) {
$(".result").html(res);
        })
    }
</script>