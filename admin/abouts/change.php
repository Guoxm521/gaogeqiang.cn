<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>关于我们添加页面</title>
    <link rel="stylesheet" href="./../index.css">
</head>
<body>
    <?php
        include './../fun.php';
        $mysql = new Mysql('about');
        $result = $mysql->selectByID($_GET['id']);
        $id=$result['id'];
        $name = $result['name'];
        $oldimg = $result['aboutimg'];
        $content = $result['content'];

    ?>
    <form action="<?php echo "./update.php?id=$id" ?>" method="POST" enctype="multipart/form-data">
        <fieldset>
            <legend>关于我们修改页面</legend>
            <label>
                名称：<input type="text" name="name" <?php
                echo "value='$name'";
                ?>>
                <input type="hidden" name='id' <?php
                echo "value='$id'"; ?>>
            </label>
            <label for="">
                上传图片：<input type="file" name="aboutimg" >
                <!-- <input type="hidden" name="oldpic" <?php echo "value='$oldimg'" ?>> -->
            </label>
            <?php
                    if($oldimg) {
                        $path = './../upload/'.$oldimg;
                        $str .= "<img src='$path' style='width:250px'>";
                        echo $str;
                    }else {
                        echo '';
                    }
                    ?>
            <label>
                内容：
                <textarea name="content" id="" cols="40" rows="13" ><?php
                echo "$content"
                ?></textarea>
            </label>
            <label for="">
                <input type="submit" value="修改">
            </label>
        </fieldset>
    </form>
</body>
</html>