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

    <td width="595" valign="top" bgcolor="#FFFFFF"><table width="590" border="0" align="center" cellpadding="0" cellspacing="0">

        <?php







	 







    $where = " 1=1 and stock=1 ";







	if($_REQUEST['type_id']){







		$where .=' and p_type_id='.$_REQUEST['type_id'];







	}







	$sql = 'SELECT * from pro_info where '.$where;







	//echo $sql;







	genpage($sql);	







	$rows = $db->GetAll($sql);







	$array = $rows;







	//print_r($rows);







		







		







		







		







		



if($rows){



		for($i=0; $i<count($array); $i++){





		echo '<tr> 



          <td height="260"> 

            <div align="center"> 

              <table width="190" height="260" border="0" cellpadding="0" cellspacing="0" style="border-left:1px solid #9CC6B8;border-top:1px solid #9CC6B8;border-right:1px solid #9CC6B8;border-bottom:1px solid #9CC6B8;">



                <tr> 

                  <td> <table border="0" align="center" cellpadding="0" cellspacing="0">



                      <tr> 



                        <td><a href="/show.php?por_id='.$array[$i]['id'].'" target=_blank><img src="admin/productimg/'.$array[$i]['pic'].'" width="129" height="149" border=0></a></td>



                        <td width="6" valign="top" background="img/shadowl_12.jpg"><img src="img/shadowl_02.jpg" width="6" height="6"></td>



                      </tr>

                 <tr> 

                    <td height="6" background="img/shadowl_21.jpg"><img src="img/shadowl_20.jpg"></td>

                     <td width="6" height="6" align="left" valign="top"><img src="img/shadowl_22.jpg" width="6" height="6"></td>

                  </tr>

               </table></td>

            </tr>

                <tr> 

                <td height="20" class="cls12"> <div align="center"><a href="admin/productimg/'.$array[$i]['pic'].'" target="_blank">see larger image </a>

                </div></td>

             </tr>

             <tr> 

             <td height="20" class="cls12"><div align="center">'.$array[$i]['p_name'].'</div></td>

           </tr>

            <tr> 

             <td height="19" class="cls12"><div align="center">$'.getPrice($array[$i]['id']).'</div></td>

           </tr>

           <tr> 

            <td height="16" bgcolor="#F0FAF6" align=center><a href="/show.php?por_id='.$array[$i]['id'].'" target=_blank><img src="img/product_addtocart.gif" width="94" height="33" border=0></a></td>

           </tr>

          </table>

       </div></td>';

		if($array[$i+1]){

			++$i;



               echo '	

        <td height="260"> 







            <div align="center"> 







              <table width="190" height="260" border="0" cellpadding="0" cellspacing="0" style="border-left:1px solid #9CC6B8;border-top:1px solid #9CC6B8;border-right:1px solid #9CC6B8;border-bottom:1px solid #9CC6B8;">



                <tr> 

            <td> <table border="0" align="center" cellpadding="0" cellspacing="0">

                 <tr> 

                <td ><a href="/show.php?por_id='.$array[$i]['id'].'" target=_blank><img src="admin/productimg/'.$array[$i]['pic'].'" width="129" height="149" border=0></a></td>

                 <td width="6" valign="top" background="img/shadowl_12.jpg"><img src="img/shadowl_02.jpg" width="6" height="6"></td>

                      </tr>

                      <tr> 

                        <td  height="6" background="img/shadowl_21.jpg"><img src="img/shadowl_20.jpg"></td>

                        <td width="6" height="6" align="left" valign="top"><img src="img/shadowl_22.jpg" width="6" height="6"></td>

                      </tr>

                    </table></td>

               </tr>

              <tr> 

               <td height="20" class="cls12"> <div align="center"><a href="admin/productimg/'.$array[$i]['pic'].'" target="_blank">see larger image </a>

                  </div></td>

           </tr>

             <tr> 

               <td height="20" class="cls12"><div align="center">'.$array[$i]['p_name'].'</div></td>

             </tr>

             <tr> 

                 <td height="19" class="cls12"><div align="center">$'.getPrice($array[$i]['id']).'</div></td>

               </tr>

             <tr> 

               <td height="16" bgcolor="#F0FAF6" align=center><a href="/show.php?por_id='.$array[$i]['id'].'" target=_blank><img src="img/product_addtocart.gif" width="94" height="33" border=0></a></td>

            </tr>

            </table>

         </div></td>';}

		if($array[$i+1]){

			  ++$i;

               echo '

          <td><div align="center"> 

           <table width="190" height="260" border="0" cellpadding="0" cellspacing="0" style="border-left:1px solid #9CC6B8;border-top:1px solid #9CC6B8;border-right:1px solid #9CC6B8;border-bottom:1px solid #9CC6B8;">

         <tr> 

             <td> <table border="0" align="center" cellpadding="0" cellspacing="0">

                  <tr> 

                   <td><a href="/show.php?por_id='.$array[$i]['id'].'" target=_blank><img src="admin/productimg/'.$array[$i]['pic'].'" width="129" height="149" border=0></a></td>

                  <td width="6" valign="top" background="img/shadowl_12.jpg"><img src="img/shadowl_02.jpg" width="6" height="6"></td>

                   </tr>

                     <tr> 

                     <td height="6" background="img/shadowl_21.jpg"><img src="img/shadowl_20.jpg"></td>

                 <td width="6" height="6" align="left" valign="top"><img src="img/shadowl_22.jpg" width="6" height="6"></td>

                </tr>

               </table></td>

           </tr>

            <tr> 

              <td height="20" class="cls12"> <div align="center"><a href="admin/productimg/'.$array[$i]['pic'].'" target="_blank">see larger image </a>

                    </div></td>

              </tr>

              <tr> 

               <td height="20" class="cls12"><div align="center">'.$array[$i]['p_name'].'</div></td>

              </tr>

               <tr> 

                <td height="19" class="cls12"><div align="center">$'.getPrice($array[$i]['id']).'</div></td>

               </tr>

             <tr> 

                  <td height="16" bgcolor="#F0FAF6" align=center><a href="/show.php?por_id='.$array[$i]['id'].'" target=_blank><img src="img/product_addtocart.gif" width="94" height="33" border=0></a></td>

           </tr>

         </table>

            </div></td>

        </tr>';}



	}	

	

}else{

	echo "Sorry,no product!";

}

?><tr><td class=cls12><?php showpage(); //分页显示?></td></tr>

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



      $eachpage = $page_size*15;//一页显示6条时可以*6,也就是6的倍数 limit 0,6,limit 6,6 ,limit 12,6.......



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







   







    echo "Total:".($pages+1)." "; 







    if($page>0)echo "<a href=$PHP_SELF?page=0&$queryString>Home</a>";







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







        echo "<a href=$PHP_SELF?page=$pages&$queryString>Last</a>";















}







function getPrice($id){
	global $db;
	$sql = "select price from pro_pecif where pid=".$id;
	$row = $db->GetOne($sql);
	if($row){
		return $row;
	}else{
		return '0';
	}
}
?>