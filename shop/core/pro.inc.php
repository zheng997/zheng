<?php
require_once '../lib/mysql.func.php';
require_once '../lib/image.func.php';
require_once '../lib/upload.func.php';
require_once '../core/album.inc.php';

//添加商品
	function addPro(){
	   $arr=$_POST;
	   $arr['pubTime']=time();
	   $path="./uploads";
	   $uploadFiles=uploadFile($path);
	   if(is_array($uploadFiles)&&$uploadFiles){
		   foreach($uploadFiles as $key=>$uploadFile){
			  //生成缩略图 
			 thumb($path."/".$uploadFile['name'],"../image_50/".$uploadFile['name'],50,50);
			 thumb($path."/".$uploadFile['name'],"../image_220/".$uploadFile['name'],220,220);
			 thumb($path."/".$uploadFile['name'],"../image_350/".$uploadFile['name'],350,350);
			 thumb($path."/".$uploadFile['name'],"../image_800/".$uploadFile['name'],800,800);
		   
		}
		$res=insert("pro",$arr);
		$pid=getInsertId();
		if($res&&$pid){
			foreach($uploadFiles as $uploadFile){
				
			  $arr1['pid']=$pid;
			  $arr1['albumPath']=$uploadFile['name'];
			  addAlbum($arr1);
			}
			$mes="<p>添加成功</p><a href='addPro.php' target='mainFrame'>继续添加</a>|<a href='listPro.php' target='mainFrame'>查看商品列表</a>";
		}else{
			foreach($uploadFiles as $uploadFile ){
			   if(file_exists("../image_800".$uploadFile['name'])){
					unlink("../image_800".$uploadFile['name']);   
				}
				if(file_exists("../image_50".$uploadFile['name'])){
					unlink("../image_50".$uploadFile['name']);   
				}
				if(file_exists("../image_220".$uploadFile['name'])){
					unlink("../image_220".$uploadFile['name']);   
				}
				if(file_exists("../image_350".$uploadFile['name'])){
					unlink("../image_350".$uploadFile['name']);   
				}
			}
		$mes="<p>添加失败</p><a href='addPro.php' target='mainFrame'>重新添加</a>";
			
		}
		echo $mes;
	}
	
	}
	
	
	//修改商品数据
  function editPro($id){
  	   $arr=$_POST;
	   $path="./uploads";
	   $uploadFiles=uploadFile($path);
	   if(is_array($uploadFiles)&&$uploadFiles){
			   foreach($uploadFiles as $key=>$uploadFile){
				  //生成缩略图 
				 thumb($path."/".$uploadFile['name'],"../image_50/".$uploadFile['name'],50,50);
				 thumb($path."/".$uploadFile['name'],"../image_220/".$uploadFile['name'],220,220);
				 thumb($path."/".$uploadFile['name'],"../image_350/".$uploadFile['name'],350,350);
				 thumb($path."/".$uploadFile['name'],"../image_800/".$uploadFile['name'],800,800);
			   
			}
	   }
		$res=update("pro",$arr,"id={$id}");
		$pid=$id;
		if($res&&$pid){
			if($uploadFiles&&is_array($uploadFiles)){
				foreach($uploadFiles as $uploadFile){
				  $arr1['pid']=$pid;
				  $arr1['albumPath']=$uploadFile['name'];
				  addAlbum($arr1);
				}
			}
			$mes="<p>修改成功</P> <a href='listPro.php' target='mainFrame'>查看商品列表</a>";
		}else{
		 if($uploadFiles&&is_array($uploadFiles)){	 
				foreach($uploadFiles as $uploadFile ){
				   if(file_exists("../image_800".$uploadFile['name'])){
						unlink("../image_800".$uploadFile['name']);   
					}
					if(file_exists("../image_50".$uploadFile['name'])){
						unlink("../image_50".$uploadFile['name']);   
					}
					if(file_exists("../image_220".$uploadFile['name'])){
						unlink("../image_220".$uploadFile['name']);   
					}
					if(file_exists("../image_350".$uploadFile['name'])){
						unlink("../image_350".$uploadFile['name']);   
					}
				}
		 }
		$mes="<p>修改失败</p><a href='listPro.php' target='mainFrame'>查看商品列表</a>";
			
		}
		echo $mes;
	}
	
  //删除商品
  function delPro($id){
	  error_reporting(E_ALL ^ E_NOTICE);
    $where="id=$id";
	$res=delete("pro",$where);
	$sql="select albumPath from album where pid={$id}";
	 $proImgs=fetchAll($sql);
	//var_dump($proImgs);
	
	if($proImgs&&is_array($proImgs)){
	   foreach($proImgs as $proImg)
	   {
		   if(file_exists("upload/".$proImg['albumPath'])){
		     unlink("upload/".$proImg['albumPath']);
		   }
	        if(file_exists("../image_50/".$proImg['albumPath'])){
		     unlink("../image_50/".$proImg['albumPath']);
		   }
		     if(file_exists("../image_220/".$proImg['albumPath'])){
		     unlink("../image_220/".$proImg['albumPath']);
		   }
		     if(file_exists("../image_350/".$proImg['albumPath'])){
		     unlink("../image_350/".$proImg['albumPath']);
		   }
		     if(file_exists("../image_800/".$proImg['albumPath'])){
		     unlink("../image_800/".$proImg['albumPath']);
		   }
		   
	   }
	   $where1="pid={$id}";
	  $res1=delete("album",$where1);
	  if($res&&$res1){
		$mes="<p>删除成功</p><a href='listPro.php' target='mainFrame'>查看列表</a>";  
      }else{
		$mes="<p>删除失败</p><a href='listPro.php' target='mainFrame'>查看列表</a>";  
	  }
	  return $mes;
	}
 
  }
  

	
	
	//获取商品数据
	function getAllProByAdmin(){
		$sql="select p.id,p.pName,p.pSn,p.pNum,p.mPrice,p.iPrice,p.pDesc
		,p.pubTime,p.isShow,p.isHot,c.cName from pro as p join cate c on p.cId=c.id";
		$rows=fetchAll($sql);
		return $rows;
	}
   //根据商品id获取商品信息
	function getProById($id){
		$sql="select p.id,p.pName,p.pSn,p.pNum,p.mPrice,p.iPrice,p.pDesc,p.pubTime,p.isShow,p.isHot,c.cName,p.cId from pro as p join cate c on p.cId=c.id where p.id={$id}";
		$row=fetchOne($sql);
		return $row;
}
	
   //根据商品id获取商品图片
   function getAllImgByProId($id){
	   
	    $sql="select a.albumPath from album a where pid={$id}";
	    $rows=fetchAll($sql);
	    return $rows;
   }
	
?>