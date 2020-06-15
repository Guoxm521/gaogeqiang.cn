<?php
    // 用户注册
    include './../fun.php';
    $username = $_POST['username'];
    $password = $_POST['password'];
    if (!$username || !$password) {
        echo "<script>alert('请输入用户名或者用户信息');history.back();</script>";
    }
    $password = getEncypt($password);
    $mysql = new   Mysql('login');
    $arr = ['username'=>$username,'password'=>$password];
    $mysql->insert($arr);
    $str = pagejump('./../login.html');
    echo $str;
?>
