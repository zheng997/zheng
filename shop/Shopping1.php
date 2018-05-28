<?php
  ini_set("error_reporting","E_ALL & ~E_NOTICE");
   session_start();
   require_once 'lib/mysql.func.php';
   $username=$_GET['username']; 
   //print_r($username);
   //根据用户名获取购物车信息
   $sql=" select * from shopping where username={$username}";
   $shops=fetchAll($sql);
   $_SESSION['shops']=$shops;
   //print_r($shops);
   $totalPrice='';//商品总价格
   $sum='';//商品总数量

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
			$arr='';
			if(isset($_SESSION['userName'])){	
				$arr=$_SESSION['userName'];
				$mes="欢迎".$_SESSION['userName']."<a href='doAction.php?act=logoutUser'>[退出]</a>";
				
			}
			elseif(isset($_COOKIE['userName'])){	
				$arr=$_COOKIE['userName'];
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
			<div class="stepBox fr">
				<div class="step"></div>
				<ul class="step_text">
					<li class="s01 active">我的购物车</li>
					<li class="s02 active">填写核对订单</li>
					<li class="s03">订单提交成功</li>
				</ul>
			</div>
		</div>
	</div>
</div>
<div class="shoppingCart comWidth">
	
	
	<div class="shopping_item">
		<h3 class="shopping_tit">购物车</h3>
		<div class="shopping_cont pb_10">
			<div class="cart_inner">
				<div class="cart_head clearfix">
					<div class="cart_item t_name">商品名称</div>
					<div class="cart_item t_price">单价</div>
					<div class="cart_item t_num">数量</div>
					<div class="cart_item t_subtotal">小计</div>
                    <div class="cart_item t_subtotal">操作</div>
				</div>
       <?php foreach ($shops as $shop){ ?>
				<div class="cart_cont clearfix">
					<div class="cart_item t_name">
						<div class="cart_shopInfo clearfix">
                        <?php 
						    //根据商品id获取商品图片
						     $pid=$shop['pid'];
							 $sql="select albumPath from album where pid={$pid}";
							 $proImg=fetchOne($sql);
							 //print_r($proImg);
						 ?>
							<img width="100px" height="100px" src="image_220/<?php echo $proImg[0]; ?>" alt="">
							<div class="cart_shopInfo_cont">
								<p class="cart_link"><a><?php echo $shop['pName'];  ?></a></p>
							</div>
						</div>
					</div>
					<div class="cart_item t_price">
						<?php echo $shop['iPrice'];  ?>
					</div>
					<div class="cart_item t_num">1</div>
					<div class="cart_item t_subtotal t_red"><?php echo $shop['pCount'];  ?></div>
                    <div class="cart_item t_subtotal"><input type="button" class="btn" value="取消商品" onclick="javascript:location='doAction.php?act=delShop&id=<?php  echo $shop['pid']; ?>'"></div>

				</div>
	<div class="hr_25"></div>
             <?php
			      //计算出购物车的商品总价格
			 	  $totalPrice=$totalPrice+$shop['iPrice']*1;
				  $sum=$sum+1;
				  //print_r($totalPrice);
                  }
				  $_SESSION['totalPrice']=$totalPrice;
				  $_SESSION['sum']=$sum;
				?>
	<div class="shopping_item">
		<h3 class="shopping_tit">总计</h3>
		<div class="shopping_cont padding_shop clearfix">
			<div class="cart_count fr">
				<div class="cart_rmb">
                    <i>商品总数：</i><span><?php echo $sum; ?></span>
					<i>总计：</i><span><?php echo $totalPrice; ?></span>
				</div>
				<div class="cart_btnBox">
                     <input type="button" class="btn" value="修改商品数量" style=" margin-right:15px;">
                    <input type="button" class="btn" value="清空购物车"  onclick="javascript:location='doAction.php?act=delShops'">
					<input type="button" class="cart_btn" value="结算"  onclick="javascript:location='shopping2.php?sum=<?php echo $sum; ?>&totalPrice=<?php echo $totalPrice; ?>'">
				</div>
			</div>
		</div>
	</div>
</div>
	</div>
</div>	</div>

<?php 
		require_once 'foot.php';

?>
</body>
</html>
