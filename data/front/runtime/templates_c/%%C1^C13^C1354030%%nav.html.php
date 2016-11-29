<?php /* Smarty version 2.6.26, created on 2016-11-29 10:30:25
         compiled from library/nav.html */ ?>
<div class="rcblnaw">

    <div class="naw1">
        <i class="nawclose iconfont icon-close"></i>
        <span class="naw2">个人信息菜单</span>
        <?php if (! $_SESSION['fuserdata']['user_id']): ?>
        <span class="naw3"><a href="__ROOT__/login">登录</a></span><span>|</span>
        <span class="naw4"><a href="__ROOT__/register">注册</a></span>
        <?php else: ?>
        <span class="naw3"><a href="__ROOT__/user/home">个人中心</a></span><span>|</span>
        <span class="naw4"><a href="__ROOT__/user/logout">退出</a></span>
        <?php endif; ?>
    </div>

    <div class="naw5">
        <p><a href="__ROOT__/Fuser/myswq">我的商务圈</a></p>
        <p><a href="__ROOT__/Fuser/myzy">我的资源</a></p>
        <p><a href="__ROOT__/Fuser/order">我的订单</a></p>
        <p><a href="__ROOT__/Fuser/home">个人中心</a></p>
    </div>

</div>