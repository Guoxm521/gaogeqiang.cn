<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>工程案例</title>
    <link rel="stylesheet" href="./../index.css">
</head>
<body>
    <?php
        include './../fun.php';
        // $mysql = new Mysql('about');
        // $result = $mysql->selectAll();
        // dump($result);
        // 搜索
        $name = isset($_GET['name'])?$_GET['name']:"";
		$arr =  selectByser($name);
        $search = $arr['search'];
        $params = $arr['params'];
        // 分页查询
        $page=$_GET['page'];
        $mysql = new Mysql('about');
        $result= $mysql->selectByPage(2,$page,$search);
        $pages = $result['pages'];//总共分多少页
        $beforepage = $result['beforepage'];
        $afterpage = $result['afterpage'];
        $result = $result['result'];
        // 分页
        $pagelist = $mysql->showpages($page,$pages,$beforepage,$afterpage,$params);
        
    ?>
    <div class="top">
        <div id="handle">
            <a href='./add.html' >添加</a>
            <a href='#' id='del'>删除</a>
        </div>
        <div id='search'>
            <form action="?">
                <input type="text" name="name" placeholder="请输入名称"><input type="submit" value="搜索">
            </form>
        </div>
    </div>
    <div id="about">
        <table border="1" cellspacing='0'> 
            <thead>
                <tr>
                    <th><input type="checkbox"></th>
                    <th>名称</th>
                    <th style="width: 784px;">内容</th>
                    <th>图片</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $str = '';
                foreach($result as $v) {
                    $str .="<tr>"."<td>"."<input type=".'"checkbox"'.'" value="'.$v['id'].'">'."</td>";
                    $str .= "<td>".$v['name']."</td>";
                    if($v['content']) {
                        $content =mb_substr($v['content'],0,200).'...';
                        $str .= "<td>".$content."</td>";
                    }else {
                        $str .= "<td style='text-align:center'>".'无'."</td>";
                    };
                    if($v['aboutimg']) {
                        $path = "./../upload/".$v['aboutimg'];
                        $str .= "<td><img src="."$path"."></td>";
                    } else {
                        $str .= "<td c>".'无'."</td>";
                    };
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
                
            </tbody>
        </table>
    </div>
    <div id="pages">
        <ul>
        <!-- 页面问题 -->
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