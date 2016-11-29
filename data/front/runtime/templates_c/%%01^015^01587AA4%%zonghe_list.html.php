<?php /* Smarty version 2.6.26, created on 2016-11-14 11:11:01
         compiled from content/zonghe_list.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'ffcategory', 'content/zonghe_list.html', 13, false),array('function', 'ffpagelist', 'content/zonghe_list.html', 17, false),array('modifier', 'mb_substr', 'content/zonghe_list.html', 26, false),array('modifier', 'date_format', 'content/zonghe_list.html', 30, false),)), $this); ?>
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


<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "library/right.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>


<!--内容-->
<div class="body1">
    <?php echo smarty_function_ffcategory(array('catid' => 1,'to' => 'cate1'), $this);?>

    <div class="myzy"><?php echo $this->_tpl_vars['cate1']['name']; ?>
</div>

    <div class="zhzxzy">
        <?php echo smarty_function_ffpagelist(array('catid' => $this->_tpl_vars['cat']['catid'],'order' => "sort asc,cid desc",'to' => 'plist'), $this);?>

        <!--第一列-->
            <ul class="zhzxzy1">
                <?php $_from = $this->_tpl_vars['plist']['info']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['foo'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['foo']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['p']):
        $this->_foreach['foo']['iteration']++;
?>
                <?php if (($this->_foreach['foo']['iteration']-1) < 2): ?>
                <li><a href="<?php echo $this->_tpl_vars['p']['url']; ?>
">
                    <img src="<?php echo $this->_tpl_vars['p']['thumb']; ?>
" alt="">
                    <div>
                        <p>
                            <?php echo ((is_array($_tmp=$this->_tpl_vars['p']['description'])) ? $this->_run_mod_handler('mb_substr', true, $_tmp, 0, 60, 'utf-8') : mb_substr($_tmp, 0, 60, 'utf-8')); ?>

                        </p>
                        <div class="zhzxzy3">
                            <img src="__PUBLIC__/images/zhzx1.png" alt="" >
                            <span><?php echo ((is_array($_tmp=$this->_tpl_vars['p']['create_time'])) ? $this->_run_mod_handler('date_format', true, $_tmp, '%Y-%m-%d %H:%M:%S') : smarty_modifier_date_format($_tmp, '%Y-%m-%d %H:%M:%S')); ?>
</span>
                            <img src="__PUBLIC__/images/zhzx2.png" alt="" class="zhzxzy4">
                            <span>2016</span>
                        </div>
                    </div>
                </a></li>
                <?php endif; ?>
                <?php endforeach; endif; unset($_from); ?>

            </ul>
        <!--第二列-->
        <ul class="zhzxzy1">
            <?php $_from = $this->_tpl_vars['plist']['info']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['foo'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['foo']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['p']):
        $this->_foreach['foo']['iteration']++;
?>
            <?php if (($this->_foreach['foo']['iteration']-1) > 1 && ($this->_foreach['foo']['iteration']-1) < 4): ?>
            <li><a href="<?php echo $this->_tpl_vars['p']['url']; ?>
">
                <img src="<?php echo $this->_tpl_vars['p']['thumb']; ?>
" alt="">
                <div>
                    <p>
                        <?php echo ((is_array($_tmp=$this->_tpl_vars['p']['description'])) ? $this->_run_mod_handler('mb_substr', true, $_tmp, 0, 60, 'utf-8') : mb_substr($_tmp, 0, 60, 'utf-8')); ?>

                    </p>
                    <div class="zhzxzy3">
                        <img src="__PUBLIC__/images/zhzx1.png" alt="" >
                        <span><?php echo ((is_array($_tmp=$this->_tpl_vars['p']['create_time'])) ? $this->_run_mod_handler('date_format', true, $_tmp, '%Y-%m-%d %H:%M:%S') : smarty_modifier_date_format($_tmp, '%Y-%m-%d %H:%M:%S')); ?>
</span>
                        <img src="__PUBLIC__/images/zhzx2.png" alt="" class="zhzxzy4">
                        <span>2016</span>
                    </div>
                </div>
            </a></li>
            <?php endif; ?>
            <?php endforeach; endif; unset($_from); ?>
        </ul>

        <!--第三列-->
        <ul class="zhzxzy1">
            <?php $_from = $this->_tpl_vars['plist']['info']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['foo'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['foo']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['p']):
        $this->_foreach['foo']['iteration']++;
?>
            <?php if (($this->_foreach['foo']['iteration']-1) > 3 && ($this->_foreach['foo']['iteration']-1) < 6): ?>
            <li><a href="<?php echo $this->_tpl_vars['p']['url']; ?>
">
                <img src="<?php echo $this->_tpl_vars['p']['thumb']; ?>
" alt="">
                <div>
                    <p>
                        <?php echo ((is_array($_tmp=$this->_tpl_vars['p']['description'])) ? $this->_run_mod_handler('mb_substr', true, $_tmp, 0, 60, 'utf-8') : mb_substr($_tmp, 0, 60, 'utf-8')); ?>

                    </p>
                    <div class="zhzxzy3">
                        <img src="__PUBLIC__/images/zhzx1.png" alt="" >
                        <span><?php echo ((is_array($_tmp=$this->_tpl_vars['p']['create_time'])) ? $this->_run_mod_handler('date_format', true, $_tmp, '%Y-%m-%d %H:%M:%S') : smarty_modifier_date_format($_tmp, '%Y-%m-%d %H:%M:%S')); ?>
</span>
                        <img src="__PUBLIC__/images/zhzx2.png" alt="" class="zhzxzy4">
                        <span>2016</span>
                    </div>
                </div>
            </a></li>
            <?php endif; ?>
            <?php endforeach; endif; unset($_from); ?>
        </ul>
        <!--第四列-->

        <ul class="zhzxzy1">
            <?php $_from = $this->_tpl_vars['plist']['info']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['foo'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['foo']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['p']):
        $this->_foreach['foo']['iteration']++;
?>
            <?php if (($this->_foreach['foo']['iteration']-1) > 5 && ($this->_foreach['foo']['iteration']-1) < 8): ?>
            <li><a href="<?php echo $this->_tpl_vars['p']['url']; ?>
">
                <img src="<?php echo $this->_tpl_vars['p']['thumb']; ?>
" alt="">
                <div>
                    <p>
                        <?php echo ((is_array($_tmp=$this->_tpl_vars['p']['description'])) ? $this->_run_mod_handler('mb_substr', true, $_tmp, 0, 60, 'utf-8') : mb_substr($_tmp, 0, 60, 'utf-8')); ?>

                    </p>
                    <div class="zhzxzy3">
                        <img src="__PUBLIC__/images/zhzx1.png" alt="" >
                        <span><?php echo ((is_array($_tmp=$this->_tpl_vars['p']['create_time'])) ? $this->_run_mod_handler('date_format', true, $_tmp, '%Y-%m-%d %H:%M:%S') : smarty_modifier_date_format($_tmp, '%Y-%m-%d %H:%M:%S')); ?>
</span>
                        <img src="__PUBLIC__/images/zhzx2.png" alt="" class="zhzxzy4">
                        <span>2016</span>
                    </div>
                </div>
            </a></li>
            <?php endif; ?>
            <?php endforeach; endif; unset($_from); ?>
        </ul>
    </div>


</div>






</body>
<script type="text/javascript" src="__PUBLIC__/js/jquery-1.11.3.js"></script>

<script src="__PUBLIC__/js/gooey.min.js"></script>

<script>

    $(function($) {
        $("#gooey-API").gooeymenu({
            bgColor: "#6b7a98",
            contentColor: "white",
            style: "circle",
            circle: {
                radius: 85
            },
            margin: "small",
            size: 70,
            bounce: true,
            bounceLength: "small",
            transitionStep: 100,
            hover: "#5dbb89",
            open: function() {
//                $(this).find(".gooey-menu-item").css("background-color", "#8394B5");
//                $(this).find(".open-button").css("background-color", "#8394B5");
                $(".navimenu .burger").show();
                $(".imgb").hide();
            },
            close: function() {
//                $(this).find(".gooey-menu-item").css("background-color", "#8394B5");
//                $(this).find(".open-button").css("background-color", "#8394B5");
                $(".imgb").show();
                $(".navimenu .burger").hide();
            }
        });

    });


    $(".nawsj").click(function(){
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

</script>
</html>