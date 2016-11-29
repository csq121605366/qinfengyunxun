<?php /* Smarty version 2.6.26, created on 2016-11-14 14:38:31
         compiled from content/zonghe_view.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'content/zonghe_view.html', 18, false),)), $this); ?>
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
    <div class="zhzx">

          <p class="zhzx1"><?php echo $this->_tpl_vars['data']['title']; ?>
</p>
          <div class="zhzx2">
              <img src="__PUBLIC__/images/zhzx1.png" alt="" class="zhzx3">
              <span><?php echo ((is_array($_tmp=$this->_tpl_vars['data']['create_time'])) ? $this->_run_mod_handler('date_format', true, $_tmp, '%Y-%m-%d %H:%M:%S') : smarty_modifier_date_format($_tmp, '%Y-%m-%d %H:%M:%S')); ?>
</span>
              <img src="__PUBLIC__/images/zhzx2.png" alt="" class="zhzx4">
              <span><?php echo $this->_tpl_vars['comment_info']['hits']; ?>
</span>
          </div>

        <?php echo $this->_tpl_vars['data']['content']; ?>



      </div>
      <div class="zhzx zhzx7">
          <a href="<?php echo $this->_tpl_vars['data']['pre_url']; ?>
" class="zhzx8">«  上一篇：<?php echo $this->_tpl_vars['data']['pre_title']; ?>
</a>
          <a href="<?php echo $this->_tpl_vars['data']['next_url']; ?>
" class="zhzx9">下一篇：<?php echo $this->_tpl_vars['data']['next_title']; ?>
  »</a>
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