<?php /* Smarty version 2.6.26, created on 2016-11-14 09:38:17
         compiled from default/Fset/set.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'U', 'default/Fset/set.html', 10, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "default/Public/header.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<div id="pageTop">
<div class="tabs">
<ul>
	<?php echo $this->_tpl_vars['set_html']['head']; ?>

</ul>
</div>
</div>

<form method="post" action="<?php echo $this->_plugins['function']['U'][0][0]->_U(array('url' => 'fset/set?dosubmit=1'), $this);?>
">
<div id="pageCo">
<div class="manageForm"><?php echo $this->_tpl_vars['set_html']['body']; ?>
</div>
</div>
<input type="hidden" name="forward" value="<?php echo $this->_tpl_vars['forward']; ?>
" /></form>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "default/Public/footer.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>