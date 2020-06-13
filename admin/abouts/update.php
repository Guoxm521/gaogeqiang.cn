<?php
    /* 数据更新 */
    include './../fun.php';
    $id = $_POST['id'];
    $file = $_FILES['aboutimg'];
    $newimgname = fileup($file);
    $_POST['aboutimg'] = $newimgname;
    $time = time();
    $_POST['time']=$time;
    $mysql = new Mysql('about');
    $mysql->update($id,$_POST);
?>
