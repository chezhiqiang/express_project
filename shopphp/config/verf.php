<?php
  session_start();//开启session会话
 /*绘画一个验证码*/
  header("Content-type:text/html;charset=utf-8");//设置编码字符集
  header("Cache-Control: max-age=1, s-maxage=1, no-cache, must-revalidate");
  header("Content-type: image/png;charset=utf8");
  
  $width = 120;
  $height = 60;
  
  $im = imagecreatetruecolor($width,$height);
  //画矩形
  $back_color = imagecolorallocate($im,200,200,200);
  imagefilledrectangle($im,0,0,$width,$height,$back_color);
  //画边框
  $border_color = imagecolorallocate($im,255,255,255);
  imagerectangle($im,$width,$height,$width,$height,$border_color);
  //画点
  for($i = 0;$i < 25;$i++)
  {
	$pixel_color = imagecolorallocate($im,rand(0,255),rand(0,255),rand(0,255));
    imagesetpixel($im, rand(0,$width),rand(0,$height),$pixel_color);
  }
  //画弧线
  for($i=0;$i<10;$i++)
  {
  $arc_color = imagecolorallocate($im,rand(0,255),rand(0,255),rand(0,255));
  imagearc($im,rand(0,$width),rand(0,$height),rand(0,100),rand(0,100),rand(-90,90),rand(70,360),$arc_color);
  }
  //画直线
  for($i=0;$i<5;$i++)
  {
  $line_color = imagecolorallocate($im,rand(0,255),rand(0,255),rand(0,255));
  imageline($im,rand(0,$width),rand(0,$height),rand(0,$width),rand(0,$height),$line_color );
  }
  //画内容
  $str = "23456789abcdefghjgkmnpqrstuvwxyzABCDEFGHIJKMNPQRSTUVWXYZ";
  $x = 20;
  $y = 40;
  $char_str ="";
  for($i=0;$i<4;$i++)
  {
   $char = $str[rand(0,strlen($str)-1)]; 
   $char_str .= $char;     
   $font_color = imagecolorallocate($im,rand(0,255),rand(0,255),rand(0,255));
   imagefttext($im, 20 , rand(-45,45), $x + $i*20, $y, $font_color, "ariblk.ttf", $char);
  }
  
	$_SESSION['code'] = md5(strtolower($char_str));
  



  imagepng($im);
  imagedestroy($im);
?>