<?php
define('INCLUDE_CHECK',1);
require_once('../config/conn.php');
require_once('function.php');
ini_set("error_reporting", "E_ALL & ~E_NOTICE");

$blog_id = $_GET['id'];
$say_id = $_COOKIE['userid'];
$username = $_COOKIE['username'];

$stmt = $link->prepare('SELECT * FROM say WHERE blog_id = ? ORDER BY id DESC');
$stmt->bind_param('i', $blog_id);
$stmt->execute();
$result = $stmt->get_result();

while ($row = $result->fetch_array()) {
    $sayList.= formatSay($row['content'], $row['addtime'], $row['username']);

}


?>


<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

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

    <link rel="stylesheet" type="text/css" href="../css/style-reply.css">
    <script type="text/javascript" src="../js/jquery-1.4.2.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function($){

            $('.theme-login').click(function(){
                $('.theme-popover-mask').show();
                $('.theme-popover-mask').height($(document).height());
                $('.theme-popover').slideDown(200);
            })
            $('.theme-poptit .close').click(function(){
                $('.theme-popover-mask').hide();
                $('.theme-popover').slideUp(200);
            })

        });
    </script>
</head>

<body>


<div id="main">
  <div class="demo">
    <form id="myform" action="submit.php" method="post">
      <h3><span class="counter">140</span>说说你的看法</h3>
      <textarea name="saytxt" id="saytxt" class="input" tabindex="1" rows="2" cols="40"></textarea>
      <p>
      <input type="image" src="../images/btn.gif" class="sub_btn" alt="发布" />
      <span id="msg"></span>
      </p>
    </form>

    <div id="saywrap">
     <?php echo $sayList;
     ?>
    </div>
  </div>
</div>
<p id="stat"><script type="text/javascript" src="../js/tongji.js"></script></p>
</body>
</html>