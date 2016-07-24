<?php
header('Content-Type: text/html; charset=utf-8');
session_start();
include("../config/conn.php");

$username = $_COOKIE['username'];
//防止注入


$sql = "SELECT count(*) FROM user WHERE state=1 AND username = '{$username}'";
$query = mysqli_query($link,$sql);
$row = mysqli_fetch_row($query);

/*echo "lalal";
$stmt = $link->prepare("SELECT count(*) FROM user WHERE state = 1 AND username = ?");
$stmt->bind_param('s', $username);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_row();*/
die($row[0]);        //这里把$row[0]的值返回了，也就是上面的xmlhttp.responseText.



