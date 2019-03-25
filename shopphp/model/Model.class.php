<?php
header("Content-Type:text/html;charset=utf-8");
class Model
{
	
	protected $link = NULL;//$link属性来保存连接池
	
	protected $dbname;//申明一个变量来保存数据库表名
	
	//申明构造方法进行初始化 
	public function __construct($dbname)
	{
	  $this->dbname = $dbname;
      $this->link = mysqli_connect(HOST,USER,PASS) or die("连接失败");
      mysqli_select_db($this->link,DB);	
      mysqli_set_charset($this->link,CHARSET);	
	  
	}
	//查询单行语句
	public function dbgetone($where=1)
	{
	  $sql = "select * from {$this->dbname} where {$where}";
      //echo($sql);die;	 
      $res = mysqli_query($this->link,$sql);
      $row = mysqli_fetch_assoc($res);
      return $row;	  
		
		
	}
	
	//查询多行
	public function dbgetlist($fileds="*",$where=1,$order="order by id desc",$limit="0,5")
	{
	$sql = "select {$fileds} from {$this->dbname} where {$where} {$order} limit {$limit}";
	  //echo ($sql);
	  $res = mysqli_query($this->link,$sql);
	  $data = array();
	  while($row=mysqli_fetch_assoc($res))
	  {
		 $data[] = $row; 
	  }
	  
	  return $data;
	  
	}
	
	//添加语句
	public function dbinsert($data=array())
	{
	  //print_r($data);die;	
	  $key_str = "";
	  $val_str="";
	  foreach($data as $k=>$v)
	  {
		 //echo ($k); 
		 $key_str .= $k.",";// 字段1，字段2
		 $val_str .= "'".$v."',";   //"值1","值2"
	  }
	  /*echo ($val_str);
	  die;*/
	  $key_str = substr($key_str,0,-1);
	  $val_str = substr($val_str,0,-1);
	  //echo ($val_str);die;
	  $sql = "insert into {$this->dbname} ({$key_str}) value ({$val_str})";	
	  //echo ($sql);die;
	  $res = mysqli_query($this->link,$sql);
	  //return mysqli_fetch_row($this->link);
	  return mysqli_insert_id($this->link);
		
	}
	
	//修改语句 
	public function dbedit($where,$data=array())
	{
		//print_r($data);die;
		$key_val_str="";
		foreach($data as $k=>$v)
		{
		 $key_val_str .= $k."='".$v."',"; //`字段名1`="值",`字段名2`="值"	
		}
		//echo ($key_val_str);
		//die;
		$key_val_str = substr($key_val_str,0,-1);
		//echo ($key_val_str);die;
		$sql = "update {$this->dbname}  set  {$key_val_str} where id={$where}";
		//echo ($sql);die;
		$res = mysqli_query($this->link,$sql);
	}
	
    //删除语句 
	public function dbgetdel($where)
	{
		$sql = "delete from {$this->dbname} where id={$where}";
		$res = mysqli_query($this->link,$sql);
		return mysqli_affected_rows($this->link);
	}
	
	//统计条数 
	public function counts()
	{
		$sql = "select count(*) as count from {$this->dbname}";
		//echo ($sql);die;
		$res = mysqli_query($this->link,$sql);
		$row = mysqli_fetch_assoc($res);
		$conut = $row['count'];
		return $conut; 
		
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
}
/*define("HOST","127.0.0.1");//定义ip端口
define("USER","root");//定义用户名
define("PASS","root");//定义密码
define("DB","text");//定义密码
define("CHARSET","utf8");//定义字符集
$d = new DataBase("news");*/
/*$sbgetone = $d->dbgetone();
print_r($sbgetone);*/
/*$dbgetlist = $d->dbgetlist();
//echo ();


print_r($dbgetlist);*/
/*
$data = array(
  "title" => "asdsa",
  "content"=>"的萨芬撒地方",
  "time"=>date("y-m-d"),
  "category_id"=>2,
);
$d->dbinsert($data);
*/

/*$data = array(
  
  "title" => "是非得失",
  "content"=>"的萨芬撒地方",
  "time"=>date("y-m-d"),
  "category_id"=>2,

);
$d->dbedit("29",$data);
*/
//$d->dbgetdel("29");

/*$count = $d->counts();
echo ($count);*/


?>