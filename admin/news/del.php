<?php
    include './../fun.php';
    $mysql = new Mysql('news');
    $mysql->delete($_GET['id']);
?>