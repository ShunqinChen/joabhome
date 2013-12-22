<?php 
/**
 * 后台管理模板引入页
 * */

header("content-type:text/html;charset=gb2312");
session_start();
if($_SESSION['usersefid']==''&&$_REQUEST['mod']!='editpass@dsfsdf*sdfsew!@wfe') {
	
	//echo "<a href='./login.php'>您还没有登录~！单击此处重新登录</a>";
	echo "<script language='javascript'>window.location.href='./login.php';</script>";
	exit;
}
define('ROOT',dirname( __FILE__ ));

require_once "./comm/smarttemplate/class.smarttemplate.php"; 
require_once "./comm/error.class.php"; 
require_once "./comm/mysqldb.php"; 
require_once "./comm/Function.php"; 
require_once "./comm/showPage.class.php"; 
$IN = getParam();

//echo $_REQUEST['mod'].".php"; // FOR DEBUG

if (file_exists("./module/{$_REQUEST['mod']}.php")){
	include( "./module/{$_REQUEST['mod']}.php"); 
	exit;
}else {
	$message->mError('模块不存在~！');
}

?> 

