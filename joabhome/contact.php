<?php
/**
 * 联系页面
 * */

require_once "./admin/comm/mysqldb.php"; 

//print_r($db)

?>


<?php

//获取myshop传递的订单号
$ordernum = isset($_REQUEST['ordernum']) ? $_REQUEST['ordernum'] : ''; 



if (($_REQUEST['alias']!="") and ($_REQUEST['msg']!="")) {


  $serial=md5(uniqid(rand()));



  $alias = $_REQUEST['alias'];


  $ip=$_SERVER['REMOTE_ADDR'];



  $msgdate = time();


  $email = $_REQUEST['email'];

  $msg=$_REQUEST['msg'];

  $tel=$_REQUEST['tel'];

  $zipcode=$_REQUEST['zipcode'];


  $flag="1";



  



  $insert = "INSERT into guestbook(serial, alias, ip, msgdate, email, msg, flag,tel,zipcode) 

  			 VALUES('$serial',  '$alias', '$ip', '$msgdate', '$email', '$msg', '$flag','$tel','$zipcode')";



	//echo $query;



//  mysql_query($query);
	$db->Execute($insert);



	echo '<script language="javascript">alert("Thanks,Go back!");</script>';



	echo '<script language="javascript">window.location.href = "./contact.php";</script>';



	exit;



  	//Header("Location: ./guestbook.php");



  	exit;

}

?>







<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html>

<head>

	<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
	
	<title>
		oil painting & portrait, oil painting factory, wholesale oil painting, oil painting reproductions
	</title>

	<link href="img/css.css" rel="stylesheet" type="text/css">

	<script type="text/javascript" src="/admin/other/js.js" ></script>

</head>


<style type="text/css">


BODY {

	BACKGROUND-POSITION: center 50%; BACKGROUND-IMAGE: url(img/background_tile.gif); MARGIN: 0px; BACKGROUND-REPEAT: repeat-y; BACKGROUND-COLOR: #cedce9; TEXT-ALIGN: center

}

</style>

<body topmargin="0" leftmargin="o" rightmargin="0" bottommargin="0" >

<table width="720" border="0" align="center" cellpadding="0" cellspacing="0">

  <tr> 

   <td height="126" colspan="2" valign="top">  
	   <?php
	
			include("top.php");
	
		?> 
	</td>

  </tr>



  <tr> 

    <td height="300" valign="top" bgcolor="#f4f4f4">
    	<table width="700" border="0" align="center" cellpadding="0" cellspacing="0">

        <tr> 

          <td colspan="2">&nbsp;</td>

        </tr>

        <tr> 

          <td width="420" height="161" valign="top"> <div align="left"> 

              <p class="cls12"> 

                <?php 

			  		$sql = "select brief from abouts ";

					$result = $db->GetOne($sql);


					echo nl2br($result);

			  	?>

              </p>

              <p> </p>

              <p></p>

            </div></td>

          <td width="230" valign="top"> 

            <table border="0" align="left" cellpadding="0" cellspacing="0">

              <tr> 

                <td width="0" height="0" align="center"><img src="img/office.JPG" width="280" height="208"></td>

                <td width="6" valign="top" background="img/shadowl_12.jpg"><img src="img/shadowl_02.jpg" width="6" height="6"></td>

              </tr>

              <tr> 

                <td width="173" height="6" background="img/shadowl_21.jpg"><img src="img/shadowl_20.jpg"></td>

                <td width="6" height="6" align="left" valign="top"><img src="img/shadowl_22.jpg" width="6" height="6"></td>

              </tr>

            </table></td>

        </tr>

        <tr> 

          <td height="87" colspan="2" valign="top"> <form name="form_con" method=POST >

              <table width=700 border=0 align="left" cellpadding=0 cellspacing="1" bgcolor="#e6e6e6">

                <tr bgcolor="#FFFFFF"> 

                  <td colspan="2" class="cls12"> <div  class="cls14"><font color="#0033FF">Feedback</font></div>

                    <br>

                    Please feel free to contact us by simply completing the Contact 

                    Submission Form below.<br>

                    We will get back to you within 24 hours. </td>

                </tr>

                <tr> 

                  <td width="12%" height="30" nowrap bgcolor="#FFFFFF" class="cls12"> 

                    <div align="right">Subject:</div></td>

                  <td bgcolor="#ffffff"> <input type="text" name="zipcode" size="18" value="<?php echo $ordernum; ?>" /> 

                    <div align="right"></div></td>

                </tr>

                <tr> 

                  <td width="12%" height="30" nowrap bgcolor="#FFFFFF" class="cls12"> 

                    <div align="right">Content:</div></td>

                  <td bgcolor="#ffffff"> <div align="left"> 

                      <textarea rows=8 name=msg cols=50></textarea>

                    </div></td>

                </tr>

                <tr> 

                  <td width="12%" height="30" nowrap bgcolor="#FFFFFF" class="cls12"> 

                    <div align="right">Name:</div></td>

                  <td bgcolor="#ffffff"> <input type=text name=alias size=12> 

                    <div align="right"></div></td>

                </tr>

                <tr> 

                  <td width="12%" height="30" nowrap bgcolor="#FFFFFF" class="cls12"> 

                    <div align="right">Tel:</div></td>

                  <td bgcolor="#ffffff"> <input type=text name=tel size=12> </td>

                </tr>

                <tr> 

                  <td height="22" bgcolor="#FFFFFF" class="cls12" nowrapvalign=top> 

                    <div align="right">E-mail:</div></td>

                  <td bgcolor="#ffffff"> <div align="left"> 

                      <input type=text name=email size=18>

                    </div></td>

                </tr>

                <tr bgcolor="#FFFFFF"> 

                  <td height="30" colspan=2 align=center valign="top"><table width="400" border="0" cellspacing="0" cellpadding="0">

                      <tr> 

                        <td width="141"> <div align="center"> 

                            <input  type="image" src="img/submit.gif" name="sub" value="提交">

                            &nbsp; </div></td>

                        <td width="259"><input type="reset" name="Submit" value=""  style="background-image:url(img/reset.jpg); border:0px; width:64px; height:21px;" /></td>

                      </tr>

                    </table></td>

                </tr>

              </table>

            </form></td>

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

var frm = new Validator("form_con");

frm.addV("alias", "req", "网名 not null");

frm.addV("email", "req", "Email not null");

frm.addV("zipcode", "req", "邮编 not null");

frm.addV("tel", "req", "电话 not null");

frm.addV("msg", "req", "内容 not null");

</script> 