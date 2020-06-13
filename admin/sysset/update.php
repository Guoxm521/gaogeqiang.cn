<?php
include './../fun.php';
$time = time();
$_POST['time']=$time;
$id=$_GET['id'];
$mysql = new Mysql('system');
$mysql->update($id,$_POST);
$str = pagejump('./index.php');
echo $str;
?>