<?php







session_start();







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



    <td height="113" colspan="2" valign="top"> 



      <?php







		  	include("top.php");







		  ?>



    </td>



  </tr>



  <tr> 



    <td height="16" valign="top"><img src="img/user.jpg" width="191" height="21"></td>



    <td height="16" valign="top" bgcolor="#FFFFFF"><img src="img/prolist.jpg" width="508" height="21"></td>



  </tr>



  <tr> 



    <td width="190" height="1000" valign="top" background="img/lbg.jpg" style="background-repeat:repeat-x;background-color:white;"><table width="100%" border="0" cellspacing="0" cellpadding="0">



        <tr> 



          <td width="100%" height=8></td>



        </tr>



        <tr> 



          <td height="58" valign="top"> 



            <?php







		  	include("userLogin.php");







		  ?>



          </td>



        </tr>



        <tr> 



          <td height="1" background=img/line.gif></td>



        </tr>



        <tr> 



          <td> 



            <?php































include("menu.php");















?>



          </td>



        </tr>



        <tr> 



          <td height="1" background=img/line.gif></td>



        </tr>



      </table></td>



    <td width="595" valign="top" bgcolor="#FFFFFF"><table width="520" border="0" align="center" cellpadding="0" cellspacing="0">



        <tr> 



          <td colspan="2">&nbsp;</td>



          <td colspan="2">&nbsp;</td>



          <td colspan="2">&nbsp;</td>



        </tr>



        <tr> 



           <td width="24" class="cls13">&nbsp;</td><td width="146" height="16" class="cls13"><div align="left"><font color="#FF0000">Our 



              Special</font></div></td>



         



          <td width="25" class="cls13">&nbsp;</td> <td width="154" class="cls13"><div align="left"><font color="#FF0000">Subjects</font></div></td>



         



             <td width="22" class="cls13">&nbsp;</td> <td width="149" class="cls13"><div align="left"><font color="#FF0000">Famous 



              Artists</font></div></td>



      



        </tr>



        <tr> 



          <td height="159" colspan="2" valign="top"> <table width="131" border="0" cellspacing="0" cellpadding="0">



              <?php 



$sql = "select * from pro_type where pid=18";



$rows = $db->GetAll($sql);



for($i=0; $i<count($rows); $i++){



		  



              echo '<tr> 



                <td width="11">&nbsp;</td>



                <td width="180" class="cls12"><li><a href="/product.php?type_id='.$rows[$i]['id'].'" class=cls12>'.$rows[$i]['type_name'].'</a></td>              </tr>';



		$sql = "select * from pro_type where pid=".$rows[$i]['id'];;



		$rows2 = $db->GetAll($sql);



		for($n=0; $n<count($rows2); $n++){



             echo ' <tr> 



                <td >&nbsp;</td>



                <td valign="top">



<table width="150" border="0" cellspacing="0" cellpadding="0">



                    <tr>



                      <td width="10"><div align="center">



                          <div align="center"><img src="img/mark.gif" width="5" height="5" border="0"></div>



                        </div></td>



                      <td width="120" class="cls12"><a href="/product.php?type_id='.$rows2[$n]['id'].'" class=cls12>'.$rows2[$n]['type_name'].'</a></td>                    </tr>



                  </table>



                </td>



              </tr>';



		}



}		  



?>



            </table></td>



          <td colspan="2" valign="top"><table border="0" cellspacing="0" cellpadding="0">



              <?php 



$sql = "select * from pro_type where pid=3";



$rows = $db->GetAll($sql);



for($i=0; $i<count($rows); $i++){



		  



              echo '<tr> 



                <td width="11">&nbsp;</td>



                <td width="180" class="cls12"><li><a href="/product.php?type_id='.$rows[$i]['id'].'" class=cls12>'.$rows[$i]['type_name'].'</a></td>              </tr>';



		$sql = "select * from pro_type where pid=".$rows[$i]['id'];;



		$rows2 = $db->GetAll($sql);



		for($n=0; $n<count($rows2); $n++){



             echo ' <tr> 



                <td>&nbsp;</td>



                <td valign="top">



<table width="150" border="0" cellspacing="0" cellpadding="0">



                    <tr>



                      <td width="16"><div align="center">



                          <div align="center"><img src="img/mark.gif" width="5" height="5" border="0"></div>



                        </div></td>



                      <td width="120" class="cls12"><a href="/product.php?type_id='.$rows2[$n]['id'].'" class=cls12>'.$rows2[$n]['type_name'].'</a></td>                    </tr>



                  </table>



                </td>



              </tr>';



		}



}		  



