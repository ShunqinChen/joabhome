<?php
$link = mysql_connect("localhost", "joabhome", "5736811")
        or die("Could not connect : " . mysql_error()); 
    mysql_select_db("joabhome_jiankuncai") or die("Could not select database");

if (($_REQUEST['alias']!="") and ($_REQUEST['msg']!="")) {
 
  $serial=md5(uniqid(rand()));
  $alias = $_REQUEST['alias'];
  $ip=$_SERVER['REMOTE_ADDR'];
  $msgdate = time();
  $email = $_REQUEST['email'];
  $msg=$_REQUEST['msg'];
  $flag="1";
  
  $query="INSERT into guestbook(serial, alias, ip, msgdate, email, msg, flag) 
  	values('$serial',  '$alias', '$ip', '$msgdate', '$email', '$msg', '$flag')";
	echo $query;
  mysql_query($query);
	echo '<script language="javascript">alert("谢谢你的留言");</script>';
	echo '<script language="javascript">window.location.href = "/guestbook.php";</script>';
	exit;
  //Header("Location: ./guestbook.php");
  exit;

}else {
?>



<html>
<head>
<META http-equiv=Page-Enter content=blendTrans(Duration=0.5)>
<META http-equiv=Page-Exit content=blendTrans(Duration=0.5)>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
</head>

<link href="img/css.css" rel="stylesheet" type="text/css">
<body bgcolor="#000000">
<table width="75%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr> 
   <td height="113" colspan="2" valign="top">	  

		  <?php

		  	include("top.php");

		  ?> </td> 
</tr>
 <tr>
    <td height="30"> 
  <tr> 
    <td height="283" valign="top"> <table width="780" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr> 
          <td width="785" height="312" valign="top" style="border-left:1px solid red;border-right:1px solid red;border-
top:1px solid red;border-bottom:1px solid red;"> 
            <table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr> 
                <td height="10"></td>
              </tr>
			  <tr><td height=100>
			  <table width='98%' border=0 align=center cellpadding=0 cellspacing=0 bgcolor="#FFFFFF" 
class='ask_table'>
                    <?php 
//--------------------------- 
// ? index.php 
// Author: Wilson Peng 
//        Copyright (C) 2000 
//--------------------------- 
/*$link = mysql_connect("218.85.134.21", "sq8zxywwt", "cycg8899")
        or die("Could not connect : " . mysql_error()); 
    mysql_select_db("sq8zxywwt") or die("Could not select database");*/
    
$WebmasterIPArray = array( 
  "61.154.9.103",     // ??? IP 
  "10.0.2.28"      // ??? IP 
); 

$WebmasterIP=false; 
for ($i=0; $i<Count($WebmasterIPArray); $i++) { 
  if ($_SERVER['REMOTE_ADDR'] == $WebmasterIPArray[$i]) $WebmasterIP=true; 
} 
include ("showPage.class.php"); 

$sql="SELECT * from guestbook where flag='1' order by msgdate desc "; 
//echo $query;
//$result = mysql_query($query) or die('Query failed : ' . mysql_error()); 
genpage($sql);  //只需要正常代码加上这一行就ok。
$result =mysql_query($sql);
$i=0; 
while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
        foreach ($line as $col_value) {
        	$guestbook[$i][] = $col_value; 
        	
        }
       $i++;
    }
for($i=0; $i<count($guestbook); $i++){
	

?>
                    <tr >
	                  <td height="38" valign="top" bgcolor="#333333" class='12'>&nbsp;&nbsp;内容:<br>
                        &nbsp;&nbsp;<?php echo nl2br($guestbook[$i][6])?></td>
</tr>
 <tr bgcolor='#ffffff'>
	                  <td height="33" valign="top" bgcolor="#333333" class='12'> 
                        &nbsp;&nbsp;回复:<br>
                        &nbsp;&nbsp;<?php echo nl2br($guestbook[$i][7])?></td>
</tr>
<tr>
	                  <td height="22" bgcolor="#CCCCCC" class=cls12><b>&nbsp;</b>&nbsp;&nbsp;网名<b>:<?php echo $guestbook
[$i][2]?></b> &nbsp; <?php echo date('Y-m-d',$guestbook[$i][4]) ?></I>&nbsp;FROM:<?php echo $guestbook[$i][3] ?></td>
</tr>

<?php 
}



?>
<tr>
                      <td align="center" bgcolor="#000000" class=cls12> 
                        <?php showpage(); ?>
                      </td>
                    </tr>
</table>
	  
			  </td>
              <tr> 
                <td height="42" class="cls12"><form method=POST >
                    <table width=450 border=0 align="center" cellpadding=0 cellspacing="0">
                      <tr>
                        <td width="12%" height="30" nowrap bgcolor="#333333" class="cls12"> 
                          <div align="right">网 名::</div></td>
                        <td width=19% bgcolor="#333333">
<input type=text name=alias size=12>
                        </td>
                        <td width="17%" nowrap bgcolor="#333333" class="cls12">
<div align="right">E_mail:</div></td>
                        <td width=52% bgcolor="#333333">
<input type=text name=email size=18>
                        </td>
  </tr>
  <tr>
                        <td height="22" bgcolor="#333333" class="cls12" nowrapvalign=top> 
                          <div align="right">内容:</div></td>
                        <td colspan=3 bgcolor="#333333"> <div align="left">
                            <textarea rows=8 name=msg cols=50></textarea>
                          </div></td>
  </tr>
  <tr>
    <td colspan=4 align=center>
       <input type=submit value="送出留言">
       <input type=reset value="擦除留言">
    </td>
  </tr>
</table>
</form> 

<?php
}
?>
</td>
              </tr>
              <tr> 
                <td height="10" class="cls12">&nbsp;</td>
              </tr>
            </table></td>
        </tr>
        <tr> 
          <td height="30" >   <?php
		  	include("index-bottom.php");
		  ?></td>
        </tr>
      </table></td>
  </tr>
</table>
