<?php /* Smarty version 2.6.26, created on 2016-11-14 09:37:01
         compiled from default/Findex/index.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'U', 'default/Findex/index.html', 12, false),)), $this); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>后台管理</title>
<link type="text/css" rel="stylesheet"
	href="<?php echo @_PUBLIC_; ?>
style/newFrame.css" />
<script type="text/javascript"
	src="__ROOT__/min/?b=admin/Public&amp;f=js/jquery-1.4.2.min.js,js/int.js"></script>
</head>
<body style="scroll: no;">
<div id="top">您好<a href="<?php echo $this->_plugins['function']['U'][0][0]->_U(array('url' => 'fprofile/pwd'), $this);?>
"
	target="mainFrame"><?php echo $this->_tpl_vars['userData']['username']; ?>
</a><a
	href="__ROOT__/" title="打开网站主页" target="_blank">主页</a> | <a
| <a href="<?php echo $this->_plugins['function']['U'][0][0]->_U(array('url' => 'flogin/logout'), $this);?>
" title="注销登录">注销</a></div>
<div id="navBar">
<div id="nav">
<ul>
	<?php echo $this->_tpl_vars['menu_html']['top_menu']; ?>

</ul>
<ul class="clearit"></ul>
</div>
<div id="qMenu">
<ul>
	<li><a href="javascript:;" class="btn">快捷操作</a>
	<ul>
		<li><a href="__ROOT__/" target="_blank">查看主页</a></li>
        <li><a href="<?php echo $this->_plugins['function']['U'][0][0]->_U(array('url' => 'fcache/deldir'), $this);?>
" target="mainFrame">清空缓存</a></li>
	</ul>
	</li>
</ul>
</div>
<div class="clearit"></div>
</div>
<div id="wrap">
<div id="subNav"><?php echo $this->_tpl_vars['menu_html']['sidebar_menu']; ?>
</div>
<div id="main">
<div id="po">
<ul class="btns">
	<li><a href="javascript:;" id="goBack">后退</a></li>
	<li><a href="javascript:;" id="goNext">前进</a></li>
	<li><a href="javascript:;" id="refresh">刷新</a></li>
</ul>
<ul class="text">
	<li>当前位置：<a href="<?php echo $this->_plugins['function']['U'][0][0]->_U(array('url' => 'findex/home'), $this);?>
" target="mainFrame">系统首页</a>
	&gt; <span>内容管理</span></li>
</ul>
<ul class="clearit"></ul>
</div>
<div id="mainCo"><iframe id="mainFrame" name="mainFrame"
	frameborder="0" src="<?php echo $this->_plugins['function']['U'][0][0]->_U(array('url' => 'findex/home'), $this);?>
"></iframe>
</div>
</div>
<div class="clearit"></div>
</div>
</body>
</html>