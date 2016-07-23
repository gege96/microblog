<html><!DOCTYPE html>
<html>
<meta charset="utf-8">


<head>
    <script>

        function check_news(){
            var xmlhttp;
            if (window.XMLHttpRequest){
                xmlhttp=new XMLHttpRequest();
            }
            else{
                xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange=function(){
                if (xmlhttp.readyState==4 && xmlhttp.status==200){
                    if(xmlhttp.responseText>0){
                        alert("有新消息");
                         location='message/message_deal.php';
                    }else{
                        // alert(xmlhttp.responseText);
                    }
                }
            }
            xmlhttp.open("GET","message/message_query.php?t=" + Math.random(),true);
            xmlhttp.send();
        }
    </script>
</head>
<body onload="check_news()">
</body>
</html>


<?php
header('Content-Type: text/html; charset=utf-8');
/**
 * Created by PhpStorm.
 * User: yang
 * Date: 2016/7/5
 * Time: 1:10
 */
session_start();

//包含数据库连接文件
include('lib/conn.php');
$userid = $_COOKIE['userid'];
if (get_magic_quotes_gpc())
{
    $userid  = stripslashes($userid );
}
$userid  = mysql_real_escape_string($userid );
$user_query = mysql_query("SELECT * FROM user WHERE uid='{$userid}' limit 1");
$row = mysql_fetch_array($user_query);
echo '用户信息：<br />';
echo '用户ID：', $row['uid'], '<br />';
echo '用户名：', $row['username'], '<br />';
echo '邮箱：', $row['email'], '<br />';
echo '注册日期：', date("Y-m-d", $row['regdate']), '<br />';
echo '<a href="action/add.php">发布微博</a> <br />';
echo '<a href="logout.php?action=logout">注销</a> <br />';
echo '<a href="action/default.php">微博大厅</a> <br />';
echo '<a href="action/personal.php">个人微博</a> <br />';
?>