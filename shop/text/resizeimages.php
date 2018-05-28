<?php
$filename="des_big.jpg";
//创建一个新图像
$src_image=imagecreatefromjpeg($filename);
//获得图像的尺寸
list($src_w,$src_h)=getimagesize($filename);
$scale=0.5;
$dst_w=ceil($src_w*$scale);
$dst_h=ceil($src_h*$scale);
//创建新的图像画布
$dst_image=imagecreatetruecolor($dst_w, $dst_h);
//重新采样图像
imagecopyresampled($dst_image, $src_image,0,0,0,0, $dst_w, $dst_h, $src_w, $src_h);

header("content-type:image/jpeg");
//生成图片
imagejpeg($dst_image,"uploads/".$filename);
imagedestroy($src_image);
imagedestroy($dst_image);



?>



