<?php
/**
 * 实现转发功能
 * Created by PhpStorm.
 * User: yang
 * Date: 2016/7/14
 * Time: 14:50
 */
header('Content-Type: text/html; charset=utf-8');
ini_set("error_reporting","E_ALL & ~E_NOTICE");
include("../lib/conn.php");
if(!empty($_GET['id'])){
    //防止注入
    if (get_magic_quotes_gpc())
    {
        $_GET['id'] = stripslashes($_GET['id']);
    }
    $_GET['id'] = mysql_real_escape_string($_GET['id']);
    $sql = "SELECT * FROM blog WHERE blog_id = ".$_GET['id'];
    $rc = mysql_fetch_array(mysql_query($sql));
    $title = $rc['title'];
    $content = $rc['content'];
    $author_id = $_COOKIE['userid'];
    $author = $_COOKIE['username'];
    $kind = $rc['kind'];
    //echo "$author<br>";
    //echo "$author_id<br>";
    // echo"$title<br>";
    //echo "$content<br>";


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

    $sql = "INSERT INTO blog VALUES(NUll, '{$author_id}','{$author}','{$title}','{$content}',now(),0,'{$kind}',0)";
    mysql_query($sql);
    echo "<script type='text/javascript'>location='default.php';</script>";
    //mysql_query("UPDATE blog SET hits = hits + 1 WHERE blog_id = ".$_GET['id']);
} else {
    echo "<script type='text/javascript'>alert('转发失败');location='default.php';</script>";
}
?>

