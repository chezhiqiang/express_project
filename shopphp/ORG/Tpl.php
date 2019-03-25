<?php
 class Tpl extends Smarty
 {
	//处理视图文件 
	//构造方法去执行父类的构造方法 
	public function __construct()
	{
		parent::__construct();//执行父类的构造方法 
	   
	    $this->template_dir="./view/";//设置smarty视图分离中的模板的路径
        $this->compile_dir="./view_c/";//设置smarty编译文件的路径

        //$this->cache_dir = "./cache/";//设置缓存文件的路径 

        //设置两个备用属性
        //$this->left_delimiter = "<{"; 
        // $this->right_delimiter = "}>"; 	

        //$this->caching = 2; //各自生成各自的缓存周期
        //$this->cache_lifetime = 20; //缓存的时间[单位以秒为单位] 
		
		
	}
	 
	 
	 
 }
?>