<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html>

<head>

<meta http-equiv="Content-Type" content="text/html; charset=gb2312">

<title>Paper bag,gift box, tag, lable,sticker,catalogue,office paper,printing art</title>

<link href="img/css.css" rel="stylesheet" type="text/css">

</head>

<body bgcolor="#000000" topmargin="3" bottommargin="0"  background="img/bg22.jpg">

 <?php

	include("top1.php");

	require_once "./admin/comm/mysqldb.php"; 



	$where = " 1=1 ";



	if($_REQUEST['type_id']) $where .=" and p_type_id=".$_REQUEST['type_id'];

	$sql = "select * from pro_info where ".$where." order by p_up_date desc ";
	$queryString = "type_id=".$_REQUEST['type_id'];//分页显示时所传的参数
	genpage($sql);	
	$rows = $db->GetAll($sql);

	$array = $rows;



	//print_r($array);

?>

<table width="885" border="0" align="center" cellpadding="0" cellspacing="0">

  <tr> 

    <td width="186" height="176" valign="top" bgcolor="#717D8B"> 

      <?php

	include("left.php");

?>

    </td>

    <td width="711" valign="top" bgcolor="#ffffff"><br>

      <table width="697" border="0" align="center" cellpadding="0" cellspacing="0">

       <tr> 

         <td height="146" align=center> 



            <?php	



if($array){



	for($i=0; $i<count($array); $i++){







	//echo $i;







        echo '<table width="100%" border="0" cellspacing="0" cellpadding="0">

              <tr> 

   <td align=center><div align="center"> 

                    <table width="93%" border="0" cellspacing="0" cellpadding="0">

               <tr> 

                  <td><table width="150" height="120" border="0" align="left" cellpadding="0" cellspacing="0">

                            <tr> 

                      <td width="0" height="0" align="center"><a href="show.php?id='.$array[$i]['id'].'" target=_blank><img src="./admin/productimg/'.$array[$i]['pic'].'" width="180" height="150" border=0></a></td>

                              <td width="6" valign="top" background="img/shadowl_12.jpg"><img src="img/shadowl_02.jpg" width="6" height="6"></td>







                            </tr>







                            <tr> 







                              <td width="173" height="6" background="img/shadowl_21.jpg"><img src="img/shadowl_20.jpg"></td>







                              <td width="6" height="6" align="left" valign="top"><img src="img/shadowl_22.jpg" width="6" height="6"></td>







                            </tr>







                          </table></td>

                   </tr>

                      <tr> 



                        <td><div align="left"> 







                            <p class="cls13">Name:<a href="show.php?id='.$array[$i]['id'].'" target=_blank>'.$array[$i]['p_name'].'</a></p>







                          </div></td>







                      </tr>







                    </table>







                  </div></td>';



				  



				  



				  



				  



			if($array[$i+1]){







				++$i;



				  







                echo '<td><div> 







                    <table width="95%" border="0" cellspacing="0" cellpadding="0">







                      <tr> 







                        <td><table width="150" height="120" border="0" align="left" cellpadding="0" cellspacing="0">







                            <tr> 







                              <td width="0" height="0" align="center"><a href="show.php?id='.$array[$i]['id'].'" target=_blank><img src="./admin/productimg/'.$array[$i]['pic'].'" width="180" height="150" border=0></a></td>







                              <td width="6" valign="top" background="img/shadowl_12.jpg"><img src="img/shadowl_02.jpg" width="6" height="6"></td>







                            </tr>







                            <tr> 







                              <td width="173" height="6" background="img/shadowl_21.jpg"><img src="img/shadowl_20.jpg"></td>







                              <td width="6" height="6" align="left" valign="top"><img src="img/shadowl_22.jpg" width="6" height="6"></td>







                            </tr>







                          </table></td>







                      </tr>







                      <tr> 







                        <td><div align="left"> 







                            <p class="cls13">Name:<a href="show.php?id='.$array[$i]['id'].'" target=_blank>'.$array[$i]['p_name'].'</a></p>







                          </div></td>







                      </tr>







                    </table>







                  </div></td>';}



				  



				  



				  



				  



				  



				if($array[$i+1]){







				++$i;  







                echo '<td><div> 







                    <table width="95%" border="0" cellspacing="0" cellpadding="0">







                      <tr> 







                        <td><table width="150" height="120" border="0" align="left" cellpadding="0" cellspacing="0">

                            <tr> 

                              <td width="0" height="0" align="center"><a href="show.php?id='.$array[$i]['id'].'" target=_blank><img src="./admin/productimg/'.$array[$i]['pic'].'" width="180" height="150" border=0></a></td>

                              <td width="6" valign="top" background="img/shadowl_12.jpg"><img src="img/shadowl_02.jpg" width="6" height="6"></td>

                            </tr>

                            <tr> 

                              <td width="173" height="6" background="img/shadowl_21.jpg"><img src="img/shadowl_20.jpg"></td>



                              <td width="6" height="6" align="left" valign="top"><img src="img/shadowl_22.jpg" width="6" height="6"></td>



                            </tr>

                          </table></td>

                      </tr>

  <tr> 

 <td><div align="left"> 







                            <p class="cls13">Name:<a href="show.php?id='.$array[$i]['id'].'" target=_blank>'.$array[$i]['p_name'].'</a></p>







                          </div></td>







                      </tr>







                    </table>







                  </div></td>';}







			}  



	



            echo '</tr>



			</table></td>







        </tr>';



		



	



}else{



	echo "没有相关产品";



}



?>



        <tr> 



          <td height="43"><div align="center"> 



              <p align="left" class="cls13"> 



                <?php showpage(); //分页显示?>



              </p>



            </div></td>



        </tr>



      </table>
    </td>



  </tr>



 



</table> 







 <?php







	include("index-bottom.php");







?>







<?php











function genpage(&$sql,$page_size=1)















 {







     global $page,$prepage,$nextpage,$pages,$sums;  //out param















      $page = $_GET["page"];







  $eachpage = $page_size*9;//一页显示6条时可以*6,也就是6的倍数 limit 0,6,limit 6,6 ,limit 12,6.......







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







        else        echo " <a href=$PHP_SELF?page=$i&$queryString class=cls13>".($i+1)."</a>";



    }



    if($endpage<$pages)



        echo "<b><a href=$PHP_SELF?page=".(($page+$shownum*2)-3)."&$queryString>>></a></b> ... ";



//echo "<b><a href=$PHP_SELF?page=".($page-1)."&$queryString>上一页</a>";







    if($page<$pages)



        echo "<b><a href=$PHP_SELF?page=".($page+1)."&$queryString>&nbsp;&nbsp;Next</a>&nbsp;<a href=$PHP_SELF?page=$pages&$queryString>Last</a>";



}



?>



</body>







</html>