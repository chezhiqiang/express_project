<?php /* Smarty version Smarty-3.1.5, created on 2019-03-14 20:05:21
         compiled from "view\news\add.html" */ ?>
<?php /*%%SmartyHeaderCode:63225c88bc9a181e70-63690809%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2f4bc2e1bf6f1b653f5b1c2580afd8e2dfba2086' => 
    array (
      0 => 'view\\news\\add.html',
      1 => 1552565110,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '63225c88bc9a181e70-63690809',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.5',
  'unifunc' => 'content_5c88bc9a1c068',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c88bc9a1c068')) {function content_5c88bc9a1c068($_smarty_tpl) {?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="./public/css/bootstrap.css">
    <link rel="stylesheet" href="./public/css/bootstrap.min.css">
    <link rel="stylesheet" href="./public/css/add.css">
    <title>Title</title>
</head>
<body>
<form action="index.php?c=News&a=add" method="post" class="form" enctype="multipart/form-data">
    <div class="form-group form-inline">
        <label>商品名:</label><input type="text" name="title" value="" class="form-control">
    </div>
    <div class="form-group form-inline">
        <label>&nbsp;价格: &nbsp;&nbsp;</label><input type="text" name="price" value="" class="form-control">
    </div>
    <div class="form-group form-inline">
        <label>&nbsp;油费: &nbsp;&nbsp;</label><input type="text" name="fuel" value="" class="form-control">
    </div>
    <div class="form-group form-inline">
        <label>&nbsp;描述: &nbsp;&nbsp;</label><input type="text" name="zhuang" value="" class="form-control">
    </div>
	<div class="form-group form-inline">
        <label>&nbsp;分类: &nbsp;&nbsp;</label><input type="text" name="category_id" value="" class="form-control" style="width:196px;">
    </div>
    <div class="form-group form-inline">
        <label>&nbsp;图片: &nbsp;&nbsp;</label><input type="file" name="img" value="" class="wen form-control" style="width:196px;">
    </div>
	
    <div class="but">
        <a href="index.php?c=news&a=index" class="btn cancel">取消</a>
        <button class="btn btn-primary" type="reset">重置</button>
        <button class="btn btn-success" type="submit">提交</button>

    </div>
</form>


    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
</body>
</html><?php }} ?>