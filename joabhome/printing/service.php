<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html>

<head>

<meta http-equiv="Content-Type" content="text/html; charset=gb2312">

<title>Paper bag,gift box, tag, lable,sticker,catalogue,office paper,printing art </title>

<link href="img/css.css" rel="stylesheet" type="text/css">

</head>



<body bgcolor="#000000" topmargin="3" bottommargin="0"  background="img/bg22.jpg"> <?php

	include("top5.php");
	require_once "./admin/comm/mysqldb.php"; 
	$sql = "select service from abouts ";
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
          <td width="365" height="90" valign="top" class="cls13"><?php echo nl2br($row);?></td>
          <td width="333" valign="top" class="cls13"><table  border="0" cellspacing="0" cellpadding="0">

        <tr> 

          <td width="326" height="215" background="img/tu.jpg"><div align="center">
              <script type="text/javascript">

function i(url,w,h){

      document.write('<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,29,0" width="'+w+'" height="'+h+'"> ');

      document.write('<param name="movie" value="' + url + '">');

      document.write('<param name="quality" value="high"> ');

      document.write('<param name="wmode" value="transparent"> ');

      document.write('<param name="menu" value="false"> ');

      document.write('<embed src="' + url + '" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="'+w+'" height="'+h+'"></embed> ');

      document.write('</object> ');

}

imgUrl1="img/ad/s1.jpg";

imgtext1="石头美人记"

imgLink1=escape("img/ad/s1.jpg");

imgUrl2="img/ad/s2.jpg";

imgtext2="期刊"

imgLink2=escape("/img/ad/s2.jpg");

imgUrl3="img/ad/s3.jpg";

imgtext3="大都市广告"

imgLink3=escape("img/ad/s3.jpg");

imgUrl4="img/ad/s2.jpg";

imgtext4="ECOSME与PClady合作风尚盛典"

imgLink4=escape("img/ad/s2.jpg");
imgUrl5="";
imgtext5="ECOSME与PClady合作风尚盛典"

imgLink5=escape("redirect.php?url=http://play4.pclady.com.cn/pclady071217/?ad=797");



 var focus_width=296

 var focus_height=183

 var text_height=0

 var swf_height = focus_height+text_height

 var pics=imgUrl1+"|"+imgUrl2+"|"+imgUrl3+"|"+imgUrl4

 var links=imgLink1+"|"+imgLink2+"|"+imgLink3+"|"+imgLink4

 var texts=imgtext1+"|"+imgtext2+"|"+imgtext3+"|"+imgtext4

 i('img/ad/focus1.swf?pics='+pics+'&links='+links+'&texts='+texts+'&borderwidth='+focus_width+'&borderheight='+focus_height+'&textheight='+text_height+'',296,183);

   </script>
            </div></td>
			
			</tr></table>
			</td>
        </tr>
      </table></td>

  </tr>

</table>

 <?php

	include("index-bottom.php");

?>

</body>

</html>

