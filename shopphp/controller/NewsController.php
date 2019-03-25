<?php
	header("Content-Type:text/html;charset=utf-8");//编码格式
    session_start();//开启session会话
class NewsController extends Controller
{
  //商品查看
   public function index()
   {
   $model = new Model("news as n,category_id as c");
   
   //搜索功能
   $serch = !empty($_GET['serch']) ? $_GET['serch'] : "";
   $where = "";
   if($serch != "")
   {
	  $where = "title like '%{$serch}%' and n.category_id = c.id"; 
   }else{
	  $where = "n.category_id = c.id";
   }
	    /*查询数据库内容 */
   $pageSize = 5;//固定显示5条数据 
   $pagenum = !empty($_GET['p']) ? $_GET['p'] : 1;//得到当前用户点击的页数
   $curpage = ($pagenum - 1) * $pageSize;//得到偏移量;
   $data = $model->dbgetlist("n.img,n.title,n.price,n.fuel,n.zhuang,n.category_id,n.id,c.names,c.pid",$where,"order by n.id desc","{$curpage},{$pageSize}");
   
   $totlepage = $model->counts($where);
   //echo ($totlepage);die;
   
   $pageNumber = ceil($totlepage / $pageSize); //得到总页数
   //echo ($pageNumber);die;
   
    //控制总页数  固定显示5页
    $pageshow =3;//固定显示5页
   
    $pagecur = floor($pageshow / 2);//得到偏移量
	
	$startpage = $pagenum - $pagecur;//得到起始页  -1 0 1 2 3
	
	//echo ($startpage);
	//echo ("<hr>");
	$endpage =  $pagenum + $pagecur;//得到尾页
	//echo ($endpage);	
	
	//判断起始页和尾页
	if($pageNumber > $pageshow)
	{
		if($startpage < 1)
		{
			$startpage = 1;
			//echo ($startpage);die;
			$endpage = $startpage + $pageshow -1;  // 5
			
			//echo ($endpage);die;
		}
		
		if($endpage > $pageNumber)
		{
			$endpage = $pageNumber;
			$startpage = $endpage - $pageshow+ 1;
			
		}
	 //不足5页情况
	}else
	{
	  	$startpage = 1;
		$endpage = $pageNumber;
	}
    //echo ($endpage);die;
    $page_str = "";//声明空字符串保存分页数据 
	$page_str .= '<li><a href="index.php?c=news&a=index&p=1">首页</a></li>';
	$page_str .= '<li><a href="index.php?c=news&a=index&serch='.$serch.'&p='.(($pagenum-1) < 1 ? 1 : ($pagenum-1)).'" title="Previous Page">上一页</a></li>';
	for($i = $startpage;$i<=$endpage;$i++)
	{
		//echo ($i);
    $class = ($i == $pagenum) ? "active current" : "current";		
	$page_str .= '<li class="'.$class.'"><a href="index.php?c=news&serch='.$serch.'&a=index&serch='.$serch.'&p='.$i.'"  title="'.$i.'">'.$i.'</a></li>'; 
	}
   //die;	
	$page_str .= '<li><a href="index.php?c=news&a=index&serch='.$serch.'&p='.(($pagenum+1) > $pageNumber ? $pageNumber : ($pagenum+1)).'" title="Next Page">下一页</a></li>';
	$page_str .= '<li><a href="index.php?c=news&a=index&p='.$pageNumber.'">尾页</a></li>';
	

	   
	   
	   //是否是以ajax提交数据
	  if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']))
	  {

		$sc = array("data"=>$data,"page"=>$page_str);
		echo (json_encode($sc));
	  }
	  else
	  {
		 	  
	  $this->assign("data",$data);
      $this->assign("page",$page_str);	  
	  $this->assign("session",$_SESSION['username']);
	  $this->display("view/news/index.html"); 
	  }
	 
   }   
   
   //商品删除
   public function del()
   {
	   if(!empty($_GET))
	   {
		  $model = new Model("news");
		  $id = !empty($_GET['id']) ? $_GET['id'] : 1;
		  $model->dbgetone("id={$id}");
		  $model->dbgetdel($id);
		  echo ("<script>alert('删除成功');location.href='index.php?c=news&a=index'</script>");
		  
		     
	   }   
   }
   
