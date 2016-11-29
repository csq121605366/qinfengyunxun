<?php /* Smarty version 2.6.26, created on 2016-11-14 09:31:50
         compiled from default/Flogin/index.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'U', 'default/Flogin/index.html', 17, false),)), $this); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>后台登录</title>
<link type="text/css" rel="stylesheet"
	href="<?php echo @_PUBLIC_; ?>
style/login.css" />
<script type="text/javascript"
	src="__ROOT__/min/?b=admin/Public/js&amp;f=jquery-1.4.2.min.js,validation/jquery.validate.js,form/jquery.form.js"></script>

<script type="text/javascript">
if (window.parent != window){
  window.top.location.href = location.href;
}
function refresh(){ //重载验证码
	var timenow = new Date().getTime();
	$('#verifyImg').attr("src","<?php echo $this->_plugins['function']['U'][0][0]->_U(array('url' => 'flogin/verify?t='), $this);?>
"+timenow);
}
</script>

<script type="text/javascript">
$().ready(function () {
	//表单焦点事件
	
	$(".refresh").live('click', function(){
		refresh();
		return false;
	});
	$(".input").eq(0).focus();
	
	$('.input').focus(function(){
		$(this).addClass("inputHighlight")
	}).blur(function(){
		$(this).removeClass("inputHighlight")
	});	
	
	$("#submit").hover(function(){
        $(this).addClass('submitHover');
	}, function(){
        $(this).removeClass('submitHover');
 	});	
    

    var i=1;
	$('#myForm').validate({
		submitHandler: function(form) {		
			$(form).ajaxSubmit({ 
				beforeSubmit:function (){					
					$("#promptLayer").fadeIn("slow");
					$("#promptLayer").html("<div class='loading'>登录中，请稍后...</div>"); 
					return true; 	
				},
				success: function (msg){
					//alert(msg);					
					var response = eval("("+msg+")");
					if(response.code == 'y') {  //登入成功
						setTimeout(function(){$("#promptLayer").html("<div class='suc'><font color='#007C0C'>"+response.text+"</font></div>");},500);
						setTimeout(function(){$("#promptLayer").fadeOut("slow");},500);
						setTimeout(function(){window.location.href="<?php echo $this->_plugins['function']['U'][0][0]->_U(array('url' => 'findex/index'), $this);?>
";},1000);
					} else {
						setTimeout(function(){$("#promptLayer").html("<div class='err'><font color='#ee0000'>"+response.text+"</font></div>");},500);
						if(i==1){
							 $("#codes").html("验证码<br /><input type='text' name='info[verify]' class='input required' maxlength='4' minlength='4' size='10' tabindex='3' title='[*请输入四位验证码]' /><img class='refresh' id='verifyImg' src='<?php echo $this->_plugins['function']['U'][0][0]->_U(array('url' => 'flogin/verify'), $this);?>
'  alt='验证码' align='absmiddle' />");	
							i=0;								 
						};
						setTimeout(function(){$("#promptLayer").fadeOut("fast");},2000);				
		
						if(response.text=="用户名不存在！"){							
							$(".input").eq(0).focus();	
						}else if(response.text=="密码错误！"){
							$(".input").eq(1).focus();	
						}else if(response.text=="验证码错误！"){
							$(".input").eq(2).focus();	
							$(".input").eq(2).addClass("inputHighlight");
							$('.input').eq(2).focus(function(){
								$(this).addClass("inputHighlight")
							}).blur(function(){
								$(this).removeClass("inputHighlight")
							});	
						};
					}
				}, 
				resetForm: false,
				timeout: 5000   
			});
		}
	});	
})
</script>
</head>

<body>
<div id="promptLayer"></div>
<div id="loginTop"><a href="__ROOT__">网站首页</a></div>
<div id="logo"><a href="__ROOT__"><img
	src="<?php echo @_PUBLIC_; ?>
images/logo.gif" /></a></div>
<div id="login">
<form id="myForm" name="login"
	action="<?php echo $this->_plugins['function']['U'][0][0]->_U(array('url' => 'flogin/index?ajax=1&dosubmit=1'), $this);?>
" method="post">
<ul>
	<li>用户名<br />
	<input type="text" name="info[username]" id="username" tabindex="1"
		class="input required" size="30" title="[*请输入正确的用户名]" /></li>
	<li>密 码<br />
	<input type="password" name="info[password]" class="input required"
		minlength="6" tabindex="2" size="30" title="[*请输入正确的密码]" /></li>
	<li id="codes"><?php if ($this->_tpl_vars['verify']): ?> 验证码<br />
	<input type="text" name="info[verify]" class="input required"
		maxlength="4" minlength="4" size="10" tabindex="3" title="[*请输入四位验证码]" />
	<img class="refresh" id="verifyImg" src="<?php echo $this->_plugins['function']['U'][0][0]->_U(array('url' => 'flogin/verify'), $this);?>
"
		alt="验证码" align="absmiddle" /> <?php endif; ?></li>
	<li class="submit"><em><input type="submit" value=""
		id="submit" /></em></li>
</ul>
</form>
</div>
<!--<div id="getPassword"><a href="?m=flogin&a=getpwd">忘记了密码？</a></div>-->
</body>
</html>