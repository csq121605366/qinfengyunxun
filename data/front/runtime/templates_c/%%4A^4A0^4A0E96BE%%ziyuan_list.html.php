<?php /* Smarty version 2.6.26, created on 2016-11-12 14:00:46
         compiled from content/ziyuan_list.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'ffset', 'content/ziyuan_list.html', 20, false),array('function', 'ffpagelist', 'content/ziyuan_list.html', 89, false),array('modifier', 'mb_substr', 'content/ziyuan_list.html', 104, false),)), $this); ?>
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

    <div class="zhzxzy">

        <p class="yh"><?php echo $this->_tpl_vars['cat']['name']; ?>
</p>
        <div class="yh1">
            <input type="text" placeholder="请输入关键词" class="yh2" name="q">
            <img src="__PUBLIC__/images/sshou.png" alt="" class="yh3" id="search">
        </div>
        <p class="yh4">热搜词：<?php echo smarty_function_ffset(array('var' => 'companyname'), $this);?>
</p>


        <div class="sy5">
            <div class="sy6">
                <p class="sy6-1">自我匹配</p>
                <p class="sy6-2">根据</p>
                <p class="sy6-2">关键词</p>
                <p class="sy6-2">匹配</p>
                <p class="sy6-3">点击您要搜索的关键字如：数量：1-100张，并点击搜索按钮</p>
                <a href="__ROOT__/Fmatch/index?catid=<?php echo $this->_tpl_vars['cat']['catid']; ?>
&p1=<?php echo $_GET['p1']; ?>
&p2=<?php echo $_GET['p2']; ?>
&p3=<?php echo $_GET['p3']; ?>
&p4=<?php echo $_GET['p4']; ?>
">点击搜索</a>
            </div>
            <div class="sy7">
                <ul>
                    <?php $_from = $this->_tpl_vars['shuxing_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['foo'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['foo']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['shl']):
        $this->_foreach['foo']['iteration']++;
?>
                    <?php if (($this->_foreach['foo']['iteration']-1) == 0): ?>
                    <li class="one">
                        <h6><?php echo $this->_tpl_vars['shl']['shuxing_name']; ?>
</h6>
                        <?php $_from = $this->_tpl_vars['shl']['sl']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['ss']):
?>
                        <p zid="<?php echo $this->_tpl_vars['ss']['id']; ?>
" class="<?php if ($this->_tpl_vars['ss']['id'] == $_GET['p1']): ?>xuanzhong1<?php endif; ?>"><?php echo $this->_tpl_vars['ss']['zs_name']; ?>
</p>
                        <?php endforeach; endif; unset($_from); ?>
                    </li>
                    <?php elseif (($this->_foreach['foo']['iteration']-1) == 1): ?>
                    <li class="two">
                        <h6><?php echo $this->_tpl_vars['shl']['shuxing_name']; ?>
</h6>
                        <?php $_from = $this->_tpl_vars['shl']['sl']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['ss']):
?>
                        <p zid="<?php echo $this->_tpl_vars['ss']['id']; ?>
" class="<?php if ($this->_tpl_vars['ss']['id'] == $_GET['p2']): ?>xuanzhong2<?php endif; ?>"><?php echo $this->_tpl_vars['ss']['zs_name']; ?>
</p>
                        <?php endforeach; endif; unset($_from); ?>
                    </li>
                    <?php elseif (($this->_foreach['foo']['iteration']-1) == 2): ?>
                    <li class="three">
                        <h6><?php echo $this->_tpl_vars['shl']['shuxing_name']; ?>
</h6>
                        <?php $_from = $this->_tpl_vars['shl']['sl']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['ss']):
?>
                        <p zid="<?php echo $this->_tpl_vars['ss']['id']; ?>
" class="<?php if ($this->_tpl_vars['ss']['id'] == $_GET['p3']): ?>xuanzhong3<?php endif; ?>"><?php echo $this->_tpl_vars['ss']['zs_name']; ?>
</p>
                        <?php endforeach; endif; unset($_from); ?>
                    </li>
                    <?php elseif (($this->_foreach['foo']['iteration']-1) == 3): ?>
                    <li class="four">
                        <h6><?php echo $this->_tpl_vars['shl']['shuxing_name']; ?>
</h6>
                        <?php $_from = $this->_tpl_vars['shl']['sl']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['ss']):
?>
                        <p zid="<?php echo $this->_tpl_vars['ss']['id']; ?>
" class="<?php if ($this->_tpl_vars['ss']['id'] == $_GET['p4']): ?>xuanzhong4<?php endif; ?>"><?php echo $this->_tpl_vars['ss']['zs_name']; ?>
</p>
                        <?php endforeach; endif; unset($_from); ?>
                    </li>
                    <?php endif; ?>
                    <?php endforeach; endif; unset($_from); ?>
                    <li class="sy7-1 five">
                        <h6>暂定</h6>
                        <p>...</p>
                        <p>...</p>
                        <p>...</p>
                        <p>...</p>
                        <p>...</p>
                        <p>...</p>
                        <p>...</p>
                        <p>...</p>
                        <p>...</p>
                    </li>
                </ul>
            </div>
            <div class="sy8">
                <p class="sy8-1">精确资源匹配</p>
                <a href="" class="sy8-2">点击联系客服</a>
                <p class="sy8-3">与客服交流</p>
                <p class="sy8-3">选择想要的服务</p>
            </div>

        </div>

        <div class="yhconter">
            <?php echo smarty_function_ffpagelist(array('catid' => $this->_tpl_vars['cat']['catid'],'order' => "sort asc,create_time desc",'field' => 'many_pic','to' => 'plist'), $this);?>

            <!--<?php dump($this->_tpl_vars['plist']); ?>-->
            <ul>
                <?php $_from = $this->_tpl_vars['plist']['info']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['p']):
?>
                <li>

                    <ul class="yhconter1">
                        <?php $_from = $this->_tpl_vars['p']['many_pic']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['pmp']):
?>
                        <li>
                            <img src="<?php echo $this->_tpl_vars['pmp']['image']; ?>
" alt="">
                        </li>
                        <?php endforeach; endif; unset($_from); ?>
                    </ul>

                    <p class="yhconter2"><?php echo $this->_tpl_vars['p']['title']; ?>
</p>
                    <p class="yhconter3"><?php echo ((is_array($_tmp=$this->_tpl_vars['p']['description'])) ? $this->_run_mod_handler('mb_substr', true, $_tmp, 0, 35, 'utf-8') : mb_substr($_tmp, 0, 35, 'utf-8')); ?>
</p>

                </li>
                <?php endforeach; endif; unset($_from); ?>

            </ul>

        </div>


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

    $(".sy7>ul>li.one>p").click(function(){
        for(var i=0;i<$(".sy7>ul>li.one>p").length;i++){
            $(".sy7>ul>li.one>p").eq(i).removeClass("xuanzhong1")
        }
        $(this).addClass("xuanzhong1");
        var zid = $(this).attr('zid');
        window.location.href = "<?php echo $this->_tpl_vars['url']; ?>
?p1="+zid+"&p2="+"<?php echo $_GET['p2']; ?>
"+"&p3="+"<?php echo $_GET['p3']; ?>
"+"&p4="+"<?php echo $_GET['p4']; ?>
";
       // alert(zid);
    })
    $(".sy7>ul>li.two>p").click(function(){
        for(var i=0;i<$(".sy7>ul>li.two>p").length;i++){
            $(".sy7>ul>li.two>p").eq(i).removeClass("xuanzhong2")
        }
        $(this).addClass("xuanzhong2");
        var zid = $(this).attr('zid');
        window.location.href = "<?php echo $this->_tpl_vars['url']; ?>
?p1="+"<?php echo $_GET['p1']; ?>
"+"&p2="+zid+"&p3="+"<?php echo $_GET['p3']; ?>
"+"&p4="+"<?php echo $_GET['p4']; ?>
";
    })
    $(".sy7>ul>li.three>p").click(function(){
        for(var i=0;i<$(".sy7>ul>li.three>p").length;i++){
            $(".sy7>ul>li.three>p").eq(i).removeClass("xuanzhong3")
        }
        $(this).addClass("xuanzhong3");
        var zid = $(this).attr('zid');
        window.location.href = "<?php echo $this->_tpl_vars['url']; ?>
?p1="+"<?php echo $_GET['p1']; ?>
"+"&p2="+"<?php echo $_GET['p2']; ?>
"+"&p3="+zid+"&p4="+"<?php echo $_GET['p4']; ?>
";
    })
    $(".sy7>ul>li.four>p").click(function(){
        for(var i=0;i<$(".sy7>ul>li.four>p").length;i++){
            $(".sy7>ul>li.four>p").eq(i).removeClass("xuanzhong4")
        }
        $(this).addClass("xuanzhong4");
        var zid = $(this).attr('zid');
        window.location.href = "<?php echo $this->_tpl_vars['url']; ?>
?p1="+"<?php echo $_GET['p1']; ?>
"+"&p2="+"<?php echo $_GET['p2']; ?>
"+"&p3="+"<?php echo $_GET['p3']; ?>
"+"&p4="+zid;
    })
    $(".sy7>ul>li.five>p").click(function(){
        for(var i=0;i<$(".sy7>ul>li.five>p").length;i++){
            $(".sy7>ul>li.five>p").eq(i).removeClass("xuanzhong5")
        }
        $(this).addClass("xuanzhong5")
    });

    //搜索
    $("#search").click(function(){
        var keys = $("input[name=q]").val();
       if(keys){
           window.location.href = "__ROOT__/Fmatch/index?keyword="+keys;
       }
    });

</script>
</html>