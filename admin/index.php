<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>后台管理页面</title>
</head>
<?php
    include './fun.php';
    islogin();
?>
<frameset rows="100px,*" frameborder="no">
    <frame src="./header.php" scrolling='no'>
    <frame src="./abouts/index.php" name='admin'>
</frameset>
</html>