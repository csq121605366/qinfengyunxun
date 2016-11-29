<?php /* Smarty version 2.6.26, created on 2016-11-23 10:03:57
         compiled from library/login.html */ ?>


<link rel="stylesheet" type="text/css" href="__PUBLIC__/css/login.css">

<!--内容-->

<div class="index_login">
    <form action="" method="post" >
        <div class="content">
            <p>登录</p>
            <div class="input">
                <input class="username" type="text" >
                <span class="Validform_checktip"></span>
            </div>
            <div class="input">
                <input type="password" name="info[password]" onfocus="this.type='password'" placeholder="密码" dataType="*6-15" errormsg="密码范围在6~15位之间！" >
                <span class="Validform_checktip"></span>
            </div>
            <div class="login_btn">
                <input type="submit" value="登录">
            </div>
            <p class="link">
               <a href="__ROOT__/register">注册会员</a>
               <span>|</span>
               <a href="__ROOT__/forget">忘记密码?</a>
           </p>
       </div>
   </form>
</div>

<script type="text/javascript" src="__PUBLIC__/js/Validform.js"></script>
