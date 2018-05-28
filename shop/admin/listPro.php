<?php 
date_default_timezone_set("PRC");
 error_reporting(E_ALL ^ E_NOTICE);
 date_default_timezone_set("PRC");
require_once '../core/pro.inc.php';
require_once '../lib/page.func.php';
$order=$_REQUEST['order']?$_REQUEST['order']:null;
$orderBy=$order?"order by p.".$order:null;
//var_dump($order,$orderBy);
$rows=getAllProByAdmin();
//var_dump($rows);
//搜索
$search=$_REQUEST['search']?$_REQUEST['search']:null;
//var_dump($search);
$where=$search?"where p.pName like '%{$search}%'":null;

//分页
$sql="select p.id,p.pName,p.pSn,p.pNum,p.mPrice,p.iPrice,p.pDesc,p.pubTime,p.isShow,p.isHot,c.cName from pro as p join cate c on p.cId=c.id {$where}";
//$totalRows总数据条数
$totalRows=getResultNum($sql);
//echo $totalRows;
$pageSize=2;
//得到总页码数
$totalPage=ceil($totalRows/$pageSize);
//$page为当前页码数
$page=$_REQUEST['page']?(int)$_REQUEST['page']:1;
if($page<1||$page==null||!is_numeric($page)){
	$page=1;
}
if($page>=$totalPage)$page=$totalPage;
$offset=($page-1)*$pageSize;
$sql="select p.id,p.pName,p.pSn,p.pNum,p.mPrice,p.iPrice,p.pDesc,p.pubTime,p.isShow,p.isHot,c.cName from pro as p join cate c on p.cId=c.id {$where} {$orderBy} limit {$offset},{$pageSize}";
//echo $sql;
$rows=fetchAll($sql);

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>-.-</title>
<link rel="stylesheet" href="css/backstage.css">
<link rel="stylesheet" href="js/jquery-ui/css/ui-lightness/jquery-ui-1.10.4.custom.css"/>
<script src="js/jquery-ui/js/jquery-1.10.2.js"></script>
<script src="js/jquery-ui/js/jquery-ui-1.10.4.custom.js"></script>
<script src="js/jquery-ui/js/jquery-ui-1.10.4.custom.min.js"></script>
</head>

<body>
<div id="showDetail"  style="display:none;">

