<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">



<html>



<head>



<meta http-equiv="Content-Type" content="text/html; charset=gb2312">



<title>Paper bag,gift box, tag, lable,sticker,catalogue,office paper,printing art</title>



<link href="img/css.css" rel="stylesheet" type="text/css">



</head>
<body bgcolor="#000000" topmargin="3" bottommargin="0"  background="img/bg22.jpg"> <?php

	include("top.php");

	

	require_once "./admin/comm/mysqldb.php"; 

	$sql = "select *  from pro_info where id=".$_REQUEST['id'];

	$array = $db->GetAll($sql);

	$string = "没有相关产品";
	
	if($array){
		$string = '';
		$sql = "select * from pro_info where p_type_id=".$array[0]['p_type_id']." and id!=".$_REQUEST['id']." limit 10";
		$rows = $db->GetAll($sql);
		for($i=0; $i<count($rows); $i++){
		
			$string .='<td align="center"><table  border="0" align="center" cellpadding="0" cellspacing="0">

                <tr> 

                  <td align="center"><a href="show.php?id='.$rows[$i]['id'].'" target=_blank><img src="./admin/productimg/'.$rows[$i]['pic'].'" width="80" height="80" border=0></a></td>

                  <td width="6" valign="top" background="img/shadowl_12.jpg"><img src="img/shadowl_02.jpg" width="6" height="6"></td>

                </tr>

                <tr> 

                  <td  height="6" background="img/shadowl_21.jpg"><img src="img/shadowl_20.jpg"></td>

                  <td width="6" height="6" align="left" valign="top"><img src="img/shadowl_22.jpg" width="6" height="6"></td>

                </tr>

              </table><div align="center" class="cls13"><a href="show.php?id='.$rows[$i]['id'].'">'.$rows[$i]['p_name'].'</a></div></td>';
		}
		
	}


?>



<table width="885" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr> 
    <td width="186" height="88" valign="top" bgcolor="#717D8B"> 
      <?php



	include("left.php");



?>
    </td>
    <td width="711" rowspan="2" valign="top" bgcolor="#FFFFFF"><table width="699" border="0" cellspacing="0" cellpadding="0">
        <tr> 
          <td height="146"><div align="center"><br>
              <table width="300" height="120" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr> 
                  <td width="300" height="200" align="center"><a href="./admin/productimg/<?php echo $array[0][pic];?>" target="_blank"><img src="./admin/productimg/<?php echo $array[0][pic];?>" width="300" border="0"></a></td>
                  <td width="6" valign="top" background="img/shadowl_12.jpg"><img src="img/shadowl_02.jpg" width="6" height="6"></td>
                </tr>
                <tr> 
                  <td width="173" height="6" background="img/shadowl_21.jpg"><img src="img/shadowl_20.jpg"></td>
                  <td width="6" height="6" align="left" valign="top"><img src="img/shadowl_22.jpg" width="6" height="6"></td>
                </tr>
              </table>
            </div></td>
        </tr>
        <tr> 
          <td height="146"><div align="center"> 
              <table width="664" border="0" cellspacing="0" cellpadding="0">
                <tr> 
                  <td width="123" height="30" class="cls13"> <div align="right"><strong>Name:</strong></div></td>
                  <td width="541" class="cls13"><?php echo $array[0]['p_name']?></td>
                </tr>
                <tr> 
                  <td height="30" valign="top" class="cls13"> <div align="right"><strong>Descripiton:</strong></div></td>
                  <td valign="top" class="cls13"><?php echo $array[0]['descripiton']?></td>
                </tr>
                <tr> 
                  <td height="30" valign="top" class="cls13"> <div align="right"><strong>Payment 
                      Details:</strong></div></td>
                  <td valign="top" class="cls13"><?php echo $array[0]['payment']?></td>
                </tr>
                <tr> 
                  <td height="30" valign="top" class="cls13"> <div align="right"><strong>Delivery 
                      Details: </strong></div></td>
                  <td valign="top" class="cls13"><?php echo $array[0]['delivery']?></td>
                </tr>
              </table>
              <a href="mailto:printing@joabhomearts.com"><img src="img/bg_r2_c3.jpg" width="121" height="90" border="0"></a> 
            </div></td>
        </tr>
        <tr> 
          <td height="22"><img src="img/Relatedproducts.jpg" width="694" height="22"></td>
        </tr>
        <tr> 
          <td height="73"><table width="699" border="0" cellspacing="0" cellpadding="0">
              <tr> 
                <td height="146"><div id=demo style="overflow:hidden;height:140px;width:690px;">
<table align=left cellpadding=0 cellspace=0 border=0>
<tr>
      <td id=demo1 valign=top>
                  <table width="100%" border="0">
                    <!--<tr>
                    <td><img src="./admin/productimg/'.$array[$i]['pic'].'" width="80" height="80"><div>sf</div></td>
                    <td><img src="./admin/productimg/'.$array[$i]['pic'].'" width="80" height="80"><div>sf</div></td>
                    <td><img src="./admin/productimg/'.$array[$i]['pic'].'" width="80" height="80"><div>sf</div></td>
                    <td><img src="./admin/productimg/'.$array[$i]['pic'].'" width="80" height="80"><div>sf</div></td>
                  </tr>-->
                    <tr><?php echo $string;?></tr>
                  </table>
                </td>
      <td id=demo2 valign=top></td></tr></table></div> 
<script> 
var speed=30 
demo2.innerHTML=demo1.innerHTML 
demo.scrollLeft=demo.scrollWidth 
function Marquee(){ 
if(demo.scrollLeft<=0) 
demo.scrollLeft+=demo2.offsetWidth 
else{ 
demo.scrollLeft-- 
} 
} 
var MyMar=setInterval(Marquee,speed) 
demo.onmouseover=function() {clearInterval(MyMar)} 
demo.onmouseout=function() {MyMar=setInterval(Marquee,speed)} 
</script> 
				  
				  
				  </td>
              </tr>
            </table></td>
        </tr>
      </table></td>
  </tr>
  <tr>
    <td height="88" valign="bottom" bgcolor="#717D8B">
<table cellpadding="0" cellspacing="0" bordercolor="0">
        <tr> 
          <td width="186" height="140" valign="top"  ><img src="img/jq.jpg" width="185"><br>

          </td>
        </tr>
      </table>
    </td>
  </tr>
</table>
<?php



	include("index-bottom.php");



?>



</body>



</html>



