<?php /* Smarty version 2.6.26, created on 2016-11-14 11:07:23
         compiled from default/Fuser/add.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'U', 'default/Fuser/add.html', 9, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "default/Public/header.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<?php if (0): ?>
<!--需要先选择用户模型，在选择角色时使用以下代码-->
<script language="javascript">
$().ready(function (){
	$('#modelid').change(function (){
		$.post(
			"<?php echo $this->_plugins['function']['U'][0][0]->_U(array('url' => 'fuser/add?ajax=getrole'), $this);?>
",
			{
				modelid:$('#modelid').val(),
			},
			function (data) //回传函数
			{
				$('#showrole').html(data);
			}
		);
	});
});
</script>
<?php endif; ?>

<div id="pageTop">
	<div class="tabs"> 
		<ul>
		<?php if ($this->_tpl_vars['step'] > 1): ?>
			<li><a href='#' class="selected" rel="tabsContent1"><span>基本信息</span></a></li>
			<li><a href='#' rel="tabsContent2"><span>扩展信息</span></a></li>
		<?php else: ?>
			<li><a href='javascript:void(0);' <?php if ($this->_tpl_vars['action_name'] == 'add'): ?>class="selected"<?php endif; ?> rel="tabsContent1">添加会员</a></li>
			<li><a href='<?php echo $this->_plugins['function']['U'][0][0]->_U(array('url' => "fuser/manage"), $this);?>
' <?php if ($this->_tpl_vars['action_name'] == 'manage'): ?>class="selected"<?php endif; ?>>管理会员</a></li>
		<?php endif; ?>
		</ul>
	</div>
</div>

<?php if ($this->_tpl_vars['step'] > 1): ?>
<form class="validate" method="post" action='<?php echo $this->_plugins['function']['U'][0][0]->_U(array('url' => "fuser/add?step=2&moduleid=".($this->_tpl_vars['moduleid'])), $this);?>
'>
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
						<input type="hidden" name="info[role_id]" value="<?php echo $this->_tpl_vars['role_id']; ?>
">
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
<?php else: ?>
<form class="validate" method="post" action='<?php echo $this->_plugins['function']['U'][0][0]->_U(array('url' => "fuser/add?step=1&moduleid=".($this->_tpl_vars['moduleid'])), $this);?>
'>
<div id="pageCo">
	<div class="manageForm">
		<table cellpadding="0" cellspacing="0" class="tabcontent" id="tabsContent1">
			<tbody>
				<?php if (0): ?>
				<!--需要先选择用户模型，在选择角色时使用以下代码-->
			    <tr>
			      <th width="150">会员角色<span>请先给会员分配一个角色</span></th>
			      <td><?php echo Html::select('modelid', $this->_tpl_vars['models'],'','title="【所属会员模型】必须选择" class="required"') ?><span id="showrole"></span></td>
			    </tr>
			    <?php endif; ?>
			    <tr>
			      <th width="150">会员角色<span>请先给会员分配一个角色</span></th>
			      <td>
			      <select name="role_id">
			      	<?php $_from = $this->_tpl_vars['roles']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['v']):
?>
					  <option value="<?php echo $this->_tpl_vars['v']['role_id']; ?>
"><?php echo $this->_tpl_vars['v']['nickname']; ?>
</option>
					<?php endforeach; endif; unset($_from); ?>
			      </select>
			      </td>
			    </tr>
			</tbody>
			<tfoot>
				<tr>
			      <th width="150"></th>
			      <td>
			        <label class="btn"><input type="submit" name="submit" value="下一步" class="submit" /></label>
			        <label class="btn"><input type="reset" name="reset" value="重 置" class="submit" /></label>
			      </td>
			    </tr>
			</tfoot>
		</table>
	</div>	
</div>
</form>
<?php endif; ?>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'default/Public/footer.html', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>