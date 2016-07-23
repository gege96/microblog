<?php

ini_set("error_reporting","E_ALL & ~E_NOTICE");
include("../lib/conn.php");
session_start();

if(!empty($_GET['id'])){

    if (get_magic_quotes_gpc())
    {
        $_GET['id'] = stripslashes($_GET['id']);
    }
    $_GET['id'] = mysql_real_escape_string($_GET['id']);
    $blog_id = $_GET['id'];
    $_SESSION['blog_id'] = $blog_id;
    $sql = "SELECT * FROM blog WHERE blog_id = ".$_GET['id'];
    $rc = mysql_fetch_array(mysql_query($sql));
    mysql_query("UPDATE blog SET hits = hits + 1 WHERE blog_id = ".$_GET['id']);
 } else {
    echo "参数引入失败！";
}
?>

<!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title><?php echo $rc['title'];?>|我的微博</title>
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
    <script type="text/javascript" src="../js/global.js"></script>
</head>
<body>
<a href="default.php">返回主页面</a>
<hr color="#00FFFF" size="1px"/>

<div id="main">
    <div class="demo">
        <div id="saywrap">
            标题：<?php echo $rc['title'];?>
            <hr color="#006699" size="1px">
            <li><?php echo "日期：".$rc['createtime']."|浏览次数：".$rc['hits'];?>|<a href="concern.php?id=<?php echo $rc['blog_id'];?>">关注</a>
                <a href="../comment/comment.php?id=<?php echo  $blog_id;?>">查看评论</a></li>
            <p>发布人：<?php echo $rc['author'];?></p>
            <p>内容：<?php echo $rc['content'];?></p>

        </div>
    </div>
</div>


<!--<h2><?php /*echo $rc['title'];*/?>
    <hr color="#006699" size="1px">
</h2>
<li><?php /*echo "日期：".$rc['createtime']."|浏览次数：".$rc['hits'];*/?>|<a href="concern.php?id=<?php /*echo $rc['blog_id'];*/?>">关注</a>
    <a href="../comment/comment.php?id=<?php /*echo  $blog_id;*/?>">查看评论</a></li>
<p>发布人：<?php /*echo $rc['author'];*/?></p>
<p><?php /*echo $rc['content'];*/?></p>-->
</body>
</html>