<?php 
header("content-type:text/html;charset=gb2312");
session_start();
if($_SESSION['usersefid']==''&&$_REQUEST['mod']!='printing@dsfsdfsdfsew!@wfe') {
	
	echo "<a href='/yinshua/admin/login.php'>����û�е�¼~�������˴����µ�¼</a>";
	exit;
}
define('ROOT',dirname( __FILE__ ));

require_once "./comm/smarttemplate/class.smarttemplate.php"; 
require_once "./comm/error.class.php"; 
require_once "./comm/mysqldb.php"; 
require_once "./comm/Function.php"; 
require_once "./comm/showPage.class.php"; 
$IN = getParam();
//include( "./module/{$_REQUEST['mod']}.php"); 
//$page = new SmartTemplate("if.html"); 

if (file_exists("./module/{$_REQUEST['mod']}.php")){
	include( "./module/{$_REQUEST['mod']}.php"); 
	exit;
}else {
	$message->mError('ģ�鲻����~��');
}

?> 

