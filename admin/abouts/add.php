<?php
    // 引入函数
    include "./../fun.php";
    dump($_FILES['aboutimg']);
    $file=$_FILES['aboutimg'];
    $newname = fileup($file);
    $_POST['aboutimg']=$newname;
    $_POST['time']=time();

    // 实例化对象
    $mysql = new Mysql('about');
    $mysql->insert($_POST);
    $pagejump = pagejump('./index.php');
    echo $pagejump;
?>