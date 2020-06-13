<?php
    // 数据添加
    include './../fun.php';
    $time = time();//更新时间
    $file=$_FILES['img'];
    $newname = fileup($file);
    $_POST['img'] = $newname;
    $_POST['time'] = $time;
    $_POST['browse']=1823;

    // 实例化对象
    $mysql = new Mysql('product');
    $mysql->insert($_POST);
    $pagejump =pagejump('./index.php');
    echo $pagejump;
?>
