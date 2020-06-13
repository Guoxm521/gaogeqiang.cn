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
        $mysql = new Mysql('news');
        $id = $_GET['id'];
        $result=$mysql->selectByID($_GET['id']);
        $name = $result['name'];
        $content = $result['content'];
        $classfiy = $result['classfiy'];
        $time = time();
    ?>
    <form action="<?php echo "./update.php?id=".$id?>"" method="POST">
        <fieldset>
            <legend>新闻修改页面</legend>
            <label>
                名称：<input type="text" name="name" <?php
                echo "value='$name'";
                ?>>
            </label>
            <label for="">类别选择：
                <select name="classfiy" id="">
                    <option value="行业资讯" <?php if($classfiy == '行业资讯'){echo "selected";} ?>>行业资讯</option>
                    <option value="公司新闻" <?php if($classfiy == '公司新闻'){echo "selected";} ?>>公司新闻</option>
                </select>
            </label>
            <label>
                内容：
                <textarea name="content" id="" cols="80" rows="15" style="margin-top:15px;"><?php
                echo $content;
                ?></textarea>
            </label>
            <label for="">
                <input type="submit" value="提交">
            </>
        </fieldset>
    </form>
</body>
</html>