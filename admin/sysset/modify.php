<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>工程案例添加页面</title>
    <link rel="stylesheet" href="./../index.css">
</head>
<body>
    <?php
        include './../fun.php';
        $id=$_GET['id'];
        $mysql = new Mysql('system');
        $result=$mysql->selectByID($id);
        $result = $result;
    ?>
    <form action="<?php echo "./update.php?id=".$id ?>"" method="POST">
        <fieldset>
            <legend>系统信息修改</legend>
            <label>
                公司名称：<input type="text" name="company" <?php
                echo "value=".$result['company']."";
                ?>>
            </label>
            <label>
                联系电话：<input type="text" name="tel" <?php
                echo "value=".$result['tel']."";
                ?>>
            </label>
            <label>
                郑经理：<input type="text" name="zhen" <?php
                echo "value=".$result['zhen']."";
                ?>>
            </label>
            <label>
                尧经理：<input type="text" name="yao" <?php
                echo "value=".$result['yao']."";
                ?>>
            </label>
            <label>
                QQ:<input type="text" name="QQ" <?php
                echo "value=".$result['QQ']."";
                ?>>
            </label>
            <label>
                邮箱:<input type="text" name="email" <?php
                echo "value=".$result['email']."";
                ?>>
            </label>
            <label>
                地址:<input type="text" name="adder" <?php
                echo "value=".$result['adder']."";
                ?>>
            </label>
            <label>
                店面:<input type="text" name="shop" <?php
                echo "value=".$result['shop']."";
                ?>>
            </label>        
            <label for="">
                <input type="submit" value="提交">
            </>
        </fieldset>
        
    </form>
</body>
</html>