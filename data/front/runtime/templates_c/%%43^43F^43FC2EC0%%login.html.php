<?php /* Smarty version 2.6.26, created on 2016-11-28 16:19:31
         compiled from user/login.html */ ?>
 <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "library/head.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<link rel="stylesheet" type="text/css" href="__PUBLIC__/css/login.css">

<!--右侧边栏菜单-->

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "library/nav.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<!-- 登陆 -->
<div class="login container">
	<div class="login-logo">
		<img src="__PUBLIC__/images/zx6.png" />
	</div>
	<form class="login-form" method="post">
		<h3>账号登陆</h3>
		<div class="login-row">
			<label for="username">用户名</label>
			<input name="info[username]" id="username" value="请输入您的用户名" placeholder="用户名" autocomplete="off" dataType="*6-16" nullmsg="请输入用户名" errormsg="请输入正确的用户名" >
			<span class="Validform_checktip">请输入正确的用户名</span>
		</div>
		<div class="login-row">
			<label for="password">密码</label>
			<input type="password" id="password" name="info[password]" placeholder="密码" dataType="*6-15" nullmsg="请输入密码" errormsg="密码范围在6~15位之间！">
			<span class="Validform_checktip">密码错误</span>
		</div>
		<div class="login-row">
			<input type="submit" value="登录">
		</div>
		<p class="login-link">
			<a href="__ROOT__/register">注册会员</a>
			<span>|</span>
			<a href="__ROOT__/forget">忘记密码?</a>
		</p>
	</form>
</div>

</body>

<script type="text/javascript" src="__PUBLIC__/js/Validform.js"></script>

<script>
	$(function($) {
		$(".naw_img").click(function() {
			$(".rcblnaw").css({
				"position": "fixed",
				"top": "0px",
				"right": "0px",
				"transition": "all 0.5s"
			})
			$(".naw").hide()
		})

		$(".nawclose").click(function() {
			$(".rcblnaw").css({
				"position": "fixed",
				"top": "0px",
				"right": "-380px",
				"transition": "all 0.5s"
			})
			$(".naw").show()
		})

		$("#username").val("");
		$("#password").val("");

		$(".login-form").Validform({
			tiptype: function(msg, o, cssctl) {
				//msg：提示信息;
				//o:{obj:*,type:*,curform:*}, obj指向的是当前验证的表单元素（或表单对象），type指示提示的状态，值为1、2、3、4， 1：正在检测/提交数据，2：通过验证，3：验证失败，4：提示ignore状态, curform为当前form对象;
				//cssctl:内置的提示信息样式控制函数，该函数需传入两个参数：显示提示信息的对象 和 当前提示的状态（既形参o中的type）;
				if(!o.obj.is("form")) { //验证表单元素时o.obj为该表单元素，全部验证通过提交表单时o.obj为该表单对象;
					var objtip = o.obj.siblings(".Validform_checktip");
					cssctl(objtip, o.type);
					objtip.text(msg);
					var infoObj = objtip;
					if(o.type == 2) {
						infoObj.fadeOut(200);
					} else {
						if(infoObj.is(":visible")) {
							return;
						}
						infoObj.css({
							left:380,
							top:48
						})
						infoObj.show().animate({
							left: 300
						}, 200);
					}

				}
			}
		});

	});
</script>

</html>