<?php
    /* 数据更新 */
    include './../fun.php';
    $id = $_GET['id'];
    $time = time();
    $file = $_FILES['img'];
    $imgnewname = fileup($file);
    $_POST['img']= $imgnewname;
    $_POST['time']=$time;
    $mysql = new Mysql('cases');
    $mysql->update($id,$_POST);
?>
