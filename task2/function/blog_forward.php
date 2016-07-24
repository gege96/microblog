<?php
/**
 * 实现转发功能
 * Created by PhpStorm.
 * User: yang
 * Date: 2016/7/14
 * Time: 14:50
 */
header('Content-Type: text/html; charset=utf-8');
ini_set("error_reporting","E_ALL & ~E_NOTICE");
include("../config/conn.php");
if (!empty($_GET['id'])) {

    //获取要转发的内容
    $stmt = $link->prepare('SELECT * FROM blog WHERE blog_id = ?');
    $stmt->bind_param('i', $_GET['id']);
    $stmt->execute();
    $result = $stmt->get_result();
    $rc = $result->fetch_array();

    $title = $rc['title'];
    $content = $rc['content'];
    $author_id = $_COOKIE['userid'];
    $author = $_COOKIE['username'];
    $kind = $rc['kind'];

   //插入新的一条转发blog
    $stmt = $link->prepare('INSERT INTO blog (author_id, author, title, content, createtime, hits, kind, is_delete) VALUES (?, ?, ?, ?, now(), 0, ?, 0)');
    $stmt->bind_param('issss', $author_id, $author, $title, $content, $kind);
    $stmt->execute();

    echo "<script type='text/javascript'>location='blog_square.php';</script>";
} else {
    echo "<script type='text/javascript'>alert('转发失败');location='blog_square.php';</script>";
}


