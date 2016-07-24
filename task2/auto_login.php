<?php
header('Content-Type: text/html; charset=utf-8');
//ini_set("error_reporting","E_ALL & ~E_NOTICE");


include('config/conn.php');
$clean = array();
$mysql = array();
$now = time();

list($identifier, $token,$salt) = explode(':', $_COOKIE['auth']);

if (ctype_alnum($identifier) && ctype_alnum($token)) {
    $clean['identifier'] = $identifier;
    $clean['token'] = $token;
}

$stmt = $link->prepare("SELECT username, token, timeout, salt FROM user WHERE  identifier = ?");
$stmt->bind_param('s', $clean['identifier']);
$stmt->execute();
$result = $stmt->get_result();

if ($result != null) {
        $record = $result->fetch_array(MYSQL_ASSOC);
        if ($clean['token'] != $record['token']) {
            /* Failed Login (wrong token) */
            echo"<br>token错误";
        }
        elseif ($now > $record['timeout'])
        {
            /* Failed Login (timeout) */
            echo"<br>timeout超时";
        }
        elseif ($clean['identifier'] !=
            md5($salt . md5($record['username'] . $salt)))
        {
            /* Failed Login (invalid identifier) */
            echo "<script type='text/javascript'>alert('登陆失败');location='tpl/login.html';</script>";
        }
        else
        {
            /* Successful Login */
            echo "<script type='text/javascript'>alert('登陆成功');location='tpl/user_center.html';</script>";
        }
}
else
{
    /* Error */
     mysql_error();
}


