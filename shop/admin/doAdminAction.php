<?php
require_once '../lib/mysql.func.php';
require_once '../core/admin.inc.php';
require_once '../core/cate.inc.php';
require_once '../core/pro.inc.php';
require_once '../core/user.inc.php';
require_once '../core/order.inc.php';
 error_reporting(E_ALL ^ E_NOTICE);
   $act=$_GET['act'];
   $id=$_GET['id']?$id=$_GET['id']:null;
   if($act=="logout"){
	   logout();
	   }
	elseif($act=="addAdmin"){
		$mes=addAdmin();
		}
	elseif($act=="editAdmin"){
		$mes=editAdmin();
		}
	elseif($act=="delAdmin"){
		$mes=delAdmin($id);
		}	
	elseif($act=="addCate"){
		$mes=addCate();
		}	
	elseif($act=="editCate"){
		$mes=editCate();
		}
	elseif($act=="delCate"){
		
		$mes=delCate($id);
		}			
    elseif($act=="addPro"){
		$mes=addPro();
		}		
	elseif($act=="editPro"){
		$mes=editPro($id);
		}
	elseif($act=="delPro"){
		$mes=delPro($id);
		}
	elseif($act=="addUser"){
		$mes=addUser();
		}	
	elseif($act=="editUser"){
		
		$mes=editUser($id);
		}
	elseif($act=="delUser"){
		$mes=delUser($id);
		}
	elseif($act=="delOrder"){
		$mes=delOrder($id);
		}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>

<body>
<?php
  if($mes){
	  echo $mes;
	  }


?>



</body>
</html>