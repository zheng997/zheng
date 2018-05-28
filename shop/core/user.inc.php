<?php
if (!session_id()) session_start();
    //用户登录
 function checkUser($sql){
	 return fetchOne($sql);
	 }
//检查是否有用户登录
 function checkLoginedUser(){
	 //关闭未定义的索引的警告
	 error_reporting(E_ALL ^ E_NOTICE); 
	 if($_SESSION['userId']==""&&$_COOKIE['userId']==""){
		 echo "<script> alert('没有登录，请先登录'); </script>";
		 echo "<script> window.location='login.php'; </script>";
		 }
	 
	 }


   //添加用户
   function addUser(){
	$arr=$_POST;
	$arr['regTime']=time();
	$uploadFile=uploadFile();
	unset($arr['x']);
	unset($arr['y']);
	//print_r($uploadFile);
	
	if($uploadFile&&is_array($uploadFile)){
		$arr['face']=$uploadFile[0]['name'];
	}else{
		return "添加失败";
	}

	//var_dump($arr);
	$row=insert("user", $arr);
	if($row){
		$mes="<p>添加成功!</p><a href='addUser.php'>继续添加</a>|<a href='listUser.php'>查看用户列表</a>";
	}else{
		$filename="uploads/".$uploadFile[0]['name'];
		if(file_exists($filename)){
			unlink($filename);
		}
	$mes="<p>添加失败!</p><a href='addUser.php'>重新添加</a>|<a href='listUser.php'>查看用户列表</a>";
	}
	return $mes;
} 

   //注册用户
	function register(){
		$arr=$_POST;
		$arr['regTime']=time();
		
		unset($arr['x']);
		unset($arr['y']);
		//print_r($uploadFile);
		
		
	
		//var_dump($arr);
		$row=insert("user", $arr);
		if($row){
			$mes="注册成功!<br/>3秒钟后跳转到登陆页面!<meta http-equiv='refresh' content='3;url=login.php'/>";
		}else{
			$filename="uploads/".$uploadFile[0]['name'];
			if(file_exists($filename)){
				unlink($filename);
			}
			$mes="注册失败!<br/><a href='register.php'>重新注册</a>|<a href='index.php'>查看首页</a>";
		}
	return $mes;
}
   
   //用户查询显示
	function getAllUser(){
		$sql="select * from user";
		$row=fetchAll($sql);
		
		return $row;
		}
		
  //用户删除
	function delUser($id){
		

			if(delete("user","id=$id")){
				  $mes="删除成功<br/>
				 <a href='listUser.php'>查看用户</a>";
				  }
				  else{
					 $mes="删除失败<br/>
				  <a href='listUser.php'>查看用户</a>";
					 }
		   return $mes;		
	}
	
	//管理员修改 
	function editUser($id){
		  $arr=$_POST;
		  //var_dump($id);
		  $row=update("user",$arr,"id=$id");
		  if($row){
			  $mes="修改成功<br/>
			
			 <a href='listUser.php'>查看管理员</a>";
			  }
			  else{
				 $mes="修改失败<br/>
			  <a href='listUser.php'>查看管理员</a>";
				 }
		return $mes;		 
		}	 
	
	//用户注销
	function logoutUser(){
		$_SESSION=array();
		if(isset($_COOKIE[session_name()])){
			setcookie(session_name(),"",time()-1);	
			}
		if(isset($_COOKIE['userId'])){
			setcookie("userId","",time()-1);	
			
			}
			
		if(isset($_COOKIE['userName'])){
			setcookie("userName","",time()-1);	
			
			}	
			
			session_destroy();
			
			header("location:index.php");
		exit;
	} 	 


?>