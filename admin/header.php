<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        * {
            margin: 0;
            padding: 0;
        }
        ul {
            height: 100px;
            width: 1200px;
            line-height: 100px;
            margin: 0 auto;
        }
        li {
            display: inline-block;
            list-style: none;
            margin: 0 10px;
        }
        a {
            text-decoration: none;
            font-size: 24px;
        }
        
        #logout {
            float: right;
        }
    </style>
</head>
<body>
    <?php
        include './fun.php';
        islogin();
    ?>
    <ul class="header" >
        <li><a href="./abouts/index.php" target="admin">关于我们</a></li>
        <li><a href="./cases/index.php" target="admin">工程案例</a></li>
        <li><a href="./product/" target="admin">产品案例</a></li>
        <li><a href="./news/index.php" target="admin">新闻中心</a></li>
        <li><a href="./feedback/index.html" target="admin">留言表</a></li>
        <li><a href="./sysset/index.php" target="admin">系统信息设置</a></li>
        <div id="logout"><span>管理员</span>,<a href="./login/exit.php"  style="font-size: 16px;">退出</a></div>
    </ul>
    
</body>
</html>