<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>川穹高隔墙</title>
	<link rel="stylesheet" href="./index.css" />
</head>

<body>
	<?php
	include './fun-ahead.php';
	$mysql = new Mysql('news');
	$result = $mysql->selectAll();
	$result = array_splice($result, 0, 6);
	// dump($result);
	$content = $result[0]['content'];

	// 工程案例展示
	$sbo = selectByser('','双玻系列');
	$sbosqlsearch = $shuangbo['search'];
	$sbosql = new Mysql('cases');
	$sbores = $sbosql-> selectByPage(6,1,$sbosqlsearch);
	$sbores = $sbores['result'];

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

	<!-- 中间部分 -->
	<div id="index-main">
		<div class="top">
			<span>双玻系列</span>
			<span>活动隔墙系列</span>
			<span>门系列</span>
			<span>配件</span>
		</div>
		<div id="current">
		<div class="content-img">
			<?php
				foreach($sbores as $v) {
					$id = $v['id'];
					$path = "./admin/upload/".$v['img'];
					$str .= "<a href='caseshow.php?id=$id'>"
					."<img src=$path><span>".$v['name']."</span></a>";
				}
				echo $str;
			?>
		</div>
		<div class="more">
			<a href="#" class="more">MORE+</a>
		</div>
		</div>
		<div class="bottom clearfix">
			<div class="bottom-left ">
				<img src="./img/01.jpg" alt="" />
				<div class="mask"></div>
				<div class="news">
					<p>NEW</p>
					<li>新闻中心</li>
					<a href="news.php">MORE+</a>
				</div>
			</div>
			<div class="bottom-right">
				<a><?php echo $result[0]['name'] ?></a>
				<p class="time"><?php echo date('Y-m-d', $result[0]['time']) ?></p>
				<p class="content">

					<?php echo mb_substr($content, 0, 100) . '...' ?>
				</p>
				<table>
					<?php
						for($i=1;$i<count($result);$i++) {
							$time = date('Y-m-d',$result[$i]['time']);
							$str2 .= "<tr><td>$time</td>";
							$id = $result[$i]['id'];
							$name = $result[$i]['name'];
							$str2 .= "<td><a href='newsshow.php?id=$id'>$name</a></td></tr>";
						}
						echo $str2;
					?>
				</table>
			</div>
		</div>
	</div>

	<!-- 底部公共部分 -->
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