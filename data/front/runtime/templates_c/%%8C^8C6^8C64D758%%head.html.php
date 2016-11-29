<?php /* Smarty version 2.6.26, created on 2016-11-29 10:21:52
         compiled from library/head.html */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

	<head lang="en">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta http-equiv="x-ua-compatible" content="IE=Edge,chrome=1">
		<title>秦风云讯</title>
		<!--引入iconfont-->
		<link rel="stylesheet" href="__PUBLIC__/css/iconfont/iconfont.css">
		<link rel="stylesheet" type="text/css" href="__PUBLIC__/css/htmleaf-demo.css">

		<link rel="stylesheet" href="__PUBLIC__/css/livedemo.css">

		<link rel="stylesheet" href="__PUBLIC__/css/all.css">

		<style>
			.prettyprint ol.linenums> li {
				list-style-type: decimal;
			}
		</style>

		<script type="text/javascript" src="__PUBLIC__/js/jquery-1.11.3.js"></script>

	</head>

	<body>
		<!--背景-->
		<div class="bjdiv"></div>

		<!--头部logo代码-->
		<div class="head">
			<div class="container">
				<div class="head-left">
					<a href="__ROOT__/">
						<img class="logo_img" src="__PUBLIC__/images/logo.png" alt="">
					</a>
					<nav class="nav">
						<ul>
							<li>
								<a href="__ROOT__/" title="首页">首页</a>
							</li>
							<li>
								<a href="#" title="综合资讯">综合资讯</a>
							</li>
							<li>
								<a href="#" title="原画">原画</a>
							</li>
							<li>
								<a href="#" title="IT">IT</a>
							</li>
							<li>
								<a href="#" title="UI网页">UI网页</a>
							</li>
							<li>
								<a href="#" title="3D">3D</a>
							</li>
						</ul>
					</nav>
				</div>
				<div class="naw">
					<div>
						<span>个人信息菜单</span>
						<i class="naw_img iconfont icon-category"></i> <?php if (! $_SESSION['fuserdata']['user_id']): ?>
						<a href="__ROOT__/register">注册</a>
						<a>|</a>
						<a class="login-btn" href="__ROOT__/login">登录</a>
						<?php else: ?>
						<a href="__ROOT__/user/logout">退出</a>
						<a>|</a>
						<a href="__ROOT__/user/home">个人中心</a>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>

		<script type="text/javascript">
			$(function() {

				$(".naw_img").click(function() {
					$(".rcblnaw").css({
						"position": "fixed",
						"top": "0px",
						"right": "0px",
						"transition": "all 0.5s"
					})
					$(".naw").hide()
				})

				$(".nawclose").click(function() {
					$(".rcblnaw").css({
						"position": "fixed",
						"top": "0px",
						"right": "-380px",
						"transition": "all 0.5s"
					})
					$(".naw").show()
				})

			})
		</script>