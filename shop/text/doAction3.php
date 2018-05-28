<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php 
		require_once'../lib/string.func.php';
		//print_r($_FILES);
		function buildInfo(){
			$i=0;
			foreach ($_FILES as $v ){
				//单文件
				if(is_string($v['name'])){
					$files[$i]=$v;	
					$i++;
				}else{
				 //多文件
				 foreach($v['name'] as $key=>$val){
				   $files[$i]['name']=$val;
				   $files[$i]['size']=$v['size'][$key];
				   $files[$i]['tmp_name']=$v['tmp_name'][$key];
				   $files[$i]['error']=$v['error'][$key];
				   $files[$i]['type']=$v['type'][$key];
				   $i++;
				
				}
					
				}	
			}	
			return $files;
		}

function uploadFile($path="uploads",$allowExt=array("gif","jepg","png","jpg"),$maxSize=2097152,$imgFlag=true){
	if(!file_exists($path)){
	    mkdir($path,0777,true);	
	}
	$i=0;
	$files=buildInfo();
	foreach($files as $file){
	   if($file['error']===0){
		  $ext=getExt($file['name']);
		  //检查文件的扩展名
		  if(!in_array($ext,$allowExt)){
			  exit("非法文件类型");
			  
		  }
		  //检验是否是图片类型
		  if($imgFlag){
			  if(!getimagesize($file['tmp_name'])){
			      exit("不是图片类型");                
			
			  }
		  //上传文件的大小
		  if($file['size']>$maxSize){
			   exit("上传文件过大");  
		
		  }
		   if(!is_uploaded_file($file['tmp_name'])){
			  exit("不是通过HTTP POST方式上传的");	   
			   
		   } 
		     $filename=getUniName().".".$ext;
		   	 $destination=$path."/".$filename;
		     if(move_uploaded_file($file['tmp_name'],$destination)){
				$file['name'] =$filename;
				unset($file['error'],$file['tmp_name']);
				
				$uploadedFiles[$i]=$file;
				$i++;
			 }
		   
		   
		    	  
	   }
		
		
		}else{
			switch($file['error']){
		case 1:
			$mes="超过了配置文件上传文件的大小";//UPLOAD_ERR_INI_SIZE
			break;
		case 2:
			$mes="超过了表单设置上传文件的大小";			//UPLOAD_ERR_FORM_SIZE
			break;
		case 3:
			$mes="文件部分被上传";//UPLOAD_ERR_PARTIAL
			break;
		case 4:
			$mes="没有文件被上传";//UPLOAD_ERR_NO_FILE
			break;
		case 6:
			$mes="没有找到临时目录";//UPLOAD_ERR_NO_TMP_DIR
			break;
		case 7:
			$mes="文件不可写";//UPLOAD_ERR_CANT_WRITE;
			break;
		case 8:
			$mes="由于PHP的扩展程序中断了文件上传";//UPLOAD_ERR_EXTENSION
			break;
			
	      }
			echo $mes;
			
		}	
		
	}
	return $uploadedFiles;
}


$fileInfo=uploadFile();
print_r($fileInfo);
?>