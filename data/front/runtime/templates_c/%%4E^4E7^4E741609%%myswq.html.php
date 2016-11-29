<?php /* Smarty version 2.6.26, created on 2016-11-28 10:27:12
         compiled from user/myswq.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'ffcategory', 'user/myswq.html', 17, false),array('modifier', 'date_format', 'user/myswq.html', 76, false),)), $this); ?>
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

    <div class="myzy">我的商务圈</div>

    <div class="zhzx mydd">

        <div class="myswq4">
            <?php echo smarty_function_ffcategory(array('catid' => 1,'to' => 'cate1'), $this);?>

            <a href="<?php echo $this->_tpl_vars['cate1']['url']; ?>
">
                <img src="__PUBLIC__/images/myswq1.png" alt="">
                <span><?php echo $this->_tpl_vars['cate1']['name']; ?>
</span>
            </a>
            <?php echo smarty_function_ffcategory(array('catid' => 3,'to' => 'cate3'), $this);?>

            <div onclick="window.location.href='<?php echo $this->_tpl_vars['cate3']['url']; ?>
'">
                <img src="__PUBLIC__/images/myswq2.png" alt="">
                <span><?php echo $this->_tpl_vars['cate3']['name']; ?>
</span>
                <img src="__PUBLIC__/images/mydd1.png" alt="" class="dd1">
                <ul>
                </ul>

            </div>
            <?php echo smarty_function_ffcategory(array('catid' => 5,'to' => 'cate5'), $this);?>

            <div onclick="window.location.href='<?php echo $this->_tpl_vars['cate5']['url']; ?>
'">
                <img src="__PUBLIC__/images/myswq3.png" alt="">
                <span><?php echo $this->_tpl_vars['cate5']['name']; ?>
</span>
                <img src="__PUBLIC__/images/mydd1.png" alt="" class="dd1">
                <ul>
                </ul>
            </div>
            <?php echo smarty_function_ffcategory(array('catid' => 4,'to' => 'cate4'), $this);?>

            <div onclick="window.location.href='<?php echo $this->_tpl_vars['cate4']['url']; ?>
'">
                <img src="__PUBLIC__/images/myswq4.png" alt="">
                <span><?php echo $this->_tpl_vars['cate4']['name']; ?>
</span>
                <img src="__PUBLIC__/images/mydd1.png" alt="" class="dd1">
                <ul>
                </ul>
            </div>
            <?php echo smarty_function_ffcategory(array('catid' => 2,'to' => 'cate2'), $this);?>

            <div  onclick="window.location.href='<?php echo $this->_tpl_vars['cate2']['url']; ?>
'">
                <img src="__PUBLIC__/images/myswq5.png" alt="">
                <span><?php echo $this->_tpl_vars['cate2']['name']; ?>
</span>
                <img src="__PUBLIC__/images/mydd1.png" alt="" class="dd1">
                <ul>
                </ul>
            </div>


        </div>
        <div class="myswq5">

            <?php $_from = $this->_tpl_vars['fws_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['fl']):
?>
            <div class="mydd3" onclick="window.location.href='__ROOT__/Fuser/fuwushang?fws_id=<?php echo $this->_tpl_vars['fl']['user_id']; ?>
'">
                <ul>
                    <li class="mydd4 myswq1"><div><img src="__PUBLIC__/uploads/<?php echo $this->_tpl_vars['fl']['head_photo']; ?>
" alt=""></div> </li>

                    <li class="mydd5 myswq2">
                        <h6><?php echo $this->_tpl_vars['fl']['nickname']; ?>
</h6>
                        <p>最新：xxxxxxxxxxxxxxxxx</p>
                        <p>--：-------------------</p>
                        <p>--：-------------------</p>
                        <p>--：-------------------</p>

                    </li>

                    <li class="mydd6 myswq3">
                        <div>
                            <span><?php echo ((is_array($_tmp=$this->_tpl_vars['fl']['create_time'])) ? $this->_run_mod_handler('date_format', true, $_tmp, '%Y.%m.%d %H:%M:%S') : smarty_modifier_date_format($_tmp, '%Y.%m.%d %H:%M:%S')); ?>
</span>
                            <img src="__PUBLIC__/images/mydd2.png" alt="">
                        </div>
                     </li>
                </ul>
            </div>
            <?php endforeach; endif; unset($_from); ?>

        </div>


    </div>


</div>






</body>
<script type="text/javascript" src="__PUBLIC__/js/jquery-1.11.3.js"></script>
<script>

    $(".myswq4>div").click(function(){
        var index= $(".myswq4>div").index(this);

        for(var i=$(".myswq4>div>ul").length-1;i>-1;i--) {
            $(".myswq4>div>ul").eq(i).hide();
            $(".myswq4>div").eq(i).css("background","none");
            $(".myswq4>div>img.dd1").eq(i).hide();
        }

        $(".myswq4>div>ul").eq(index).show();
        $(".myswq4>div>img.dd1").eq(index).show();
        $(this).css("background","#D6DFEE");

    })




    $(".mydd1>ul>li").click(function () {
        for(var i=$(".mydd1>ul>li").length-1;i>-1;i--) {
            $(".mydd1>ul>li").eq(i).removeClass("hovedd");
        }
        $(this).addClass("hovedd");
    })

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
</script>

</html>