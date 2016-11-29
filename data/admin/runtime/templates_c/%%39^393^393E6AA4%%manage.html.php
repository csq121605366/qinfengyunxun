<?php /* Smarty version 2.6.26, created on 2016-11-12 14:00:00
         compiled from default/Fcontent/manage.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'U', 'default/Fcontent/manage.html', 6, false),array('modifier', 'intval', 'default/Fcontent/manage.html', 150, false),array('modifier', 'date', 'default/Fcontent/manage.html', 163, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "default/Public/header.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<script language="javascript" src="<?php echo @_PUBLIC_; ?>
js/editable/jquery.editable.js"></script>
<script language="javascript">
$().ready(function (){	
	//排序
	$(".editable_sort").editable("<?php echo $this->_plugins['function']['U'][0][0]->_U(array('url' => 'fcontent/edit?ajax=sort'), $this);?>
",{
			indicator : '<img src="__ROOT__/admin/Public/images/loading2.gif" />',
      		tooltip   : "点击可快速编辑排序",
			name			: 'sort',
			id				: 'cid',
			placeholder : '不可用',
			submitdata : {"catid":'<?php echo $this->_tpl_vars['cat']['catid']; ?>
'},
			select	  : true,
			event	  : "click",
			width     : 20,
			onblur : "submit"
	});
	//标题
	$(".editable_title").editable("<?php echo $this->_plugins['function']['U'][0][0]->_U(array('url' => 'fcontent/edit?ajax=savetitle'), $this);?>
",{
			indicator : '<img src="__ROOT__/admin/Public/images/loading2.gif" />',
     		tooltip   : "点击可快速编辑标题",
			name			: 'title',
			id				: 'cid',
			placeholder : '不可用',
			submitdata : {"catid":'<?php echo $this->_tpl_vars['cat']['catid']; ?>
'},
			select	  : true,
			event	  : "click",
			onblur : "submit"
	});
	//更新时间
	$(".editable_updatetime").editable("<?php echo $this->_plugins['function']['U'][0][0]->_U(array('url' => 'fcontent/edit?ajax=updatetime'), $this);?>
",{
			indicator : '<img src="__ROOT__/admin/Public/images/loading2.gif" />',
      tooltip   : "点击可快速编辑时间",
			name			: 'updatetime',
			id				: 'cid',
			placeholder : '不可用',
			submitdata : {"catid":'<?php echo $this->_tpl_vars['cat']['catid']; ?>
'},
			select	  : true,
			event	  : "click",
			onblur : "submit"
	});
	//栏目
	//$(".editable_category").editable("<?php echo $this->_plugins['function']['U'][0][0]->_U(array('url' => 'fcontent/edit?ajax=category'), $this);?>
",{
	//		indicator : '<img src="__ROOT__/admin/Public/images/loading2.gif" />',
    //  tooltip   : "点击可快速移动到同类型其他栏目",
	//		name			: 'new_catid',
	//		id				: 'cid',
	//		type			: 'select',
    //			placeholder : '不可用',
    //			data			: '<?php echo $this->_tpl_vars['cat_json']; ?>
',
    //			submitdata : {"catid":'<?php echo $this->_tpl_vars['cat']['catid']; ?>
'},
    //			select	  : true,
    //			event	  : "click",
    //			onblur : "submit"
    //	});
	//标记为，表单提交
	$("#flagto").change(function (){
		var flagto_length = $("input[name='info[cid][]']:checked").length;
		if(flagto_length > 0 && $(this).val()!='flagto') {
			$('#action').val('edit');
			$('#do').val('status');
			$('#myform').submit();
		} else { //提示并还原下拉菜单
			if($(this).val() != 'flagto') {
				alert("未选择操作项！");
			}	
			$(this).val('flagto');
		}
	});
	//移动到，表单提交
	$("#moveto").change(function (){
		var moveto_length = $("input[name='info[cid][]']:checked").length;
		if(moveto_length > 0 && $(this).val()!='moveto') {
			if($(this).val() == '-1') {  //移动到回收站
					$('#action').val('edit');
					$('#do').val('recycle');
			} else {  //移动至其他栏目
					$('#action').val('edit');
					$('#do').val('moveto');
			}
			$('#myform').submit();
		} else { //提示并还原下拉菜单			
			if($(this).val() != 'moveto') {
				alert("未选择操作项！");
			}	
			$(this).val('moveto');
		}
	});
});
</script>
<form id="myform" name="myform" method="post" action='__APP__'  >
<div id="pageTop">
	<div class="addBtn"><a href='<?php echo $this->_plugins['function']['U'][0][0]->_U(array('url' => "fcontent/add?catid=".($this->_tpl_vars['cat']['catid'])), $this);?>
'>发布内容</a></div>
	<div class="cate">
      <a href='<?php echo $this->_plugins['function']['U'][0][0]->_U(array('url' => "fcontent/manage?catid=".($this->_tpl_vars['cat']['catid'])), $this);?>
' <?php if ($this->_tpl_vars['in']['status'] == ''): ?>class="selected"<?php endif; ?>>全部</a>|
      <a href='<?php echo $this->_plugins['function']['U'][0][0]->_U(array('url' => "fcontent/manage?status=9&catid=".($this->_tpl_vars['cat']['catid'])), $this);?>
' <?php if ($this->_tpl_vars['in']['status'] == 9): ?>class="selected"<?php endif; ?>>已审</a>|
      <a href='<?php echo $this->_plugins['function']['U'][0][0]->_U(array('url' => "fcontent/manage?status=0&catid=".($this->_tpl_vars['cat']['catid'])), $this);?>
' <?php if ($this->_tpl_vars['in']['status'] == 0 && $this->_tpl_vars['in']['status'] != ''): ?>class="selected"<?php endif; ?>>待审</a>|
      <a href='<?php echo $this->_plugins['function']['U'][0][0]->_U(array('url' => "fcontent/manage?status=-1&catid=".($this->_tpl_vars['cat']['catid'])), $this);?>
' <?php if ($this->_tpl_vars['in']['status'] == -1): ?>class="selected"<?php endif; ?>>回收站</a>
      <?php if ($this->_tpl_vars['status'] == '-1'): ?>
        <?php if (count ( $this->_tpl_vars['data']['info'] ) > 0): ?>
        |<a href='<?php echo $this->_plugins['function']['U'][0][0]->_U(array('url' => "fcontent/delete?status=-1&cid=all&catid=".($this->_tpl_vars['cat']['catid'])), $this);?>
' onClick="return window.confirm('此操作不可撤销，确定要清空回收站？');" class="green">[清空回收站]</a>
        <?php endif; ?>
      <?php endif; ?>
	</div>
	<div class="batch">
		<?php if ($this->_tpl_vars['status'] != '-1'): ?>
      <select name="dostatus" id="flagto">
        <option value="flagto">标记为...</option>
        <option value="9">已审核</option>
        <option value="0">待审核</option>
      </select>
			<select name="moveto" id="moveto">
        <option value="moveto">移动到...</option>
        <?php echo $this->_tpl_vars['category_tree']; ?>

        <option style="background:#CCC" value="-1">回收站</option>
      </select>
       <?php endif; ?>
	</div>
	<div class="search">
		<select name='field'>
          <option value='title'  >标题</option>
          <option value='username'  >用户名</option>
          <option value='user_id'  >用户ID</option>
          <option value='cid'  >ID</option>
        </select>
        <input type="text" name="q" onblur="if (value ==''){value='请输入关键字'}" onfocus="if (value =='请输入关键字'){value =''}" value="请输入关键字"/>
        <button type="submit"></button>
	</div>
</div>
<div id="pageCo">
	<div class="listForm">
		<table cellpadding="0" cellspacing="0">
			<thead>
				<tr>
					<th width="30"><input type="checkbox" name="checkAll" /></th>
					<th width="40">排序</th>
					<th width="35">ID</th>					
					<th>标题</th>										
					<th width="90">更新时间</th>
					<th width="80">发布人</th>	
					<th width="40">状态</th>	
					<th width="230">操作</th>
				</tr>
			</thead>
			<tbody>
			<?php $_from = $this->_tpl_vars['data']['info']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['v']):
?>      
		      <tr>
		        <td align="center"><input type="checkbox" rel="checkbox" name="info[cid][]" value="<?php echo $this->_tpl_vars['v']['cid']; ?>
" /></td>
		        <td class="editable_sort pointer" id="sort_<?php echo $this->_tpl_vars['v']['cid']; ?>
"><?php echo $this->_tpl_vars['v']['sort']; ?>
</td>
		        <td><?php echo ((is_array($_tmp=$this->_tpl_vars['v']['cid'])) ? $this->_run_mod_handler('intval', true, $_tmp) : intval($_tmp)); ?>
</td>
		        <td>
		        <span class="editable_title pointer" id="title_<?php echo $this->_tpl_vars['v']['cid']; ?>
"><?php echo $this->_tpl_vars['v']['title']; ?>
</span>		        
		        <?php if (in_array ( 'top' , $this->_tpl_vars['v']['attr'] )): ?>
		        [<span class="green">顶</span>] 
		        <?php endif; ?>
		        <?php if (in_array ( 'hot' , $this->_tpl_vars['v']['attr'] )): ?>
		        [<span class="red">热</span>] 
		        <?php endif; ?>
		        <?php if (! empty ( $this->_tpl_vars['v']['thumb'] )): ?>
		        [<span class="blue">图</span>]
		        <?php endif; ?>        
		        </td>
		        <td class="editable_updatetime pointer" id="time_<?php echo $this->_tpl_vars['v']['cid']; ?>
"><?php echo ((is_array($_tmp='Y-m-d')) ? $this->_run_mod_handler('date', true, $_tmp, $this->_tpl_vars['v']['update_time']) : date($_tmp, $this->_tpl_vars['v']['update_time'])); ?>
</td>
		        <td><?php echo $this->_tpl_vars['v']['username']; ?>
</td>
		        <td>
		        <?php if ($this->_tpl_vars['v']['status'] == '0'): ?>
		        <span class="red">待审</span>
		        <?php endif; ?>
		        <?php if ($this->_tpl_vars['v']['status'] == '9'): ?>
		        <span class="green">已审</span>
		        <?php endif; ?>
		        <?php if ($this->_tpl_vars['v']['status'] == '-1'): ?>
		        <span class="red">回收站</span>
		        <?php endif; ?>
		        </td>
		        <td>
		          <?php if ($this->_tpl_vars['v']['status'] == '-1'): ?>
		          <a href="<?php echo $this->_plugins['function']['U'][0][0]->_U(array('url' => "fcontent/edit?do=restore&cid=".($this->_tpl_vars['v']['cid'])."&catid=".($this->_tpl_vars['cat']['catid'])), $this);?>
" title="从回收站还原">还原</a> |
		          <a href='<?php echo $this->_plugins['function']['U'][0][0]->_U(array('url' => "fcontent/delete?cid=".($this->_tpl_vars['v']['cid'])."&catid=".($this->_tpl_vars['cat']['catid'])), $this);?>
' onClick="return window.confirm('此操作不可撤销，你确定要继续？');">彻底删除</a>
		          <?php else: ?>
		          <!--<a href="<?php echo $this->_tpl_vars['v']['url']; ?>
" title="访问" target="_blank">查看</a> | -->
                  <a href='<?php echo $this->_plugins['function']['U'][0][0]->_U(array('url' => "fcontent/edit?cid=".($this->_tpl_vars['v']['cid'])."&catid=".($this->_tpl_vars['cat']['catid'])), $this);?>
' title="更新内容">编辑</a> | 
                  <a href="<?php echo $this->_plugins['function']['U'][0][0]->_U(array('url' => "fcontent/edit?do=recycle&cid=".($this->_tpl_vars['v']['cid'])."&catid=".($this->_tpl_vars['cat']['catid'])), $this);?>
" title="移动至回收站" onClick="return window.confirm('此操作不可撤销，你确定要继续？');">删除</a> | 
                      <?php if ($this->_tpl_vars['is_comment']): ?>
                        <a href="<?php echo $this->_plugins['function']['U'][0][0]->_U(array('url' => "fcomment/manage?newsid=".($this->_tpl_vars['v']['cid'])."&flag=111"), $this);?>
" title="查看评论">评论</a> |
                      <?php endif; ?> 
                      <?php if ($this->_tpl_vars['is_cut']): ?>
                        <a href="<?php echo $this->_plugins['function']['U'][0][0]->_U(array('url' => "fplugin/photomanage?cid=".($this->_tpl_vars['v']['cid'])."&tablename=".($this->_tpl_vars['cat']['model']['tablename'])."&modelid=".($this->_tpl_vars['cat']['modelid'])), $this);?>
" title="图片裁剪">图片裁剪</a>
    		          <?php endif; ?>
                  <?php endif; ?> 
		        </td>
		      </tr>
		      <?php endforeach; else: ?>
		      <tr><td colspan="8">暂无记录！</td></tr>
		      <?php endif; unset($_from); ?>
			</tbody>
		</table>	
	</div>	
	<div class="pageList">
		<?php echo $this->_tpl_vars['data']['pages']; ?>

		<ul class="clearit"></ul> 
	</div>
</div>
<input type="hidden" name="m" id="module" value="fcontent" />
<input type="hidden" name="a" id="action" value="manage" />
<input type="hidden" name="do" id="do" value="" />
<input type="hidden" name="newsid" value="<?php echo $this->_tpl_vars['newsid']; ?>
" />
<input type="hidden" name="catid" id="catid" value="<?php echo $this->_tpl_vars['cat']['catid']; ?>
" />
</form>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "default/Public/footer.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>