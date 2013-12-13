<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<SCRIPT language=JavaScript event=FSCommand() for=dl>
threenine1.style.visibility='hidden';
threenine.style.visibility='hidden';
</SCRIPT>

<html>



<head>



<meta http-equiv="Content-Type" content="text/html; charset=gb2312">



<title>Paper bag,gift box, tag, lable,sticker,catalogue,office paper,printing art </title>



<link href="img/css.css" rel="stylesheet" type="text/css">



</head>







<body bgcolor="#000000" topmargin="3" bottommargin="0"  background="img/bg22.jpg">



   <?php



	include("top.php");

	

	require_once "./admin/comm/mysqldb.php"; 

	$sql = "select abouts from abouts ";

	$row = $db->GetOne($sql);



?>



<table width="885" border="0" align="center" cellpadding="0" cellspacing="0">



  <tr>



    <td width="186" height="176" valign="top" bgcolor="#717D8B"> 
      <?php



	include("left.php");



?>
      <table cellpadding="0" cellspacing="0" bordercolor="0">
        <tr> 
          <td width="186" height="157" valign="top" ><img src="img/jq.jpg" width="185"> 
          </td>
        </tr>
      </table>
    </td>



    <td width="711" valign="top" bgcolor="#FFFFFF"><table width="699" border="0" cellspacing="0" cellpadding="0">



        <tr> 



          <td width="326" height="215" valign="top"> 

            <div align="center">

              <table  border="0" cellspacing="0" cellpadding="0">

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

                </tr>

              </table>

            </div></td>



          <td width="372" valign="top" class="cls13">



<table width="366" border="0" align="center" cellpadding="0" cellspacing="0">



              <tr>



                <td width="366" class="cls13"><?php echo substr(nl2br($row),0,500)."...<a href='company.php'>[More]</a>";?></td>

              </tr>

            </table>          </td>

        </tr>



        <tr> 



          <td colspan="2"><div align="center"><img src="img/new-product.jpg" width="694" height="22"></div></td>

        </tr>



        <tr> 



          <td height="146" colspan="2"><div id=demo style="overflow:hidden;height:140px;width:690px;">
<table align=left cellpadding=0 cellspace=0 border=0>
<tr><td id=demo1 valign=top><table width="699" border="0" cellspacing="0" cellpadding="0"><tr> 



          <td height="146">

<?php	

	$where = " 1=1 ";

	if($_REQUEST['type_id']) $where .=" and p_type_id=".$_REQUEST['type_id'];

	

	

	$sql = "select * from pro_info where ".$where;



	genpage($sql);	

	$rows = $db->GetAll($sql);

	$array = $rows;

