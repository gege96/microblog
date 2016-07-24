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

include('config/conn.php');

//取出用户名密码
$stmt = $link->prepare('SELECT uid FROM user WHERE username = ? AND password = ? LIMIT 1');
$stmt->bind_param('ss', $username, $password);
$stmt->execute();
$result = $stmt->get_result();

//检测用户名及密码是否正确
if ($row = $result->fetch_array()) {
    //登录成功
    $_SESSION['username'] = $username;
    $_SESSION['userid'] = $row['uid'];

    $userid = $row['uid'];
    setcookie('userid', "$userid", time() + 60 * 60 * 24 * 7);
    setcookie('username', "$username", time() + 60 * 60 * 24 * 7);
   echo "<script type='text/javascript'>location='tpl/user_center.html';</script>";

} else {
    echo "<script type='text/javascript'>alert('密码错误');location='tpl/login.html';</script>";
}