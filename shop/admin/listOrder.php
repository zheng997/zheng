<?php 
 error_reporting(E_ALL ^ E_NOTICE);
date_default_timezone_set("PRC");
require_once '../core/order.inc.php';
require_once '../lib/page.func.php';
$rows=getAllOrder();
//var_dump($rows);



//分页
$sql="SELECT * from `order`";
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
$sql="select * from `order` limit {$offset},{$pageSize}";
//echo $sql;
$rows=fetchAll($sql);

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>-.-</title>
<link rel="stylesheet" href="css/backstage.css">
</head>

<body>
<div class="details">
                    <div class="details_operation clearfix">
                        <div class="bui_select">
                            <input type="button" value="添&nbsp;&nbsp;加" class="add"  onclick="javascript:location='addUser.php'">
                        </div>
                            
                    </div>
                    <!--表格-->
                    <table class="table" cellspacing="0" cellpadding="0">
                        <thead>
                            <tr>
                                <th width="10%">订单编号</th>
                                <th width="10%">用户名称</th>
                                <th width="10%">联系人</th>
                                <th width="10%">地址</th>
                                <th width="10%">电话</th>
                                <th width="10%">金额</th>
                                <th width="10%">时间</th>
                                <th width="10%">订单状态</th>
                                <th>操作</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php  foreach ($rows as $row) {
                            
                        ?>
                            <tr>
                                <!--这里的id和for里面的c1 需要循环出来-->
                                <td><input type="checkbox" id="c1" class="check"><label for="c1" class="label"><?php  echo $row['oid']; ?></label></td>
                                <td><?php  echo $row['username']; ?></td>
                                <td><?php echo $row['linkMan']; ?></td>
                                <td><?php echo $row['address']; ?></td>
                                 <td><?php  echo $row['phone']; ?></td>
                                 <td><?php  echo $row['totalPrice']; ?></td>
                                 <td><?php  echo date("Y-m-d H:m:s",$row['date']); ?></td>
                                  <td><?php 
                                        if($row['orderState']==0){
                                            echo '未付款';
                                        }
                                        elseif($row['orderState']==1){
                                            echo "已付款";
                                        }

                                   ?>  </td>
                                <td align="center"><input type="button" value="删除" class="btn" onclick="javascript:location='doAdminAction.php?act=delOrder&id=<?php  echo $row['oid']; ?>'"></td> 
                             </tr>
                     <?php }  ?>                
                            <tr>
                            	<td colspan="10"><?php echo showPage($page,$totalPage,"cid=5&pid=6"); ?></td>
                            </tr>
                           
                        </tbody>
                    </table>
                </div>
</body>
</html>