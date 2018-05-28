<meta charset="utf-8">

<?php
  require_once 'lib/mysql.func.php';
  require_once 'core/user.inc.php';
  session_start();
  $autoFlag=$_POST['autoLogin'];
  $username=$_POST['username'];
  $password=$_POST['password'];
 // $verify=$_POST['verify'];
  //$verify1=$_SESSION['verify'];
	//var_dump($verify1);
    //var_dump($verify);
	
	//if($verify1==$verify){
		$sql="select * from user where username='{$username}' and password='{$password}'";
		$res=checkUser($sql);
		
		
		if($res){
			
			//一周登录判断
				if($autoFlag){
					
				  setcookie("userId",$res['id'],time()+7*24*3600);
				  setcookie("userName",$res['username'],time()+7*24*3600);
				}
			
			
			$_SESSION['userName']=$res['username'];
			$_SESSION['userId']=$res['id'];
			echo "<script> alert('登录成功'); </script>";
			echo "<script> window.location='index.php'; </script>";
			}
		else{
			echo "<script> alert('登录失败'); </script>";
			echo "<script> window.location='login.php'; </script>";
			
			}
		/*}
		else
		{
			echo "<script> alert('验证码错误'); </script>";
			echo "<script> window.location='login.php'; </script>";
              		
		}*/
	connect();
?>