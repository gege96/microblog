<?php
header('Content-Type: text/html; charset=utf-8');
/**
 * Created by PhpStorm.
 * User: yang
 * Date: 2016/7/11
 * Time: 16:00
 */
if($_GET['action'] == "logout"){
    setcookie("remember", "", time() - 3600);
    echo "<script type='text/javascript'>location='login_first.php';</script>";
    exit;
}