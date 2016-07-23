<?php
/**
 * Created by PhpStorm.
 * User: yang
 * Date: 2016/7/16
 * Time: 19:41
 */
header('Content-Type: text/html; charset=utf-8');
ini_set("error_reporting","E_ALL & ~E_NOTICE");

include("../lib/conn.php");

$username = $_COOKIE['username'];

//防止注入
if (get_magic_quotes_gpc())
{
    $username = stripslashes($username);
}
$username = mysql_real_escape_string($username);
$sql = "UPDATE user SET state = 0 WHERE username = '{$username}'";

$query = mysql_query($sql);
$row = mysql_fetch_row($query);
echo "<script type='text/javascript'>location='../action/default.php';</script>";