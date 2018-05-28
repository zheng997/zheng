<?php 
require_once '../core/cate.inc.php';
require_once '../lib/page.func.php';

//var_dump($rows);



//分页
$sql="select * from cate";
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
$sql="select * from cate limit {$offset},{$pageSize}";
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
                            <input type="button" value="添&nbsp;&nbsp;加" class="add"  onclick="javascript:location='addCate.php'">
                        </div>
                            
                    </div>
                    <!--表格-->
                    <table class="table" cellspacing="0" cellpadding="0">
                        <thead>
                            <tr>
                                <th width="10%">编号</th>
                                <th width="20%">分类名称</th>
                             
                                <th>操作</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php  foreach($rows as $row){ ?>
                            <tr>
                                <!--这里的id和for里面的c1 需要循环出来-->
                                <td><input type="checkbox" id="c1" class="check"><label for="c1" class="label"><?php  echo $row['id']; ?></label></td>
                                <td><?php  echo $row['cName']; ?></td>
                            
                                <td align="center"><input type="button" value="修改" class="btn" onclick="javascript:location='editCate.php?id=<?php  echo $row['id']; ?>'"><input type="button" value="删除" class="btn" onclick="javascript:location='doAdminAction.php?act=delCate&id=<?php  echo $row['id']; ?>'"></td> 
                             </tr>
                     <?php } ?>                
                            <tr>
                            	<td colspan="5"><?php echo showPage($page,$totalPage,"cid=5&pid=6"); ?></td>
                            </tr>
                           
                        </tbody>
                    </table>
                </div>
</body>
</html>