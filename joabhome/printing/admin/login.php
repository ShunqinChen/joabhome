<?php



session_start();



function getStat(){



//	if($_REQUEST['username']!='1'&&$_REQUEST['password']!='1')	{
	$fp = fopen('config.ini','r');
	$string = fread($fp,1000);
	$adminarray = explode('|',$string);
	fclose('config.ini');
//	print_r($adminarray);exit;
//	if($_REQUEST['username']!='admin'&&$_REQUEST['password']!='wwwjoabhomearts')	{
	if($_REQUEST['username']!=$adminarray[0]&&$_REQUEST['password']!=$adminarray[1])	{


		echo "����Ա�ʺŻ��������~!<a href='/printing/admin/login.php'><<<���µ�¼</a>"; 



		//Header("Location: /admin/login.php");



	}else{



		$_SESSION['usersefid'] = 'ͨ��';



		Header("Location: /printing/admin/main/main.php");



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

	background-image: url(/admin/adminbodybg.gif);

	background-color: #D2EFFA;

	background-repeat:repeat-x;

	text-align:center;

}

div#login{

	width:521px;

	height:340px;

	margin-top:55px;

	background-image: url(/admin/adminbg.gif);

	background-repeat: no-repeat;

}

form{ margin:11em 0em 0em 4em; text-align:left;}

form p{ margin:0.5em}

#copy{font-size:12px;} 

-->

</style>

</head>

<body>





<div id="login">



<form name='form1'  onsubmit="return ckform()" method="post">



  <table width=68% height="19%"  border="1">

  

                <tr>

                  <td align="center" colspan=2>�û���¼</td>

                </tr>

                

                <tr>

                  <td >�û�����</td>

                  <td  align="left"><input name="username" type="text"  /></td>

                </tr>

                <tr>

                  <td >�ܡ��룺</td>

                  <td align="left"><input name="password" type="password"  /></td>

                </tr>

				

                <tr>

                  <td height="24" colspan="2" align="center"><input type="submit" name="sub" value="��¼" /></td>

                </tr>

				<tr>

                  <td colspan="2" align="center">copyright��joabhomearts.com</td>

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



    if (document.form1.password.value=="") msg = '����������';

    if (document.form1.username.value=="") msg = '�������û���';

	



    if (msg) {

        alert(msg);

        userfriendly();

        return false;

    }

    return true;

}

</SCRIPT>

<body onload="window.defaultStatus='����ʱ�䣺0.0227470397949��'"></body>





login_html;



}







?>