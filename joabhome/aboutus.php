<?php
require_once "./admin/comm/mysqldb.php"; 
//print_r($db)
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>oil painting & portrait, oil painting factory, wholesale oil painting, oil painting reproductions
</title>
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
   <td height="126" colspan="2" valign="top">  <?php
		  	include("top.php");
		  ?> </td>
  </tr>
  

  <tr> 
    <td height="300" valign="top" bgcolor="#f4f4f4"><table width="689" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr> 
          <td width="689" height="5"></td>
        </tr>
        <tr> 
          <td height="215" valign="top"> 
          	<div align="left" style="padding-top:5px;"> 
              <p class="cls12"> 
                <?php 
			  		$sql = "select abouts from abouts ";
					$result = $db->GetOne($sql);
					echo nl2br($result);
			  ?>
              </p>
              <p> </p>
              <p></p>
            </div></td>
        </tr>
        <tr>
          <td height="53" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr> 
                <td width="32%"> <table border="0" align="left" cellpadding="0" cellspacing="0">
                    <tr> 
                      <td width="0" height="0" align="center"><img src="img/about/c03x.jpg" width="214" height="158"></td>
                      <td width="6" valign="top" background="img/shadowl_12.jpg"><img src="img/shadowl_02.jpg" width="6" height="6"></td>
                    </tr>
                    <tr> 
                      <td width="173" height="6" background="img/shadowl_21.jpg"><img src="img/shadowl_20.jpg"></td>
                      <td width="6" height="6" align="left" valign="top"><img src="img/shadowl_22.jpg" width="6" height="6"></td>
                    </tr>
                  </table></td>
                <td width="31%"> <table border="0" align="left" cellpadding="0" cellspacing="0">
                    <tr> 
                      <td width="214" height="0" align="center"><img src="img/about/DSC02187.JPG" width="214" height="158"></td>
                      <td width="10" valign="top" background="img/shadowl_12.jpg"><img src="img/shadowl_02.jpg" width="6" height="6"></td>
                    </tr>
                    <tr> 
                      <td width="214" height="6" background="img/shadowl_21.jpg"><img src="img/shadowl_20.jpg"></td>
                      <td width="10" height="6" align="left" valign="top"><img src="img/shadowl_22.jpg" width="6" height="6"></td>
                    </tr>
                  </table></td>
                <td width="37%" height="164">
<table border="0" align="left" cellpadding="0" cellspacing="0">
                    <tr> 
                      <td width="0" height="0" align="center"><img src="img/about/DSC02770.JPG" width="214" height="158"></td>
                      <td width="6" valign="top" background="img/shadowl_12.jpg"><img src="img/shadowl_02.jpg" width="6" height="6"></td>
                    </tr>
                    <tr> 
                      <td width="173" height="6" background="img/shadowl_21.jpg"><img src="img/shadowl_20.jpg"></td>
                      <td width="6" height="6" align="left" valign="top"><img src="img/shadowl_22.jpg" width="6" height="6"></td>
                    </tr>
                  </table> </td>
              </tr>
              <tr> 
                <td><div align="left"> 
                    <table border="0" align="left" cellpadding="0" cellspacing="0">
                      <tr> 
                        <td width="0" height="0" align="center"><img src="img/about/DSC04597.JPG" width="214" height="158"></td>
                        <td width="6" valign="top" background="img/shadowl_12.jpg"><img src="img/shadowl_02.jpg" width="6" height="6"></td>
                      </tr>
                      <tr> 
                        <td width="173" height="6" background="img/shadowl_21.jpg"><img src="img/shadowl_20.jpg"></td>
                        <td width="6" height="6" align="left" valign="top"><img src="img/shadowl_22.jpg" width="6" height="6"></td>
                      </tr>
                    </table>
                  </div></td>
                <td> <table width="220" border="0" align="left" cellpadding="0" cellspacing="0">
                    <tr> 
                      <td width="214" height="0" align="center"><img src="img/about/oil-painting-art-gallery001.jpg" width="214" height="158"></td>
                      <td width="10" valign="top" background="img/shadowl_12.jpg"><img src="img/shadowl_02.jpg" width="6" height="6"></td>
                    </tr>
                    <tr> 
                      <td width="214" height="6" background="img/shadowl_21.jpg"><img src="img/shadowl_20.jpg"></td>
                      <td width="10" height="6" align="left" valign="top"><img src="img/shadowl_22.jpg" width="6" height="6"></td>
                    </tr>
                  </table></td>
                <td> <table width="206" border="0" align="left" cellpadding="0" cellspacing="0">
                    <tr> 
                      <td width="0" height="0" align="center"><img src="img/about/xhd-0091.JPG" width="214" height="158"></td>
                      <td width="6" valign="top" background="img/shadowl_12.jpg"><img src="img/shadowl_02.jpg" width="6" height="6"></td>
                    </tr>
                    <tr> 
                      <td width="173" height="6" background="img/shadowl_21.jpg"><img src="img/shadowl_20.jpg"></td>
                      <td width="6" height="6" align="left" valign="top"><img src="img/shadowl_22.jpg" width="6" height="6"></td>
                    </tr>
                  </table></td>
              </tr>
            </table>
          </td>
        </tr>
      </table> </td>
  </tr>
  <tr> 
    <td height="147" valign="top" background="img/bbg.gif">  
    	<?php
			//页面底部
		  	include("index-bottom.php");

		  ?>
	</td>
  </tr>
</table>
</body>
</html>
