<?php
//exit('sdfsdfs');


session_start();

require_once "./admin/comm/mysqldb.php"; 


//print_r($db)


?>



<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">


<html>


<head>
	<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
	
	<title>
		Oil Painting - Oilpainting factory,Paintings wholesale,Paintings copy,Painting custom
	</title>
	
	<meta name="description" content="Find any oil painting,Oilpainting factory wholesale sales oilpaintings.All paintings portrait painting,Oilpainting copy 100% handmade oil paintings."/>
  	
  	<meta name="keywords" content="oil paintings for sale,oil painting reproductions,china oil painting wholesale,cheap oil paintings"/>
	
	<link href="img/css.css" rel="stylesheet" type="text/css">
	
	<style type="text/css">
	
	BODY {
		BACKGROUND-POSITION: center 50%; BACKGROUND-IMAGE: url(img/background_tile.gif); MARGIN: 0px; BACKGROUND-REPEAT: repeat-y; BACKGROUND-COLOR: #cedce9; TEXT-ALIGN: center;
	}
	table,td,tr{
		border:0px solid black;
		border-collapse:collapse;
	}
	</style>
	
</head>





<body topmargin="0" leftmargin="0" rightmargin="0" bottommargin="0" >

<table width="720" border="0" align="center" cellpadding="0" cellspacing="0">

  <tr bgcolor="#FFFFFF"> 

    <td height="126" colspan="2" valign="top"> 

      <?php

		  	include("top.php");

		  ?>
    </td>

  </tr>


  <tr> 

    <td height="16" valign="top" bgcolor="#FFFFFF" style="background-color:#3C95E9;"><img src="img/user.jpg" width="191" height="21"></td>

    <td height="16" valign="top" bgcolor="#FFFFFF"><img src="img/cobrief.jpg" width="594" height="21"></td>

  </tr>



  <tr> 
    <td width="190" height="1000" valign="top" background="img/lbg.jpg" style="background-repeat:repeat-x;background-color:white;"><!--left side -->
    
    <table width="100%" border="0" cellspacing="0" cellpadding="0">

        <tr> 
        
          <td height=8 colspan="2"></td>

        </tr>



        <tr> 
          	<td height="58" colspan="2" valign="top"> 
			 <?php
	
				include("userLogin.php");
	
			  ?>
			</td>
        </tr>
        
        
        <tr> 

			<td height="1" colspan="2" background=img/line.gif></td>

        </tr>



        <tr> 
          <td height="138" colspan="2" valign="top"> 
          	<div align="center"> 
			<?php include("menu.php"); ?>
			</div>
		  </td>
        </tr>


        <tr> 

          <td height="1" colspan="2" background=img/line.gif></td>

        </tr>

      </table>
    </td>



    <td width="595" valign="top" bgcolor="#FFFFFF">
    	<table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr> 

          <td width="50%"> <table border="0" align="center" cellpadding="0" cellspacing="0">

              <tr> 
                <td width="280" height="180" background="img/bg1.jpg" align="center"> 



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



imgUrl1="img/ad/1.jpg";



imgtext1="石头美人记"



imgLink1=escape("redirect.php?url=http://shop34951680.taobao.com");



imgUrl2="img/ad/2.jpg";



imgtext2="期刊"



imgLink2=escape("/periodical.php");



imgUrl3="img/ad/3.jpg";



imgtext3="大都市广告"



imgLink3=escape("http://biba.metropolis-mag.com/");



imgUrl4="img/ad/4.jpg";



imgtext4="ECOSME与PClady合作风尚盛典"



imgLink4=escape("redirect.php?url=http://play4.pclady.com.cn/pclady071217/?ad=797");



imgtext5="ECOSME与PClady合作风尚盛典"



