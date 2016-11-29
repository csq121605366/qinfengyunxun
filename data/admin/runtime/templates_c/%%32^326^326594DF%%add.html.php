<?php /* Smarty version 2.6.26, created on 2016-11-29 10:50:19
         compiled from default/Ffriendlink/add.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'U', 'default/Ffriendlink/add.html', 5, false),array('function', 'html_options', 'default/Ffriendlink/add.html', 26, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "default/Public/header.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<div id="pageTop">
	<div class="tabs"> 
		<ul>
			<li><a href="<?php echo $this->_plugins['function']['U'][0][0]->_U(array('url' => 'ffriendlink/manage'), $this);?>
">管理链接</a></li>
			<li><a href="javascript:void(0);" class="selected" rel="tabsContent1">添加链接</a></li>
		</ul>		
	</div>
</div>
<form name="myform" method="post" action="<?php echo $this->_plugins['function']['U'][0][0]->_U(array('url' => 'ffriendlink/add?dosubmit=1'), $this);?>
" >
<div id="pageCo">
	<div class="manageForm">
		<table cellpadding="0" cellspacing="0" class="tabcontent" id="tabsContent1">
			<tbody>
				<tr>
		            <th width="15%">链接文字</th>
		            <td><input type="text" name="info[name]" class="required input"  title="【链接文字】必填" value="<?php echo $this->_tpl_vars['data']['name']; ?>
" style="width:300px;" /></td>
		          </tr>
		          <tr>
		            <th>链接地址<span>链接示范：http://www.b.com</span></th>
		            <td><input type="text" name="info[url]" class="required url input"  title="【链接地址】必填" value="<?php echo $this->_tpl_vars['data']['url']; ?>
" style="width:300px;" /></td>
		          </tr>
		          <tr>
		            <th>所属分类<span>用于区分各栏目页友情链接</span></th>
		            <td><select name="info[type_id]">
		            	<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['type_list'],'selected' => $this->_tpl_vars['data']['type_id']), $this);?>

		            	</select></td>
		          </tr>
		          <tr>
		            <th>站点图标<span>可以直接填写图标的路径，例如：http://www.b.com/logo.gif</span></th>
		            <td><label>
		              <input type="text" title="可从本机上传或者从站内选择，或者直接写图标路劲" maxlength="255" class=" input" id="tb_input63" value="<?php echo $this->_tpl_vars['data']['logo']; ?>
" name="info[logo]" style="width:300px;">
		              </label>
		              <label>
		              <input type="button" value="上传图片" id="upload_img_63" class="dialog" title="从电脑上传图片" alt="__ROOT__/admin.php?m=fupload&a=commonUpload&_tablename=friendlink&opener_id=tb_input63&shower_id=upload_img_box&height=300&width=450">
		              </label>
		              <label>
		              <input type="button" value="站内选择" id="choose_img_63" class="dialog" title="站内图片库" alt="__ROOT__/admin.php?m=ffiles&a=images&opener_id=tb_input63&shower_id=upload_img_box&height=450&width=700">
		              </label>
		            </td>
		          </tr>
		          <?php if ($this->_tpl_vars['data']['logo']): ?>
		          <tr>
		            <td>&nbsp;</td>
		            <td id="upload_img_box"><img src="<?php echo $this->_tpl_vars['upload_dir']; ?>
<?php echo $this->_tpl_vars['data']['logo']; ?>
" width="150" height="150" /></td>
		          </tr>
		          <?php endif; ?>
		          <tr>
		            <th>定义css:style=<span>比如:color:red; font-size:12px;</span></th>
		            <td><textarea name="info[style]" style="width:300px;"><?php echo $this->_tpl_vars['data']['style']; ?>
</textarea></td>
		          </tr>
		          <tr>
		            <th>附加Title</th>
		            <td><textarea name="info[notes]" style="width:300px;"><?php echo $this->_tpl_vars['data']['notes']; ?>
</textarea></td>
		          </tr>
		          <tr>
		            <th>排序</th>
		            <td><input type="text" name="info[sort]" value="<?php if ($this->_tpl_vars['data']['sort']): ?><?php echo $this->_tpl_vars['data']['sort']; ?>
<?php else: ?>0<?php endif; ?>" size="4" /></td>
		          </tr>
		          <tr>
		            <th>审核</th>
		            <td><label>
		              <input type="radio" name="info[status]" value="0" <?php if ($this->_tpl_vars['data']['status'] != 1): ?>checked<?php endif; ?> />
		              待审</label>
		              <label>
		              <input type="radio" name="info[status]" value="1" <?php if ($this->_tpl_vars['data']['status'] == 1): ?>checked<?php endif; ?> />
		              审核</label></td>
		          </tr>
			</tbody>
			<tfoot>
				<tr>
					<th>&nbsp;</th>
		            <td><input type="hidden" name="forward" value="<?php echo $this->_plugins['function']['U'][0][0]->_U(array('url' => 'ffriendlink/manage'), $this);?>
" />
		              <input type="hidden" name="info[id]" value="<?php echo $this->_tpl_vars['data']['id']; ?>
" />
		              <input type="hidden" name="_tablename" value="friendlink" />
		              <input type="hidden" name="info[user_id]" value="<?php echo $this->_tpl_vars['userData']['user_id']; ?>
" />
		              <input type="hidden" name="info[username]" value="<?php echo $this->_tpl_vars['userData']['username']; ?>
" />
		              <label class="btn">
		              <input type="submit" name="submit" value="确 定" class="submit" />
		              </label>
		              <label class="btn">
		              <input type="reset" name="reset" value="重 置" class="submit" />
		              </label>
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