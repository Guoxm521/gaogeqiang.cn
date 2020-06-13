<?php
    include './../fun.php';
    $mysql = new Mysql('cases');
    $mysql->delete($_GET['id']);
?>
