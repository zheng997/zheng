<?php
//进入购物车
	function shop(){
		//获取用户
		 if($_SESSION['userName']){
				 $arr=$_SESSION['userName'];
			   }
			   elseif($_COOKIE['userName']){
				 $arr=$_COOKIE['userName'];
			   }
		//判断是否登录
		if(empty($arr)){
			echo "<script> alert('未登录，请先登录') </script>";
			echo "<script> window.location='login.php'; </script>";
		}
		//判断对应用户购物车是否有商品
		$sql="select * from shopping where username = {$arr}";
		$row=fetchOne($sql);
        if(empty($row)){
        		echo "<script> alert('购物车还没有商品，请先添加商品') </script>";
			echo "<script> window.location='index.php'; </script>";
        }

		//进入购物车
			   echo "<script> window.location='shopping1.php?username={$arr}'; </script>";
		}
   //添加商品到购物车
   function addShop($id){
	   $sql="select pName,iPrice from pro where id={$id}";
	   $arr=fetchOne($sql);
		$arr['pid']=$arr[2]=$id;
		$arr['date']=$arr[3]=time();
		$arr['oid']=$arr[4]=rand(1000,9999);
		$arr['pCount']=$arr[5]=$arr['iPrice']*1;
	   if($_SESSION['userName']){
	     $arr['username']=$arr[6]=$_SESSION['userName'];
	   }
	   elseif($_COOKIE['userName']){
	     $arr['username']=$arr[6]=$_COOKIE['userName'];
	   }
	  //print_r($arr);
	  $sql="INSERT INTO `shopping` ( `pName`,`iPrice`,`pid`,`date`, `oid` , `pCount`,`username`  ) VALUES ('$arr[0]', '$arr[1]', '$arr[2]', '$arr[3]', '$arr[4]', '$arr[5]', '$arr[6]')";
	  $row=mysql_query($sql);
	if($row){
		  echo "<script> alert('添加购物车成功') </script>";
	      echo "<script> window.location='shopping1.php?username={$arr['username']}'; </script>";
      }  
	 else{
		  echo "<script> alert('添加购物车失败') </script>";
	      echo "<script> window.location='index.php'; </script>";
	 }
	 
   }
  //根据商品id删除购物车中指定商品
  function delShop($id){
	  if($_SESSION['userName']){
	     $arr=$_SESSION['userName'];
	   }
	   elseif($_COOKIE['userName']){
	     $arr=$_COOKIE['userName'];
	   }
	  if(delete("shopping","pid=$id")){
		  echo "<script> alert('删除成功') </script>";
		  
		  //判断对应用户购物车是否有商品
		$sql="select * from shopping where username = {$arr}";
		$row=fetchOne($sql);
        if(empty($row)){
        		echo "<script> alert('购物车还没有商品，请先添加商品') </script>";
			echo "<script> window.location='index.php'; </script>";
        }


	      echo "<script> window.location='shopping1.php?username={$arr}'; </script>";


      }  
	  else{
		  echo"<script>alert('删除失败');history.go(-1);</script>"; 
	  }
	  
	 
  }
  
  
   //清空该用户下的购物车
  function delShops(){
	  if($_SESSION['userName']){
	     $arr=$_SESSION['userName'];
	   }
	   elseif($_COOKIE['userName']){
	     $arr=$_COOKIE['userName'];
	   }
	  if(delete("shopping","username=$arr")){
		  echo "<script> alert('已清除购物车') </script>";
	      echo "<script> window.location='index.php'; </script>";
      }  
	  else{
		  echo "<script> alert('已清除购物车') </script>";
	      echo "<script> window.location='index.php'; </script>"; 
	  }
	  
	 
  }
  

   
?>