<meta charset="utf-8">
<?php
require_once '../lib/mysql.func.php';
session_start();
connect();
//管理员登录
 function checkAdmin($sql){
	 return fetchOne($sql);
	 }
//检查是否有管理员登录
 function checkLogined(){
	 //关闭未定义的索引的警告
	 error_reporting(E_ALL ^ E_NOTICE); 
	 if($_SESSION['adminId']==""&&$_COOKIE['adminId']==""){
		 echo "<script> alert('没有登录，请先登录'); </script>";
		 echo "<script> window.location='login.php'; </script>";
		 }
	 
	 }
	
	//管理员添加
	 function addAdmin(){
		 $arr=$_POST;
		 if(insert("admin",$arr)){
			 $mes="添加成功<br/>
			 <a href='addAdmin.php'>添加管理员</a>
			 <a href='listAdmin.php'>查看管理员</a>";
			 }
			 else{
				 $mes="添加失败<br/>
			 <a href='addAdmin.php'>重新添加</a>";
				 }
		 return $mes;
		 }
		 
	//管理员修改 
	function editAdmin(){
		  $arr=$_POST;
		  $id=$_POST['id'];
		  if(update("admin",$arr,"id=$id")){
			  $mes="修改成功<br/>
			
			 <a href='listAdmin.php'>查看管理员</a>";
			  }
			  else{
				 $mes="修改失败<br/>
			  <a href='listAdmin.php'>查看管理员</a>";
				 }
		return $mes;		 
		}	 
	
	//管理员删除
	function delAdmin($id){
		

			if(delete("admin","id=$id")){
				  $mes="删除成功<br/>
				 <a href='listAdmin.php'>查看管理员</a>";
				  }
				  else{
					 $mes="删除失败<br/>
				  <a href='listAdmin.php'>查看管理员</a>";
					 }
		   return $mes;		
	}
		 
		 
		 
		 
		 
	//管理员查询显示
	function getAllAdmin(){
		$sql="select * from admin";
		$row=fetchAll($sql);
		
		return $row;
		}
	
	
	
	
	
//管理员注销
function logout(){
	$_SESSION=array();
	if(isset($_COOKIE[session_name()])){
	    setcookie(session_name(),"",time()-1);	
		}
	if(isset($_COOKIE['adminId'])){
	    setcookie("adminId","",time()-1);	
		
		}
		
	if(isset($_COOKIE['adminName'])){
	    setcookie("adminName","",time()-1);	
		
		}	
		
		session_destroy();
		
		header("location:login.php");
	exit;
	} 
   	 
	 
	 
	 
	 ?>
	 
	 
