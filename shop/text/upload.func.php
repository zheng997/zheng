<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
require_once'../lib/string.func.php';
//print_r($_FILES);

//$filename=$_FILES['myFile']['name'];
//$type=$_FILES['myFile']['type'];
//$tmp_name=$_FILES['myFile']['tmp_name'];
//$error=$_FILES['myFile']['error'];
//$size=$_FILES['myFile']['size'];


function uploadFile($fileinfo,$allowExt=array("gif","jpeg","jpg","png"),$maxSize=1048576,$imgFlag=true){

	//限制可以上传的文件类型
	//$allowExt=array("gif","jpeg","jpg","png");
	//限制可以上传的文件大小
	//$maxSize=1048576;
	//验证是否是真正的图片类型
	//$imgFlag=true;
	$ext=getExt($fileinfo['name']);
		if($fileinfo['error']==0){
			//判断是否限制的上传文件类型
			if(!in_array($ext,$allowExt)){
				exit("非法文件类型");
				
			}
			//判断文件大小是不是超出限制大小
		if($fileinfo['size']>$maxSize){
		
				 exit("文件过大");
			
			}	
			//判断是否是真正的图片类型
			if($imgFlag){
				//用getimagesize($filename);验证文件是否是图片类型
				$info=getimagesize($fileinfo['tmp_name']);
				//var_dump($info);
			  if(!$info){
			  exit("不是真正的图片类型");
			}
				
			}
		
		
		
		//需要判断下文件是否是通过HTTP POST方式上传上来的
		//is_uploaded_file($tmp_name):
	
		$filename=getUniName().".".$ext;
		
		$destination="uploads/".$filename;
		if(is_uploaded_file($fileinfo['tmp_name'])){
			if(move_uploaded_file($fileinfo['tmp_name'], $destination)){
				$mes="文件上传成功";
			}else{
				$mes="文件移动失败";
			}
		}else{
			$mes="文件不是通过HTTP POST方式上传上来的";
		}
		
		}
	else{
		switch($error){
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
	}

		echo $mes;

}

?>



