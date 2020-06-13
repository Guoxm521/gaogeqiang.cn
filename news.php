<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>新闻中心</title>
		<link rel="stylesheet" href="./index.css" />
	</head>
	<body>
	<?php
			include './fun-ahead.php';
			$classfiy = $_GET['classfiy'];
			$page = $_GET['page'];
			$selectByser = selectByser('',$classfiy=$classfiy);
			$search = $selectByser['search'];
			$params = $selectByser['params'];
			$mysql = new Mysql('news');
			$result = $mysql->selectByPage(9,$page,$search);
			$resultcontent = $result['result']; 
			$pages = $result['pages'];
			$beforepage = $result['beforepage'];
			$afterpage = $result['afterpage'];			
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
                    <h1>资讯中心</h1>
                    <span>news</span>
                </a>
                <ul>
                    <?php
						echo $newsList;
					?>
                </ul>
            </div>
            <div class="public-right">
                <h2 class="righttitle">
                    新闻中心
                    <span>您的位置：<a href="index.php">首页</a>><a href="javascript:;">新闻中心</a></span>
                </h2>
                <div class="newsmain">
				<?php
							foreach($resultcontent as $v) {
								$time = date("Y-m-d",$v['time']);
								$link = "./newsshow.php?id=".$v['id'];
								$str .= "<a href=".$link.">"."$v[name]"."<span>"."$time"."</span></a>";
							}
							echo $str;
				?>
                        <!-- <a href="#">隔断的使用根据使用场所来定 <span>2017-5-18</span></a> -->
                    
                </div>
                <ul id="publicpage">
					<?php
						$str = $mysql->showpages($page,$pages,$beforepage,$afterpage,$params);
						echo $str;
					?>
                </ul>
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
			hide = function (li) {
				var a = li.getElementsByTagName("ul")[0];
				a.style.display = "none";
			};
			show = function (li) {
				var a = li.getElementsByTagName("ul")[0];
				a.style.display = "block";
			};
		</script>
	</body>
</html>
