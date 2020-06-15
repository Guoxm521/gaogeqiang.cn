<?php
    include './../fun.php';
    $username = $_POST['username'];
    $password = $_POST['password'];
    if (!$username || !$password) {
        echo "<script>alert('请输入用户名或者用户信息');history.back();</script>";
    }
    $password = getEncypt($password);
    $mysql = new Mysql('login');
    $db = $mysql->connectdb();
    $sql = "select * from login where username = '$username' and password = '$password'";
    $query = $db->query($sql);
    $row = $query->fetch();
    if($row) {
        session_start();
        $_SESSION['username']= $username;
        echo "<script>location.href='./../index.php';</script>";
    }else {
        echo "<script>alert('用户信息不能为空');history.back();</script>";
        die();
    }

?>
