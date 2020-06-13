<?php
    include './../fun.php';
    $mysql = new Mysql('product');
    $mysql->delete($_GET['id']);
?>
