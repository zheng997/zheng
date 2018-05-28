<?php
require_once 'lib/mysql.func.php';
require_once 'core/user.inc.php';

//获得所有商品分类
$sql=" select * from cate";
$cates=fetchAll($sql);
//var_dump($cates);

  

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
<?php  require_once 'header.php'; ?>

<center>
	<div style="margin-top:-20px; ">
	<?php {

		require_once 'banner.html';

		}?> 
	</div>
</center>

<?php foreach ($cates as $cate){ ?>
<div class="shopTit comWidth">

	<span class="icon"></span><h3><?php echo $cate['cName']; ?></h3>
	<a href="#" class="more">更多&gt;&gt;</a>
  
</div>
<div class="shopList comWidth clearfix">
	<div class="leftArea">
		<div class="banner_bar banner_sm">
			<ul class="imgBox">
				<li><a href="#"><img src="images/F1_left.png" alt="banner"></a></li>
				<li><a href="#"><img src="images/banner/banner_sm_02.jpg" alt="banner"></a></li>
			</ul>
			<div class="imgNum">
				<a href="#" class="active"></a><a href="#"></a><a href="#"></a><a href="#"></a>
			</div>
		</div>
	</div>
    
	<div class="rightArea">
		<div class="shopList_top clearfix">
         <?php 
       //获得分类下的商品
		$cId=$cate['id'];
		$sql="select p.id,p.pName,p.pSn,p.pNum,p.mPrice,p.iPrice,p.pDesc,p.pubTime,p.isShow,p.isHot,c.cName from pro as p join cate c on p.cId=c.id  where p.cId={$cId} limit 4 ";
		$pros=fetchAll($sql);
		//var_dump($pros);
        foreach ($pros as $pro){
		//根据商品id获取图片
		$pid=$pro['id'];
		$sql="select albumPath from album where pid={$pid} limit 1"	;
		$proImgs=fetchAll($sql);
		
		foreach($proImgs as $proImg){
		//var_dump($proImg['albumPath']);
        ?> 
			<div class="shop_item">
				<div class="shop_img">
					<a href="proDetails.php?id=<?php echo $pro['id']; ?>" target="_blank"><img width="202px" height="218px" src="image_220/<?php echo $proImg['albumPath']; ?>" alt=""></a>
				</div>
				<h3><?php echo $pro['pName'] ?></h3>
				<p><?php echo $pro['iPrice'] ?>元</p>
			</div>
		
        <?php } }?>  
        </div>
		<div class="shopList_sm clearfix">
        	
    <?php 
       //获得分类下的商品
		$cId=$cate['id'];
		$sql="select p.id,p.pName,p.pSn,p.pNum,p.mPrice,p.iPrice,p.pDesc,p.pubTime,p.isShow,p.isHot,c.cName from pro as p join cate c on p.cId=c.id  where p.cId={$cId} limit 4,4 ";
		$proSmalls=fetchAll($sql);
		//var_dump($pros);
        foreach ($proSmalls as $proSmall){
		//根据商品id获取图片
		$pid=$pro['id'];
		$sql="select albumPath from album where pid={$pid} limit 1"	;
		$proSmallImgs=fetchAll($sql);
		
		foreach($proSmallImgs as $proSmallImg){
		//var_dump($proImg['albumPath']);
   ?>      
			<div class="shopItem_sm">
				<div class="shopItem_smImg">
					<a href="proDetails.php?id=<?php echo $proSmall['id']; ?>" target="_blank"><img src="image_220/<?php echo $proSmallImg['albumPath']; ?>" alt=""></a>
				</div>
				<div class="shopItem_text">
					<p><?php echo $proSmall['pName'] ?></p>
					<h3><?php echo $proSmall['iPrice'] ?>元</h3>
				</div> 
          </div>
       <?php } }?>      
		</div>
      
	</div>
</div>

<?php } 

require_once 'foot.php';

?> 

</body>
</html>
