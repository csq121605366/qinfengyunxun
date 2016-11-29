<?php /* Smarty version 2.6.26, created on 2016-11-14 13:32:13
         compiled from default/Fcategory/edit_normal_type.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'U', 'default/Fcategory/edit_normal_type.html', 14, false),array('modifier', 'intval', 'default/Fcategory/edit_normal_type.html', 18, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "default/Public/header.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<script language="javascript">
    $().ready(function () {
        var container = $('#messageContainer');
        $("#myForm").validate({
            errorContainer: container,
            errorLabelContainer: $("ol", container),
            wrapper: 'li'
        });
    });

    function getcategory(parentid) {
        $.ajax({
            url: '<?php echo $this->_plugins['function']['U'][0][0]->_U(array('url' => "fcategory/edit?ajax=getcategory"), $this);?>
',
            cache: false,
            success: function (html) {
                $('#category_select').html(html);
                $('#category_select option[value=<?php echo ((is_array($_tmp=$this->_tpl_vars['parent_data']['catid'])) ? $this->_run_mod_handler('intval', true, $_tmp) : intval($_tmp)); ?>
]').attr('selected',true);
            }
        });
    }
</script>
<script language="javascript" src="<?php echo @_PUBLIC_; ?>
js/insert/jquery.caretInsert.min.js"></script>
<div id="pageTop">
    <div class="tabs"> 
        <ul>
            <li><a href="#" class="selected" rel="tabsContent1">基本信息</a></li>
            <!--<li><a href="#" rel="tabsContent2">高级信息</a></li>-->
            <!--<?php echo $this->_tpl_vars['otherHtml']['head']; ?>
-->
        </ul>		
    </div>
</div>
<form name="myform" id="myForm" method="post" action="<?php echo $this->_plugins['function']['U'][0][0]->_U(array('url' => 'fcategory/edit?type=normal&dosubmit=1'), $this);?>
" enctype="multipart/form-data" class="validate">
    <div id="pageCo">
        <div class="manageForm">
            <div id="messageContainer" style="display:none;">
                <ol></ol>
            </div>
            <table cellpadding="0" cellspacing="0" class="tabcontent" id="tabsContent1">
                <tbody>
                    <tr>
                        <th width="150">上级栏目</th>
                        <td>
                            <span id="category_select"><?php if (empty ( $this->_tpl_vars['parent_data']['name'] )): ?> 无 <a href="javascript:;" onclick="getcategory();">重选</a><?php else: ?> <?php echo $this->_tpl_vars['parent_data']['name']; ?>
 <a href="javascript:;" onclick="getcategory();">重选</a><?php endif; ?></span>
                            <input type="hidden" name="info[parentid]" id="parentid" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['parent_data']['catid'])) ? $this->_run_mod_handler('intval', true, $_tmp) : intval($_tmp)); ?>
" />
                        </td>
                    </tr>
                    <tr>
                        <th>绑定模型<span>栏目的内部类型</span></th>
                        <td><input type="hidden" name="info[modelid]" value="<?php echo $this->_tpl_vars['model_data']['modelid']; ?>
" />
                            <?php echo $this->_tpl_vars['model_data']['name']; ?>
</td>
                    </tr>
                    <tr>
                        <th>栏目名称<span>栏目显示的名称</span></th>
                        <td><input name='info[name]' type='text' id='name' size="40"  maxlength='50' class="required input"  value="<?php echo $this->_tpl_vars['data']['name']; ?>
" title="请填写栏目显示的名称"/></td>
                    </tr>
                    <!--<tr>-->
                        <!--<th width='150'>栏目别名<span>填写栏目显示的别名</span></th>-->
                        <!--<td><input name='info[ename]' type='text' id='ename' maxlength='50' size="40" class="input" value="<?php echo $this->_tpl_vars['data']['ename']; ?>
" /></td>-->
                    <!--</tr>                    -->
                    <tr>
                        <th>栏目目录<span>栏目所在的目录</span></th>
                        <td><input name='info[catdir]' type='text' id='catdir' size="40" maxlength='50' value="<?php echo $this->_tpl_vars['data']['catdir']; ?>
" title="[栏目目录]不能以&quot;f&quot;开头，不能重复，只能包含英文半角字母、数字、下划线以及减号" class="required input" remote='<?php echo $this->_plugins['function']['U'][0][0]->_U(array('url' => "fcategory/add?ajax=checkdir&info[parentid]=".($this->_tpl_vars['parent_data']['parentid'])."&info[catid]=".($this->_tpl_vars['data']['catid'])), $this);?>
' readonly/>
                        </td>
                    </tr>
                    <!--<tr>-->
                        <!--<th>栏目图片<span>栏目链接图片</span></th>-->
                        <!--<td>-->
                            <!--<div id="thumb_span"> -->
                                <!--<?php if (! empty ( $this->_tpl_vars['data']['thumb'] )): ?>-->
                                <!--<img src="__PUBLIC__/uploads/<?php echo $this->_tpl_vars['data']['thumb']; ?>
" id="category_thumb" title="点击删除" style="cursor:pointer" width="100" />-->
                                <!--<?php endif; ?>-->
                            <!--</div>-->
                            <!--<script language="javascript">-->
                                <!--$().ready(function () {-->
                                    <!--$("#category_thumb").click(function () {-->
                                        <!--$.ajax({-->
                                            <!--url: '<?php echo $this->_plugins['function']['U'][0][0]->_U(array('url' => "fcategory/add?ajax=delete_thumb&catid=".($this->_tpl_vars['data']['catid'])), $this);?>
',-->
                                            <!--cache: false,-->
                                            <!--type: 'get',-->
                                            <!--success: function (msg) {-->
                                                <!--if (msg == 'true') {-->
                                                    <!--$("#category_thumb").remove();-->
                                                <!--}-->
                                                <!--$("#working_gif").remove();-->
                                            <!--},-->
                                            <!--beforeSend: function () {-->
                                                <!--$("#category_thumb").after('<img src="<?php echo @_PUBLIC_; ?>
images/working.gif" id="working_gif" />');-->
                                            <!--},-->
                                            <!--error: function (XMLHttpRequest, textStatus, errorThrown) {-->
                                                <!--alert(textStatus);-->
                                                <!--$("#working_gif").remove();-->
                                            <!--}-->
                                        <!--});-->
                                    <!--});-->
                                <!--});-->
                            <!--</script>-->
                            <!--<input name="thumb_img" type="file" class="file" size="40" />-->
                            <!--<input name="info[thumb]" type="hidden" value="<?php echo $this->_tpl_vars['data']['thumb']; ?>
" /></td>-->
                    <!--</tr>-->
                    <tr>
                        <th>栏目介绍<span>栏目的简要介绍</span></th>
                        <td><textarea name='info[description]' id='description'  class="textarea"  cols="50" rows="3" ><?php echo $this->_tpl_vars['data']['description']; ?>
</textarea></td>
                    </tr>
                    <tr>
                        <th>是否锁定<span>锁定可防止误删</span></th>
                        <td>
                            <input name='info[islock]' type='radio' value="1" <?php if ($this->_tpl_vars['data']['islock'] > 0): ?>checked="checked"<?php endif; ?> /> 是
                            <input name='info[islock]' type='radio' value="0" <?php if ($this->_tpl_vars['data']['islock'] == 0): ?>checked="checked"<?php endif; ?> /> 否
                        </td>
                    </tr>
                </tbody>
            </table>
            <table cellpadding="0" cellspacing="0" class="tabcontent" id="tabsContent2" style="display:none">			
                <tbody>
                    <?php if ($this->_tpl_vars['model_data']['module']['ishtml'] > 0): ?>
                    <!--非静态模型不能绑定二级域名-->
                    <tr title=" 包括： &quot;http://&quot;前缀，如果父目录已经绑定了，并且本栏目与父栏目在同一个域名下，则不需要填写！">
                        <th width="150">链接地址
                            <span>除非需要绑定二级域名，否则此处不需要填写。</span></th>
                        <td><input name='info[url]' type='text' id='domain' value='<?php echo $this->_tpl_vars['data']['url']; ?>
' maxlength='60' size="40" class="input"/>
                            例如：http://www.b.com </td>
                    </tr>
                    <?php else: ?>
                    <tr style="display:none;">
                        <th width="150">&nbsp;</th>
                        <td><input name='info[url]' type='hidden' id='domain' value='<?php echo $this->_tpl_vars['data']['url']; ?>
' maxlength='60' title=""  />
                        </td>
                    </tr>
                    <?php endif; ?>
                    <tr title="默认同栏目标题">
                        <th>Meta Title
                            <span>针对搜索引擎设置的标题</span></th>
                        <td>
                            <textarea name='info[seotitle]' type='text' id='seotitle' maxlength='60' title="META Title不能超过60个字符" class="textarea"  cols="50" rows="3" ><?php echo $this->_tpl_vars['data']['seotitle']; ?>

                            </textarea>
                            <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'default/Fcategory/normal_type_seo.html', 'smarty_include_vars' => array('inid' => 'seotitle')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></td>
                    </tr>
                    <tr title="默认同栏目名称">
                        <th>Meta Keywords
                            <span>针对搜索引擎设置的关键词</span></th>
                        <td><textarea name='info[seokeywords]' id='seokeywords'  title="META Keywords不能超过200个字符" class="textarea"  cols="50" rows="3" ><?php echo $this->_tpl_vars['data']['seokeywords']; ?>
</textarea>
                            <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'default/Fcategory/normal_type_seo.html', 'smarty_include_vars' => array('inid' => 'seokeywords')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></td>
                    </tr>
                    <tr title="">
                        <th>Meta Description
                            <span>针对搜索引擎设置的网页描述</span></th>
                        <td><textarea name='info[seodescription]' id='seodescription'  maxlength="250"  title="META Description不能超过250个字符" class="textarea"  cols="50" rows="3" ><?php echo $this->_tpl_vars['data']['seodescription']; ?>
</textarea>
                            <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'default/Fcategory/normal_type_seo.html', 'smarty_include_vars' => array('inid' => 'seodescription')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></td>
                    </tr>
                </tbody>
            </table>
            <?php echo $this->_tpl_vars['otherHtml']['body']; ?>

            <table cellpadding="0" cellspacing="0">
                <tfoot>
                    <tr>
                        <th width="150"></th>
                        <td><input name="forward" type="hidden" value="<?php echo $this->_tpl_vars['forward']; ?>
" />
                            <input name="info[catid]" type="hidden" value="<?php echo $this->_tpl_vars['data']['catid']; ?>
" />
                            <input name="info[sort]" type="hidden" value="<?php echo $this->_tpl_vars['data']['sort']; ?>
" />
                            <input name="info[type]" type="hidden" value="normal" />
                            <input name="info[ishtml]" type="hidden" value="<?php echo $this->_tpl_vars['model_data']['module']['ishtml']; ?>
" />
                            <label class="btn"><input type="submit" name="submit" value="确 定 " class="submit" /></label>
                            <label class="btn"><input type="reset" name="reset" value="重 置 " class="submit" /></label></td>
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