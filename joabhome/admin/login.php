<?php

session_start();

function getStat(){

	$fp = fopen('config.ini','r');
	$string = fread($fp,1000);
	$adminarray = explode('|',$string);
	fclose($fp);
//	print_r($adminarray);exit;
//	if($_REQUEST['username']!='admin'&&$_REQUEST['password']!='wwwjoabhomearts')	{
	
	//print error msg
	if ( isset($_SESSION['loginMsg']) ) {
		echo "<script language='javascript'>alert('".$_SESSION['loginMsg']."');</script>";
		unset($_SESSION['loginMsg']);
	}

	if($_REQUEST['username']!=$adminarray[0]||$_REQUEST['password']!=$adminarray[1])	{

		//echo "管理员帐号或密码错误~!<a href='./login.php'><<<重新登录</a>"; 
		$_SESSION['loginMsg'] = 'Login fail,Your password or username is mistake!';
		echo "<script language='javascript'>window.location.href='./login.php';</script>";
		//Header("Location: ./login.php");
		
	}else{

		$_SESSION['usersefid'] = '通过';
		$_SESSION['userid'] = $_REQUEST['username'];
		Header("Location: ./main/main.php");

	}

}

if($_REQUEST['sub']){

	getStat();

}else{

echo <<< login_html

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Pragma" content="text/html; charset=utf-8;no-cache" />
<META HTTP-EQUIV="pragma" CONTENT="no-cache">
<META HTTP-EQUIV="Cache-Control" CONTENT="no-cache, must-revalidate">
<META HTTP-EQUIV="expires" CONTENT="0">

<title>joabhomearts---Login</title>
</head>
<style type="text/css">
<!--
*{ font-size:14px; margin:0px; padding:0px;}
body {
	background-image: url(./adminbodybg.gif);
	background-color: #D2EFFA;
	background-repeat:repeat-x;
	text-align:center;
	margin:auto;
}
#login{
	width:521px;
	height:340px;
	margin-top:51px;
  top: 0;   bottom: 0; 
	background-image: url(./adminbg.gif);
	background-repeat: no-repeat;
	margin-left:auto;
	margin-right:auto;
}
#adminlogin tr,#adminlogin td,#adminlogin{
	border:0;
}

form p{ margin:0.5em}
#copy{font-size:12px;} 
-->
</style>
</head>
<body>


<div id="login">

<form name='form1'  onsubmit="return ckform()" method="post" style="padding-top:150px;">

  <table id="adminlogin" width=68% height="19%"  border="1" style="margin:auto;">
  
                <tr>
                  <td align="center" colspan=2>用户登录</td>
                </tr>
                
                <tr>
                  <td >用户名：</td>
                  <td  align="left"><input name="username" type="text"  /></td>
                </tr>
                <tr>
                  <td >密　码：</td>
                  <td align="left"><input name="password" type="password"  /></td>
                </tr>
				
                <tr>
                  <td height="24" colspan="2" align="center"><input type="submit" name="sub" value="登录" /></td>
                </tr>
				<tr>
                  <td colspan="2" align="center">copyright：joabhomearts.com</td>
                </tr>
  </table>
  </form>
</div>

</body>

</html>
<SCRIPT language=javascript>
function userfriendly(){
	if (document.form1.username.value=="")
		document.form1.username.focus();
	else if(document.form1.password.value=="")
		document.form1.password.focus();
	
    
    window.setTimeout('userfriendly()',50000);
}

function ckform() {
    var msg = "";

    if (document.form1.password.value=="") msg = '请输入密码';
    if (document.form1.username.value=="") msg = '请输入用户名';
	

    if (msg) {
        alert(msg);
        userfriendly();
        return false;
    }
    return true;
}
</SCRIPT>
<body onload="window.defaultStatus='运行时间：0.0227470397949秒'"></body>


login_html;

}



?>