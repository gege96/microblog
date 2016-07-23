<!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>我的关注</title>
</head>
<body>
<hr color="#00FFFF" size="1px"/>
<a href="default.php">返回主页面</a>
<h3>关注列表</h3>
<div id="main">
    <div class="demo">
        <div id="saywrap">

<?php
/**实现关注功能
 * Created by PhpStorm.
 * User: yang
 * Date: 2016/7/13
 * Time: 17:43
 */
header('Content-Type: text/html; charset=utf-8');
include("../lib/conn.php");
ini_set("error_reporting","E_ALL & ~E_NOTICE");

if(!empty($_GET['id'])){
    //防止注入
    if (get_magic_quotes_gpc())
    {
        $_GET['id'] = stripslashes($_GET['id']);
    }
    $_GET['id'] = mysql_real_escape_string($_GET['id']);

    $sql = "SELECT * FROM blog WHERE blog_id = ".$_GET['id'];
    $rc = mysql_fetch_array(mysql_query($sql));

    $whom_id = $rc['author_id'];
    $whom = $rc['author'];
    $home_id = $_COOKIE['userid'];

    //防止注入
    if (get_magic_quotes_gpc())
    {
        $whom_id = stripslashes($whom_id);
        $whom = stripslashes($whom);
        $home_id = stripslashes($home_id);
    }
    $whom_id = mysql_real_escape_string($whom_id);
    $whom = mysql_real_escape_string($whom);
    $home_id = mysql_real_escape_string($home_id);

    $concern_sql = "INSERT INTO concern VALUES(NUll, '{$home_id}','{$whom_id}','{$whom}')";
    mysql_query($concern_sql);

    //取出关注的名单
    $read_sql = "SELECT whom_name FROM concern WHERE home_id ='{$home_id}'";
    $result = mysql_query($read_sql);
    while ($row = mysql_fetch_assoc($result)) {
        $friends = $row['whom_name'];
         echo "<br>$friends";
    }
} else {
    echo "参数引入失败！";
}
?>