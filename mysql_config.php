<?php
    // 数据库配置
    $hostname = '127.0.0.1';
    $database = 'ahjsexam';
    $username = 'root';
    $password = 'root';
    $charset = 'utf8';
    // 连接数据库
    $con = mysql_connect($hostname, $username, $password);
    if (!$con)
        {
            die('Could not connect: ' . mysql_error());
        }
    $db_selected = mysql_select_db($database, $con);
?>