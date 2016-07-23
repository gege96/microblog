<?php
header('Content-Type: text/html; charset=utf-8');
include("../lib/conn.php");

//实现分组查看
if(!empty($_GET['kinds'])){
    $keys = "AND kind LIKE '%".$_GET['kinds']."%'";
} else {
    $keys = "";
}

$sql = "SELECT * FROM blog WHERE is_delete = 0 ".$keys." ORDER BY blog_id DESC";
$query = mysql_query($sql);
$rs = mysql_fetch_assoc($query);

?>

<html>
<head>
    <title>我的微博主页</title>
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

    <link href="../css/me.css" rel="stylesheet">

</head>
<body>
<div class="default">
<a href="../tpl/user_center.html">用户中心</a><br>
<a href="personal.php">我的微博</a><br>
<a href="add.php">发布新微博</a><br>
<form action="" method="get">
    <select name="kinds">
        <option value="">全部</option>
        <option value="1">旅行</option>
        <option value="2">学习</option>
        <option value="3">生活</option>
        <option value="4">美食</option>
        <option value="5">其他</option>
    </select>
    <input type="submit" name="submit" value="内容搜索"/>
</form>
<hr color="#FF9900" size="1" />

<?php
if(!$rs){
    echo "没有相关内容！";
}
while($rs){
    ?>

<div id="main">
    <div class="demo">
        <div id="saywrap">
            <hr color="#006699" size="1px">
            <h2>作者：<?php echo $rs['author'];?> 标题：<?php echo $rs['title'];?></h2>
            <li>日期：<?php echo $rs['createtime'];?><a href="forward.php?id=<?php echo $rs['blog_id'];?>">|转发|</a>
            <a href="collect.php?id=<?php echo $rs['blog_id'];?>">|收藏|</a></li>
            <p>内容<?php echo iconv_substr($rs['content'],0,50,"UTF-8");?>......
            <a href="view.php?id=<?php echo $rs['blog_id'];?>">|查看详细内容|</a></p>
        </div>
    </div>
</div>


    <?php
    $rs = mysql_fetch_assoc($query);
    }
    ?>

</div>
</body>
</html>  