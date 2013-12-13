<?php
require_once "./admin/comm/mysqldb.php"; 
//print_r($db)
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>NEWS</title>
<link href="img/css.css" rel="stylesheet" type="text/css">
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
    <td height="300" valign="top" bgcolor="#f4f4f4"><table width="650" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr> 
          <td>&nbsp;</td>
        </tr>
        <tr> 
          <td height="215" valign="top"> <div align="left"> 
              <p class="cls12"> 
                <?php 
			  		$sql = "select news from abouts ";
					$result = $db->GetOne($sql);
					echo nl2br($result);
			  ?>
              </p>
              <p> </p>
              <p></p>
            </div></td>
        </tr>
        <tr>
          <td height="31" valign="top"><div align="center"><a href="server.php" class="cls12">[GO 
              BACK]</a></div></td>
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
