<?php


//header("Cache-control: private"); //防止后退刷新 

session_start();

require_once "./admin/comm/mysqldb.php"; 


//print_r($db)



if($_REQUEST['por_id']){

	writeTabel($_REQUEST['por_id']);

}







$sql = "select * from pro_info where id=".$_REQUEST['por_id'];

$rows = $db->GetAll($sql);







$sql = "select * from pro_type where id=".$rows[0]['p_type_id'];

$secendResult = $db->GetAll($sql);







$sql = "select * from pro_type where id=".$secendResult[0]['pid'];

$thResult = $db->GetAll($sql);







$sql = "select * from pro_type where id=".$thResult[0]['pid'];



$fResult = $db->GetAll($sql);







if($fResult){$st .= '<a href="./product.php?type_id='.$fResult[0]['id'].'">'.$fResult[0]['type_name'].'</a>';}



if($thResult){$st .= '-><a href="./product.php?type_id='.$thResult[0]['id'].'">'.$thResult[0]['type_name'].'</a>';}



if($secendResult){$st .= '-><a href="./product.php?type_id='.$secendResult[0]['id'].'">'.$secendResult[0]['type_name'].'</a>';}



?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>

<head>
	<link href="img/css.css" rel="stylesheet" type="text/css">
	<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
	<title>
		oil painting & portrait, oil painting factory, wholesale oil painting, oil painting reproductions
	</title>
</head>

<style type="text/css">

BODY {

	BACKGROUND-POSITION: center 50%; BACKGROUND-IMAGE: url(img/background_tile.gif); MARGIN: 0px; BACKGROUND-REPEAT: repeat-y; BACKGROUND-COLOR: #cedce9; TEXT-ALIGN: center

}

</style>


<body topmargin="0" leftmargin="o" rightmargin="0" bottommargin="0" >

<table width="720" border="0" align="center" cellpadding="0" cellspacing="0">

<tr> 

	<td height="126" colspan="2" valign="top"> 
		<?php

	  		include("top.php");

	  	?> 
	</td>

  </tr>

  <tr>

    <td height="26" colspan="2" valign="top" bgcolor="ffffff" class="cls12"> <?php echo $st; ?> </td>
    

  </tr>

  <tr>    

    <td height="10" valign="middle" bgcolor="#FFFFFF"> 

      <div align="center">

        <p class="cls12">&nbsp;</p>

      </div></td>

  </tr>

  <tr> 

    <td height="300" valign="top" bgcolor="#FFFFFF"> 

    <table width="97%" border="0" align="center" cellpadding="0" cellspacing="0">

        <tr> 

         <td width="43%" height="203"><table width="179" border="0" align="center" cellpadding="0" cellspacing="0">

            <tr> 

            <td width="473" height="171">
            	<a href="admin/productimg/<?php echo $rows[0]['pic']?>" target="_blank">
            	<img src="admin/productimg/<?php echo $rows[0]['pic']?>" width="250" border=0></a></td>
             <td width="6" valign="top" background="img/shadowl_12.jpg"><img src="img/shadowl_02.jpg" width="6" height="6"></td>

             </tr>

             <tr> 

              <td width="173" height="6" background="img/shadowl_21.jpg"><img src="img/shadowl_20.jpg"></td>

               <td width="6" height="6" align="left" valign="top"><img src="img/shadowl_22.jpg" width="6" height="6"></td>

              </tr>

            </table></td>


          <td width="44%" valign="top"> <br>

            <?php		  

/*$sql = "select * from pro_info where id=".$_REQUEST['por_id'];

$rows = $db->GetAll($sql);*/


echo '		  <table width="100%" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#ffffff">';


//新品标记
if($rows[0]['is_new']=='T'){
	$isnew  = '<img src="/new.gif" />';
}

        echo '   <tr> 
             <td width="200" height="33" class="cls12"  bgcolor="#F0FAF6" > <div align="right">Artwork  Title:</div></td>
             <td class="cls12" bgcolor=ffffff>'.$rows[0]['p_name'].$isnew.'</td>
           </tr>
           <tr> 

            <td width="35%" height="33" class="cls12"  bgcolor="#F0FAF6" > <div align="right">ID:</div></td>

           <td width="65%" class="cls12" bgcolor=ffffff>'.$rows[0]['numbers'].'</td>

           </tr>

               <tr> 

                <td width="35%" height="33" class="cls12"  bgcolor="#F0FAF6" > <div align="right">Description:</div></td>

                <td width="65%" class="cls12" bgcolor=ffffff>'.nl2br($rows[0]['content']).'</td>

              </tr>

			    <tr> 

                <td colspan="2" bgcolor=ffffff><div align="center"></div></td>

              </tr>

            </table>';

?>

          </td>
          <td width="13%" valign="top"><p>&nbsp;</p>

            <p><img src="img/art.gif" width="77" height="78"></p></td>

        </tr>

        <tr> 

          <td height="203" colspan="3"><div align="center"> 

              <form name="form1" method="post" action="myshop.php">

                <table width="50%" border="0" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
					<!-- Table head -->
					<tr bgcolor="#F0FAF6"> 

						<td width="8%" height="27">
							<div align="center"><img src="img/gou.gif" width="10" height="10"></div> 
						</td>
						
						<td width="16%" class="cls12"><div align="center">size</div></td>
						
						<td width="29%" bgcolor="#F0FAF6" class="cls12"><div align="center">price</div></td>
						
						
						<td width="47%" bgcolor="#F0FAF6"  class="cls12"><div align="center">quantity</div></td>

					</tr>
					<!-- Table head end -->
					<?php 	
					
					
					$sql = "select * from pro_pecif where pid=".$_REQUEST['por_id'];
					
					$rows = $db->GetAll($sql);
					
					
					for($i=0; $i<count($rows); $i++){
					
						echo '<tr> 
					
					 			<td height="22" bgcolor=ffffff align="center">  <input type="checkbox" name="checkbox['.$i.']" value="'.$i.'"></td>
					
				    			<td height="22" class="cls12" bgcolor=ffffff align="center">'.$rows[$i]['pecif'].'</td>
					
					    		<td class="cls12" bgcolor=ffffff align="center">$'.$rows[$i]['price'].'</td>
					
					    		<td class="cls12" bgcolor=ffffff align="center"> <input name="pecif['.$i.']" type="hidden" value="'.$rows[$i]['id'].'"><input name="quantity['.$i.']" type="text" size="8" value="" ></td>
					
					 		 </tr>';
					}
					
					?>

</table>


<br>


<?php 

if($_SESSION['username']){

	echo '<input type="image" src="img/addtocart.gif">';
	
	echo '<br><a href=http://www.joabhomearts.com/contact.php target=_blank>The specific size kindly contact us directly,we would get back to you within 24 hours.More quantity more discounts.The wholesaler kindly contact us directly.The wholeprice is offered.</a>';


	}else{


		echo "<a href='/reg.php' class=cls12>Sorry, you are not our member yet,please register first.</a>";

	}

?>

       </form>

            </div></td>

			       </tr>

      </table>

    </td>

  </tr>

  <tr> 

    <td height="147" valign="top" background="img/bbg.gif"> 
    	<?php

		 	include("index-bottom.php");

		  ?> 
	</td>


  </tr>

</table>

</body>

</html>

<?php

	function writeTabel($id){
	
		global $db;
	
		$sql = "update pro_info set hkfm = hkfm+1 where id=".$id;
	
	
		$db->Execute($sql);
	
	
		return true;
	
	}

?>