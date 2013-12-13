<?php
require_once "./admin/comm/mysqldb.php"; 
//print_r($db)
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>PRODUCTS</title>
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
require_once "head.php"; 
//头部head
?> </td>
  </tr>
 
  <tr> 
    <td height="16" colspan="2" valign="top"><img src="img/NINDEX_02.jpg" width="785" height="23"></td>
  </tr>
  <tr> 
    <td width="190" height="1000" valign="top" background="img/lbg.jpg" style="background-repeat:repeat-x;background-color:white;"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr> 
          <td height=8 colspan="2"></td>
        </tr>
        <tr> 
          <td height="58" colspan="2" valign="top"> <form name="form1" method="post" action="">
              <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr> 
                  <td width="42%" height="19"> <div align="right"> 
                      <p class="cls12">username:</p>
                    </div></td>
                  <td width="58%"><input name="textfield" type="text" class="input" size="15"></td>
                </tr>
                <tr> 
                  <td height="23"> <div align="right"> 
                      <p class="cls12">password:</p>
                    </div></td>
                  <td><input name="textfield2" type="text" class="input" size="15"></td>
                </tr>
                <tr> 
                  <td colspan="2"><div align="center"> 
                      <input name="Submit" type="image" src="img/login.gif">
                      &nbsp; <img src="img/register.gif" width="60" height="16"></div></td>
                </tr>
              </table>
            </form></td>
        </tr>
        <tr> 
          <td height="1" colspan="2" background=img/line.gif></td>
        </tr>
		
		
<?php

