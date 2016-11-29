<?php /* Smarty version 2.6.26, created on 2016-11-12 14:00:53
         compiled from default/Fmatch/match.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'mb_substr', 'default/Fmatch/match.html', 39, false),)), $this); ?>
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

    <div class="yhny">
        <div><span><?php echo $this->_tpl_vars['search']; ?>
的</span> <table>匹配结果</table></div>
        <a href="javascript:;" id="baocun">点击保存到我的资源</a>
    </div>

    <div class="yhny1">

        <div class="yhny2">
            <ul>


                <?php $_from = $this->_tpl_vars['content_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['cl']):
?>

                <li>
                    <ul class="yhny4">
                        <?php $_from = $this->_tpl_vars['cl']['many_pic']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['clmp']):
?>
                        <li>
                            <img src="__PUBLIC__/uploads/<?php echo $this->_tpl_vars['clmp']['1']; ?>
" alt="">
                        </li>
                        <?php endforeach; endif; unset($_from); ?>
                    </ul>

                    <div class="yhny5">
                        <div class="yhny6">
                            <label><?php echo $this->_tpl_vars['cl']['title']; ?>
</label>
                            <p><?php echo ((is_array($_tmp=$this->_tpl_vars['cl']['description'])) ? $this->_run_mod_handler('mb_substr', true, $_tmp, 0, 35, 'utf-8') : mb_substr($_tmp, 0, 35, 'utf-8')); ?>
.</p>
                        </div>
                        <div class="yhny7">
                            <img src="__PUBLIC__/images/yhny.png" alt="">
                        </div>
                    </div>

                </li>
            <?php endforeach; endif; unset($_from); ?>

            </ul>


        </div>

        <div class="yhny3">
            <p class="sy8-1">精确资源匹配</p>
            <a href="" class="sy8-2">点击联系客服</a>
            <p class="sy8-3">与客服交流</p>
            <p class="sy8-3">选择想要的服务</p>
        </div>



    </div>





</div>

<!--点击图片出现大图片-->
<div class="maxtp">
       <div>
           <p class="group"></p>
           <p class="name">图片名称</p>
           <div class="close"><img src="__PUBLIC__/images/cha.png" alt=""></div>
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
                $(".navimenu .burger").show();
                $(".imgb").hide();
            },
            close: function() {
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

    $(".maxtp>div>div.close").click(function(){
        $(".maxtp").hide(600)
    })


    $(".yhny4>li>img").click(function(){
        var img = $(this).attr('src');
        $(".maxtp>div>p.group").html("<img src=" + img +">")
        $(".maxtp").show(600);
    })

$("#baocun").click(function(){
    var user_id = "<?php echo $_SESSION['fuserdata']['user_id']; ?>
";
    if(!user_id){
        alert("请先登录！");
        window.location.href = "__ROOT__/login";
        return false;
    }

    var ziyuan = new Array();
    "<?php $_from = $this->_tpl_vars['content_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['cl']):
?>"
    var tt = "<?php echo $this->_tpl_vars['cl']['cid']; ?>
";
    ziyuan.push(tt);
    "<?php endforeach; endif; unset($_from); ?>"
    if(ziyuan){
        $.ajax({
            type: "POST",
            url: "__ROOT__/Fuser/baocunziyuan/",
            data: "ziyuan="+ziyuan,
            success: function(data){
                if(data==1){
                    alert("保存成功！");
                    window.location.href = "__ROOT__/Fuser/myzy";
                }
            }
        })
    }
});
</script>
</html>