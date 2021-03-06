<?php /* Smarty version 2.6.26, created on 2016-11-28 18:03:45
         compiled from user/register.html */ ?>
<link rel="stylesheet" type="text/css" href="__PUBLIC__/css/register.css"> <?php $_smarty_tpl_vars = $this->_tpl_vars;
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
<div class="container register">
	<div class="register-left">
		<img src="__PUBLIC__/images/fw5.png" alt="" />
	</div>
	<form action="" class="register-form" method="post">
		<h3>注册</h3>
		<div class="register-row">
			<label for="username">用户名</label>
			<input type="text" id="username" name="info[username]" placeholder="账号" dataType="*" nullmsg="请输入用户名" errormsg="不能为空">
			<span class="Validform_checktip"></span>
		</div>
		<div class="register-row">
			<label for="tel">手机号</label>
			<input type="text" id="tel" name="info[tel]" placeholder="手机号" dataType="m" nullmsg="请输入手机号" errormsg="不能为空！">
			<span class="Validform_checktip"></span>
		</div>
		<div class="register-row">
			<label for="email">邮箱</label>
			<input type="text" id="email" name="info[email]" placeholder="电子邮箱" dataType="e" nullmsg="请输入邮箱" errormsg="邮箱地址格式不对！！">
			<span class="Validform_checktip"></span>
		</div>
		<div class="register-row">
			<label for="password">密码</label>
			<input type="password" id="password" name="info[password]" placeholder="密码" dataType="*6-15" nullmsg="请输入密码" errormsg="密码范围在6~15位之间！">
			<span class="Validform_checktip"></span>
		</div>
		<div class="register-row">
			<label for="repassword">再次输入密码</label>
			<input type="password" id="repassword" name="info[re_password]" placeholder="再次输入密码" nullmsg="请再次输入密码" recheck="info[password]" dataType="*" errormsg="两次输入的内容不一致">
			<span class="Validform_checktip"></span>
		</div>
		<div class="register-row">
			<input type="submit" id="register-submit" value="提交">
		</div>
		<div class="input" style="text-align: right">
			<a href="__ROOT__/login">返回登录</a>
		</div>
	</form>
</div>
</body>

<script type="text/javascript" src="__PUBLIC__/js/Validform.js"></script>

<script>
	$(function($) {
		$(".naw_img").click(function(e) {
			$(".rcblnaw").addClass('active');
			$(".naw").hide()
		})
		$(".nawclose").click(function(e) {
			$(".rcblnaw").removeClass('active');
			$(".naw").show()
		})

		$(".register-form").Validform({
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
							left: 380,
							top: 36
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