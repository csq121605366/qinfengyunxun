<?php /* Smarty version 2.6.26, created on 2016-11-14 13:32:37
         compiled from default/Fziyuan/edit_ziyuanshuxing.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'U', 'default/Fziyuan/edit_ziyuanshuxing.html', 1, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "default/Public/header.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><div id="pageTop">	<div class="tabs">		<ul>			<li><a href="<?php echo $this->_plugins['function']['U'][0][0]->_U(array('url' => 'fziyuan/ziyuanshuxing'), $this);?>
">资源属性管理</a></li>			<li><a href="javascript:;" class="selected" rel="tabsContent1">编辑资源属性</a></li>		</ul>	</div></div><form action="<?php echo $this->_plugins['function']['U'][0][0]->_U(array('url' => 'fziyuan/edit_ziyuanshuxing?dosubmit=1'), $this);?>
" method="post" name="myform">	<div id="pageCo">		<div class="manageForm">			<table class="tabcontent" cellspacing="0" cellpadding="0">				<tr>					<th width="150">所属属性</th>					<td>						<select name="info[sid]">							<?php $_from = $this->_tpl_vars['shuxing_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['sl']):
?>							<option <?php if ($this->_tpl_vars['sl']['id'] == $this->_tpl_vars['shuxingziyuan_info']['sid']): ?>selected<?php endif; ?> value ="<?php echo $this->_tpl_vars['sl']['id']; ?>
"><?php echo $this->_tpl_vars['sl']['shuxing_name']; ?>
</option>							<?php endforeach; endif; unset($_from); ?>						</select>					</td>				</tr>				<tr>					<th width="150">资源属性名称</th>					<td><input name="info[zs_name]" type="text" class="input required" value="<?php echo $this->_tpl_vars['shuxingziyuan_info']['zs_name']; ?>
" size="40" /></td>				</tr>				<tr>					<th width="150">排序</th>					<td><input name="info[sort]" type="text" class="input required" value="<?php echo $this->_tpl_vars['shuxingziyuan_info']['sort']; ?>
" size="40" /></td>				</tr>				<tfoot>				<tr>					<th></th>					<td>						<input type="hidden" name="id" value="<?php echo $this->_tpl_vars['zs_id']; ?>
">						<label class="btn"><input type="submit" class="submit" value="提交保存 "/></label>						<label class="btn"><input type="reset" class="submit" value="重 置 "/></label></td>				</tr>				</tfoot>			</table>		</div>	</div></form><style>	html, body {height:100%; overflow:auto;}</style><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "default/Public/footer.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>