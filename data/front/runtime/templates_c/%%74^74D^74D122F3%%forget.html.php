<?php /* Smarty version 2.6.26, created on 2016-11-28 09:41:45
         compiled from user/forget.html */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "library/head.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<!--右侧边栏菜单-->

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "library/nav.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>




<!--内容-->
<div class="body1">
    <form action=""  method="post">
    <div class="login">
        <p>忘记密码</p>

        <div class="input">
            <input type="text" name="email" placeholder="电子邮箱">
        </div>
        <div class="input">
            <div class="yzm"><input type="text" placeholder="请输入验证码" name="verify"></div>
            <div class="yzm1"><img src="__ROOT__/Fverify/index" alt="" onclick = "this.src='__ROOT__/Fverify/index?vr='+Math.random()"></div>
        </div>
        <div class="input">
            <div class="yzm"><input type="text" name="email_verify" placeholder="请输入验证码"></div>
            <div class="yzm2" id="get_varify">获取验证码</div>
        </div>
        <div class="input">
            <input type="password" name="password" placeholder="输入新密码">
        </div>
        <div class="input">
            <input type="password" name="re_password" placeholder="再次输入密码">
        </div>
        <div class="input">
            <input type="submit" value="提交">
        </div>
        <div class="input" style="text-align: right">
            <a href="__ROOT__/login">返回登录</a>
        </div>



    </div>
        </form>
</div>






</body>

<script>

    $(function($) {
      


    $(".naws_img").click(function(){
        $(".rcblnaw").css({
            "position": "fixed",
            "top":"0px",
            "right":"0px",
            "transition": "all 0.5s"
        })
        $(".naw").hide()
    })
    $(".nawclose").click(function(){
        $(".rcblnaw").css({
            "position": "fixed",
            "top":"0px",
            "right":"-380px",
            "transition": "all 0.5s"
        })
        $(".naw").show()
    })

</script>

<script>
    $(function(){
        $("#get_varify").click(function(){
            var email = $("input[name='email']").val();
            var verify = $("input[name='verify']").val();
            if(email){
                $.ajax({
                    type: "POST",
                    url: "__ROOT__/Fuser/get_emai_varify/",
                    data: "email="+email+"&verify="+verify,
                    success: function(data){
                        if(data==1){
                            alert("验证码错误！");
                        }else if(data==2){
                            alert("不存在该用户");
                        }else if(data==3){
                            alert("邮箱验证码发送成功，请注意查收！");
                        }else{
                            alert("验证码发送失败，请稍后重试！");
                        }
                    }
                })
            }
        });
    });
</script>

</html>