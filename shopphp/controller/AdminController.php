<?php
	header("Content-Type:text/html;charset=utf-8");//编码格式
    session_start();//开启session会话
class AdminController extends Controller
{
	
   	
	public function admin()
	{
		
		 if(!empty($_POST))
	   {
		 //print_r($_POST);  
		 $username = $_POST['username'];
		 $password = $_POST['password'];
		 $model = new Model("user");
		 $row = $model->dbgetone("`username`='{$username}' and `password` = '{$password}'");
		
		 if($row)
		 {
			 $_SESSION['username'] = $row['username'];
			 //echo ($_SESSION['username']);die;
			 
		
			 if($_SESSION['code'] != md5(strtolower($_POST['code'])))
			{
				echo ("<script>alert('登录失败');location.href='index.php?c=admin&a=admin'</script>");
			}else
			{
				
				echo ("<script>alert('登录成功');location.href='index.php?c=news&a=index'</script>");
			}
		 }else
		{
			echo ("<script>alert('登录失败');location.href='index.php?c=admin&a=admin'</script>");
		}
		 
		   
	   }
		
		$this->display("view/admin/login.html");
	}
	
	
}


?>