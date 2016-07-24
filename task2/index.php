<?php
ini_set("error_reporting","E_ALL & ~E_NOTICE");
/**
 * Created by PhpStorm.
 * User: yang
 * Date: 2016/7/11
 * Time: 15:38
 */
$cookie = $_COOKIE['remember'];
if ($cookie) {
    include('auto_login.php');
} else {
    header("Location: http://".$_SERVER['HTTP_HOST'].rtrim(dirname($_SERVER['PHP_SELF']), '/\\')."/tpl/login.html");
}
