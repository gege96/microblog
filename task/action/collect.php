<?php
/**
 * 执行收藏动作
 * Created by PhpStorm.
 * User: yang
 * Date: 2016/7/14
 * Time: 14:49
 */

 header('Content-Type: text/html; charset=utf-8');
 session_start();
//引入连接数据库文件
 include("../lib/conn.php");

//获取目的数据，方便下面收藏
 if(!empty($_GET['id']))
 {
    //防止注入
    if (get_magic_quotes_gpc())
    {
        $_GET['id'] = stripslashes($_GET['id']);
    }
    $_GET['id'] = mysql_real_escape_string($_GET['id']);
    $sql = "SELECT * FROM blog WHERE blog_id = " . $_GET['id'];
 }

    $rc = mysql_fetch_array(mysql_query($sql));

    $collect_user_id = $_COOKIE['userid'];
    $collect_author_id = $rc['author_id'];
    $collect_author = $rc['author'];
    $collect_title = $rc['title'];
    $collect_content = $rc['content'];

    //插入收藏数据
    $collect_sql = "INSERT INTO collect VALUES(NUll, '$collect_user_id','$collect_author','$collect_title','$collect_content',now())";
    mysql_query($collect_sql);

   //取出收藏的数据
   $my_collection_sql = "SELECT * FROM collect WHERE collect_user_id = '$collect_user_id'";
   $query = mysql_query($my_collection_sql);
   $rs = mysql_fetch_array($query);
?>



<html>
<head>
    <title>我的收藏</title>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>
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
<a href="default.php">返回大厅</a>
<hr color="#FF9900" size="3" />


<?php
if(!$rs)
{
    echo "没有微博，快来发一条";
}
while($rs)
    {
    ?>
<div id="main">
    <div class="demo">
        <div id="saywrap">
            <hr color="#006699" size="1px">

            <h2>标题：<?php echo $rs['collect_title'];?></h2>
            <li>日期：<?php echo $rs['collect_author'];?></li>
            <li>日期：<?php echo $rs['createtime'];?></li>
            <p>内容:<br><?php echo $rs['collect_content'];?> </p>

        </div>
    </div>
</div>


    <?php
    $rs = mysql_fetch_array($query);
      }
?>
</body>
</html>