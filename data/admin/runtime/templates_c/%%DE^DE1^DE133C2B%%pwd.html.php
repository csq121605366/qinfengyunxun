<?php /* Smarty version 2.6.26, created on 2016-11-14 11:07:24
         compiled from default/Fprofile/pwd.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'U', 'default/Fprofile/pwd.html', 5, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "default/Public/header.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<div id="pageTop">
	<div class="tabs"> 
		<ul>
			<!--<li><a href='<?php echo $this->_plugins['function']['U'][0][0]->_U(array('url' => "fprofile/edit"), $this);?>
' <?php if ($this->_tpl_vars['action_name'] == 'edit'): ?>class="selected"<?php endif; ?>>修改资料</a></li>-->
			<li><a href="javascript:void(0);" class="selected" rel="tabsContent1">修改密码</a></li>
		</ul>		
	</div>
</div>
<form class="validate" action="<?php echo $this->_plugins['function']['U'][0][0]->_U(array('url' => 'fprofile/pwd?do=update&dosubmit=1'), $this);?>
" method="post" >
<div id="pageCo">
	<div class="manageForm">
		<table cellpadding="0" cellspacing="0" class="tabcontent" id="tabsContent1">
			<tbody>
				<tr>
					<th width="20%"><label for="old_pwd">当前密码：</label></th>
					<td><input type="password" name="old_password" id="old_password" value="" class="required input" minlength="6" maxlength="20" /></td>
				</tr>
				<tr>
					<th><label for="password">新密码：</label></th>
					<td><input type="password" name="password" id="password" class="required input" value="" minlength="6" maxlength="20" /></td>
				</tr>
				<tr>
					<th><label for="confirm_password">再次输入新密码：</label></th>
					<td><input type="password" name="confirm_password" id="confirm_password" class="required input" value="" equalTo="#password" /></td>
				</tr>
			</tbody>
			<tfoot>
				<tr>
					<th>&nbsp;</th>
					<td>
						<label class="btn"><input class="submit" type="submit" value="提交保存" /></label>
						<label class="btn"><input class="submit" type="reset" value="重 置" /></label>
					 </td>
				</tr>
			</tfoot>
		</table>
	</div>	
</div>
</form>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "default/Public/footer.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>