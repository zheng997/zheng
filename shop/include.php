<?php 
header("content-type:text/html;charset=utf-8");
date_default_timezone_set("PRC");
session_start();
define("ROOT",dirname(__FILE__));

require_once 'core/user.inc.php';
require_once 'lib/mysql.func.php';
require_once 'lib/upload.func.php';
require_once'lib/string.func.php';
