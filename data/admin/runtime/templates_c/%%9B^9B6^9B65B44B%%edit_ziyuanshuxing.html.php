<?php /* Smarty version 2.6.26, created on 2016-11-14 13:32:37
         compiled from default/Fziyuan/edit_ziyuanshuxing.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'U', 'default/Fziyuan/edit_ziyuanshuxing.html', 1, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "default/Public/header.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
">资源属性管理</a></li>
" method="post" name="myform">
    foreach ($_from as $this->_tpl_vars['sl']):
?>
"><?php echo $this->_tpl_vars['sl']['shuxing_name']; ?>
</option>
" size="40" /></td>
" size="40" /></td>
">
$this->_smarty_include(array('smarty_include_tpl_file' => "default/Public/footer.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>