</div>
<div class="details">
                    <div class="details_operation clearfix">
                        <div class="bui_select">
                            <input type="button" value="添&nbsp;&nbsp;加" class="add" onclick="addPro()">
                        </div>
                        <div class="fr">
                            <div class="text">
                                <span>商品价格：</span>
                                <div class="bui_select">
                                    <select name="" id="" class="select" onChange="change(this.value)">
                                        <option >请选择</option>
                                        <option value="iPrice asc">由低到高</option>
                                        <option value="iPrice desc">有高到低</option>
                                     
                                    </select>
                                </div>
                            </div>
                            <div class="text">
                                <span>上架时间：</span>
                                <div class="bui_select">
                                    <select name="" id="" class="select" onChange="change(this.value)">
                                        <option >请选择</option>
                                        <option value="pubTime desc">最新发布</option>
                                        
                                      
                                    </select>
                                </div>
                            </div>
                            <div class="text">
                            <form action="listPro.php?search=search" method="post">
                                <input type="text" value="" class="search" name="search">
                                <input type="submit" value="搜索" class="btn" >
                            </form>    
                            </div>
                        </div>
                    </div>
                    <!--表格-->
                    <table class="table" cellspacing="0" cellpadding="0">
                        <thead>
                            <tr>
                                <th width="10%">编号</th>
                                <th width="10%">商品名称</th>
                                <th width="10%">商品分类</th>
                                <th width="10%">是否上架</th>
                                <th width="10%">商品价格</th>
                                <th width="10%">上架时间</th>
                                <th>操作</th>
                            </tr>
                        </thead>
                        <tbody>
                        
                          <?php 
						  //if(is_array($rows)){
						   		foreach($rows as $row) {      
						     ?>
                            <tr>
                                <!--这里的id和for里面的c1 需要循环出来-->
                                <td><input type="checkbox" id="c1" class="check"  value="<?php echo $row['id']; ?>"><label for="c1" class="label"><?php echo $row['id']; ?></label></td>
                                <td><?php echo $row['pName']; ?></td>
                                <td><?php echo $row['cName']; ?></td>
                                <td><?php echo $row['isShow']==0?"上架":"下架"; ?></td>
                                <td><?php echo $row['iPrice']; ?></td>
                                <td><?php echo date ("Y-m-d H:m:s",$row['pubTime']); ?></td>
                                
                                <td align="center">
                                				<input type="button" value="详情" class="btn" onclick="showDetail(<?php echo $row['id'];?>,'<?php echo $row['pName'];?>')"><input type="button" value="修改" class="btn" onclick="javascript:location='editPro.php?id=<?php  echo $row['id']; ?>'"> <input type="button" value="删除" class="btn" onclick="javascript:location='doAdminAction.php?act=delPro&id=<?php  echo $row['id']; ?>'">
					                           
                                                <div id="showDetail<?php echo $row['id'];?>" style="display:none;">
					                        	<table class="table" cellspacing="0" cellpadding="0">
					                        		<tr>
					                        			<td width="20%" align="right">商品名称</td>
					                        			<td><?php echo $row['pName'];?></td>
					                        		</tr>
					                        		<tr>
					                        			<td width="20%"  align="right">商品类别</td>
					                        			<td><?php echo $row['cName'];?></td>
					                        		</tr>
					                        		<tr>
					                        			<td width="20%"  align="right">商品货号</td>
					                        			<td><?php echo $row['pSn'];?></td>
					                        		</tr>
					                        		<tr>
					                        			<td width="20%"  align="right">商品数量</td>
					                        			<td><?php echo $row['pNum'];?></td>
					                        		</tr>
					                        		<tr>
					                        			<td  width="20%"  align="right">商品价格</td>
					                        			<td><?php echo $row['mPrice'];?></td>
					                        		</tr>
					                        		<tr>
					                        			<td  width="20%"  align="right">市场价格</td>
					                        			<td><?php echo $row['iPrice'];?></td>
					                        		</tr>
					                        		<tr>
					                        			<td width="20%"  align="right">商品图片</td>
					                        			<td>
					                        			<?php 
														
														   $proImgs=getAllImgByProId($row['id']);
														   foreach($proImgs as $img)	{
														   
														?>
                                                           <img  width="100" height="100" src="../image_220/<?php echo $img['albumPath'] ?>" alt="" >
                                                        
                                                        
                                                        <?php } ?>
					                        			</td>
					                        		</tr>
					                        		<tr>
					                        			<td width="20%"  align="right">是否上架</td>
					                        			<td>
					                        			<?php 
					                        				$show=($row['isShow']==0)?"上架":"下架";
															echo $show;
					                        			?>
					                        			</td>
					                        		</tr>
					                        		<tr>
					                        			<td width="20%"  align="right">是否热卖</td>
					                        			<td>
					                        			<?php 
					                        				$show=($row['isHost']==0)?"热卖":"正常";
															echo $show;
					                        			?>
					                        			</td>
					                        		</tr>
					                        	</table>
					                        	<span style="display:block;width:80%; ">
					                        	商品描述<br/>
					                        	<?php echo $row['pDesc'];?>
					                        	</span>
					                        </div>
                                
                                </td>
                            </tr>
                            <?php }
						       //}
							 ?> 
                         <td colspan="7"><?php echo showPage($page,$totalPage,"search={$search}&order={$order}"); ?></td>
                           
                        </tbody>
                    </table>
                </div>
<script type="text/javascript">
function showDetail(id,t){
	$("#showDetail"+id).dialog({
		  height:"auto",
	      width: "auto",
	      position: {my: "center", at: "center",  collision:"fit"},
	      modal:false,//是否模式对话框
	      draggable:true,//是否允许拖拽
	      resizable:true,//是否允许拖动
	      title:"商品名称："+t,//对话框标题
	      show:"slide",
	      hide:"explode"
	});
}
	function addPro(){
		window.location='addPro.php';
	}
	
	function change(val){
	  window.location="listPro.php?order="+val;
	}
</script>
</body>
</html>