<?php /* Smarty version 2.6.26, created on 2016-11-12 14:00:30
         compiled from message.html */ ?>
<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
<html>
<head>
<title>系统提示</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<meta http-equiv='Refresh' content='<?php echo $this->_tpl_vars['waitSecond']; ?>
;URL=<?php echo $this->_tpl_vars['jumpUrl']; ?>
'/>
<link type="text/css" rel="stylesheet" href="__ROOT__/admin/Public/style/base.css"/>
<link type="text/css" rel="stylesheet" href="__ROOT__/admin/Public/style.css"/>
</head>
<body>
<div id="mainWrap" style="width:350px;margin: 190px auto;">
	<div id="pageCo">
		<div id="message">
			<ul vAlign="center" align="middle" class="l"><img src="__PUBLIC__/images/logo.png" /></ul>
			<ul class="r">
				<li><span class="green" style="text-align: center;padding:2px;"><?php echo $this->_tpl_vars['message']; ?>
</span></li>
				<li class="btn" style="text-align: center;">系统将在 <span style="color:blue;font-weight:bold"><?php echo $this->_tpl_vars['waitSecond']; ?>
</span> 秒后自动跳转，如果不想等待,直接点击 <a href="<?php echo $this->_tpl_vars['jumpUrl']; ?>
">这里</a></li>
			</ul>
			<ul class="clearit"></ul>
		</div>

	</div>
</div>
</body>
</html>