<!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>我的关注</title>
</head>
<body>
<hr color="#00FFFF" size="1px"/>
<a href="blog_square.php">返回主页面</a>
<h3>关注列表</h3>



<?php
/*
 * 执行收藏操作
 */

include("../config/conn.php");

if (!empty($_GET['id'])) {

    //取出博客内容
    $stmt = $link->prepare('SELECT * FROM blog WHERE blog_id = ?');
    $stmt->bind_param('s', $_GET['id']);
    $stmt->execute();
    $result = $stmt->get_result();
    $rc = $result->fetch_array();

    $whom_id = $rc['author_id'];
    $whom = $rc['author'];
    $home_id = $_COOKIE['userid'];

    $stmt = $link->prepare("INSERT INTO concern (home_id, whom_id, whom_name) VALUES (?, ?, ?)");
    $stmt->bind_param('iis', $home_id, $whom_id, $whom);
    $stmt->execute();

    $stmt = $link->prepare("SELECT * FROM concern WHERE home_id = ?");
    $stmt->bind_param('i', $home_id);
    $stmt->execute();
    $result = $stmt->get_result();


    while ($row = $result->fetch_assoc()) {

        $friends = $row['whom_name'];
        $whom_id = $row['whom_id'];
        echo "<a href='concern_blog.php?function=$whom_id'<br>$friends<br></a>";
    }
} else {
    echo "参数引入失败！";
}
?>