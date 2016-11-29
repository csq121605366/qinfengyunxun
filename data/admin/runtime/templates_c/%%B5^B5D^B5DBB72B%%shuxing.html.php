<?php /* Smarty version 2.6.26, created on 2016-11-14 09:38:27
         compiled from default/Fziyuan/shuxing.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'U', 'default/Fziyuan/shuxing.html', 2, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "default/Public/header.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<form name="search" class="filter" method="POST" action="<?php echo $this->_plugins['function']['U'][0][0]->_U(array('url' => 'ffriendlink/manage'), $this);?>
" target="_self">
<div id="pageTop">
	<div class="addBtn">
	  <!--<a href="<?php echo $this->_plugins['function']['U'][0][0]->_U(array('url' => 'fziyuan/add_shuxing'), $this);?>
">添加属性</a>-->
    </div>
</div>
</form>
<form id="friendlinkForm" method="post" action="__APP__">
<div id="pageCo">
	<div class="listForm">
		<table cellpadding="0" cellspacing="0">
			<thead>
				<tr>
				    <th width="40">ID</th>
				    <th>属性名称</th>
				    <th>排序</th>
				    <th width="150">操作</th>
				</tr>
			</thead>
			<tbody> 
				<?php $_from = $this->_tpl_vars['data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['v']):
?>
				  <tr>
				    <td width="40"><?php echo $this->_tpl_vars['v']['id']; ?>
</td>
				    <td><a href="javascript:;"><?php echo $this->_tpl_vars['v']['shuxing_name']; ?>
</a></td>
				    <td><a href="javascript:;"><?php echo $this->_tpl_vars['v']['sort']; ?>
</a></td>
				    <td width="150">
				    <a href='<?php echo $this->_plugins['function']['U'][0][0]->_U(array('url' => "fziyuan/edit_shuxing?id=".($this->_tpl_vars['v']['id'])), $this);?>
`"}}'>修改</a>
						<!--|<a href='<?php echo $this->_plugins['function']['U'][0][0]->_U(array('url' => "fziyuan/delete_shuxing?id=".($this->_tpl_vars['v']['id'])), $this);?>
' onclick="return window.confirm('此操作不可恢复，你确定要删除该信息？');">删除</a>-->
					</td>
				  </tr>
				  <?php endforeach; else: ?>
				  <tr>
				  	<td colspan="8" align="center"> 暂时没有数据！</td>
				  </tr>
				  <?php endif; unset($_from); ?>
			</tbody>
		</table>	
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