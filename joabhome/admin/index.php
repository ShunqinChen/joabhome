<?php 
/**
 * ��̨����ģ������ҳ
 * */

header("content-type:text/html;charset=gb2312");
session_start();
if($_SESSION['usersefid']==''&&$_REQUEST['mod']!='editpass@dsfsdf*sdfsew!@wfe') {
	
	//echo "<a href='./login.php'>����û�е�¼~�������˴����µ�¼</a>";
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
	$message->mError('ģ�鲻����~��');
}

?> 