   //商品添加
    public function add()
   {
	  if(!empty($_POST))
	   {
		   if($_FILES['img']['size'] > 1024 * 1024)
		{
			echo ("你的图片太大");die;
		}
		//控制图片格式
		$file_type = array(".png",".jpg",".gif");
		$file_tmp = substr($_FILES['img']['name'],strrpos($_FILES['img']['name'],"."));
		if(!in_array($file_tmp,$file_type))
		{
			echo ("图片格式不对，请重新上传");die;
		}
		//文件上传名字
		$flie_name = time().rand(1000,9999).$file_tmp;
		//控制上传文件
		$flie_url = "./public/images";
		if(!file_exists($flie_url))
		{
			mkdir($flie_url);
		}
		$flie_url = $flie_url."/".$flie_name;
		move_uploaded_file($_FILES['img']['tmp_name'],$flie_url);
		  //print_r($_POST);die;  

		 $img=$flie_url;
		 //print_r ($img);die;
		 $_POST['img'] = $img;
		 
         $model = new Model("news"); 
         $model->dbinsert($_POST);
		 echo ("<script>alert('添加成功');location.href='index.php?c=news&a=index'</script>");
		  
	   }
	   
	  $this->display("view/news/add.html"); 
   }
   //商品修改
	public function upd()
	{
		
		if(!empty($_GET))
	   {
		   $id = !empty($_GET['id']) ? $_GET['id'] : 1;
		   $model = new Model("news");
		   $res = $model->dbgetone("id={$id}");
			$this->assign("aa",$res);
	   }
	   if(!empty($_POST))
	   {
		   if($_FILES['img']['size'] > 1024 * 1024)
		{
			echo ("你的图片太大");die;
		}
		//控制图片格式
		$file_type = array(".png",".jpg",".gif");
		$file_tmp = substr($_FILES['img']['name'],strrpos($_FILES['img']['name'],"."));
		if(!in_array($file_tmp,$file_type))
		{
			echo ("图片格式不对，请重新上传");die;
		}
		//文件上传名字
		$flie_name = time().rand(1000,9999).$file_tmp;
		//控制上传文件
		$flie_url = "./public/images";
		if(!file_exists($flie_url))
		{
			mkdir($flie_url);
		}
		$flie_url = $flie_url."/".$flie_name;
		move_uploaded_file($_FILES['img']['tmp_name'],$flie_url);
		  //print_r($_POST);die;  

		 $img=$flie_url;
		 //print_r ($img);die;
		 $_POST['img'] = $img;
		
		 
		  $model = new Model("news");
		  $id = !empty($_POST['id']) ? $_POST['id'] : 1;
			//echo ($id);die;
		  $model->dbedit($id,$_POST);
		  echo ("<script>alert('修改成功');location.href='index.php?c=news&a=index'</script>");
	   }
	   $this->display("view/news/update.html"); 
	}
	
