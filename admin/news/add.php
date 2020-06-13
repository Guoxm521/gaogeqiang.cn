<?php
    // 新闻添加页面
    include './../fun.php';
    $_POST['time']=time();
    $_POST['browser'] = 2560;
    $mysql = new Mysql('news');
    $mysql->insert($_POST);
    $str= pagejump('./index.php');
    echo $str;
?>