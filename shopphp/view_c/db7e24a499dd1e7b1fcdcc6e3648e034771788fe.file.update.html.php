<?php /* Smarty version Smarty-3.1.5, created on 2019-03-14 20:23:44
         compiled from "view\news\update.html" */ ?>
<?php /*%%SmartyHeaderCode:224625c88cb961342c5-91650329%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'db7e24a499dd1e7b1fcdcc6e3648e034771788fe' => 
    array (
      0 => 'view\\news\\update.html',
      1 => 1552566222,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '224625c88cb961342c5-91650329',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.5',
  'unifunc' => 'content_5c88cb9617695',
  'variables' => 
  array (
    'aa' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c88cb9617695')) {function content_5c88cb9617695($_smarty_tpl) {?>﻿<!DOCTYPE html>
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
<form action="index.php?c=News&a=upd" method="post" class="form" enctype="multipart/form-data">
    <div class="form-group form-inline">
        <label>商品名:</label><input type="text" name="title" value='<?php echo $_smarty_tpl->tpl_vars['aa']->value["title"];?>
' class="form-control">
    </div>
    <div class="form-group form-inline">
        <label>&nbsp;价格: &nbsp;&nbsp;</label><input type="text" name="price" value='<?php echo $_smarty_tpl->tpl_vars['aa']->value["price"];?>
' class="form-control">
    </div>
    <div class="form-group form-inline">
        <label>&nbsp;油费: &nbsp;&nbsp;</label><input type="text" name="fuel" value='<?php echo $_smarty_tpl->tpl_vars['aa']->value["fuel"];?>
' class="form-control">
    </div>
    <div class="form-group form-inline">
        <label>&nbsp;描述: &nbsp;&nbsp;</label><input type="text" name="zhuang" value='<?php echo $_smarty_tpl->tpl_vars['aa']->value["zhuang"];?>
' class="form-control">
    </div>
	<div class="form-group form-inline">
        <label>&nbsp;分类: &nbsp;&nbsp;</label><input type="text" name="category_id" value="" class="form-control" style="width:196px;">
    </div>
    <div class="form-group form-inline">
        <label>&nbsp;图片: &nbsp;&nbsp;</label><input type="file" name="img" value='<?php echo $_smarty_tpl->tpl_vars['aa']->value["img"];?>
' class="wen form-control" style="width:196px;">
    </div>
	<input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['aa']->value['id'];?>
">
    <div class="but">
        <a href="#" class="btn cancel">取消</a>
        <button class="btn btn-primary" type="reset">重置</button>
        <button class="btn btn-success" type="submit">提交</button>

    </div>
</form>


    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
</body>
</html><?php }} ?>