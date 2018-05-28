<?php
require_once 'lib/mysql.func.php';

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>首页</title>

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
			else if(isset($_COOKIE['userName'])){	
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
				<a href="index.php"><img  src="images/logo.png" alt="美妆商城"></a>
			</div>
			
			<div class="shopCar fr">
				<span class="shopText fl"><a href="doAction.php?act=shop">购物车</a></span>
				<span class="shopNum fl">0</span>
			</div>
		</div>
	</div>
	<div class="navBox">
		<div class="comWidth clearfix">
			<div class="shopClass fl">
				<h3>全部商品分类<i class="shopClass_icon"></i></h3>
				<div class="shopClass_show hide">
					<dl class="shopClass_item">
						<dt><a href="#" class="b">保湿</a> <a href="#" class="b">补水</a> <a href="#" class="aLink">祛痘</a></dt>
						<dd><a href="#">祛斑</a> <a href="#">柔肤</a> <a href="#">去角质</a></dd>
					</dl>
					<dl class="shopClass_item">
						<dt><a href="#" class="b">保湿</a> <a href="#" class="b">补水</a> <a href="#" class="aLink">祛痘</a></dt>
						<dd><a href="#">祛斑</a> <a href="#">柔肤</a> <a href="#">去角质</a></dd>
					</dl>
					<dl class="shopClass_item">
						<dt><a href="#" class="b">保湿</a> <a href="#" class="b">补水</a> <a href="#" class="aLink">祛痘</a></dt>
						<dd><a href="#">祛斑</a> <a href="#">柔肤</a> <a href="#">去角质</a></dd>
					</dl>
					<dl class="shopClass_item">
						<dt><a href="#" class="b">保湿</a> <a href="#" class="b">补水</a> <a href="#" class="aLink">祛痘</a></dt>
						<dd><a href="#">祛斑</a> <a href="#">柔肤</a> <a href="#">去角质</a></dd>
					</dl>
					
				</div>
				<div class="shopClass_list hide">
					<div class="shopClass_cont">
						<dl class="shopList_item">
							<dt>美白</dt>
							<dd>
								<a href="#">精华</a><a href="#">精华</a><a href="#">精华</a><a href="#">精华</a><a href="#">精华</a><a href="#">精华</a>
							</dd>
						</dl>
						<dl class="shopList_item">
							<dt>美白</dt>
							<dd>
								<a href="#">精华</a><a href="#">精华</a><a href="#">精华</a><a href="#">精华</a><a href="#">精华</a><a href="#">精华</a>
							</dd>
						</dl>
						<dl class="shopList_item">
							<dt>美白</dt>
							<dd>
								<a href="#">精华</a><a href="#">精华</a><a href="#">精华</a><a href="#">精华</a><a href="#">精华</a><a href="#">精华</a>
							</dd>
						</dl>
						<dl class="shopList_item">
							<dt>美白</dt>
							<dd>
								<a href="#">精华</a><a href="#">精华</a><a href="#">精华</a><a href="#">精华</a><a href="#">精华</a><a href="#">精华</a>
							</dd>
						</dl>
						<dl class="shopList_item">
							<dt>美白</dt>
							<dd>
								<a href="#">精华</a><a href="#">精华</a><a href="#">精华</a><a href="#">精华</a><a href="#">精华</a><a href="#">精华</a>
							</dd>
						</dl>
						
						
					</div>
				</div>
			</div>

<?php
	//获得所有商品分类
	$sql=" select * from cate";
	$cates=fetchAll($sql);
?>
			<ul class="nav fl">
			<?php foreach ($cates as $cate) { ?>
				<li><a href="#" class="active"><?php echo $cate['cName']; ?></a></li>
			<?php  } ?>
			</ul>
		</div>
	</div>
</div>

</body>
</html>
