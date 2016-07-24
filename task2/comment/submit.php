<?php
/*
 * 实现评论
 */

session_start();
//ini_set("error_reporting","E_ALL & ~E_NOTICE");
define('INCLUDE_CHECK',1);
require_once('../config/conn.php');
require_once('function.php');

$txt = $_POST['saytxt'];

//判断字段是否为空
if(mb_strlen($txt)<1 || mb_strlen($str)>140)
    die("字段为空");

$time = time();
$say_id = $_COOKIE['userid'];
$username = $_COOKIE['username'];
$blog_id = $_SESSION['blog_id'];

//插入评论
$stmt = $link->prepare('INSERT INTO say (blog_id,say_id,username,content,addtime) VALUES (?, ?, ?, ?, ?)');
$stmt->bind_param('iisss', $blog_id, $say_id, $username, $txt, $time);
$stmt->execute();
$result = $stmt->get_result();

if (mysqli_affected_rows($link) != 1)
    die("无法连接");
echo formatSay($txt, $time, $username);


