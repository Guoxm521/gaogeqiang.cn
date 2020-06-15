<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>Document</title>
		<link rel="stylesheet" href="./../index.css" />
	</head>
	<body>
		<?php
			include './../fun.php';
			islogin();
			// 搜索
			$name = isset($_GET['name'])?$_GET['name']:"";
			$classfiy = isset($_GET['classfiy'])?$_GET['classfiy']:"";
			$arr =  selectByser($name,$classfiy);
			$search = $arr['search'];
			$params = $arr['params'];
			// 分页查询
			$page = $_GET['page'];
			$mysql = new Mysql('cases');
			$result = $mysql->selectByPage(3,$page,$search);
			$pages = $result['pages'];//总共分多少页
			// echo $pages;
        	$beforepage = $result['beforepage'];
        	$afterpage = $result['afterpage'];
        	$result = $result['result'];
        	// 分页
        	$pagelist = $mysql->showpages($page,$pages,$beforepage,$afterpage,$params);
		?>
		<div class="top">
			<div id="handle">
				<a href="./add.html">添加</a>
				<a href="#" id="del">删除</a>
			</div>
			<div id="search">
				<form action="?">
                    <input type="text" name="name" placeholder="请输入名称"/>
                    <select name="classfiy" id="">
                        <option value="">请选择</option>
                        <option value="双玻系列">双玻系列</option>
                        <option value="活动墙系列">活动墙系列</option>
                        <option value="门系列">门系列</option>
                        <option value="配件">配件</option>
                    </select>

					<input type="submit" value="搜索" />
				</form>
			</div>
		</div>
		<div id="project">
			<table border="1" cellspacing="0">
				<thead>
					<tr>
						<th><input type="checkbox" /></th>
						<th>名称</th>
						<th>类别</th>
						<th style="width: 500px;">内容</th>
						<th>小图</th>
						<th>浏览次数</th>
						<th>发布时间</th>
						<th>操作</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$str ='';
						foreach($result as $v) {
							$str .="<tr>"."<td>"."<input type=".'"checkbox"'.'" value="'.$v['id'].'">'."</td>";
							$str .= "<td>".$v['name']."</td>";
							$str .= "<td>".$v['classfiy']."</td>";
							$content =mb_substr($v['content'],0,200).'...';
							$str .= "<td>".$content."</td>";
							if($v['img']) {
								$path = "./../upload/".$v['img'];
								$str .= "<td><img src="."$path"."></td>";
							} else {
								$str .= "<td>".'无'."</td>";
							};
							$str .= "<td>".$v['browse']."</td>";
							$time = $v['time'];
							$time = date('Y-m-d h:i:s',$time);
							$str .= "<td>".$time."</td>";
							$str .="<td><a href="."./change.php?id="."$v[id]".">编辑</a></td></tr>";
						}
						if($str) {
							echo $str;
						} else {
							$str .="<tr><td colspan=";
							$str .="'8' id=";
							$str .='nodate>';
							$str .= '无搜索结果'."</td></tr>";
							echo $str;
						}
					?>
					<!-- <tr>
						<th><input type="checkbox" /></th>
						<td>九江玻璃隔断</td>
						<td>双玻系列</td>
						<td class="content">
							南昌川穹家具有限公司是一家集隔断,活动隔断，高隔间,活动屏风,玻璃隔断的产品研发,设计,销售一体的综合....
						</td>
						<td><img src="../2.jpeg" alt="" /></td>
						<td>2589</td>
						<td>2019-12-03 12:02:32</td>
						<td>编辑</td>
					</tr> -->
					
				</tbody>
			</table>
		</div>
		<div id="pages">
			<ul>
				<?php
					echo $pagelist;
				?>
			</ul>
		</div>
		<?php
			checkbox();
		?>
	</body>
</html>
