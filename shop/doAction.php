<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>


<?php
error_reporting(E_ALL & ~E_NOTICE);
  require_once 'core/user.inc.php';
  require_once 'lib/mysql.func.php';
  require_once 'lib/upload.func.php';
  require_once'lib/string.func.php';
  require_once 'core/shopping.inc.php';
  $act=$_GET['act'];
  $id=$_GET['id']?$_GET['id']:null;
   if($act=="register"){
      $mes=register();
   }
   elseif($act=="logoutUser"){
      $mes=logoutUser();
   }
   elseif($act=="shop"){
	  $mes=shop();
   }
   elseif($act=="addShop"){
	  $mes=addShop($id);
   }
   elseif($act=="delShop"){
	  $mes=delShop($id);
   }
   elseif($act=="delShops"){
	  $mes=delShops($id);
   }
   elseif($act=="addOrder"){
	  $mes=addOrder();
   }

?>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>

<body>
  <?php
      echo $mes;
  ?>
</body>
</html>