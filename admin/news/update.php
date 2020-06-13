<?php
    /* 数据更新 */
    include './../fun.php';
    $id = $_GET['id'];
    echo $id;
    $time = time();
    $_POST['time']=$time;
    $mysql = new Mysql('news');
    $mysql->update($id,$_POST);
?>