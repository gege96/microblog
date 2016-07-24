<?php
header('Content-Type: text/html; charset=utf-8');
include("../config/conn.php");

$author_id = $_COOKIE['userid'];

//根据author_id获取个人微博
$stmt = $link->prepare('SELECT * FROM blog WHERE author_id = ? AND is_delete = 0 ORDER BY blog_id DESC');
$stmt->bind_param('i', $author_id);

$stmt->execute();
$result = $stmt->get_result();
$rs = $result->fetch_array();

?>

<!DOCTYPE html>
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
</head>

<body>

<a href="blog_release.php">发布新内容</a><br>
<a href="blog_square.php">返回大厅</a>
<hr color="#FF9900" size="1px" />

<?php
if(!$rs){
    echo "没有微博，快来发一条";
}
while($rs){
?>

<div id="main">
    <div class="demo">
        <div id="saywrap">
            <hr color="#006699" size="1px">
            <h3>标题：<?php echo $rs['title'];?></h3>
            <li>日期：<?php echo $rs['createtime'];?></li>|<a href="blog_delete.php?id=<?php echo $rs['blog_id'];?>">|删除|</a>
            <p>内容：<?php echo iconv_substr($rs['content'],0,50,"UTF-8");?>...... <a href="blog_content.php?id=<?php echo $rs['blog_id'];?>">|查看详细内容|</a></p>

        </div>
    </div>
</div>

    <?php
    $rs = $result->fetch_array();
}
?>

</body>
</html>  