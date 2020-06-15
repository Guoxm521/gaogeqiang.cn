<?php
    include './../fun.php';
    session_start();
    session_destroy();
    echo "<script>alert('安全退出');parent.location.href = '/admin/login.html';</script>";
?>