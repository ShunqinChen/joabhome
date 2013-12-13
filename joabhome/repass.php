<?php



require_once "./admin/comm/mysqldb.php"; 

if($_REQUEST['email']){

	

			 

	$sql = "select password from member where email='".$_REQUEST['email']."'";

	$result = $db->GetOne($sql);

	if($result){

		echo 'Your password is：'.$result;

		echo "&nbsp;<a href='/index.php'>go to home page</a>";

		exit;

	}else {

		echo '<script language="javascript">alert("你输入的E_mail不正确");</script>';

		echo '<script language="javascript">window.location.href = "/repass.php";</script>';

		exit;

	}

	

}

//print_r($db)



?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html>

<head>

<meta http-equiv="Content-Type" content="text/html; charset=gb2312">

<title>oil painting & portrait, oil painting factory, wholesale oil painting, oil painting reproductions</title>

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

    <td height="126" colspan="2" valign="top"  >

      <?php







		  	include("top.php");







		  ?>

    </td>

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

                    <td width="47%" height="22" bgcolor="f4f4f4">Please input 

                      your regist Email: </td>

                    <td width="26%"><input type="text" name="email"></td>

                    <td width="27%"><div align="center"> 
                        <input name="sub"  type="image" value="提交" src="img/submit.gif" align="middle">

                      </div></td>

                  </tr>

                  <tr> 

                    <td height="30" colspan="3"> <div align="center"> &nbsp; </div></td>

                  </tr>

                </table>

              </form>

            </div></td>

        </tr>

      </table> </td>

  </tr>

  <tr> 

    <td height="147" valign="top" background="img/bbg.gif">

      <?php







		  	include("index-bottom.php");







		  ?>

    </td>

  </tr>

</table>

</body>

</html>



<script language="JavaScript" type="text/javascript">



var frm = new Validator("form1");



frm.addV("email", "req", "email not null");

frm.addV("email", "email", "email error");







</script> 

