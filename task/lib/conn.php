<?php
/**
 * Created by PhpStorm.
 * User: yang
 * Date: 2016/7/4
 * Time: 23:13
 */
/*$conn = @mysql_connect("localhost","root","YXJ+1.3");
if(!$conn)
{
    die("数据库连接失败：" . mysql_error());
}

mysql_select_db("study", $conn);*/

ini_set("error_reporting","E_ALL & ~E_NOTICE");
$host="localhost";
$db_user="root";
$db_pass="YXJ+1.3";
$db_name="study";
$timezone="Asia/Shanghai";

$link=mysql_connect($host,$db_user,$db_pass);
mysql_select_db($db_name,$link);
mysql_query("SET names UTF8");
header("Content-Type: text/html; charset=utf-8");
date_default_timezone_set($timezone); //北京时间


?>
