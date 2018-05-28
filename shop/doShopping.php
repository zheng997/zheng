<?php
     require_once 'core/shopping.inc.php';
   //生成订单
   	error_reporting(E_ALL ^ E_NOTICE);
	session_start();
	require_once 'lib/mysql.func.php';
    //var_dump($_SESSION['shops']);
	$arr=$_POST;
	//获取用户
	if($_SESSION['userName']){
		$username=$_SESSION['userName'];
	}
	elseif($_COOKIE['userName']){
		$username=$_COOKIE['userName'];
	}
	$linkMan=$_GET['linkMan']?$linkMan=$_GET['linkMan']:null;
	$address=$_GET['address']?$address=$_GET['address']:null;
	$phone=$_GET['phone']?$phone=$_GET['phone']:null;
	$totalPrice=$_SESSION['totalPrice'];//商品总价格
	$date=time();
	$oid=rand(1000,9999);
	//var_dump($username,$linkMan,$address,$phone,$totalPrice , $date);exit;
	$shops=$_SESSION['shops'];	//获取提交的商品信息
	$sql="INSERT INTO `order` (username,linkMan,address,phone,totalPrice,date,oid) VALUES ($username,$linkMan,$address,$phone,$totalPrice,$date,$oid)";
	$row=mysql_query($sql);
	if($row){
		     //var_dump($shops);
			 foreach ($shops as $shop){
				    $pid=$shop['pid'];
					$pName=$shop['pName'];
					$iPrice=$shop['iPrice'];
					//var_dump($oid,$pid,$pName,$iPrice,1);
					$sql="INSERT INTO `order_details` (oid,pid,pName,iPrice,num) VALUES ($oid,$pid,$pName,$iPrice,1)";
					$row=mysql_query($sql);
				 }
			 echo "<script> alert('提交成功，等待收货确认') </script>";
			 delShops();
	}
	else{
			echo "<script> alert('提交失败') </script>";
	      	echo "<script> window.location='index.php'; </script>";
		
	}
	
	
 
  ?>