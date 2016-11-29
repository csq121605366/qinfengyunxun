<?php /* Smarty version 2.6.26, created on 2016-11-28 10:28:50
         compiled from user/myzy.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'user/myzy.html', 33, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "library/head.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<!--右侧边栏菜单-->

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "library/nav.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>



<!--内容-->
<div class="body1">

    <div class="myzy">我的资源</div>

    <div class="zhzx myzy1">

        <?php $_from = $this->_tpl_vars['ziyuan_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['zl']):
?>
        <div class="myzy2">

            <div class="myzy3">
                <div><img src="__PUBLIC__/uploads/<?php echo $this->_tpl_vars['zl']['thumb']; ?>
" alt=""></div>
            </div>
            <div class="myzy4">
                <p>
                    <span class="myzy4-3"><?php echo $this->_tpl_vars['zl']['name']; ?>
</span>
                    <span class="myzy4-2">(<?php echo $this->_tpl_vars['zl']['str']; ?>
)</span>
                </p>
                <p class="myzy4-1">
                    <span>链接:</span>
                    <a target="_blank" href="<?php echo $this->_tpl_vars['zl']['zy_url']; ?>
"><?php echo $this->_tpl_vars['zl']['zy_url']; ?>
</a>
                </p>
            </div>
            <div class="myzy5">
                <?php echo ((is_array($_tmp=$this->_tpl_vars['zl']['create_time'])) ? $this->_run_mod_handler('date_format', true, $_tmp, '%Y.%m.%d %H:%M:%S') : smarty_modifier_date_format($_tmp, '%Y.%m.%d %H:%M:%S')); ?>

            </div>

        </div>
        <?php endforeach; endif; unset($_from); ?>





    </div>


</div>






</body>


<script>
    $(function () {
        $(".naws_img").click(function(){
            $(".rcblnaw").css({
                "position": "fixed",
                "top":"0px",
                "right":"0px",
                "transition": "all 0.5s"
            })
            $(".naw").hide()
        })
        $(".nawclose").click(function(){
            $(".rcblnaw").css({
                "position": "fixed",
                "top":"0px",
                "right":"-380px",
                "transition": "all 0.5s"
            })
            $(".naw").show()
        })
    })


</script>
</html>