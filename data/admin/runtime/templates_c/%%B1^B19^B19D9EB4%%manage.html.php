<?php /* Smarty version 2.6.26, created on 2016-11-14 10:03:17
         compiled from default/Ffriendlink/manage.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'U', 'default/Ffriendlink/manage.html', 5, false),array('function', 'html_options', 'default/Ffriendlink/manage.html', 35, false),array('modifier', 'date_format', 'default/Ffriendlink/manage.html', 76, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "default/Public/header.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<script src="<?php echo @_PUBLIC_; ?>
js/editable/jquery.editable.js" type="text/javascript"></script>
<script language="javascript">
$().ready(function (){	
	$(".editable_sort").editable("<?php echo $this->_plugins['function']['U'][0][0]->_U(array('url' => 'ffriendlink/edit?ajax=sort'), $this);?>
",{
			indicator : '<img src="__ROOT__/admin/Public/images/loading2.gif" />',
      tooltip   : "点击可编辑排序",
			name			: 'sort',
			id				: 'id',
			placeholder : '不可用',
			select	  : true,
			event	  : "click",
			onblur : "submit"
	});
});

function del()  //选择删除
{
	if($(':checkbox:checked[name="info[id][]"]').length > 0)
	$('#friendlinkForm').submit();
}
</script>
<form name="search" class="filter" method="POST" action="<?php echo $this->_plugins['function']['U'][0][0]->_U(array('url' => 'ffriendlink/manage'), $this);?>
" target="_self">
<div id="pageTop">
	<div class="addBtn">
	  <a href="<?php echo $this->_plugins['function']['U'][0][0]->_U(array('url' => 'ffriendlink/add'), $this);?>
">添加新链接</a>
	  <a href="<?php echo $this->_plugins['function']['U'][0][0]->_U(array('url' => 'ffriendlink/manage_type'), $this);?>
">分类管理</a>
    </div>
	<div class="delBtn">
		<a href="javascript:void(0);" onclick="del(); return false;">删除</a>
	</div>
	<div class="batch">
		<select name="status" onchange="$('.filter').submit();">
		  	<option value="all">状态过滤</option>
	      	<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['status'],'selected' => $this->_tpl_vars['in']['status']), $this);?>

	      </select>
	      <select name="type_id" onchange="$('.filter').submit();">
		  	<option value="">标识符过滤</option>
	      	<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['type_list'],'selected' => $this->_tpl_vars['in']['type_id']), $this);?>

	      </select>
	</div>
	<div class="search">
		  <select name='field'>
		  	<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['q_fields'],'selected' => $this->_tpl_vars['in']['field']), $this);?>

          </select>
          <input type="text" name="q" onblur="if (value ==''){value='请输入关键字'}" onfocus="if (value =='请输入关键字'){value =''}" value="请输入关键字"/>
		  <button type="submit"></button>
	</div>
</div>
</form>
<form id="friendlinkForm" method="post" action="__APP__">
<div id="pageCo">
	<div class="listForm">
		<table cellpadding="0" cellspacing="0">
			<thead>
				<tr>
					<th width="40"><a href="javascript:void(0);" class="checkall">选择</a></th>
				    <th width="40">ID</th>
				    <th>站点名称</th>
				    <th width="50">分类</th>
				    <th width="65">审核</th>
				    <th width="40">排序</th>
				    <th width="120">创建时间</th>
				    <th width="150">操作</th>
				</tr>
			</thead>
			<tbody> 
				<?php $_from = $this->_tpl_vars['data']['info']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['v']):
?>
				  <tr>
				    <td width="40"><input type="checkbox" name="info[id][]" value="<?php echo $this->_tpl_vars['v']['id']; ?>
" /></td>
				    <td width="40"><?php echo $this->_tpl_vars['v']['id']; ?>
</td>
				    <td><a href="<?php echo $this->_tpl_vars['v']['url']; ?>
" target="_blank"><?php echo $this->_tpl_vars['v']['name']; ?>
</a></td>
				    <td width="50"><?php echo $this->_tpl_vars['v']['type_name']; ?>
</td>
				    <td width="65"><?php if ($this->_tpl_vars['v']['status'] == 0): ?>未审<?php else: ?>已审<?php endif; ?></td>
				    <td class='editable_sort pointer' id='sort_<?php echo $this->_tpl_vars['v']['id']; ?>
' width="40"><?php echo $this->_tpl_vars['v']['sort']; ?>
</td>
				    <td width="120"><?php echo ((is_array($_tmp=$this->_tpl_vars['v']['created'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%Y-%m-%d %H:%M") : smarty_modifier_date_format($_tmp, "%Y-%m-%d %H:%M")); ?>
</td>  
				    <td width="150">
				    <a href='<?php echo $this->_plugins['function']['U'][0][0]->_U(array('url' => "ffriendlink/add?_tablename=friendlink&id=".($this->_tpl_vars['v']['id'])), $this);?>
'>修改</a> | 
				    <?php if ($this->_tpl_vars['v']['status'] == '1'): ?>
				    <a href='<?php echo $this->_plugins['function']['U'][0][0]->_U(array('url' => "ffriendlink/add?_tablename=friendlink&do=status&id=".($this->_tpl_vars['v']['id'])."&status=0"), $this);?>
'>禁用</a> | 
				    <?php else: ?>
				    <a href='<?php echo $this->_plugins['function']['U'][0][0]->_U(array('url' => "ffriendlink/add?_tablename=friendlink&do=status&id=".($this->_tpl_vars['v']['id'])."&status=1"), $this);?>
' style="color:red;">启用</a> | 
				    <?php endif; ?>
				    <a href='<?php echo $this->_plugins['function']['U'][0][0]->_U(array('url' => "ffriendlink/delete?_tablename=friendlink&id=".($this->_tpl_vars['v']['id'])), $this);?>
' onclick="return window.confirm('此操作不可恢复，你确定要删除该模块在系统的注册信息？');">删除</a></td>
				  </tr>
				  <?php endforeach; else: ?>
				  <tr>
				  	<td colspan="8" align="center"> 暂时没有数据！</td>
				  </tr>
				  <?php endif; unset($_from); ?>
			</tbody>
		</table>	
	</div>	
	<div class="pageList">
		<?php echo $this->_tpl_vars['data']['pages']; ?>

		<ul class="clearit"></ul> 
	</div>
</div>
<input type="hidden" name="m" value="ffriendlink" />
<input type="hidden" name="a" value="delete" />
</form>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "default/Public/footer.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>