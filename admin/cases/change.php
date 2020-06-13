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
        $mysql = new Mysql('cases');
        $result = $mysql->selectByID($_GET['id']);
        $id = $_GET['id'];
        $name = $result['name'];
        $content = $result['content'];
        $classfiy = $result['classfiy'];
        $img = $result['img'];
        $time = time();
    ?>
    <form action="<?php echo "./update.php?id=".$id ?>"" method="POST" enctype="multipart/form-data">
        <fieldset>
            <legend>工程案例修改页面</legend>
            <label>
                名称：<input type="text" name="name" <?php
                echo "value='$name'";
                ?>>
            </label>
            <label for="">类别选择：
                <select name="classfiy" id="">
                    <option value="双玻系列" <?php if($classfiy == '双玻系列'){echo "checked";} ?>>双玻系列</option>
                    <option value="活动墙系列" <?php if($classfiy == '活动墙系列'){echo "checked";} ?>>活动墙系列</option>
                    <option value="门系列" <?php if($classfiy == '门系列'){echo "checked";} ?>>门系列</option>
                    <option value="配件" <?php if($classfiy == '配件'){echo "checked";} ?>>配件</option>
                </select>
            </label>
            <label>
                内容：
                <textarea name="content" id="" cols="40" rows="10"><?php
                echo $content;
                ?></textarea>
            </label>
            <label for="">
                上传图片：<input type="file" name="img">
            </label>
            <?php
                    if($img) {
                        $path = './../upload/'.$img;
                        $str .= "<img src='$path' style='width:250px'>";
                        echo $str;
                    }else {
                        echo '';
                    }
                    ?>
            <label for="">
                <input type="submit" value="提交">
            </label>
        </fieldset>
        
    </form>
</body>
</html>