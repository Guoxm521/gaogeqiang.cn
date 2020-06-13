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
            <legend>产品中心修改页面</legend>
            <label>
                名称：<input type="text" name="name" <?php
                echo "value='$name'";
                ?>>
            </label>
            <label for="">类别选择：
                <select name="classfiy" id="">
                    <option value="高隔断" <?php if($classfiy == '高隔断'){echo "checked";} ?>>高隔断</option>
                    <option value="家具" <?php if($classfiy == '家具'){echo "checked";} ?>>家具</option>
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