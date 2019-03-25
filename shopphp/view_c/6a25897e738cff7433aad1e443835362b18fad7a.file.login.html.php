<?php /* Smarty version Smarty-3.1.5, created on 2019-03-15 09:32:08
         compiled from "view\admin\login.html" */ ?>
<?php /*%%SmartyHeaderCode:178305c887c5052e653-23690405%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6a25897e738cff7433aad1e443835362b18fad7a' => 
    array (
      0 => 'view\\admin\\login.html',
      1 => 1552613241,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '178305c887c5052e653-23690405',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.5',
  'unifunc' => 'content_5c887c505612e',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c887c505612e')) {function content_5c887c505612e($_smarty_tpl) {?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="./public/css/reset.css">
    <link rel="stylesheet" href="./public/css/login.css">
    <script>
        window.onload = function () {
            var oA = document.getElementById("click");
            var oImg = document.getElementsByTagName("img")[0];
            oA.onclick = function () {
               oImg.src = oImg.src+"?"+Math.random();
            };
        }
    </script>
</head>
<body>
<div class="window">
    <div class="logo">
        <p>后台登录系统</p>
        <form action="./index.php?c=admin&a=admin" method="post">
            <div class="user">
                <span></span>
                <input type="text" name="username" autofocus="autofocus" placeholder="请输入账号">
            </div>
            <div class="passw">
                <span></span>
                <input type="password" name="password"  placeholder="请输入密码">
            </div>
            <div class="code">
                <b>验证码:</b>
                <input type="text" name="code">
            </div>
            <img src="./config/verf.php" alt="验证码">
            <a href="#" id="click">看不清？点击切换图片</a>
            <button type="submit">登 录</button>
        </form>

    </div>
</div>
</body>
</html>
<?php }} ?>