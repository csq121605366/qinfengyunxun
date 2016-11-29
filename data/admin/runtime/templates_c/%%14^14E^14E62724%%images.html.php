<?php /* Smarty version 2.6.26, created on 2016-11-14 14:44:08
         compiled from default/Ffiles/images.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'U', 'default/Ffiles/images.html', 118, false),array('modifier', 'date', 'default/Ffiles/images.html', 132, false),)), $this); ?>
<html>
<head>
<meta http-equiv='Content-Type' content='text/html; charset=utf-8'>
<title>图片库</title>
<style>
* {
	font-size: 12px;
	line-height: 1.5;
}
body {
	font-size: 12px;
	line-height: 1.5;
}
a:link {
	font-size: 12px;
	color: #000000;
	text-decoration: underline
}
a:visited {
	font-size: 12px;
	color: #000000;
	text-decoration: underline
}
a:hover {
	font-size: 12px;
	color: red
}
div, form, h1, h2, h3, h4, h5, h6 {
	margin: 0;
	padding:0;
}
.m1 {
	border-left: 1px solid #DFDFDB;
	border-top: 1px solid #DFDFDB;
	border-bottom: 1px solid #808080
}
.m2 {
	border-left: 1px solid #DFDFDB;
	border-bottom: 1px solid #808080;
	border-top: 1px solid #DFDFDB;
	border-right: 1px solid #DFDFDB;
}
.m3 {
	border-left: 1px solid #DFDFDB;
	border-top: 1px solid #DFDFDB;
	border-right: 1px solid #DFDFDB;
}
.article {
	FONT-SIZE: 10pt;
LINE-HEIGHT: 160%；table-layout:fixed;
	word-break:break-all
}
.bn {
	color:#FFFFFF;
	font-size:0.1pt;
	line-height:50%
}
.contents {
	font-size:1pt;
	color:#F7F6F8
}
.nb {
	border: 1px solid #000000;
	height:18px
}
.coolbg {
	border-right: 2px solid #ACACAC;
	border-bottom: 2px solid #ACACAC;
	background-color: #E6E6E6
}
.ctfield {
	padding: 3px;
	line-height: 150%
}
.nndiv {
	width: 175px;
	height:20px;
	margin: 0px;
	padding: 0px;
	word-break: break-all;
	overflow: hidden;
}
.linerow {
	border-bottom: 1px solid #CBD8AC;
}
</style>
<link type="text/css" rel="stylesheet" href="<?php echo @_PUBLIC_; ?>
js/tooltip/jquery.tooltip.css" />
<script language="javascript" src="<?php echo @_PUBLIC_; ?>
js/jquery-1.4.2.min.js"></script>
<script language="javascript" src="<?php echo @_PUBLIC_; ?>
js/tooltip/jquery.tooltip.min.js"></script>
<script language="javascript">
$().ready(function (){	
	  $(".overview").tooltip({ 
		  delay: 0, 
		  showURL: false, 
		  bodyHandler: function() {
			  return $("<img width=\"150\"/>").attr("src", $(this).attr("href")); 
		  } 
	  });	
});
</script>
</head>
<body id="test">
<table width='100%' border='0' cellspacing='0' cellpadding='2'>
  <thead>
  <tr bgcolor="#CCCCCC">
    <td width="8%" align="center" class='linerow' ><strong>预览</strong></td>
    <td width="30%" align="center" class='linerow'><strong>点击名称选择图片</strong></td>
    <td width="15%" align="center" class='linerow'><strong>文件大小</strong></td>
    <td width="30%" align="center" class='linerow'><strong>最后修改时间</strong></td>
    <td align="center" class='linerow'><strong>操作</strong></td>
  </tr>
  </thead>
  <tr>
    <td class='linerow' colspan='5' bgcolor='#FFFFE8'> 点击“V”预览图片，点击图片名选择图片，显示图片后点击该图片关闭预览。 </td>
  </tr>
  <tbody>
  <tr>
    <td class='linerow' colspan='4'><a href='<?php echo $this->_plugins['function']['U'][0][0]->_U(array('url' => "ffiles/images?opener_id=".($this->_tpl_vars['data']['opener_id'])."&path=".($this->_tpl_vars['data']['parent_path'])), $this);?>
'><img src="<?php echo @_PUBLIC_; ?>
images/dir2.gif" border=0 width=16 height=16 align=absmiddle>上级目录</a></td>
    <td class='linerow' >当前目录:<?php echo $this->_tpl_vars['data']['path']; ?>
</td>
  </tr>
  <?php $_from = $this->_tpl_vars['data']['files']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['v']):
?> 
  <tr>
    <td  class='linerow' colspan='2'>
    <?php if ($this->_tpl_vars['v']['isdir']): ?>   
    <a href='<?php echo $this->_plugins['function']['U'][0][0]->_U(array('url' => "ffiles/images?opener_id=".($this->_tpl_vars['data']['opener_id'])."&shower_id=".($this->_tpl_vars['data']['shower_id'])."&path=".($this->_tpl_vars['v']['url'])), $this);?>
'><img src="<?php echo @_PUBLIC_; ?>
images/dir.gif" border=0 width=16 height=16 align=absmiddle><?php echo $this->_tpl_vars['v']['filename']; ?>
</a>
    <?php else: ?> 
   <a href="<?php echo $this->_tpl_vars['v']['fullurl']; ?>
" title="点击选择" onClick="<?php if ($this->_tpl_vars['data']['shower_id']): ?>$(window.parent.document).find('#mainFrame').contents().find('#<?php echo $this->_tpl_vars['data']['shower_id']; ?>
').html('<img src=<?php echo $this->_tpl_vars['data']['upload_dir']; ?>
<?php echo $this->_tpl_vars['v']['imageurl']; ?>
 width=150 height=150 />');<?php else: ?>$(window.parent.document).find('#mainFrame').contents().find('#<?php echo $this->_tpl_vars['data']['opener_id']; ?>
').val('<?php echo $this->_tpl_vars['data']['upload_dir']; ?>
<?php echo $this->_tpl_vars['v']['imageurl']; ?>
');<?php endif; ?>" rel="<?php echo $this->_tpl_vars['v']['imageurl']; ?>
" class="overview"><img 
   src='<?php echo @_PUBLIC_; ?>
images/picviewnone.gif' width='16' height='16' border='0'>&nbsp;&nbsp;<?php echo $this->_tpl_vars['v']['filename']; ?>
</a>
    <?php endif; ?>
    </td>
    <td align="center"  class='linerow'><?php if (! $this->_tpl_vars['v']['isdir']): ?> <?php echo $this->_tpl_vars['v']['filesize']; ?>
 <?php endif; ?>&nbsp;</td>
    <td align="center"  class='linerow'><?php if (! $this->_tpl_vars['v']['isdir']): ?> <?php echo ((is_array($_tmp=$this->_tpl_vars['v']['filemtime'])) ? $this->_run_mod_handler('date', true, $_tmp, 'Y-m-d H:i:s') : date($_tmp, 'Y-m-d H:i:s')); ?>
 <?php endif; ?>&nbsp;</td>
    <td align="center"  class='linerow'>
    <?php if (! $this->_tpl_vars['v']['isdir']): ?>
    <a href='<?php echo $this->_plugins['function']['U'][0][0]->_U(array('url' => "ffiles/images?do=cutimg&file=".($this->_tpl_vars['v']['imageurl'])), $this);?>
'>裁剪</a> | 
    <a href='<?php echo $this->_plugins['function']['U'][0][0]->_U(array('url' => "ffiles/images?do=delete&file=".($this->_tpl_vars['v']['imageurl'])."&forward=".($this->_tpl_vars['forward'])), $this);?>
' onClick="return window.confirm('此操作不可恢复，确定执行？');">删除</a>
		<?php endif; ?>
    &nbsp;
    </td>
  </tr>
  <?php endforeach; endif; unset($_from); ?>
  </tbody>
  <tfoot> 
  <tr>
    <!--<td colspan="5">&nbsp;</td>-->
  </tr>
  </tfoot>
</table>
<script>
    $(function(){
      $("a.overview").bind('click',function(){
        var link=$(this),
            main=$(window.parent.document),
            targetID='#'+'<?php echo $this->_tpl_vars['data']['opener_id']; ?>
',
            url=link.attr('rel');
            //url=(function(){
            //   var src=link.attr('href').split('/');
            //   return src[src.length-1];
            //})();
         
        main.find('#mainFrame').contents().find(targetID).val(url);
        window.parent.JqueryDialog.Close();
        main.find('#mainFrame').contents().find(targetID).focus();
        return false;
      });
    });
</script>


</body>
</html>