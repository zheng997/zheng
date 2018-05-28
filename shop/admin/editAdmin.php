<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>

<body>
<?php
 require_once '../lib/mysql.func.php';
		$id=$_GET['id'];
		//var_dump($id);
		$sql="select * from admin where id='{$id}'";
		$row=fetchOne($sql);
		


?>

<form action="doAdminAction.php?act=editAdmin" method="post">
<table width="70%" border="1" cellpadding="5" cellspacing="0" bgcolor="#cccccc">
       <tr>
			<th>管理员id</th>
			<td><input type="text" name="id" value=" <?php echo $row['id'];  ?>"/></td>
		</tr>
		<tr>
			<th>管理员名称</th>
			<td><input type="text" name="username" value=" <?php echo $row['username'];  ?>"/></td>
		</tr>
		<tr>
			<th>管理员密码</th>
			<td><input type="password" name="password" value=" <?php echo $row['password'];  ?>"/></td>
		</tr>
		<tr>
			<th>管理员邮箱</th>
			<td><input type="text" name="email" value=" <?php echo $row['email'];  ?>"/></td>
		</tr>
		<tr>
			<th colspan="2"><input type="submit" value="修改"/></th>
			
		</tr>
</table>
</form>


</body>
</html>