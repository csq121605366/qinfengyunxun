<?php /* Smarty version 2.6.26, created on 2016-11-14 11:07:02
         compiled from default/Fcontent/edit.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'U', 'default/Fcontent/edit.html', 2, false),array('modifier', 'in_array', 'default/Fcontent/edit.html', 25, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "default/Public/header.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<form method="post" action="<?php echo $this->_plugins['function']['U'][0][0]->_U(array('url' => 'fcontent/edit?dosubmit=1'), $this);?>
" class="validate">
<div id="pageTop">
<div class="tabs">
<ul>
	<li><a href="#" class="selected" rel="tabsContent1">基本信息</a></li>
	<li><a href="#" rel="tabsContent2">高级信息</a></li>
</ul>
</div>
</div>
<div id="pageCo">
<div class="manageForm"><?php $_from = $this->_tpl_vars['form_data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['id'] => $this->_tpl_vars['card']):
?>
<table cellpadding="0" cellspacing="0" class="tabcontent"
	id="tabsContent<?php echo $this->_tpl_vars['id']; ?>
" <?php if ($this->_tpl_vars['id'] > 1): ?> style="display:none;"<?php endif; ?>>
	<tbody>
	<?php if ($this->_tpl_vars['id'] == 1): ?>
	<?php if ($this->_tpl_vars['shuxing_list']): ?>
	<?php $_from = $this->_tpl_vars['shuxing_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['shl']):
?>
	<tr>
		<th width="150"><?php echo $this->_tpl_vars['shl']['shuxing_name']; ?>
</th>
		<td>
			<select name="info[shuxing][]"  class=" required ">
				<?php $_from = $this->_tpl_vars['shl']['sl']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['ss']):
?>
				<option value="<?php echo $this->_tpl_vars['ss']['id']; ?>
" <?php if (((is_array($_tmp=$this->_tpl_vars['ss']['id'])) ? $this->_run_mod_handler('in_array', true, $_tmp, $this->_tpl_vars['data']['shuxing_arr']) : in_array($_tmp, $this->_tpl_vars['data']['shuxing_arr']))): ?> selected <?php endif; ?>><?php echo $this->_tpl_vars['ss']['zs_name']; ?>
</option>
				<?php endforeach; endif; unset($_from); ?>
			</select>
		</td>
	</tr>
	<?php endforeach; endif; unset($_from); ?>
	<?php endif; ?>
	<?php if ($this->_tpl_vars['fws_list']): ?>
	<tr>
		<th width="150">选择服务商</th>
		<td>
			<select name="info[fws_id]"  class=" required ">
				<?php $_from = $this->_tpl_vars['fws_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['fl']):
?>
				<option value="<?php echo $this->_tpl_vars['fl']['user_id']; ?>
" <?php if ($this->_tpl_vars['data']['fws_id'] == $this->_tpl_vars['fl']['user_id']): ?> selected <?php endif; ?>><?php echo $this->_tpl_vars['fl']['nickname']; ?>
</option>
				<?php endforeach; endif; unset($_from); ?>
			</select>
		</td>
	</tr>
	<?php endif; ?>
	<?php endif; ?>
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
	</tbody>
</table>
<?php endforeach; endif; unset($_from); ?>
<table cellpadding="0" cellspacing="0">
	<tfoot>
		<tr>
			<th width="150">&nbsp;</th>
			<td><label class="btn"><input type="submit"
				name="submit" value="确定保存" class="submit" /></label></td>
		</tr>
	</tfoot>
</table>
</div>
</div>
<input type="hidden" name="forward" value="<?php echo $this->_tpl_vars['forward']; ?>
" /> <input
	type="hidden" name="catid" id="catid" value="<?php echo $this->_tpl_vars['cat']['catid']; ?>
" /> <input
	type="hidden" name="info[cid]" id="info[cid]" value="<?php echo $this->_tpl_vars['data']['cid']; ?>
" />
<input type="hidden" name="cid" id="cid" value="<?php echo $this->_tpl_vars['data']['cid']; ?>
" /> <input
	type="hidden" name="info[action]" id="action" value="show" /></form>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "default/Public/footer.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>