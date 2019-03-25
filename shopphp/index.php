<?php
	//定义函数 文件自动加载
	function __autoload($name)
	{
		//加载核心文件
		//加载控制层
		if(file_exists("./controller/".ucfirst($name).".php"))
		{
			require("./controller/".ucfirst($name).".php");
		}
		//加载smarty核心类库
		else if(file_exists("./libs/".ucfirst($name).".class.php"))
		{
			require("./libs/".ucfirst($name).".class.php");
		}
		//加载smarty核心类库
		else if(file_exists("./libs/sysplugins/".ucfirst($name).".php"))
		{
			require("./libs/sysplugins/".ucfirst($name).".php");
		}
		//加载model层
		else if(file_exists("./model/".ucfirst($name).".class.php"))
		{
			require("./model/".ucfirst($name).".class.php");
		}
		//加载视图文件
		else if(file_exists("./ORG/".ucfirst($name).".php"))
		{
		  require("./ORG/".ucfirst($name).".php");
		}
		else{
			die ("你没有该".$name."类");
		}
	}
	
	//加载配置文件
	include("./config/config.php");
	//定义入口规则
	//定义控制层路由
	$c = isset($_GET['c']) ? $_GET['c'] : "login";
	$dom = ucfirst($c)."Controller";
	$controller = new $dom;
	$controller->init();
	



?>