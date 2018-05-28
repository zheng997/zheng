<?php
require_once '../lib/mysql.func.php';

//订单查询显示
	function getAllOrder(){
		$sql="select * from order";
		$row=fetchAll($sql);
		
		return $row;
		}
	
   //订单删除
	function delOrder($id){
		

			if(delete("`order`","oid=$id")){
				  $mes="删除成功<br/>
				 <a href='listOrder.php'>查看订单</a>";
				  }
				  else{
					 $mes="删除失败<br/>
				  <a href='listOrder.php'>查看订单</a>";
					 }
		   return $mes;		
	}
?>