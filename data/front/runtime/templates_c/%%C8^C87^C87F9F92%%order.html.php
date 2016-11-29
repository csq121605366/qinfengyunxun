<?php /* Smarty version 2.6.26, created on 2016-11-14 11:10:34
         compiled from user/order.html */ ?>
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

    <div class="myzy">我的订单</div>

    <div class="zhzx mydd">

        <div class="mydd1">
            <div>选择订单</div>
            <ul>
                <li class="hovedd">订单1 <img src="__PUBLIC__/images/mydd1.png" alt=""></li>
                <li>订单1 <img src="__PUBLIC__/images/mydd1.png" alt=""></li>
                <li>订单1 <img src="__PUBLIC__/images/mydd1.png" alt=""></li>
                <li>订单1 <img src="__PUBLIC__/images/mydd1.png" alt=""></li>
                <li>订单1 <img src="__PUBLIC__/images/mydd1.png" alt=""></li>
                <li>订单1 <img src="__PUBLIC__/images/mydd1.png" alt=""></li>
            </ul>

        </div>
        <div class="mydd2">

            <div class="mydd3">
                <ul>
                    <li class="mydd4"> <img src="__PUBLIC__/images/mydd.png" alt="">  </li>

                    <li class="mydd5">
                          <h6>订单名</h6>
                          <p>最新：上色完成，作品完成</p>
                          <p>--：-------------------</p>
                          <p>--：-------------------</p>
                          <p>--：-------------------</p>

                    </li>

                    <li class="mydd6">
                         <div>
                             <span>2016.9.6 16:00:00</span>
                             <img src="__PUBLIC__/images/mydd2.png" alt="">
                         </div>
                        <a href="" class="mydd6-1">验收收货</a>
                        <a href="" class="mydd6-2">意见修改</a>
                    </li>

                </ul>
            </div>

            <div class="mydd3">
                <ul>
                    <li class="mydd4"> <img src="__PUBLIC__/images/mydd.png" alt="">  </li>

                    <li class="mydd5">
                        <h6>订单名</h6>
                        <p>最新：上色完成，作品完成</p>
                        <p>--：-------------------</p>
                        <p>--：-------------------</p>
                        <p>--：-------------------</p>

                    </li>

                    <li class="mydd6">
                        <div>
                            <span>2016.9.6 16:00:00</span>
                            <img src="__PUBLIC__/images/mydd2.png" alt="">
                        </div>
                        <a href="" class="mydd6-1">验收收货</a>
                        <a href="" class="mydd6-2">意见修改</a>
                    </li>

                </ul>
            </div>
        </div>


     </div>


</div>






</body>
<script type="text/javascript" src="__PUBLIC__/js/jquery-1.11.3.js"></script>
<script>

    $(".mydd1>ul>li").click(function () {
        for(var i=$(".mydd1>ul>li").length-1;i>-1;i--) {
            console.log(i);
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