<?php
header('Content-Type: text/html; charset=utf-8');
/**
 * Created by PhpStorm.
 * User: yang
 * Date: 2016/7/4
 * Time: 23:48
 */

if (!isset($_POST['signup-username'])) {
    exit('非法访问!');
}
$username = $_POST['signup-username'];
$password = $_POST['signup-password'];
$email    = $_POST['signup-email'];


//注册信息判断
if (!preg_match('/^[\w\x80-\xff]{3,15}$/', $username)) {
    exit('错误：用户名不符合规定。<a href="javascript:history.back(-1);">返回</a>');
}
if (strlen($password) < 6) {
    exit('错误：密码长度不符合规定。<a href="javascript:history.back(-1);">返回</a>');
}
$pattern = "/([\w\-]+\@[\w\-]+\.[\w\-]+)/";
if (!preg_match($pattern, $email)) {
    exit('错误：电子邮箱格式错误。<a href="javascript:history.back(-1);">返回</a>');
}

//包含数据库连接文件
include('config/conn.php');

//检测用户名是否已经存在
$stmt = $link->prepare('SELECT uid FROM user WHERE username = ? LIMIT 1');
$stmt->bind_param('s', $username);
$stmt->execute();
$result = $stmt->get_result();

if ($result->fetch_array()) {
    echo '错误：用户名 ', $username, ' 已存在。<a href="javascript:history.back(-1);">返回</a>';
    exit;
}

//写入数据
$password = MD5($password);
$regdate  = time();

function random_str($length='')
{
    //生成一个包含 大写英文字母, 小写英文字母, 数字 的数组
    $arr = array_merge(range(0, 9), range('a', 'z'), range('A', 'Z'));

    $str = '';
    $arr_len = count($arr);
    for ($i = 0; $i < $length; $i++)
    {
        $rand = mt_rand(0, $arr_len-1);
        $str.=$arr[$rand];
    }

    return $str;
}
$salt =  random_str(32);
$identifier = md5($salt . md5($username . $salt));
$token = md5(uniqid(rand(), TRUE));
$timeout = time() + 60 * 60 * 24 * 7;

$stmt = $link->prepare('INSERT INTO user (username, password, email, regdate, token, identifier, timeout, salt) VALUES (?, ?, ?, ?, ?, ?, ?, ?)');
$stmt->bind_param('ssssssss', $username, $password, $email, $regdate, $token, $identifier, $timeout, $salt);
$check =  $stmt->execute();

if ($check) {
    setcookie('auth', "$identifier:$token:$salt", $timeout);
    exit('用户注册成功！点击此处 <a href="tpl/login.html">登录</a>');
} else {
    echo '抱歉！添加数据失败：', mysql_error(), '<br />';
    echo mysql_error();
    echo '点击此处 <a href="javascript:history.back(-1);">返回</a> 重试';
}