?>



            </table></td>



          <td colspan="2" valign="top"><table border="0" cellspacing="0" cellpadding="0">



              <?php 



$sql = "select * from pro_type where pid=24";



$rows = $db->GetAll($sql);



for($i=0; $i<count($rows); $i++){



		  



              echo '<tr> 



                <td width="11"></td>



                <td width="180" class="cls12"><li><a href="/product.php?type_id='.$rows[$i]['id'].'" class=cls12>'.$rows[$i]['type_name'].'</a></td>              </tr>';



		$sql = "select * from pro_type where pid=".$rows[$i]['id'];;



		$rows2 = $db->GetAll($sql);



		for($n=0; $n<count($rows2); $n++){



             echo ' <tr> 



                <td>&nbsp;</td>



                <td valign="top">



<table width="150" border="0" cellspacing="0" cellpadding="0">



                    <tr>



                      <td width="10"><div align="center">



                          <div align="center"><img src="img/mark.gif" width="5" height="5" border="0"></div>



                        </div></td>



                      <td width="120" class="cls12"><a href="/product.php?type_id='.$rows2[$n]['id'].'" class=cls12>'.$rows2[$n]['type_name'].'</a></td>                    </tr>



                  </table>



                </td>



              </tr>';



		}



}		  



?>



            </table>

			

			<table width="100%" height="72" border="0" cellpadding="0" cellspacing="0">

		    <tr><td width="22" height="25" class="cls13"></td>

		      <td width="149" class="cls13"><font color="#FF0000">Arts and Crafts</font></td>

		    </tr>

		    <tr>

		      <td height="47" colspan="2" valign="top" class="cls12">
		      
		      
				<?php
						      
					$sql = "select * from pro_type where pid=3470";
					$rows = $db->GetAll($sql);
					for($i=0; $i<count($rows); $i++){
							  //<!--二级类-->
							  echo '<table width="167" border="0" cellpadding="0" cellspacing="0">
				
					                <tr> 
					                	<td width="10">&nbsp;</td>
					                  	<td width="157" class=cls12><li><a href="/product.php?type_id='.$rows[$i]['id'].'" class=cls12>'.$rows[$i]['type_name'].'</a></li></td>
					                </tr>';
							  
							  
									$sql = "select * from pro_type where pid=".$rows[$i]['id'];;
									$rows2 = $db->GetAll($sql);
									for($n=0; $n<count($rows2); $n++){
							               echo ' <tr>
							                  	<td>&nbsp;</td>
							                  	<td>
													  <!--三级类表格-->
													  <table width="150" border="0" cellspacing="0" cellpadding="0">
									                    <tr>
									                      	<td width="16"><div align="center"><div align="center"><img src="img/mark.gif" width="5" height="5" border="0"></div></td>
									                      	<td width="120" class="cls12"><a href="/product.php?type_id='.$rows2[$n]['id'].'" class=cls12>'.$rows2[$n]['type_name'].'</a></td>  
									                    </tr>
									                  </table>
													 <!--三级类表格结束--> 
											  	</td>
							                </tr>';
									}
				              echo' </table>';
						}
				  ?>

			  </td>

		      </tr>

		   

			</table></td>



        </tr>



      </table></td>



  </tr>



  <tr> 



    <td height="147" colspan="2" valign="top" background="img/bbg.gif"> 



      <?php







		  	include("index-bottom.php");







		  ?>



    </td>



  </tr>



</table>















</body>















</html>















<?php















function genpage(&$sql,$page_size=1)















 {















      global $page,$prepage,$nextpage,$pages,$sums;  //out param















      $page = $_GET["page"];















      $eachpage = $page_size*6;//一页显示6条时可以*6,也就是6的倍数 limit 0,6,limit 6,6 ,limit 12,6.......















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















   















    echo "共".($pages+1)."页: "; 















    if($page>0)echo "<a href=$PHP_SELF?page=0&$queryString>首页</a>";















    if($startpage>0)















        echo " ... <b><a href=$PHP_SELF?page=".($page-$shownum*2)."&$queryString><<</a></b>";















    for($i=$startpage;$i<=$endpage;$i++)















    {















        if($i==$page)    echo " <b>[".($i+1)."]</b> ";















        else        echo " <a href=$PHP_SELF?page=$i&$queryString>".($i+1)."</a> ";















    }















    if($endpage<$pages)















        echo "<b><a href=$PHP_SELF?page=".($page+$shownum*2)."&$queryString>>></a></b> ... ";















    if($page<$pages)















        echo "<a href=$PHP_SELF?page=$pages&$queryString>尾页</a>";































}















?>