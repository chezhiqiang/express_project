<?php
  session_start();//����session�Ự
 /*�滭һ����֤��*/
  header("Content-type:text/html;charset=utf-8");//���ñ����ַ���
  header("Cache-Control: max-age=1, s-maxage=1, no-cache, must-revalidate");
  header("Content-type: image/png;charset=utf8");
  
  $width = 120;
  $height = 60;
  
  $im = imagecreatetruecolor($width,$height);
  //������
  $back_color = imagecolorallocate($im,200,200,200);
  imagefilledrectangle($im,0,0,$width,$height,$back_color);
  //���߿�
  $border_color = imagecolorallocate($im,255,255,255);
  imagerectangle($im,$width,$height,$width,$height,$border_color);
  //����
  for($i = 0;$i < 25;$i++)
  {
	$pixel_color = imagecolorallocate($im,rand(0,255),rand(0,255),rand(0,255));
    imagesetpixel($im, rand(0,$width),rand(0,$height),$pixel_color);
  }
  //������
  for($i=0;$i<10;$i++)
  {
  $arc_color = imagecolorallocate($im,rand(0,255),rand(0,255),rand(0,255));
  imagearc($im,rand(0,$width),rand(0,$height),rand(0,100),rand(0,100),rand(-90,90),rand(70,360),$arc_color);
  }
  //��ֱ��
  for($i=0;$i<5;$i++)
  {
  $line_color = imagecolorallocate($im,rand(0,255),rand(0,255),rand(0,255));
  imageline($im,rand(0,$width),rand(0,$height),rand(0,$width),rand(0,$height),$line_color );
  }
  //������
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