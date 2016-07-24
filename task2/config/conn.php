<?php
/**
 * Created by PhpStorm.
 * User: yang
 * Date: 2016/7/4
 * Time: 23:13
 */

$db_host = "localhost";
$db_user = "root";
$db_pass = "YXJ+1.3";
$db_name = "study";
$timezone = "Asia/Shanghai";

$link = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
//判断是否连接成功
if (mysqli_connect_error()) {
    echo mysqli_connect_error();
}
mysqli_query($link, "SET names UTF8");
header("Content-Type: text/html; charset=utf-8");
date_default_timezone_set($timezone); //北京时间

