<?php
  class Controller extends Tpl
  {
	//init配置文件方法 
    //定义&a=login 路由规则
	public function init()
	{
    $a = isset($_GET['a']) ? $_GET['a'] : "login";
    //echo ($a);die;
    if(method_exists($this,$a))
	{
		$this->$a();
	}else
	{
		die("你没有该方法".$a);
	}
	
	} 
	  
  }



?>