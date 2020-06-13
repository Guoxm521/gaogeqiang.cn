<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>留言中心</title>
	<link rel="stylesheet" href="./index.css" />
</head>

<body>
	<?php
	include './fun-ahead.php';
	$mysql = new Mysql('feedback');
	$mysql->insert($_POST);
	if ($_POST) {
		echo "<script>alert('留言成功！谢谢')</script>";
	}
	
	?>
	<!-- 顶部 开始-->
	<header class="header-top">
		<div class="logo">
			<a href="./index.php"></a>
		</div>
		<div class="tel">
			<p>江西区域统一售后</p>
			<p>0791-88229757</p>
		</div>
	</header>
	<!-- 顶部结束 -->
	<!-- 导航栏开始 -->
	<nav>
		<div class="nav-middle">
			<li><a href="index.php">网站首页</a></li>
			<li onmouseover="show(this)" onmouseleave="hide(this)">
				<a href="aboutus.php">公司简介</a>
				<ul class="below">
					<?php
					echo $aboutusList;
					?>
				</ul>
				</>
			<li onmouseover="show(this)" onmouseleave="hide(this)">
				<a href="cases.php">工程案例</a>
				<ul class="below">
					<?php
					echo $casesList;
					?>
				</ul>
			</li>
			<li onmouseover="show(this)" onmouseleave="hide(this)">
				<a href="product.php">产品展示</a>
				<ul class="below">
					<?php
					echo $productList;
					?>
				</ul>
				</>
			<li onmouseover="show(this)" onmouseleave="hide(this)">
				<a href="news.php">资讯中心</a>
				<ul class="below">
					<?php
					echo $newsList;
					?>
				</ul>
			</li>
			<li><a href="message.php">客户留言</a></li>
			<li><a href="contact.php">联系我们</a></li>
		</div>
		<div class="slideshow">
			<ul>
				<li><img src="./img/slide01.jpg" alt="" /></li>
			</ul>
		</div>
	</nav>
	<!-- 导航栏结束 -->

	<!-- 公司简介中间部分 -->
	<div id="public-main" class="clearfix">
		<div class="public-left">
			<a href="#" class="toptitle">
				<h1>在线留言</h1>
				<span>news</span>
			</a>

		</div>
		<div class="public-right">
			<h2 class="righttitle">
				详细信息
				<span>您的位置：<a href="#">首页</a>><a href="#">详细信息</a></span>
			</h2>
			<div class="message">
				<form action="?" method="POST">
					<div class="top">
						<input type="text" placeholder="您的名字" name="name">
						<input type="text" placeholder="联系电话" name="tel">
						<input type="text" placeholder="即时QQ" name="qq">
						<input type="text" placeholder="电子邮件" name="email">
					</div>
					<div class="bottom">
						<h4>您的留言内容</h4>
						<input type="text" placeholder="留言标题" name="title">
						<textarea name="content" id="content" placeholder="留言内容"></textarea>
					</div>
					<input type="submit"  class="submit">
			</div>
			</form>
		</div>
	</div>



	<!-- 底部公共部分开始 -->
	<footer>
		<div class="footer-middle">
			<p>
				联系人：郑经理 15079070112/0791-87915020
				地址：江西省南昌市高新区紫阳大道旁艾溪湖南大道5号
			</p>
			<p>
				赣ICP备16011677号 Copyright© 南昌川穹家具有限公司 技术支持：南昌雅腾
			</p>
		</div>
	</footer>
	<!-- 底部公共部分结束 -->
	<script>
		// 下拉菜单的显示隐藏
		hide = function(li) {
			var a = li.getElementsByTagName("ul")[0];
			a.style.display = "none";
		};
		show = function(li) {
			var a = li.getElementsByTagName("ul")[0];
			a.style.display = "block";
		};
	</script>
</body>

</html>