imgLink5=escape("redirect.php?url=http://play4.pclady.com.cn/pclady071217/?ad=797");







 var focus_width=250



 var focus_height=150



 var text_height=0



 var swf_height = focus_height+text_height



 var pics=imgUrl1+"|"+imgUrl2+"|"+imgUrl3+"|"+imgUrl4



 var links=imgLink1+"|"+imgLink2+"|"+imgLink3+"|"+imgLink4



 var texts=imgtext1+"|"+imgtext2+"|"+imgtext3+"|"+imgtext4



 i('img/ad/focus1.swf?pics='+pics+'&links='+links+'&texts='+texts+'&borderwidth='+focus_width+'&borderheight='+focus_height+'&textheight='+text_height+'',250,150);



   </script>



                </td>



                <td width="6" valign="top" background="img/shadowl_12.jpg"><img src="img/shadowl_02.jpg" width="6" height="6"></td>



              </tr>



              <tr> 



                <td width="173" height="6" background="img/shadowl_21.jpg"><img src="img/shadowl_20.jpg"></td>



                <td width="6" height="6" align="left" valign="top"><img src="img/shadowl_22.jpg" width="6" height="6"></td>



              </tr>



            </table></td>



          <td width="50%" valign="top"  class="cls13"> <table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">



              <tr> 



                <td  class="cls12"> 

                  <?php $sql = "select abouts from abouts ";


					mysql_query("SET NAMES ","utf-8");
					$result = $db->GetOne($sql);
				


					echo substr(nl2br($result),0,400)."...<a href='/aboutus.php'>[More]</a>"; ?>

                </td>



              </tr>



            </table></td>



        </tr>

      </table>



      <img src="img/prolist.jpg"> <table width="588" border="0" align="center" cellpadding="0" cellspacing="0">



        <tr> 



          <td><a href="product.php?type_id=24" target="_blank"><img src="img/smallclass/masterpieces.gif" width="190" height="82" border="0"></a></td>



          <td><a href="product.php?type_id=26" target="_blank"><img src="img/smallclass/portrait.gif" width="190" height="82" border="0"></a></td>



          <td><a href="product.php?type_id=33" target="_blank"></a><a href="product.php?type_id=3470" target="_blank"><img src="img/smallclass/carfts.gif" width="190" height="82" border="0"></a></td>
        </tr>



        <tr> 



          <td><a href="product.php?type_id=25" target="_blank"><img src="img/smallclass/decorative-painting .gif" width="190" height="82" border="0"></a></td>



          <td><a href="product.php?type_id=45" target="_blank"><img src="img/smallclass/2.gif" width="190" height="82" border="0"></a></td>



          <td><a href="product.php?type_id=28" target="_blank"><img src="img/smallclass/6.gif" width="190" height="82" border="0"></a></td>
        </tr>



        <tr> 



          <td><a href="product.php?type_id=33" target="_parent"><img src="img/smallclass/classic people .gif" width="190" height="82" border="0"></a></td>



          <td><a href="product.php?type_id=36" target="_blank"><img src="img/smallclass/impression-people.gif" width="190" height="82" border="0"></a></td>



          <td><a href="product.php?type_id=35" target="_blank"><img src="img/smallclass/nude.gif" width="190" height="82" border="0"></a></td>
        </tr>



        <tr> 



          <td><a href="product.php?type_id=13" target="_blank"><img src="img/smallclass/classic landscape.gif" width="190" height="82" border="0"></a></td>



          <td><a href="product.php?type_id=15" target="_blank"><img src="img/smallclass/impression-landscape.gif" width="190" height="82" border="0"></a></td>



          <td><a href="product.php?type_id=14" target="_blank"><img src="img/smallclass/8.gif" width="190" height="82" border="0"></a></td>
        </tr>



        <tr> 



          <td><a href="product.php?type_id=26" target="_blank"><img src="img/smallclass/classic flower .gif" width="190" height="82" border="0"></a></td>



          <td><a href="product.php?type_id=43" target="_blank"><img src="img/smallclass/impression-flower.gif" width="190" height="82" border="0"></a></td>



          <td><a href="product.php?type_id=35" target="_blank"></a><a href="product.php?type_id=3448"><img src="img/smallclass/true-life-flower.gif" width="190" height="82" border="0"></a></td>
        </tr>



        <tr> 



          <td><a href="product.php?type_id=39" target="_blank"><img src="img/smallclass/classic-still-life.gif" width="190" height="82" border="0"></a></td>



          <td><a href="product.php?type_id=40" target="_blank"><img src="img/smallclass/Impression-Still-life.gif" width="190" height="82" border="0"></a></td>



          <td><a href="product.php?type_id=3451" target="_blank"><img src="img/smallclass/realistic-stife life.gif" width="190" height="82" border="0"></a></td>
        </tr>



        <tr> 

          <td><a href="product.php?type_id=34" target="_blank"><img src="img/smallclass/ballet .gif" width="190" height="82" border="0"></a></td>

          <td><a href="product.php?type_id=37" target="_blank"><img src="img/smallclass/Chinese .gif" width="190" height="82" border="0"></a></td>

          <td><a href="product.php?type_id=3450" target="_blank"><img src="img/smallclass/children .gif" width="190" height="82" border="0"></a></td>
		
		</tr>



        <tr> 

          <td><a href="product.php?type_id=49" target="_blank"></a><a href="product.php?type_id=46"><img src="img/smallclass/animal .gif" width="190" height="82" border="0"></a></td>

          <td><a href="product.php?type_id=47" target="_blank"><img src="img/smallclass/wildlife.gif" width="190" height="82" border="0"></a></td>

          <td><a href="product.php?type_id=48" target="_blank"></a><a href="product.php?type_id=44"><img src="img/smallclass/10.gif" width="190" height="82" border="0"></a></td>
		
		</tr>



        <tr> 

          <td><a href="product.php?type_id=49" target="_blank"><img src="img/smallclass/7.gif" width="190" height="82" border="0"></a></td>

          <td><a href="product.php?type_id=48" target="_self"><img src="img/smallclass/vince.gif" width="190" height="82" border="0"></a></td>

          <td><a href="product.php?type_id=44" target="_blank"></a><a href="product.php?type_id=76"><img src="img/smallclass/storefront.gif" width="190" height="82" border="0"></a></td>
        
        </tr>



        <tr> 

          <td><a href="product.php?type_id=52" target="_blank"><img src="img/smallclass/3.gif" width="190" height="82" border="0"></a></td>



          <td><a href="product.php?type_id=74" target="_blank"></a><a href="product.php?type_id=51"><img src="img/smallclass/9.gif" width="190" height="82" border="0"></a></td>



          <td><a href="product.php?type_id=50" target="_blank"><img src="img/smallclass/pairs-street.gif" width="190" height="82" border="0"></a></td>
        </tr>



        <tr> 

          <td><a href="product.php?type_id=75" target="_blank"><img src="img/smallclass/original.gif" width="190" height="82" border="0"></a></td>

          <td><a href="product.php?type_id=30" target="_blank"><img src="img/smallclass/watercolor.gif" width="190" height="82" border="0"></a></td>

          <td><a href="product.php?type_id=28" target="_blank"></a><a href="product.php?type_id=74"><img src="img/smallclass/religions.gif" width="190" height="82" border="0"></a></td>
        </tr>



        <tr>

          <td><a href="product.php?type_id=53" target="_blank"><img src="img/smallclass/wine bottle.gif" width="190" height="82" border="0"></a></td>

          <td><a href="product.php?type_id=27" target="_blank"><img src="img/smallclass/tapestry.gif" width="190" height="80" border="0"></a></td>

          <td><a href="product.php?type_id=3447"><img src="img/smallclass/frams-&-stretcher-bars.gif" width="190" height="82" border="0"></a></td>
        </tr>
        
        <tr>
          <td><a href="product.php?type_id=3470"><img src="img/smallclass/Household-Series.gif" width="190" height="82" border="0"></a></td>
          <td><a href="product.php?type_id=3470"><img src="img/smallclass/Easter-Series.gif" width="190" height="82" border="0"></a></td>
          <td><a href="product.php?type_id=3470"><img src="img/smallclass/Christmas-Series.gif" width="190" height="82" border="0"></a></td>
        </tr>
        <tr>
          <td colspan="3"><img src="compic.jpg" border="0" width="570" height="884"></td>
        </tr>

      </table>
	</td>

 </tr>



  <tr> 
	
    <td height="147" colspan="2" valign="top" >

      <?php
			//页面底部
		  	include("index-bottom.php");

		  ?>

    </td>

  </tr>

</table>

</body>

</html>



