<?php
header('Content-Type: text/html; charset=utf-8');
session_start();
include("../lib/conn.php");

$username = $_COOKIE['username'];
//防止注入
if (get_magic_quotes_gpc())
{
    $username = stripslashes($username);

}
$username = mysql_real_escape_string($username);

$sql = "SELECT count(*) FROM user WHERE state=1 AND username = '{$username}'";
$query = mysql_query($sql);
$row = mysql_fetch_row($query);
die($row[0]);        //这里把$row[0]的值返回了，也就是上面的xmlhttp.responseText.

?>

