
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
				<a href="#" class="collection">您好，欢迎来到美妆商城！</a>
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
				<a href="#"><img src="images/logo.png" alt="美妆商城"></a>
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
		<h3 class="shopping_tit">收货地址</h3>
		<div class="shopping_cont padding_shop">
      <form action="doShopping.php" method="get">
			<ul class="shopping_list">
				<li><span class="shopping_list_text"><em>*</em>详细地址：</span><input type="text" class="input input_b" name="address"></li>
				<li><span class="shopping_list_text"><em>*</em>收 货 人：</span><input type="text" class="input" name="linkMan"></li>
				<li><span class="shopping_list_text"><em>*</em>手	机：</span><input type="text" class="input" name="phone"></li>
				<!--<li><input type="button" class="affirm"></li>-->
			</ul>
      
		</div>
	</div>
	<div class="hr_25"></div>
	<div class="shopping_item">
		<h3 class="shopping_tit">支付方式</h3>
		<div class="shopping_cont padding_shop">
			<ul class="shopping_list">
				<li><input type="radio" class="radio" id="r1"><label for="r1">微信支付</label></li>
				<li><input type="radio" class="radio" id="r2"><label for="r2">支付宝支付</label></li>
			</ul>
		</div>
	</div>
	<div class="hr_25"></div>
	
	<div class="shopping_item">
		<h3 class="shopping_tit">结算</h3>
		<div class="shopping_cont padding_shop clearfix">
			<div class="cart_count fr">
				<div class="cart_btnBox">
					<input type="submit" class="cart_btn" value="提交订单">
				</div>
			</div>
		</div>
	</div>
</div>
<form>  
<?php
require_once 'foot.php';
?>
</body>
</html>
