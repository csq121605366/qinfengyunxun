<?php /* Smarty version 2.6.26, created on 2016-11-14 16:05:37
         compiled from user/fuwushang.html */ ?>
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

    <div class="fuwush"><?php echo $this->_tpl_vars['fws_info']['nickname']; ?>
</div>
    <div class="fuwush1">
        <div class="fuwush2">

            <div class="fuwush5">
                 <img src="__PUBLIC__/images/fws2.png" alt="">
                <a href="" class="dachangjing"></a>
                <a href="" class="zhanzheng"></a>
                <a href="" class="heise"></a>
                <a href="" class="rixi"></a>
            </div>
            <div class="fuwush6">
                <label>作者风格：</label>
                <p>大场景所占比例：35%</p>
                <p>日系所占比例：20%</p>
                <p>黑色所占比例：18%</p>
                <p>战争所占比例：27%</p>
            </div>

        </div>
        <div class="fuwush3">
            <a href="">与TA对话</a>
            <img src="__PUBLIC__/uploads/<?php echo $this->_tpl_vars['fws_info']['head_photo']; ?>
" alt="" class="fuwush7">
            <div class="fuwush8">
                <p>参与项目：<span><?php echo $this->_tpl_vars['fws_info']['canyuxiangmu']; ?>
</span></p>
                <p>完成项目：<span><?php echo $this->_tpl_vars['fws_info']['wanchengxiangmu']; ?>
</span></p>
                <p>服务态度：
                    <img src="__PUBLIC__/images/<?php echo $this->_tpl_vars['fws_info']['fwtd']; ?>
.png"><span><?php echo $this->_tpl_vars['fws_info']['fwtd']; ?>
</span>
                </p>
                <p>工作态度：<img src="__PUBLIC__/images/<?php echo $this->_tpl_vars['fws_info']['gztd']; ?>
.png"><span><?php echo $this->_tpl_vars['fws_info']['gztd']; ?>
</span></p>
                <p>工作效率：<img src="__PUBLIC__/images/<?php echo $this->_tpl_vars['fws_info']['gzxl']; ?>
.png"><span><?php echo $this->_tpl_vars['fws_info']['gzxl']; ?>
</span></p>
                <p>工作质量：<img src="__PUBLIC__/images/<?php echo $this->_tpl_vars['fws_info']['gzzl']; ?>
.png"><span><?php echo $this->_tpl_vars['fws_info']['gzzl']; ?>
</span></p>
                <p>所在地区：<span class="fuwush9"><?php echo $this->_tpl_vars['fws_info']['diqu']; ?>
</span></p>
                <p>服务领域：<span class="fuwush9"><?php echo $this->_tpl_vars['fws_info']['fwly']; ?>
</span></p>
            </div>
        </div>

    </div>
    <div class="fuwush4">
        <ul>
            <?php $_from = $this->_tpl_vars['pic_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['pl']):
?>
            <li>
                <div>
                    <img src="__PUBLIC__/uploads/<?php echo $this->_tpl_vars['pl']['thumb']; ?>
" alt="">
                    <p class="name"><?php echo $this->_tpl_vars['pl']['title']; ?>
</p>
                    <p class="conte"><?php echo $this->_tpl_vars['pl']['description']; ?>
</p>
                </div>
            </li>
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