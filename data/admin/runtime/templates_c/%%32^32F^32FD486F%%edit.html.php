<?php /* Smarty version 2.6.26, created on 2016-11-14 11:07:19
         compiled from default/Fuser/edit.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'U', 'default/Fuser/edit.html', 11, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "default/Public/header.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<div id="pageTop">
	<div class="tabs"> 
		<ul>
			<li><a href='#' class="selected" rel="tabsContent1"><span>基本信息</span></a></li>
			<li><a href='#' rel="tabsContent2"><span>扩展信息</span></a></li>
		</ul>		
	</div>
</div>

<form class="validate" method="post" action="<?php echo $this->_plugins['function']['U'][0][0]->_U(array('url' => 'fuser/edit?dosubmit=1'), $this);?>
" >
<div id="pageCo">
	<div class="manageForm">
		<?php $_from = $this->_tpl_vars['form_data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['id'] => $this->_tpl_vars['card']):
?>
		<table cellpadding="0" cellspacing="0" class="tabcontent" id="tabsContent<?php echo $this->_tpl_vars['id']; ?>
" <?php if ($this->_tpl_vars['id'] > 1): ?> style="display:none"<?php endif; ?>>
			<tbody>
				<?php $_from = $this->_tpl_vars['card']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['v']):
?>
				<tr>
					<th width="150"><?php echo $this->_tpl_vars['v']['name']; ?>
<span><?php echo $this->_tpl_vars['v']['tips']; ?>
</span></th>
					<td><?php echo $this->_tpl_vars['v']['form']; ?>
</td>
				</tr>
				<?php endforeach; endif; unset($_from); ?>
				<?php if ($this->_tpl_vars['id'] == 1): ?>
				<tr>
			      <th width="150">会员角色<span>给会员分配一个角色</span></th>
			      <td>
			      <select name="info[role_id]">
			      	<?php $_from = $this->_tpl_vars['roles']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['v']):
?>
					  <option value="<?php echo $this->_tpl_vars['v']['role_id']; ?>
" <?php if ($this->_tpl_vars['v']['role_id'] == $this->_tpl_vars['data']['role_id']): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['v']['nickname']; ?>
</option>
					<?php endforeach; endif; unset($_from); ?>
			      </select>
			      </td>
			    </tr>
			    <?php endif; ?>
			</tbody>
		</table>
		<?php endforeach; endif; unset($_from); ?>
		<table cellpadding="0" cellspacing="0">
			<tfoot>
				<tr>
					<th width="150">
						<input type="hidden" name="forward" value="<?php echo $this->_tpl_vars['forward']; ?>
">
						<input type="hidden" name="info[isadmin]" value="0">
						<input type="hidden" name="info[user_id]" value="<?php echo $this->_tpl_vars['data']['user_id']; ?>
" />
					</th>
					<td>
						<label class="btn"><input type="submit" name="submit" value="确定保存" class="submit" /></label>
						<label class="btn"><input type="reset" name="reset" value="重 置" class="submit" /></label>
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