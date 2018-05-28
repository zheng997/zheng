<?php 
 error_reporting(E_ALL ^ E_NOTICE);
date_default_timezone_set("PRC");
require_once '../core/user.inc.php';
require_once '../lib/page.func.php';
$rows=getAllUser();
//var_dump($rows);



//分页
$sql="select * from user";
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
$sql="select * from user limit {$offset},{$pageSize}";
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
                                <th width="10%">编号</th>
                                <th width="10%">用户名称</th>
                                <th width="10%">用户性别</th>
                                <th width="10%">邮箱邮箱</th>
                                <th width="10%">注册时间</th>
                                <th width="10%">头像</th>
                                <th>操作</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php  foreach($rows as $row){ ?>
                            <tr>
                                <!--这里的id和for里面的c1 需要循环出来-->
                                <td><input type="checkbox" id="c1" class="check"><label for="c1" class="label"><?php  echo $row['id']; ?></label></td>
                                <td><?php  echo $row['username']; ?></td>
                                <td><?php  echo $row['sex']; ?></td>
                                <td><?php echo $row['email']; ?></td>
                                 <td><?php echo date("Y-m-d H:m:s",$row['regTime']); ?></td>
                                  <td><img width="50px" height="50px" src="../uploads/<?php echo $row['face']; ?>" alt=""> </td>
                                <td align="center"><input type="button" value="修改" class="btn" onclick="javascript:location='editUser.php?id=<?php  echo $row['id']; ?>'"><input type="button" value="删除" class="btn" onclick="javascript:location='doAdminAction.php?act=delUser&id=<?php  echo $row['id']; ?>'"></td> 
                             </tr>
                     <?php } ?>                
                            <tr>
                            	<td colspan="8"><?php echo showPage($page,$totalPage,"cid=5&pid=6"); ?></td>
                            </tr>
                           
                        </tbody>
                    </table>
                </div>
</body>
</html>