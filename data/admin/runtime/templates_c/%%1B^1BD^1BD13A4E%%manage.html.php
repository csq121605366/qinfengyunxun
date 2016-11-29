<?php /* Smarty version 2.6.26, created on 2016-11-14 13:31:39
         compiled from default/Fcategory/manage.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'U', 'default/Fcategory/manage.html', 5, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "default/Public/header.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<script language="javascript" src="<?php echo @_PUBLIC_; ?>
js/editable/jquery.editable.js"></script>
<script language="javascript">
$().ready(function (){	
	$(".editable_sort").editable("<?php echo $this->_plugins['function']['U'][0][0]->_U(array('url' => 'fcategory/edit?ajax=sort'), $this);?>
",{
			indicator : '<img src="__ROOT__/admin/Public/images/loading2.gif" />',
      tooltip   : "点击可编辑排序",
			name			: 'sort',
			id				: 'catid',
			placeholder : '不可用',
			width:  20,
			select	  : true,
			event	  : "click",
			onblur : "submit"
	});
});
</script>
<div id="pageTop">
	<div class="tabs"> 
		<ul>
			<li><a href="<?php echo $this->_plugins['function']['U'][0][0]->_U(array('url' => 'fcategory/manage'), $this);?>
" <?php if ($this->_tpl_vars['action_name'] == 'manage'): ?> class="selected"<?php endif; ?>>管理栏目</a></li>
			<!--<li><a href="<?php echo $this->_plugins['function']['U'][0][0]->_U(array('url' => 'fcategory/add'), $this);?>
" <?php if ($this->_tpl_vars['action_name'] == 'add'): ?> class="selected"<?php endif; ?>>添加栏目</a></li>-->
		</ul>		
	</div>
</div>
<div id="pageCo">
	<div class="listForm">
		<table cellpadding="0" cellspacing="0">
			<thead>
				<tr>
					<th width="20">序</th>
			        <th width="20">ID</th>
			        <th width="160">栏目名称</th>
			        <th>栏目链接</th>
			        <th width="70">栏目类型</th>
			        <th width="70">绑定模型</th>
			        <th width="220">管理操作</th>
				</tr>
			</thead>
			<tbody> 
				<?php echo $this->_tpl_vars['html']; ?>

			</tbody>
		</table>	
	</div>	
	<div class="pageList">
		<?php echo $this->_tpl_vars['pages']; ?>

		<ul class="clearit"></ul> 
	</div>
</div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "default/Public/footer.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>