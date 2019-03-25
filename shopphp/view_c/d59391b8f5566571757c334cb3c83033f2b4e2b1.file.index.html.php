<?php /* Smarty version Smarty-3.1.5, created on 2019-03-15 17:07:00
         compiled from "view\news\index.html" */ ?>
<?php /*%%SmartyHeaderCode:177775c887cd3f23580-40755242%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd59391b8f5566571757c334cb3c83033f2b4e2b1' => 
    array (
      0 => 'view\\news\\index.html',
      1 => 1552640808,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '177775c887cd3f23580-40755242',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.5',
  'unifunc' => 'content_5c887cd403ed9',
  'variables' => 
  array (
    'session' => 0,
    'data' => 0,
    'v' => 0,
    'page' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c887cd403ed9')) {function content_5c887cd403ed9($_smarty_tpl) {?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <script src="./public/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="./public/css/bootstrap.css">
    <link rel="stylesheet" href="./public/css/bootstrap.min.css">
    <link rel="stylesheet" href="./public/css/index.css">
    <link rel="stylesheet" href="./public/css/reset.css">

</head>
<body>
    <div class="warp">
        <div class="head">
            <h2>后台管理系统</h2>
            <ul class="user">
                <li>当前用户名是:<?php echo $_smarty_tpl->tpl_vars['session']->value;?>
</li>
                <li><a href="index.php?c=admin&a=admin">退出登录</a></li>
            </ul>
        </div>
        <div class="content">
            <ul class="list">
                <li class="goods">商品</li>
                <li class="act">采购</li>
                <li class="inventory">库存</li>
                <li class="data">资料</li>
                <li class="financial">财务</li>
                <li><a href="index.php?c=news&a=shucai" style="color:red;padding-left:40px">蔬菜</a></li>
                <li><a href="index.php?c=news&a=shuiguo" style="color:red;padding-left:40px">水果</a></li>
            </ul>
            <div class="content-right">
                <ul class="breadcrumb">
                    <li><a href="#" class="guanli">商品管理</a></li>
                    <li><a href="index.php?c=news&a=add" class="spadd">商品添加</a></li>
                </ul>
                <div class="sousuo">
                    <h4>搜索</h4>
                    <form action="index.php" method="get">
                        <div class="socont">
                            <label for="">名称</label> 
							<input type="text" name="serch">
                            <label for="">状态</label>
                            <select class="">
                                <option>上架</option>
                                <option>下架</option>
                            </select>
                            <button type="submit" class="tijiao">开始搜索</button>
							<input type="hidden" name="c" value="news">
							<input type="hidden" name="a" value="index">
                        </div>
                    </form>
                </div>

                <table class="biaoge  table-striped table-hover table-condensed">
                    <thead>
                    <tr>
                        <th>编号</th>
                        <th>图标</th>
                        <th>名称</th>
                        <th>价格</th>
                        <th>邮费</th>
                        <th>状态</th>
                        <th>分类</th>
                        <th>编号</th>
                    </tr>
                    </thead>
                    <tbody id="datadiv">
					<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['data']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
                   <tr>
                        <td><?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
</td>
                        <td><img src="<?php echo $_smarty_tpl->tpl_vars['v']->value['img'];?>
" alt=""></td>
                        <td><?php echo $_smarty_tpl->tpl_vars['v']->value['title'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['v']->value['price'];?>
￥</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['v']->value['fuel'];?>
￥</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['v']->value['zhuang'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['v']->value['names'];?>
</td>
                        <td>
                            <a href="index.php?c=news&a=upd&id=<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
" class="upd"> 修改 </a>
                            <a href="index.php?c=news&a=shelve&id=<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
" class="xiaja"> 下架 </a>
                            <a href="index.php?c=news&a=del&id=<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
" class="delt"> 删除 </a>
                        </td>
                    </tr>
                    <?php } ?>
                    </tbody>
                    <!-- <tr>
                         <td>1</td>
                         <td><img src="./public/images/list_033.jpg" alt=""></td>
                         <td>人参果</td>
                         <td>100.00￥</td>
                         <td>100.00￥</td>
                         <td>上架</td>
                         <td>
                             <a href="" class="upd"> 修改 </a>
                             <a href="" class="xiaja"> 下架 </a>
                             <a href="" class="delt"> 删除 </a>
                         </td>
                     </tr>-->
                </table>
                <ul class="pagination fenye" id="pagediv">
                 <?php echo $_smarty_tpl->tpl_vars['page']->value;?>

                   <!--<li><a href="">上一页</a></li>
                    <li class="active"><a href="">1</a></li>
                    <li><a href="">2</a></li>
                    <li><a href="">3</a></li>
                    <li><a href="">4</a></li>
                    <li><a href="">5</a></li>
                    <li><a href="">6</a></li>
                    <li class=""><a href="">7</a></li>
                    <li><a href="">下一页</a></li>-->
                </ul>
            </div>
        </div>
    </div>
	<script>
        $("#pagediv a").on("click",function () {
            //获取地址
			//alert("sss");
            var url = $(this).attr("href");
            $.ajax({
                type:"get",
                url:url,
                dataType:"json",
                success:function(msg){
				//alert(msg);
                    var data = msg.data;
                    var data_str = "";
                    for(var i=0;i<data.length;i++){
                        data_str+='<tr>';
                        data_str+='<td>'+data[i].id+'</td>';
                        data_str+='<td><img src="'+data[i].img+'" alt=""></td>';
                        data_str+='<td>'+data[i].name+'</td>';
                        data_str+='<td>'+data[i].price+'￥</td>';
                        data_str+='<td>'+data[i].fuel+'￥</td>';
                        data_str+='<td>'+data[i].zhuang+'</td>';
                        data_str+='<td>';
                        data_str+='<a href="index.php?c=news&a=upd&id='+data[i].id+'" class="upd"> 修改 </a>';
                        data_str+='<a href="index.php?c=news&a=shelve&id='+data[i].id+'" class="xiaja"> 下架 </a>';
                        data_str+='<a href="index.php?c=news&a=del&id='+data[i].id+'" class="delt"> 删除 </a>';
                        data_str+='</td>';
                        data_str+='</tr>'
                    }
                    //数据更新
                    $("#datadiv").html(data_str);
                    $("#pagediv").html(msg.page);

                }
            });
            return false;
        })
		//点击删除
		$(".delt").click(function () {
			if(confirm("是否删除")){

			}else{
			return false;
			}
			});
    </script>
	<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
</body>
</html><?php }} ?>