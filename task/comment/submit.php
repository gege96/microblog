<?php
session_start();
ini_set("error_reporting","E_ALL & ~E_NOTICE");
define('INCLUDE_CHECK',1);
require_once('../lib/conn.php');
require_once('function.php');

$txt=stripslashes($_POST['saytxt']);
$txt=mysql_real_escape_string(strip_tags($txt),$link); //过滤HTML标签，并转义特殊字符
if(mb_strlen($txt)<1 || mb_strlen($str)>140)
    die("0");
$time=time();
$say_id = $_COOKIE['userid'];
//echo "lalala:$say_id";
$username= $_COOKIE['username'];
//echo "$username";
$blog_id = $_SESSION['blog_id'];
//echo "hahah:$blog_id<br>";

if (get_magic_quotes_gpc())
{
    $blog_id = stripslashes($blog_id);
    $username = stripslashes($username);
}
$blog_id = mysql_real_escape_string($blog_id);
$username = mysql_real_escape_string($username);

$query=mysql_query("INSERT INTO say(blog_id,say_id,username,content,addtime)VALUES('{$blog_id}','$say_id','{$username}','$txt','$time')");
if(mysql_affected_rows($link)!=1)
    die("0");
echo formatSay($txt,$time,$username,$say_id);
?>
