<?php
$filename="des_big.jpg";
//获得图像的尺寸和类型
list($src_w,$src_h,$imagetype)=getimagesize($filename);
$mime=image_type_to_mime_type($imagetype);
//echo $mime;//image/jpeg
//将$mime中的/替换
$createFun=str_replace("/","createfrom",$mime);

$outFun=str_replace("/",null,$mime);
$src_image=$createFun($filename);

//创建画布
$dst_50_image=imagecreatetruecolor(50,50);
$dst_220_image=imagecreatetruecolor(220,220);
$dst_350_image=imagecreatetruecolor(350,350);
$dst_800_image=imagecreatetruecolor(800,800);

//采样复制
imagecopyresampled($dst_50_image,$src_image,0,0,0,0,50,50,$src_w,$src_h);
imagecopyresampled($dst_220_image,$src_image,0,0,0,0,220,220,$src_w,$src_h);
imagecopyresampled($dst_350_image,$src_image,0,0,0,0,350,350,$src_w,$src_h);
imagecopyresampled($dst_800_image,$src_image,0,0,0,0,800,800,$src_w,$src_h);
//保存图像
$outFun($dst_50_image,"uploads/image_50/".$filename);
$outFun($dst_220_image,"uploads/image_220/".$filename);
$outFun($dst_350_image,"uploads/image_350/".$filename);
$outFun($dst_800_image,"uploads/image_800/".$filename);

imagedestroy($dst_50_image);
imagedestroy($dst_220_image);
imagedestroy($dst_350_image);
imagedestroy($dst_800_image);


?>



