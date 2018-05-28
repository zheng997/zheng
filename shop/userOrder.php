<?php
error_reporting(E_ALL & ~E_NOTICE);
   session_start();
   require_once 'lib/mysql.func.php';
   $username=$_GET['username']; 
   //print_r($username);
   //根据用户名获取购物车信息
   $sql=" select * from `order` where username={$username}";
   $orders=fetchAll($sql);
   $_SESSION['order']=$orders;
   if(empty($orders)){
         echo "<script> alert('未登录或未有订单'); </script>";
			echo "<script> window.location='index.php'; </script>";

   }

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>购物车</title>
<link type="text/css" rel="stylesheet" href="css/reset.css">
<link type="text/css" rel="stylesheet" href="css/main.css">
<!--[if IE 6]>
<script type="text/javascript" src="js/DD_belatedPNG_0.0.8a-min.js"></script>
<script type="text/javascript" src="js/ie6Fixpng.js"></script>
<![endif]-->
</head>

<body>
<div class="headerBar">
	<div class="topBar">
		<div class="comWidth">
			<div class="leftArea">
				<a href="index.php" class="collection">您好，欢迎来到美妆商城！</a>
			</div>
			<div class="rightArea">
				<?php 
			if(isset($_SESSION['userName'])){	
				$mes="欢迎".$_SESSION['userName']."<a href='doAction.php?act=logoutUser'>[退出]</a>";
				
			}
			elseif(isset($_COOKIE['userName'])){	
				$mes="欢迎".$_COOKIE['userName']."<a href='doAction.php?act=logoutUser'>[退出]</a>";
			}
			else{
				$mes="欢迎<a href='login.php'>[登录]</a><a href='register.php'>[免费注册]</a>";
			}
			echo $mes;
			?>
			<a href="userOrder.php?username=<?php echo $arr; ?>">我的订单</a>
			</div>
		</div>
	</div>
	<div class="logoBar">
		<div class="comWidth">
			<div class="logo fl">
				<a href="index.php"><img src="images/logo.png" alt="美妆商城"></a>
			</div>
			
		</div>
	</div>
</div>
<div class="shoppingCart comWidth">
	
	
	<div class="shopping_item">
		<h3 class="shopping_tit">用户订单</h3>
		<div class="shopping_cont pb_10">
			<div class="cart_inner">
				<div class="cart_head clearfix">
					<div class="cart_item t_name" style="">订单编号</div>
					<div class="cart_item t_price" style="margin-left: -250px;">地址</div>
					<div class="cart_item t_num">联系人</div>
					<div class="cart_item t_subtotal">电话</div>
					<div class="cart_item t_subtotal">总计</div>
                    <div class="cart_item t_subtotal">操作</div>
				</div>
       <?php foreach( $orders as $order){  ?>
				<div class="cart_cont clearfix">
					<div class="cart_item t_name">
						<div class="cart_shopInfo clearfix">
							<div class="cart_shopInfo_cont">
								<p class="cart_link"style="margin-left: -80px";><a><?php echo $order['oid']; ?></a></p>
							</div>
						</div>
					</div>
					<div class="cart_item t_price" style="margin-left: -250px"> </div>
					
					<div class="cart_item t_price">
					  <?php echo $order['address']; ?>
					</div>
					<div class="cart_item t_price">
					 <?php echo $order['linkMan']; ?>
					</div>
					<div class="cart_item t_num"><?php echo $order['phone']; ?></div>
					<div class="cart_item t_subtotal t_red"><?php echo $order['totalPrice']; ?></div>
                    <div class="cart_item t_subtotal"><input type="button" class="btn" value="取消订单" onclick="javascript:location='doAction.php?act=delShop&id=<?php  echo $shop['pid']; ?>'"></div>

				</div>
				<?php  } ?>
	<div class="hr_25"></div>
             
	
</div>
	</div>
</div>	</div>

<?php 
		require_once 'foot.php';

?>
</body>
</html>
