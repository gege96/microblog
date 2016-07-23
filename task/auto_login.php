<?php
header('Content-Type: text/html; charset=utf-8');
ini_set("error_reporting","E_ALL & ~E_NOTICE");
include('lib/conn.php');
$clean = array();
$mysql = array();
$now = time();

list($identifier, $token,$salt) = explode(':', $_COOKIE['auth']);
//echo"$identifier<br>";
//echo"$token<br>";
//echo"$salt<br>";
if (ctype_alnum($identifier) && ctype_alnum($token))
{
    $clean['identifier'] = $identifier;
    $clean['token'] = $token;
}
if (get_magic_quotes_gpc())
{
     $clean['identifier'] = stripslashes($clean['identifier']);
}

$mysql['identifier'] = mysql_real_escape_string($clean['identifier']);

$sql = "SELECT username, token, timeout,salt
        FROM   user
        WHERE  identifier = '{$mysql['identifier']}'";
if ($result = mysql_query($sql))
{
    if (mysql_num_rows($result))
    {
        $record = mysql_fetch_assoc($result);

       // echo "$result<br>";
        if ($clean['token'] != $record['token'])
        {
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
        /* Failed Login (invalid identifier) */
        echo "<script type='text/javascript'>alert('invalid identifier');location='tpl/login.html';</script>";
    }
}
else
{
    /* Error */
    mysql_error();
}