	//商品下架
	 public function shelve()
	 {
		 if(!empty($_GET))
		 {
			$model = new Model("news");
			$id = !empty($_GET['id']) ? $_GET['id'] : 1;
			$arr = array();
			$arr['zhuang'] = "下架";
			$model->dbedit($id,$arr);
			echo ("<script>alert('下架成功');location.href='index.php?c=news&a=index'</script>");
		 }			 
	 }
	 //蔬菜
   public function shucai()
   {
   $model = new Model("news as n,category_id as c");
   
   //搜索功能
   $serch = !empty($_GET['serch']) ? $_GET['serch'] : "";
   $where = "";
   if($serch != "")
   {
	  $where = "category_id like '%{$serch}%' and n.category_id = c.id"; 
   }else{
	  $where = "n.category_id = c.id and n.category_id = 2";
   }
	    /*查询数据库内容 */
   $pageSize = 5;//固定显示5条数据 
   $pagenum = !empty($_GET['p']) ? $_GET['p'] : 1;//得到当前用户点击的页数
   $curpage = ($pagenum - 1) * $pageSize;//得到偏移量;
   $data = $model->dbgetlist("n.img,n.title,n.price,n.fuel,n.zhuang,n.category_id,n.id,c.names,c.pid",$where,"order by n.id desc","{$curpage},{$pageSize}");
   
   $totlepage = $model->counts($where);
   //echo ($totlepage);die;
   
   $pageNumber = ceil($totlepage / $pageSize); //得到总页数
   //echo ($pageNumber);die;
   
    //控制总页数  固定显示5页
    $pageshow =3;//固定显示5页
   
    $pagecur = floor($pageshow / 2);//得到偏移量
	
	$startpage = $pagenum - $pagecur;//得到起始页  -1 0 1 2 3
	
	//echo ($startpage);
	//echo ("<hr>");
	$endpage =  $pagenum + $pagecur;//得到尾页
	//echo ($endpage);	
	
	//判断起始页和尾页
	if($pageNumber > $pageshow)
	{
		if($startpage < 1)
		{
			$startpage = 1;
			//echo ($startpage);die;
			$endpage = $startpage + $pageshow -1;  // 5
			
			//echo ($endpage);die;
		}
		
		if($endpage > $pageNumber)
		{
			$endpage = $pageNumber;
			$startpage = $endpage - $pageshow+ 1;
			
		}
	 //不足5页情况
	}else
	{
	  	$startpage = 1;
		$endpage = $pageNumber;
	}
    //echo ($endpage);die;
    $page_str = "";//声明空字符串保存分页数据 
	$page_str .= '<li><a href="index.php?c=news&a=shucai&p=1">首页</a></li>';
	$page_str .= '<li><a href="index.php?c=news&a=shucai&serch='.$serch.'&p='.(($pagenum-1) < 1 ? 1 : ($pagenum-1)).'" title="Previous Page">上一页</a></li>';
	for($i = $startpage;$i<=$endpage;$i++)
	{
		//echo ($i);
    $class = ($i == $pagenum) ? "active current" : "current";		
	$page_str .= '<li class="'.$class.'"><a href="index.php?c=news&serch='.$serch.'&a=shucai&serch='.$serch.'&p='.$i.'"  title="'.$i.'">'.$i.'</a></li>'; 
	}
   //die;	
	$page_str .= '<li><a href="index.php?c=news&a=shucai&serch='.$serch.'&p='.(($pagenum+1) > $pageNumber ? $pageNumber : ($pagenum+1)).'" title="Next Page">下一页</a></li>';
	$page_str .= '<li><a href="index.php?c=news&a=shucai&p='.$pageNumber.'">尾页</a></li>';
	

	   
	   
	   //是否是以ajax提交数据
	  if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']))
	  {

		$sc = array("data"=>$data,"page"=>$page_str);
		echo (json_encode($sc));
	  }
	  else
	  {
		 	  
	  $this->assign("data",$data);
      $this->assign("page",$page_str);	  
	  $this->assign("session",$_SESSION['username']);
	  $this->display("view/news/index.html"); 
	  }
	 
   }   
	 //水果
	 public function shuiguo()
   {
   $model = new Model("news as n,category_id as c");
   
   //搜索功能
   $serch = !empty($_GET['serch']) ? $_GET['serch'] : "";
   $where = "";
   if($serch != "")
   {
	  $where = "category_id like '%{$serch}%' and n.category_id = c.id"; 
   }else{
	  $where = "n.category_id = c.id and n.category_id = 1";
   }
	    /*查询数据库内容 */
   $pageSize = 5;//固定显示5条数据 
   $pagenum = !empty($_GET['p']) ? $_GET['p'] : 1;//得到当前用户点击的页数
   $curpage = ($pagenum - 1) * $pageSize;//得到偏移量;
   $data = $model->dbgetlist("n.img,n.title,n.price,n.fuel,n.zhuang,n.category_id,n.id,c.names,c.pid",$where,"order by n.id desc","{$curpage},{$pageSize}");
   
   $totlepage = $model->counts($where);
   //echo ($totlepage);die;
   
   $pageNumber = ceil($totlepage / $pageSize); //得到总页数
   //echo ($pageNumber);die;
   
    //控制总页数  固定显示5页
    $pageshow =3;//固定显示5页
   
    $pagecur = floor($pageshow / 2);//得到偏移量
	
	$startpage = $pagenum - $pagecur;//得到起始页  -1 0 1 2 3
	
	//echo ($startpage);
	//echo ("<hr>");
	$endpage =  $pagenum + $pagecur;//得到尾页
	//echo ($endpage);	
	
	//判断起始页和尾页
	if($pageNumber > $pageshow)
	{
		if($startpage < 1)
		{
			$startpage = 1;
			//echo ($startpage);die;
			$endpage = $startpage + $pageshow -1;  // 5
			
			//echo ($endpage);die;
		}
		
		if($endpage > $pageNumber)
		{
			$endpage = $pageNumber;
			$startpage = $endpage - $pageshow+ 1;
			
		}
	 //不足5页情况
	}else
	{
	  	$startpage = 1;
		$endpage = $pageNumber;
	}
    //echo ($endpage);die;
    $page_str = "";//声明空字符串保存分页数据 
	$page_str .= '<li><a href="index.php?c=news&a=shuiguo&p=1">首页</a></li>';
	$page_str .= '<li><a href="index.php?c=news&a=shuiguo&serch='.$serch.'&p='.(($pagenum-1) < 1 ? 1 : ($pagenum-1)).'" title="Previous Page">上一页</a></li>';
	for($i = $startpage;$i<=$endpage;$i++)
	{
		//echo ($i);
    $class = ($i == $pagenum) ? "active current" : "current";		
	$page_str .= '<li class="'.$class.'"><a href="index.php?c=news&serch='.$serch.'&a=shuiguo&serch='.$serch.'&p='.$i.'"  title="'.$i.'">'.$i.'</a></li>'; 
	}
   //die;	
	$page_str .= '<li><a href="index.php?c=news&a=shuiguo&serch='.$serch.'&p='.(($pagenum+1) > $pageNumber ? $pageNumber : ($pagenum+1)).'" title="Next Page">下一页</a></li>';
	$page_str .= '<li><a href="index.php?c=news&a=shuiguo&p='.$pageNumber.'">尾页</a></li>';
	

	   
	   
	   //是否是以ajax提交数据
	  if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']))
	  {

		$sc = array("data"=>$data,"page"=>$page_str);
		echo (json_encode($sc));
	  }
	  else
	  {
		 	  
	  $this->assign("data",$data);
      $this->assign("page",$page_str);	  
	  $this->assign("session",$_SESSION['username']);
	  $this->display("view/news/index.html"); 
	  }
	 
   }   
	 


}

?>