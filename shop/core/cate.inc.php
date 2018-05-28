<?php
require_once '../lib/mysql.func.php';
//添加分类
 function addCate(){
	  $arr=$_POST;
		 if(insert("cate",$arr)){
			 $mes="添加成功<br/>
			 <a href='addCate.php'>添加分类</a>
			 <a href='listCate.php'>查看分类</a>";
			 }
			 else{
				 $mes="添加失败<br/>
			 <a href='addCate.php'>重新添加</a>";
				 }
		 return $mes;
	  }
	 
  //修改分类	 
  function	editCate(){
	  		$arr=$_POST;
		  $id=$_POST['id'];
	
		  if(update("cate",$arr,"id=$id")){
			  $mes="修改成功<br/>
			
			 <a href='listCate.php'>查看管理员</a>";
			  }
			  else{
				 $mes="修改失败<br/>
			  <a href='listCate.php'>查看管理员</a>";
				 }
		return $mes;		 
	  
	  
	  }
	//删除分类
	function delCate($id){
	   //检查是否有产品	
	   $sql="select * from pro where cId={$id}";
	   $rows=fetchALL($sql);
	   //var_dump($rows);
	   if(!$rows){
		   if(delete("cate","id=$id")){
				  $mes="删除成功<br/>
				 <a href='listCate.php'>查看管理员</a>";
				  }
				  else{
					 $mes="删除失败<br/>
				  <a href='listCate.php'>查看管理员</a>";
					 }
	   }
	   else{
	       	echo "<script> alert('该分类下有商品，请先删除分类下的商品'); </script>";
			echo "<script> window.location='listPro.php'; </script>";
	   
	   }
		 
			return $mes;	
	   
	}	 
	
   
?>