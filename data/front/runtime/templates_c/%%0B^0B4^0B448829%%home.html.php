<?php /* Smarty version 2.6.26, created on 2016-11-28 10:26:45
         compiled from user/home.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'ffcategory', 'user/home.html', 21, false),)), $this); ?>


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
    <div class="grzx">
        <p class="grzx1">个人中心</p>
        <a href="__ROOT__/Fuser/myswq">
            <div class="grzx2"><p><img src="__PUBLIC__/images/gr1.png" alt=""></p><h6>我的商务圈</h6></div></a>
            <a href="__ROOT__/Fuser/myzy">
                <div class="grzx2"><p><img src="__PUBLIC__/images/gr2.png" alt=""></p><h6>我的资源</h6></div></a>
                <a href="__ROOT__/Fuser/order">
                    <div class="grzx2"><p><img src="__PUBLIC__/images/gr3.png" alt=""></p><h6>我的订单</h6></div></a>
                    <?php echo smarty_function_ffcategory(array('catid' => 1,'to' => 'cate1'), $this);?>

                    <a href="<?php echo $this->_tpl_vars['cate1']['url']; ?>
">
                        <div class="grzx2"><p><img src="__PUBLIC__/images/gr4.png" alt=""></p><h6><?php echo $this->_tpl_vars['cate1']['name']; ?>
</h6></div></a>

                    </div>
                </div>

            </body>



            <script>

                $(function($) {


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
                });



            </script>
            </html>