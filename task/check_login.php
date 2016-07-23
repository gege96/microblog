<?php
header('Content-Type: text/html; charset=utf-8');
ini_set("error_reporting", "E_ALL & ~E_NOTICE");
if (!isset($_POST['username'])) {
    exit('非法访问!');
}
/**
 * Created by PhpStorm.
 * User: yang
 * Date: 2016/7/4
 * Time: 23:33
 */
session_start();

$username = $_POST['username'];
$password = MD5($_POST['password']);
$remember = $_POST['remember'];

if ($remember == 1) {
    //记住密码
    $timeout = time() + 60 * 60 * 24 * 7;
    setcookie('remember', "$remember:$username", $timeout);
}

include('lib/conn.php');

//过滤字符
if (get_magic_quotes_gpc())
{
    $username = stripslashes($username);
    $password = stripslashes($password);
}
$password = mysql_real_escape_string($password);
$username = mysql_real_escape_string($username);
$check_query = mysql_query("select uid from user where username ='{$username}' and password='{$password}'
limit 1");
//检测用户名及密码是否正确
if ($result = mysql_fetch_array($check_query)) {
    //登录成功
    $_SESSION['username'] = $username;
    $_SESSION['userid'] = $result['uid'];

    $userid = $result['uid'];
    setcookie('userid', "$userid", time() + 60 * 60 * 24 * 7);
    setcookie('username', "$username", time() + 60 * 60 * 24 * 7);
   echo "<script type='text/javascript'>location='tpl/user_center.html';</script>";

} else {
    echo "<script type='text/javascript'>alert('密码错误');location='tpl/login.html';</script>";
}