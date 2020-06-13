<?php
    include './../fun.php';
    $mysql = new Mysql('about');
    $mysql->delete($_GET['id']);
?>
