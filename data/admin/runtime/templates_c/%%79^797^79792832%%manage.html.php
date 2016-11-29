<?php /* Smarty version 2.6.26, created on 2016-11-12 14:00:19
         compiled from default/Fuser/manage.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'U', 'default/Fuser/manage.html', 3, false),array('modifier', 'date', 'default/Fuser/manage.html', 51, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "default/Public/header.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<div id="pageTop">
	<!--<div class="addBtn"><a href="<?php echo $this->_plugins['function']['U'][0][0]->_U(array('url' => 'fuser/add'), $this);?>
">添加会员</a></div>-->
	<div class="cate">
		<?php $_from = $this->_tpl_vars['roles']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['v']):
?>
	    <a href="<?php echo $this->_plugins['function']['U'][0][0]->_U(array('url' => "fuser/manage?role_id=".($this->_tpl_vars['v']['role_id'])), $this);?>
" <?php if ($this->_tpl_vars['in']['role_id'] == $this->_tpl_vars['v']['role_id']): ?>class="selected"<?php endif; ?>><?php echo $this->_tpl_vars['v']['nickname']; ?>
</a>|
	    <?php endforeach; endif; unset($_from); ?>
	    <a href="<?php echo $this->_plugins['function']['U'][0][0]->_U(array('url' => 'fuser/manage'), $this);?>
" <?php if (! $this->_tpl_vars['in']['role_id']): ?>class="selected"<?php endif; ?>>所有会员</a>
	</div>
	<div class="search">
		<form action="<?php echo $this->_plugins['function']['U'][0][0]->_U(array('url' => 'fuser/manage'), $this);?>
" method="post">
			<select name="type">
		        <option value="user_id">会员ID</option>
		        <option value="username">会员名称</option>
		        <option value="rolename">角色标识</option>
		        <option value="rolenickname">角色名称</option>
		      </select>
		    <input type="text" name="q" onblur="if (value ==''){value='请输入关键字'}" onfocus="if (value =='请输入关键字'){value =''}" value="请输入关键字"/>
			<button type="submit"></button>
		</form>
	</div>
</div>

<div id="pageCo">
	<div class="listForm">
		<table cellpadding="0" cellspacing="0">
			<thead>
				<tr>
					<th width="40" title="全/反选"><input type="checkbox" name="checkAll" /></th>
				    <th width="55">会员ID</th>
				    <th width="90">会员名称</th>
				    <th width="100">所属会员模型</th>
				    <th width="90">所属角色标识</th>
				    <th width="100">所属角色名称</th>
				    <th width="150">注册时间</th>
				    <th width="150">最后登录</th>
				    <th width="50">状态</th>
				    <th width="80">管理操作</th>
				</tr>
			</thead>
			<tbody>
				<?php $_from = $this->_tpl_vars['data']['info']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['v']):
?>
				    <?php if ($this->_tpl_vars['v']['user_id'] == 1): ?> <!--超级会员信息，只有自己能修改-->
				    <tr>
				      <td>&nbsp;</td>
				      <td><?php echo $this->_tpl_vars['v']['user_id']; ?>
</td>
				      <td><?php echo $this->_tpl_vars['v']['username']; ?>
</td>
				      <td><?php echo $this->_tpl_vars['v']['modelname']; ?>
</td>
				      <td><?php echo $this->_tpl_vars['v']['rolename']; ?>
</td>
				      <td><?php echo $this->_tpl_vars['v']['rolenickname']; ?>
</td>
				      <td><?php echo ((is_array($_tmp='Y-m-d H:i:s')) ? $this->_run_mod_handler('date', true, $_tmp, $this->_tpl_vars['v']['create_time']) : date($_tmp, $this->_tpl_vars['v']['create_time'])); ?>
</td>
				      <td title="最后登录地址:<?php echo $this->_tpl_vars['v']['last_login_location']; ?>
&#13;&#10;登录IP:<?php echo $this->_tpl_vars['v']['last_login_ip']; ?>
&#13;&#10;登录次数：<?php echo $this->_tpl_vars['v']['login_count']; ?>
"><?php echo ((is_array($_tmp='Y-m-d H:i:s')) ? $this->_run_mod_handler('date', true, $_tmp, $this->_tpl_vars['v']['last_login_time']) : date($_tmp, $this->_tpl_vars['v']['last_login_time'])); ?>
&nbsp;</td>
				      <td><font color="#999999">正常</font></td>
				      <td>
				      <?php  if($_SESSION['userdata']['username'] == 'admin') {  ?>
				       <a href='<?php echo $this->_plugins['function']['U'][0][0]->_U(array('url' => "fuser/edit?user_id=".($this->_tpl_vars['v']['user_id'])), $this);?>
'>修改</a> | 
				      <?php  } else {  ?>
				       <font color="#999999">修改</font> | 
				      <?php  }  ?>
				      <font color="#999999">删除</font></td>
				    </tr>  
				    <?php else: ?><!--非超级会员会员信息-->
				    <tr>
				      <td><input type="checkbox" name="user_id[]" /></td>
				      <td><?php echo $this->_tpl_vars['v']['user_id']; ?>
</td>
				      <td><a href='<?php echo $this->_plugins['function']['U'][0][0]->_U(array('url' => "fuser/edit?user_id=".($this->_tpl_vars['v']['user_id'])), $this);?>
' title="编辑会员信息"><?php echo $this->_tpl_vars['v']['username']; ?>
</a></td>
				      <td><?php echo $this->_tpl_vars['v']['modelname']; ?>
</td>
				      <td><?php echo $this->_tpl_vars['v']['rolename']; ?>
</td>
				      <td><?php echo $this->_tpl_vars['v']['rolenickname']; ?>
</td>
				      <td><?php echo ((is_array($_tmp='Y-m-d H:i:s')) ? $this->_run_mod_handler('date', true, $_tmp, $this->_tpl_vars['v']['create_time']) : date($_tmp, $this->_tpl_vars['v']['create_time'])); ?>
</td>
				      <td title="最后登录地址:<?php echo $this->_tpl_vars['v']['last_login_location']; ?>
&#13;&#10;登录IP:<?php echo $this->_tpl_vars['v']['last_login_ip']; ?>
&#13;&#10;登录次数：<?php echo $this->_tpl_vars['v']['login_count']; ?>
"><?php echo ((is_array($_tmp='Y-m-d H:i:s')) ? $this->_run_mod_handler('date', true, $_tmp, $this->_tpl_vars['v']['last_login_time']) : date($_tmp, $this->_tpl_vars['v']['last_login_time'])); ?>
&nbsp;</td>
				      <td>
				          <?php if ($this->_tpl_vars['v']['status'] <= 0): ?>
				              <a href='<?php echo $this->_plugins['function']['U'][0][0]->_U(array('url' => "fuser/edit?do=status&status=1&user_id=".($this->_tpl_vars['v']['user_id'])), $this);?>
' style="color:#F00" title="点击解锁该会员">解锁</a>
				          <?php else: ?>
				              <a href='<?php echo $this->_plugins['function']['U'][0][0]->_U(array('url' => "fuser/edit?do=status&status=0&user_id=".($this->_tpl_vars['v']['user_id'])), $this);?>
' title="点击锁定该会员">正常</a>
				          <?php endif; ?>
				      </td>  
				      <td>
				      <a href='<?php echo $this->_plugins['function']['U'][0][0]->_U(array('url' => "fuser/edit?user_id=".($this->_tpl_vars['v']['user_id'])), $this);?>
'>修改</a> | 
				      <a href='<?php echo $this->_plugins['function']['U'][0][0]->_U(array('url' => "fuser/delete?user_id=".($this->_tpl_vars['v']['user_id'])), $this);?>
' onclick="return window.confirm('此操作不可恢复，你确定要删除该会员？');" title="删除会员，操作不可撤销">删除</a></td>
				    </tr>  
				    <?php endif; ?>
				    <?php endforeach; else: ?>
				    <tr>
				    	<td colspan="10" style="text-align:center;">没有数据！</td>
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
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "default/Public/footer.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>