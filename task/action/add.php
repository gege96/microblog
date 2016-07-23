<?php
header('Content-Type: text/html; charset=utf-8');
session_start();
//引入连接数据库文件 
include("../lib/conn.php");
if(!empty($_POST['submit'])){

    $title = $_POST['title'];
    $content = $_POST['content'];
    $author_id = $_COOKIE['userid'];
    $author = $_COOKIE['username'];
    $kind = $_POST['kinds'];

    //防止注入
    if (get_magic_quotes_gpc())
    {
        $author_id = stripslashes($author_id);
        $author = stripslashes($author);
        $title = stripslashes($title);
        $content = stripslashes($content);
        $kind = stripslashes($kind);
    }
    $author_id = mysql_real_escape_string($author_id);
    $author = mysql_real_escape_string($author);
    $title = mysql_real_escape_string($title);
    $content = mysql_real_escape_string($content);
    $kind = mysql_real_escape_string($kind);
    //echo "$title<br>";
    //echo "$content<br>";
    //echo "$author_id<br>";
    //echo "$author<br>";
   // echo   "$kind";
    $sql = "INSERT INTO blog VALUES(NUll, '{$author_id}','{$author}','{$title}','{$content}',now(),0,'{$kind}',0)";
    mysql_query($sql);
    $user_sql = "UPDATE user SET state = 1";
    mysql_query($user_sql);
    echo "<script type='text/javascript'>location='default.php';</script>";
}
?>

<!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="content-type" content="text/html;charset=utf-8"/>
    <title>发布微博页面</title>

    <style type="text/css">
        .demo{width:600px; margin:30px auto; color:#51555c}
        .demo h3{height:32px; line-height:32px; font-size:18px}
        .demo h3 span{float:right; font-size:32px; font-family:Georgia,serif; color:#ccc; overflow:hidden}
        .input{width:594px; height:58px; margin:5px 0 10px 0; padding:4px 2px; border:1px solid #aaa; font-size:12px; line-height:18px; overflow:hidden}
        .sub_btn{float:right; width:94px; height:28px;}
        .clear{clear:both}
        .saylist{margin:8px auto; padding:4px 0; border-bottom:1px dotted #d3d3d3}
        .saylist img{float:left; width:50px; margin:4px}
        .saytxt{float:right; width:530px; overflow:hidden}
        .saytxt p{line-height:18px}
        .saytxt p strong{margin-right:6px}
        .date{color:#999}
        .inact,.inact:hover{background:#f5f5f5; border:1px solid #eee; color:#aaa; cursor:auto;}
        #msg{color:#f30}
    </style>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
    <script type="text/javascript" src="js/global.js"></script>
</head>
<body>
<a href="default.php">返回大厅</a>
<hr color="#0033CC" size="1px"/>

<div id="main">
    <h2 class="top_title"></h2>
    <div class="demo">
        <form id="myform" action="add.php" method="post">
            <h3><span class="counter"></span>说说你正在做什么...</h3>
    标题：
    <input type="text" name="title"/>
    <br />
    内容：
    <textarea rows="5" cols="50" name="content"></textarea>
    <br />
    <select name="kinds">
        <option value="1">旅行</option>
        <option value="2">学习</option>
        <option value="3">生活</option>
        <option value="4">美食</option>
        <option value="5">其他</option>
    </select>
    <br />
    <input type="submit" name="submit" value="提交"/>
    <br />
</form>
    </div>
</div>
</div
</body>
</html> 