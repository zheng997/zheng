<?php
require_once'string.func.php';
  //通过GD库做验证码
  //创建画布
  $width=80;
  $height=28;
  $image=imagecreatetruecolor($width,$heisht);
  $white=imagecolorallocate($image,255,255,255);
  $black=imagecolorallocate($image,0,0,0);
  //用填充矩形填充画布
  $type=1;
  $length=4;
  imagefilledrectangle($image,1,1,$width-2,$height-2,$white);
  $chars= buildRandomString ($type,$length);
  //传值到SESSION
  $sess_name="verify";
  $_SESSION[$sess_name]=$chars;
  $fontfiles=array("msyh.ttf","msyhbd.ttf","simkai.ttf");//字体数组
  for($i=0;$i<$length;$i++){
	 $size=mt_rand(14,18);
	 $angle=mt_rand(-15,15);
	 $x=5+$i*$size;
	 $y=mt_rand(20,26);
	 $fonfile="../fonts/".$fontfiles[mt_rand(0,count($fontfiles)-1)]; 
	 $color=imagecolorallocate($image,mt_rand(50,90),mt_rand(80,200),mt_rand(90,180));
	 
	 $text=substr($chars,$i,1);
	  imagettftext($image,$size,$angle,$x,$y,$color,$fontfile,$text);
	 }
	 header("content-type:image/gif");
	 imagegif($image);//显示画布
	 imagedestroy($image);//销毁图像资源
	 


?>