$sql = "select * from pro_type where pid=0 ";
$rows = $db->GetAll($sql);
for($i=0; $i<count($rows); $i++){

echo '		
        <tr> 
          <td height="138" colspan="2" valign="top"> <div align="center"> 
              <table  border="0" cellspacing="0" cellpadding="0">
                <tr> 
                  <td width="178" height="28" background="img/cl1.gif"><div align="center"> 
                      <p class="cls14">'.$rows[$i]['type_name'].' </p>
                    </div></td>
                </tr>
                <tr> 
                  <td height="70" valign="top"> <table width="100%" border="0" cellspacing="0" cellpadding="0">';
                  
					$sql_1 = "select * from pro_type where pid=".$rows[$i]['id'];
					$rows2 = $db->GetAll($sql_1);
					for($n=0; $n<count($rows2); $n++){
						
					
                      echo
                      '<tr> 
                        <td width="33%" height="16"> <div align="right"><img src="img/line_tri.gif" width="19" height="16"></div></td>
                        <td width="4%"><img src="img/mark.gif" width="5" height="5"></td>
                        <td width="63%" class="cls12"><a href="/product.php?type_id='.$rows2[$n]['id'].'">'.$rows2[$n]['type_name'].'</a></td>
                      </tr>';
                      
                    }
                      
            echo '</table></td>
                </tr>
              </table>
            </div></td>
        </tr>';
}
?>		
		
		
        
        <tr> 
          <td height="1" colspan="2" background=img/line.gif></td>
        </tr>
        <tr> 
          <td width="22%" height="42" valign="middle"> <div align="center"><img src="img/list.gif" width="25" height="26"></div></td>
          <td width="78%" valign="middle"><img src="img/list1.gif" width="109" height="11"></td>
        </tr>
        <tr> 
          <td height="54" colspan="2" valign="top" class="cls13"><table width="90%" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr> 
                <td class="cls13">Our main art subjects: oil painting reproduction, 
                  portrait oil painting, abstract oil painting, landscape oil 
                  painting, modern oil paintings, still life oil painting, animal 
                  oil painting, pencil drawing, watercolour, impression oil paintings 
                  and other art oil paintings. All of these oil paintings, watercolor, 
                  and pencil sketches are from our artists. </td>
              </tr>
            </table></td>
        </tr>
      </table></td>
    <td width="595" valign="top" bgcolor="#FFFFFF"><table width="590" border="0" align="center" cellpadding="0" cellspacing="0">
     <?php
	 
    $where = " 1=1 ";
	if($_REQUEST['type_id']){
		$where .=' and p_type_id='.$_REQUEST['type_id'];
	}
	$sql = 'SELECT * from pro_info where '.$where;
	//echo $sql;
	genpage($sql);	
	$rows = $db->GetAll($sql);
	$array = $rows;
	//print_r($rows);
		
		
		
		
		
		for($i=0; $i<count($array); $i++){
		
		echo '<tr> 
		
		
          <td height="230"> 
            <div align="center"> 
              <table width="190" height="219" border="0" cellpadding="0" cellspacing="0" style="border-left:1px solid #9CC6B8;border-top:1px solid #9CC6B8;border-right:1px solid #9CC6B8;border-bottom:1px solid #9CC6B8;">
                <tr> 
                  <td height="118"> <table width="179" border="0" align="center" cellpadding="0" cellspacing="0">
                      <tr> 
                        <td width="173" height="71"><img src="admin/productimg/'.$array[$i]['pic'].'" width="150" height="112"></td>
                        <td width="6" valign="top" background="img/shadowl_12.jpg"><img src="img/shadowl_02.jpg" width="6" height="6"></td>
                      </tr>
                      <tr> 
                        <td width="173" height="6" background="img/shadowl_21.jpg"><img src="img/shadowl_20.jpg"></td>
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
                  <td height="19" class="cls12"><div align="center">$'.$array[$i]['price'].'</div></td>
                </tr>
                <tr> 
                  <td height="16"><img src="img/product_seeitframed.gif" width="93" height="33"><img src="img/product_addtocart.gif" width="94" height="33"></td>
                </tr>
              </table>
            </div></td>';
			
		if($array[$i+1]){
				++$i;
               echo '	
			
          <td height="230"> 
            <div align="center"> 
              <table width="190" height="219" border="0" cellpadding="0" cellspacing="0" style="border-left:1px solid #9CC6B8;border-top:1px solid #9CC6B8;border-right:1px solid #9CC6B8;border-bottom:1px solid #9CC6B8;">
                <tr> 
                  <td height="118"> <table width="179" border="0" align="center" cellpadding="0" cellspacing="0">
                      <tr> 
                        <td width="173" height="71"><img src="admin/productimg/'.$array[$i]['pic'].'" width="150" height="112"></td>
                        <td width="6" valign="top" background="img/shadowl_12.jpg"><img src="img/shadowl_02.jpg" width="6" height="6"></td>
                      </tr>
                      <tr> 
                        <td width="173" height="6" background="img/shadowl_21.jpg"><img src="img/shadowl_20.jpg"></td>
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
                  <td height="19" class="cls12"><div align="center">$'.$array[$i]['price'].'</div></td>
                </tr>
                <tr> 
                  <td height="16"><img src="img/product_seeitframed.gif" width="93" height="33"><img src="img/product_addtocart.gif" width="94" height="33"></td>
                </tr>
              </table>
            </div></td>';}
			
			if($array[$i+1]){
				  ++$i;
               echo '
			
          <td><div align="center"> 
              <table width="190" height="219" border="0" cellpadding="0" cellspacing="0" style="border-left:1px solid #9CC6B8;border-top:1px solid #9CC6B8;border-right:1px solid #9CC6B8;border-bottom:1px solid #9CC6B8;">
                <tr> 
                  <td height="118"> <table width="179" border="0" align="center" cellpadding="0" cellspacing="0">
                      <tr> 
                        <td width="173" height="71"><img src="admin/productimg/'.$array[$i]['pic'].'" width="150" height="112"></td>
                        <td width="6" valign="top" background="img/shadowl_12.jpg"><img src="img/shadowl_02.jpg" width="6" height="6"></td>
                      </tr>
                      <tr> 
                        <td width="173" height="6" background="img/shadowl_21.jpg"><img src="img/shadowl_20.jpg"></td>
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
                  <td height="19" class="cls12"><div align="center">$'.$array[$i]['price'].'</div></td>
                </tr>
                <tr> 
                  <td height="16"><img src="img/product_seeitframed.gif" width="93" height="33"><img src="img/product_addtocart.gif" width="94" height="33"></td>
                </tr>
              </table>
            </div></td>
			
			
        </tr>';}
	}	
		
		
		
		
		
		
		
		
		
		
?>	
        
      </table></td>
  </tr>
  <tr> 
    <td height="147" colspan="2" valign="top" background="img/bbg.gif"><table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr> 
          <td height="40">&nbsp;</td>
        </tr>
        <tr> 
          <td><div align="center"> 
              <p class="cls12">contact us | satisfaction policy | frequently asked 
                questions </p>
            </div></td>
        </tr>
        <tr> 
          <td height="40">&nbsp;</td>
        </tr>
        <tr> 
          <td><div align="center"><img src="img/bt.jpg" width="660" height="44"></div></td>
        </tr>
        <tr>
          <td><div align="center">
              <p class="cls12">@ 2008 Joab Home Arts CO.,LTD All rights reserved.<br>
              </p>
            </div></td>
        </tr>
      </table></td>
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