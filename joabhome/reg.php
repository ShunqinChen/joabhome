<?php

session_start();





require_once "./admin/comm/mysqldb.php"; 



if($_REQUEST['sub']){



	$array = array('username'=>$_REQUEST['username'],



				   'password'=>$_REQUEST['password'],



				   'email'=>$_REQUEST['email'],



				   'address'=>$_REQUEST['address'],



				   'zipcode'=>$_REQUEST['zipcode'],



				   'realname'=>$_REQUEST['realname'],

				   'add_time'=>date('Y-m-d')



					);



	



	$array = $db->trimStr($array);  //去除特殊字符



	if (!$db->insert('member ',$array)){



		echo 'Register failed';



	}else {

		
		$_SESSION['username'] = $_REQUEST['username'];
//		echo $db->GetLastId();exit;
		$_SESSION['userid'] = $db->GetLastId();


		echo '<script language="javascript">alert("Register Successful!");</script>';



		echo '<script language="javascript">window.location.href = "/index.php";</script>';



		exit;



	}



	



}



//print_r($db)







?>



<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">



<html>



<head>



<meta http-equiv="Content-Type" content="text/html; charset=gb2312">



<title>oil painting & portrait, oil painting factory, wholesale oil painting, oil painting reproductions



</title>



<link href="img/css.css" rel="stylesheet" type="text/css">



<script language="JAVASCRIPT" src="/admin/other/js.js"></script>



</head>



<style type="text/css">



BODY {



	BACKGROUND-POSITION: center 50%; BACKGROUND-IMAGE: url(img/background_tile.gif); MARGIN: 0px; BACKGROUND-REPEAT: repeat-y; BACKGROUND-COLOR: #cedce9; TEXT-ALIGN: center



}



</style>



<body topmargin="0" leftmargin="o" rightmargin="0" bottommargin="0" >



<table width="720" border="0" align="center" cellpadding="0" cellspacing="0">



  <tr> 



   <td height="126" colspan="2" valign="top" > 



   <?php



		  	include("top.php");



		  ?> </td>



  </tr>



 



  <tr> </tr>



  <tr> 



    <td height="300" valign="top" bgcolor="#f4f4f4"><table width="650" border="0" align="center" cellpadding="0" cellspacing="0">



        <tr> 



          <td>&nbsp;</td>



        </tr>



        <tr>



          <td height="215" valign="top"> <div align="left"> 



              <p class="cls12">&nbsp;</p>



              <p> </p>



              <p></p>



              <form name="form1" method="post" action="">



                <table width="70%" border="0" align="center" cellpadding="0" cellspacing="0">



                  <tr class="cls12"> 



                    <td height="22" colspan="2"> <div align="center">Register 



                        now<br>



                      </div></td>



                  </tr>



                  <tr class="cls12"> 



                    <td width="34%" height="22" bgcolor="f4f4f4">Username: </td>



                    <td width="66%"><input name="username" type="text" class="input"></td>



                  </tr>



                  <tr class="cls12"> 



                    <td height="22" bgcolor="f4f4f4">Password:</td>



                    <td> <input name="password" type="password" class="input" id="pa1"></td>



                  </tr>



                  <tr class="cls12"> 



                    <td height="22" bgcolor="f4f4f4">Confirm Password:</td>



                    <td><input name="password2" type="password" class="input" id="pa2"></td>



                  </tr>



                  <tr class="cls12"> 



                    <td height="22" bgcolor="f4f4f4">Email:</td>



                    <td> <input name="email" type="text" class="input"></td>



                  </tr>



                  <tr class="cls12"> 



                    <td height="22" bgcolor="f4f4f4">Address &amp; City &amp; 



                      Country:</td>



                    <td><input name="address" type="text" class="input" size="30"></td>



                  </tr>



                  <tr class="cls12"> 



                    <td height="22" bgcolor="f4f4f4">Postal code:</td>



                    <td> <input name="zipcode" type="text" class="input"></td>



                  </tr>



                  <tr class="cls12"> 



                    <td height="22" bgcolor="f4f4f4">Real name:</td>



                    <td> <input name="realname" type="text" class="input"></td>



                  </tr>



                  <tr> 



                    <td height="30" valign="top"> 



                      <div align="right">



<input type="hidden" name="sub" value="提交">



                        <input  type="image" src="img/submit.gif" name="sub" value="提交">



                      </div></td>



                    <td height="30" valign="top">&nbsp;&nbsp;



<input type="reset" name="Submit" value=""  style="background-image:url(img/reset.gif); border:0px; width:64px; height:21px;" />



                    </td>



                  </tr>



                </table>



              </form>



            </div></td>



        </tr>



      </table> </td>



  </tr>



  <tr> 



    <td height="147" valign="top" background="img/bbg.gif"> <?php



		  	include("index-bottom.php");



		  ?> </td>



  </tr>



</table>



</body>



</html>







<script language="JavaScript" type="text/javascript">







var frm = new Validator("form1");







frm.addV("username", "req", "username not null");



frm.addV("password", "req", "password not null");



frm.addV("password2", "req", "Confirm Password not null");



frm.addV("email", "req", "email not null");



frm.addV("email", "email", "email error");



frm.addV("address", "req", "address not null");



frm.addV("zipcode", "req", "zipcode not null");



frm.addV("realname", "req", "realname not null");











</script> 



