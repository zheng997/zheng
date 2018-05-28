<?php
 require_once 'lib/mysql.func.php';
 $id=$_REQUEST['id'];
 //var_dump($id);
 //通过商品id获取商品信息
 $sql="select p.id,p.pName,p.pSn,p.pNum,p.mPrice,p.iPrice,p.pDesc,p.pubTime,p.isShow,p.isHot,c.cName,p.cId from pro as p join cate c on p.cId=c.id where p.id={$id}";
 $proInfo=fetchOne($sql);
 //var_dump($proInfo);
 //通过商品信息获取商品图片
 $sql="select albumPath from album where pid={$id}";
 $proImgs=fetchAll($sql);
 //var_dump($proImgs);
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>商品介绍</title>
<link type="text/css" rel="stylesheet" href="css/reset.css">
<link type="text/css" rel="stylesheet" href="css/main.css">
<!--[if IE 6]>
<script type="text/javascript" src="js/DD_belatedPNG_0.0.8a-min.js"></script>
<script type="text/javascript" src="js/ie6Fixpng.js"></script>
<![endif]-->
<link type="text/css" rel="stylesheet" media="all" href="css/jquery.jqzoom.css"/>
<script src="js/jquery-1.6.js" type="text/javascript"></script>
<script src="js/jquery.jqzoom-core.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function() {
	$('.jqzoom').jqzoom({
            zoomType: 'standard',
            lens:true,
            preloadImages: false,
            alwaysOn:false,
			title:false,
			zoomWidth:410,
			zoomHeight:410
        });
	
});
</script>
<?php  require_once 'header.php'; ?>
</head>

<body class="grey">


<div class="userPosition comWidth">
	<strong><a href="#">首页</a></strong>
	<span>&nbsp;&gt;&nbsp;</span>
	<a href="#"><?php echo $proInfo['cName']; ?></a>
	<span>&nbsp;&gt;&nbsp;</span>
	<em><?php echo $proInfo['pSn']; ?></em>
</div>
<div class="description_info comWidth">
	<div class="description clearfix">
		<div class="leftArea">
			<div class="description_imgs">
				<div class="big">
					<a href="image_800/<?php echo  $proImgs[0]['albumPath'];?>" class="jqzoom" rel='gal1'  title="triumph" >
           			 <img width="309" height="340" src="image_350/<?php  echo $proImgs[0]['albumPath'];?>"  title="triumph">
	        		</a>
				</div>
				<ul class="des_smimg clearfix" id="thumblist" >
					<?php foreach($proImgs as $key=>$proImg):?>
					<li><a class="<?php echo $key==0?"zoomThumbActive":"";?> active" href='javascript:void(0);' rel="{gallery: 'gal1', smallimage: 'image_350/<?php echo $proImg['albumPath'];?>',largeimage: 'image_800/<?php echo $proImg['albumPath'];?>'}"><img src="image_50/<?php echo $proImg['albumPath'];?>" alt=""></a></li>
					<?php endforeach;?>
				</ul>
			</div>
		</div>
		<div class="rightArea">
			<div class="des_content">
				<h3 class="des_content_tit"><?php echo $proInfo['pName']; ?></h3>
				<div class="dl clearfix">
					<div class="dt">优惠价</div>
					<div class="dd clearfix"><span class="des_money"><em>￥</em><?php echo $proInfo['iPrice']; ?>元</span></div>
				</div>
				
				<div class="des_position">
					<div class="dl clearfix">
						<div class="dt">送到</div>
						<div class="dd clearfix">
							<div class="select">
								<h3>海淀区五环内</h3><span></span>
								<ul class="show_select">
									<li>上帝</li>
									<li>五道口</li>
									<li>上帝</li>
								</ul>
							</div>
							
						</div>
					</div>
					<div class="dl clearfix">
						<div class="dt colorSelect">选择数量</div>
						<div class="dd clearfix">
							<div class="des_item des_item_acitve">
								一盒
							</div>
							<div class="des_item">
								买二送一
							</div>
							<div class="des_item">
								五盒送二盒
							</div>
						</div>
					</div>
					<div class="dl clearfix">
						
						
					</div>
					<div class="dl">
						
						
					</div>
				</div>
				
				<div class="shop_buy">
					<a href="doAction.php?act=addShop&id=<?php  echo $id; ?>" class="shopping_btn"></a>
				</div>
				
			</div>
		</div>
	</div>
</div>
<div class="hr_15"></div>
<div class="des_info comWidth clearfix">
	<div class="leftArea">
		<div class="recommend">
			<h3 class="tit">商品推荐</h3>
			<div class="item">
				<div class="item_cont">
					<div class="img_item">
						<a href="#"><img src="images/meibaolian.jpg" alt=""></a>
					</div>
					<p><a href="#">美妆美宝莲精品套装</a></p>
					<p class="money"><span color="red">￥888.00</span></p>
				</div>
			</div>
			<div class="item">
				<div class="item_cont">
					<div class="img_item">
						<a href="#"><img src="images/olay.jpg" alt=""></a>
					</div>
					<p><a href="#">玉兰油植物精华油</a></p>
					<p class="money"><span color="red">￥216.00</span></p>
				</div>
			</div>
			<div class="item">
				<div class="item_cont">
					<div class="img_item">
						<a href="#"><img src="images/see_2.jpg" alt=""></a>
					</div>
					<p><a href="#">欧诗漫精华液</a></p>
					<p class="money"><span color="red">￥326.00</span></p>
				</div>
			</div>
		</div>
	</div>
	<div class="rightArea">
		<div class="des_infoContent">
			<ul class="des_tit">
				<li class="active"><span>产品介绍</span></li>
				
			</ul>
			<div class="ad">
				<a href="#"><img src="images/detail.jpg" width="750px"></a>
			</div>
			<div class="info_text">
				<div class="info_tit">
					<h3>强烈推荐</h3>
				</div>
				<p><?php echo $proInfo['pDesc']; ?></p>
				<div class="hr_45"></div>
				<img src="images/detail1.jpg" width="750px" class="center">
				<div class="hr_45"></div>
			</div>
		</div>
		
				<div class="hr_25"></div>
			</div>
		</div>
	</div>
</div>
<?php  
		require_once 'foot.php';

		
 ?>
</body>
</html>
