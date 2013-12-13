<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html>

<head>

<meta http-equiv="Content-Type" content="text/html; charset=gb2312">

<title>Paper bag,gift box, tag, lable,sticker,catalogue,office paper,printing art </title>

<link href="img/css.css" rel="stylesheet" type="text/css">

</head>



<body bgcolor="#000000" topmargin="3" bottommargin="0"  background="img/bg22.jpg">

 <?php

	include("top4.php");
	require_once "./admin/comm/mysqldb.php"; 
	$sql = "select management from abouts ";
	$row = $db->GetOne($sql);

?>

<table width="885" border="0" align="center" cellpadding="0" cellspacing="0">

  <tr>

    <td width="186" height="176" valign="top" bgcolor="#717D8B"> 
      <?php

	include("left.php");

?>
    </td>

    <td width="711" valign="top" bgcolor="#FFFFFF"><table width="690" border="0" align="center" cellpadding="0" cellspacing="0">

        <tr> 

          <td valign="top" class="cls13"><table border="0" align="right" cellpadding="0" cellspacing="0">
              <tr> 
                <td width="0" height="0" align="center"><img src="img/3.jpg" width="186" height="183"></td>
                <td width="6" valign="top" background="img/shadowl_12.jpg"><img src="img/shadowl_02.jpg" width="6" height="6"></td>
              </tr>
              <tr> 
                <td width="173" height="6" background="img/shadowl_21.jpg"><img src="img/shadowl_20.jpg"></td>
                <td width="6" height="6" align="left" valign="top"><img src="img/shadowl_22.jpg" width="6" height="6"></td>
              </tr>
            </table><?php echo nl2br($row);?>
            </td>

        </tr>

      </table></td>

  </tr>

</table> <?php

	include("index-bottom.php");

?>

</body>

</html>

