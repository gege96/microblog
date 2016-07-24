<?php
/**
 * Created by PhpStorm.
 * User: yang
 * Date: 2016/7/16
 * Time: 19:41
 */
header('Content-Type: text/html; charset=utf-8');
ini_set("error_reporting","E_ALL & ~E_NOTICE");

include("../config/conn.php");

$username = $_COOKIE['username'];

$sql = "UPDATE user SET state = 0 WHERE username = '{$username}'";
$query = mysqli_query($link,$sql);
$row = mysqli_fetch_row($query);

/*$stmt = $link->prepare("UPDATE user SET state = 0 WHERE username = ?");
$stmt->bind_param('s', $username);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_row();
echo "dadadad";*/
echo "<script type='text/javascript'>location='../function/blog_square.php';</script>";