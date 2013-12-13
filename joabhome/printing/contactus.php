<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">



<html>



<head>



<meta http-equiv="Content-Type" content="text/html; charset=gb2312">



<title>Paper bag,gift box, tag, lable,sticker,catalogue,office paper,printing art</title>



<link href="img/css.css" rel="stylesheet" type="text/css">



</head>







<body bgcolor="#000000" topmargin="3" bottommargin="0"  background="img/bg22.jpg">



 <?php



	include("top3.php");

	

	require_once "./admin/comm/mysqldb.php"; 

	$sql = "select contact from abouts ";

	$row = $db->GetOne($sql);

	

	

	

	//提交留言

	

	if($_REQUEST['sub_b']){

		$array = array('Subject'=>$_REQUEST['Subject'],

				   'Content'=>$_REQUEST['contents'],

				   'Name'=>$_REQUEST['Name'],

				   'Tel'=>$_REQUEST['Tel'],

				   'email'=>$_REQUEST['email'],

				   'up_date'=>time()

					);

		

		$array = $db->trimStr($array);  //去除特殊字符

		if (!$db->insert('getbook ',$array)){

			echo '<script language="javascript">alert("留言失败");</script>';

			echo '<script language="javascript">window.location.href = "/printing/contactus.php";</script>';

			exit;

		}else {

			echo '<script language="javascript">alert("Thanks,Go back!");</script>';

			echo '<script language="javascript">window.location.href = "/printing/contactus.php";</script>';

			exit;

		}

	}



?>



<table width="885" border="0" align="center" cellpadding="0" cellspacing="0">

<form name="form1" action="" method="post">

  <tr>



      <td width="186" height="176" valign="top" bgcolor="#717D8B"> 

        <?php



	include("left.php");



?>

      </td>



    <td width="711" valign="top" bgcolor="#FFFFFF"><table width="690" border="0" align="center" cellpadding="0" cellspacing="0">



        <tr> 



          <td valign="top" class="cls13"><?php echo nl2br($row);?></td>



        </tr>



        <tr>



          <td valign="top" class="cls13"><table width=639 border=0 align="left" cellpadding=0 cellspacing="0" >



              



              <tr> 



                <td width="12%" height="30" nowrap bgcolor="#FFFFFF" class="cls13"> 



                  <div align="right">Subject:</div></td>



                <td bgcolor="#ffffff"> <input type=text name=Subject size=18> 



                  <div align="right"></div></td>



              </tr>



              <tr> 



                <td width="12%" height="30" nowrap bgcolor="#FFFFFF" class="cls13"> 



                  <div align="right">Content:</div></td>



                <td bgcolor="#ffffff"> <div align="left"> 



                    <textarea name=contents rows=8 name=msg cols=50  ></textarea>



                  </div></td>



              </tr>



              <tr> 



                <td width="12%" height="30" nowrap bgcolor="#FFFFFF" class="cls13"> 



                  <div align="right">Name:</div></td>



                <td bgcolor="#ffffff"> <input type=text name=Name size=12> <div align="right"></div></td>



              </tr>



              <tr> 



                <td width="12%" height="30" nowrap bgcolor="#FFFFFF" class="cls13"> 



                  <div align="right">Tel:</div></td>



                <td bgcolor="#ffffff"> <input type=text name=Tel size=12> </td>



              </tr>



              <tr> 



                <td height="22" bgcolor="#FFFFFF" class="cls13" nowrapvalign=top> 



                  <div align="right">E-mail:</div></td>



                <td bgcolor="#ffffff"> <div align="left"> 



                    <input type=text name=email size=18>



                  </div></td>



              </tr>



              <tr bgcolor="#FFFFFF"> 



                <td height="30" colspan=2 align=center valign="top"><table width="400" border="0" cellspacing="0" cellpadding="0">



                    <tr> 



                      <td width="141"> <div align="center"> 


						<input type="hidden" name="sub_b" value="确定">
                          <input  type="submit"  name="sub" value="" style="background-image:url(img/submit.gif); border:0px; width:64px; height:21px;">



                          &nbsp; </div></td>



                      <td width="259"><input type="reset" name="Submit" value=""  style="background-image:url(img/reset.jpg); border:0px; width:64px; height:21px;" /></td>



                    </tr>



                  </table></td>



              </tr>



            </table></td>



        </tr>



      </table></td>



  </tr>

</form>

</table> <?php



	include("index-bottom.php");



?>



</body>



</html>