if($array){

	for($i=0; $i<count($array); $i++){



	//echo $i;



        echo '<table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr> 

                <td><div align="center"> 
                   <table width="93%" border="0" cellspacing="0" cellpadding="0">
                    <tr> 
                        <td><table width="150" height="120" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr> 
                              <td width="0" height="0" align="center"><a href="show.php?id='.$array[$i]['id'].'"><img src="./admin/productimg/'.$array[$i]['pic'].'" width="80" height="80" border=0></a></td>
                              <td width="6" valign="top" background="img/shadowl_12.jpg"><img src="img/shadowl_02.jpg" width="6" height="6"></td>
                            </tr>
                            <tr> 
                             <td width="173" height="6" background="img/shadowl_21.jpg"><img src="img/shadowl_20.jpg"></td>



                              <td width="6" height="6" align="left" valign="top"><img src="img/shadowl_22.jpg" width="6" height="6"></td>



                            </tr>



                          </table></td>



                      </tr>



                      <tr> 



                        <td><div align="center"> 



                            <p class="cls13">Name:<a href="show.php?id='.$array[$i]['id'].'">'.$array[$i]['p_name'].'</a></p>



                          </div></td>



                      </tr>



                    </table>



                  </div></td>';

				  

				  

				  

				  

			if($array[$i+1]){



				++$i;

				  



                echo '<td><div align="center"> 



                    <table width="95%" border="0" cellspacing="0" cellpadding="0">
                      <tr> 
                        <td><table width="150" height="120" border="0" align="center" cellpadding="0" cellspacing="0">
                            <tr> 

                              <td width="0" height="0" align="center"><a href="show.php?id='.$array[$i]['id'].'"><img src="./admin/productimg/'.$array[$i]['pic'].'" width="80" height="80" border=0></a></td>
                              <td width="6" valign="top" background="img/shadowl_12.jpg"><img src="img/shadowl_02.jpg" width="6" height="6"></td>
                            </tr>
                            <tr> 
                              <td width="173" height="6" background="img/shadowl_21.jpg"><img src="img/shadowl_20.jpg"></td>
                              <td width="6" height="6" align="left" valign="top"><img src="img/shadowl_22.jpg" width="6" height="6"></td>



                            </tr>



                          </table></td>



                      </tr>



                      <tr> 



                        <td><div align="center"> 



                            <p class="cls13">Name:<a href="show.php?id='.$array[$i]['id'].'">'.$array[$i]['p_name'].'</a></p>



                          </div></td>



                      </tr>



                    </table>



                  </div></td>';}

				  
if($array[$i+1]){



				++$i;

				  



                echo '<td><div align="center"> 



                    <table width="95%" border="0" cellspacing="0" cellpadding="0">



                      <tr> 



                        <td><table width="150" height="120" border="0" align="center" cellpadding="0" cellspacing="0">



                            <tr> 



                              <td width="0" height="0" align="center"><a href="show.php?id='.$array[$i]['id'].'"><img src="./admin/productimg/'.$array[$i]['pic'].'" width="80" height="80" border=0></a></td>



                              <td width="6" valign="top" background="img/shadowl_12.jpg"><img src="img/shadowl_02.jpg" width="6" height="6"></td>



                            </tr>



                            <tr> 



                              <td width="173" height="6" background="img/shadowl_21.jpg"><img src="img/shadowl_20.jpg"></td>



                              <td width="6" height="6" align="left" valign="top"><img src="img/shadowl_22.jpg" width="6" height="6"></td>



                            </tr>



                          </table></td>



                      </tr>



                      <tr> 



                        <td><div align="center"> 



                            <p class="cls13">Name:<a href="show.php?id='.$array[$i]['id'].'">'.$array[$i]['p_name'].'</a></p>



                          </div></td>



                      </tr>



                    </table>



                  </div></td>';}if($array[$i+1]){



				++$i;

				  



                echo '<td><div align="center"> 



                    <table width="95%" border="0" cellspacing="0" cellpadding="0">



                      <tr> 



                        <td><table width="150" height="120" border="0" align="center" cellpadding="0" cellspacing="0">



                            <tr> 



                              <td width="0" height="0" align="center"><a href="show.php?id='.$array[$i]['id'].'"><img src="./admin/productimg/'.$array[$i]['pic'].'" width="80" height="80" border=0></a></td>



                              <td width="6" valign="top" background="img/shadowl_12.jpg"><img src="img/shadowl_02.jpg" width="6" height="6"></td>



                            </tr>



                            <tr> 



                              <td width="173" height="6" background="img/shadowl_21.jpg"><img src="img/shadowl_20.jpg"></td>



                              <td width="6" height="6" align="left" valign="top"><img src="img/shadowl_22.jpg" width="6" height="6"></td>



                            </tr>



                          </table></td>



                      </tr>



                      <tr> 



                        <td><div align="center"> 



                            <p class="cls13">Name:<a href="show.php?id='.$array[$i]['id'].'">'.$array[$i]['p_name'].'</a></p>



                          </div></td>



                      </tr>



                    </table>



                  </div></td>';}if($array[$i+1]){



				++$i;

				  



                echo '<td><div align="center"> 



                    <table width="95%" border="0" cellspacing="0" cellpadding="0">



                      <tr> 



                        <td><table width="150" height="120" border="0" align="center" cellpadding="0" cellspacing="0">



                            <tr> 



                              <td width="0" height="0" align="center"><a href="show.php?id='.$array[$i]['id'].'"><img src="./admin/productimg/'.$array[$i]['pic'].'" width="80" height="80" border=0></a></td>



                              <td width="6" valign="top" background="img/shadowl_12.jpg"><img src="img/shadowl_02.jpg" width="6" height="6"></td>



                            </tr>



                            <tr> 



                              <td width="173" height="6" background="img/shadowl_21.jpg"><img src="img/shadowl_20.jpg"></td>



                              <td width="6" height="6" align="left" valign="top"><img src="img/shadowl_22.jpg" width="6" height="6"></td>



                            </tr>



                          </table></td>



                      </tr>



                      <tr> 



                        <td><div align="center"> 



                            <p class="cls13">Name:<a href="show.php?id='.$array[$i]['id'].'">'.$array[$i]['p_name'].'</a></p>



                          </div></td>



                      </tr>



                    </table>



                  </div></td>';}if($array[$i+1]){



				++$i;

				  



                echo '<td><div align="center"> 



                    <table width="95%" border="0" cellspacing="0" cellpadding="0">



                      <tr> 



                        <td><table width="150" height="120" border="0" align="center" cellpadding="0" cellspacing="0">



                            <tr> 



                              <td width="0" height="0" align="center"><a href="show.php?id='.$array[$i]['id'].'"><img src="./admin/productimg/'.$array[$i]['pic'].'" width="80" height="80" border=0></a></td>



                              <td width="6" valign="top" background="img/shadowl_12.jpg"><img src="img/shadowl_02.jpg" width="6" height="6"></td>



                            </tr>



                            <tr> 



                              <td width="173" height="6" background="img/shadowl_21.jpg"><img src="img/shadowl_20.jpg"></td>



                              <td width="6" height="6" align="left" valign="top"><img src="img/shadowl_22.jpg" width="6" height="6"></td>



                            </tr>



                          </table></td>



                      </tr>



                      <tr> 



                        <td><div align="center"> 



                            <p class="cls13">Name:<a href="show.php?id='.$array[$i]['id'].'">'.$array[$i]['p_name'].'</a></p>



                          </div></td>



                      </tr>



                    </table>



                  </div></td>';}if($array[$i+1]){



				++$i;

				  



                echo '<td><div align="center"> 



                    <table width="95%" border="0" cellspacing="0" cellpadding="0">



                      <tr> 



                        <td><table width="150" height="120" border="0" align="center" cellpadding="0" cellspacing="0">



                            <tr> 



                              <td width="0" height="0" align="center"><a href="show.php?id='.$array[$i]['id'].'"><img src="./admin/productimg/'.$array[$i]['pic'].'" width="80" height="80" border=0></a></td>



                              <td width="6" valign="top" background="img/shadowl_12.jpg"><img src="img/shadowl_02.jpg" width="6" height="6"></td>



                            </tr>



                            <tr> 



                              <td width="173" height="6" background="img/shadowl_21.jpg"><img src="img/shadowl_20.jpg"></td>



                              <td width="6" height="6" align="left" valign="top"><img src="img/shadowl_22.jpg" width="6" height="6"></td>



                            </tr>



                          </table></td>



                      </tr>



                      <tr> 



                        <td><div align="center"> 



                            <p class="cls13">Name:<a href="show.php?id='.$array[$i]['id'].'">'.$array[$i]['p_name'].'</a></p>



                          </div></td>



                      </tr>



                    </table>



                  </div></td>';}
				  

				  

				  

				  

				if($array[$i+1]){



				++$i;  



                echo '<td><div align="center"> 



                    <table width="95%" border="0" cellspacing="0" cellpadding="0">



                      <tr> 



                        <td><table width="150" height="120" border="0" align="center" cellpadding="0" cellspacing="0">



                            <tr> 



                              <td width="0" height="0" align="center"><a href="show.php?id='.$array[$i]['id'].'"><img src="./admin/productimg/'.$array[$i]['pic'].'" width="80" height="80" border=0></a></td>



                              <td width="6" valign="top" background="img/shadowl_12.jpg"><img src="img/shadowl_02.jpg" width="6" height="6"></td>



                            </tr>



                            <tr> 



                              <td width="173" height="6" background="img/shadowl_21.jpg"><img src="img/shadowl_20.jpg"></td>



                              <td width="6" height="6" align="left" valign="top"><img src="img/shadowl_22.jpg" width="6" height="6"></td>



                            </tr>



                          </table></td>



                      </tr>

					  



                      <tr> 



                        <td><div align="center"> 



                            <p class="cls13">Name:<a href="show.php?id='.$array[$i]['id'].'">'.$array[$i]['p_name'].'</a></p>



                          </div></td>



                      </tr>



                    </table>



                  </div></td>';}

				  

				  

				  

				  

				  

				  if($array[$i+1]){



				++$i;



                echo '<td><div align="center"> 



                    <table width="93%" border="0" cellspacing="0" cellpadding="0">



                      <tr> 



                        <td><table width="150" height="120" border="0" align="center" cellpadding="0" cellspacing="0">



                            <tr> 



                              <td width="0" height="0" align="center"><a href="show.php?id='.$array[$i]['id'].'"><img src="./admin/productimg/'.$array[$i]['pic'].'" width="80" height="80" border=0></a></td>



                              <td width="6" valign="top" background="img/shadowl_12.jpg"><img src="img/shadowl_02.jpg" width="6" height="6"></td>



                            </tr>



                            <tr> 



                              <td width="173" height="6" background="img/shadowl_21.jpg"><img src="img/shadowl_20.jpg"></td>



                              <td width="6" height="6" align="left" valign="top"><img src="img/shadowl_22.jpg" width="6" height="6"></td>



                            </tr>



                          </table></td>



                      </tr>



                      <tr> 



                        <td><div align="center"> 



                            <p class="cls13">Name:<a href="show.php?id='.$array[$i]['id'].'">'.$array[$i]['p_name'].'</a></p>



                          </div></td>



                      </tr>



                    </table>



                  </div></td>

	

              ';}
			  break;

			}  

	

            echo '</tr>

			</table></td>



        </tr>';

		

	

}else{

	echo "没有相关产品";

}

?>	

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



</table>   <?php



	include("index-bottom.php");



?>



</body>



</html>





<?php





function genpage(&$sql,$page_size=1)







 {



     global $page,$prepage,$nextpage,$pages,$sums;  //out param







      $page = $_GET["page"];



  $eachpage = $page_size*20;//一页显示6条时可以*6,也就是6的倍数 limit 0,6,limit 6,6 ,limit 12,6.......



    $pagesql = strstr($sql," from ");



      $pagesql = "select count(*) as ids ".$pagesql;



     $result = mysql_query($pagesql) or die(mysql_error());



      if($rs = mysql_fetch_array($result)) $sums = $rs[0];



      $pages = ceil(($sums-0.5)/($eachpage))-1;



      $pages = $pages>=0?$pages:0;



      $prepage = ($page>0)?$page-1:0;



      $nextpage = ($page<$pages)?$page+1:$pages; 







      $startpos = $page*$eachpage;



      $sql .=" limit $startpos,$eachpage ";



      //$sums = intval($sums/3)+1;



	 //echo $pages;



 }



 //显示分页



function showpage()



{



    global $page,$pages,$prepage,$nextpage,$queryString; //param from genpage function



    $shownum =10/2;



    $startpage = ($page>=$shownum)?$page-$shownum:0;







    $endpage = ($page+$shownum<=$pages)?$page+$shownum:$pages;



    echo "Total:".($pages+1).": ";



    if($page>0)echo "<a href=$PHP_SELF?page=0&$queryString class=cls12>Home</a>&nbsp;<b><a href=$PHP_SELF?page=".($page-1)."&$queryString>Previous</a>";
    if($startpage>0)
        echo " ... <b><a href=$PHP_SELF?page=".(($page-$shownum*2)+3)."&$queryString><<</a></b>";

    for($i=$startpage;$i<=$endpage;$i++)



    {

        if($i==$page)    echo " <b>[".($i+1)."]</b> ";

        else        echo " <a href=$PHP_SELF?page=$i&$queryString class=cls12>".($i+1)."</a>";

    }

    if($endpage<$pages)

        echo "<b><a href=$PHP_SELF?page=".(($page+$shownum*2)-3)."&$queryString>>></a></b> ... ";

//echo "<b><a href=$PHP_SELF?page=".($page-1)."&$queryString>上一页</a>";
    if($page<$pages)
        echo "<b><a href=$PHP_SELF?page=".($page+1)."&$queryString>&nbsp;&nbsp;Next</a>&nbsp;<a href=$PHP_SELF?page=$pages&$queryString>Last</a>";
}

 

?>