<?php
require_once '../lib/string.func.php';
$filename="des_big.jpg";
thumb($filename,"image_50/".$filename,50,50,true);
thumb($filename,"image_220/".$filename,220,220,true);
thumb($filename,"image_350/".$filename,350,350,true);
thumb($filename,"image_800/".$filename,800,800,true);

function thumb($filename,$destination=null,$dst_w=null,$dst_h=null,$isReservedSource=false,$scale=0.5){
   list($src_w,$src_h,$imagetype)=getimagesize($filename);	
   if(is_null($dst_w)||is_null($dst_h)){
	  $dst_w=ceil($src_w*$scale);  
	  $dst_h=ceil($src_h*$scale);   
   }
   //获得图片类型
   $mime=image_type_to_mime_type($imagetype);
   
   $createFun=str_replace("/","createfrom",$mime);
   $outFun=str_replace("/", null, $mime);
   
   //创建画布资源
   $src_image=$createFun($filename);
   $dst_image=imagecreatetruecolor($dst_w,$dst_h);
   
   //重采样图片
	imagecopyresampled($dst_image,$src_image,0,0,0,0,$dst_w,$dst_h,$src_w,$src_h);
   //image_50/sdfsdfsdfsd.jpg
   if($destination&&!file_exists(dirname($destination))){
		mkdir(dirname($destination),0777,true);
	}
   $dstFilename=$destination==null?getUniName().".".getExt($filename):$destination;
   $outFun($dst_image,$dstFilename);
   imagedestroy($src_image);
   imagedestroy($dst_image);
   //是否保留原文件
   if(!$isReservedSource){
     // unlink($filename);
   }
    return $dstFilename;

}


?>