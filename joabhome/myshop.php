<?php
/**
 * 购物车页面
 * */

//header("Cache-control: private");	//防止后退刷新

session_start();
require('./xajax/xajax.inc.php'); //载入第三方库xajax
require_once "./admin/comm/mysqldb.php"; 

/*引用XAJAX*/
$xajax = new xajax('./xajax_myshop.php'); 
$xajax->registerFunction("opea");
$xajax->processRequests();
$js = $xajax->getJavascript('./xajax/');

//print_r($db)

//print_r($_REQUEST);

?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html>

<head>

	<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
	
	<title>My Cart</title>
	<?php echo $js;?> 
	<link href="img/css.css" rel="stylesheet" type="text/css">
 	<script type="text/javascript" src="./resource/js/jquery-1.9.1.min.js"></script>
	<style type="text/css">
	
	BODY {
	
		BACKGROUND-POSITION: center 50%; BACKGROUND-IMAGE: url(img/background_tile.gif); MARGIN: 0px; BACKGROUND-REPEAT: repeat-y; BACKGROUND-COLOR: #cedce9; TEXT-ALIGN: center
	
	}
	
	</style>
</head>

<body topmargin="0" leftmargin="o" rightmargin="0" bottommargin="0" >

<table width="720" border="0" align="center" cellpadding="0" cellspacing="0" style="border:1px solid white;">
	<!-- top -->
	<tr> 
		<td height="126" colspan="2" valign="top"  >
		    <?php
				include("top.php");
			  ?> 
		</td>
	</tr>
	<tr> 
		<td height="16" valign="middle" bgcolor="#FFFFFF"> </td>
  	</tr>
  	
	<!-- content -->
	<tr> 

    	<td height="300" valign="top" bgcolor="#FFFFFF"> 

      	<table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
			<tr> 

          		<td width="100%" height="203">
          		<div align="center"> 
       				<form name="form1" method="post" action="">

					 <table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
					 <!-- table head begin -->
						<tr class="cls12"> 
							<td width="12%" bgcolor="F0FAF6"> 
				             	<div align="center">IMG</div>
							</td>
					        <td width="9%" bgcolor="F0FAF6"> 
								<div align="center">ID</div>
							</td>
			               	<td width="13%" bgcolor="F0FAF6"> 
		                		<div align="center">size</div></td>
				            <td width="17%" bgcolor="F0FAF6"> 
					      		<div align="center">price(USD)</div></td>
				           	<td width="18%" bgcolor="F0FAF6"> 
				              	<div align="center">quantity</div></td>
				           	<td width="15%" bgcolor="F0FAF6"> 
				      			<div align="center">Total(USD)</div></td>
				           	<td width="16%" bgcolor="F0FAF6"> 
					        	<div align="center">Delete</div>
					        </td>
						</tr>
					<!-- table body -->
					<?php
					
					
					if($_REQUEST['sub']!="check out" && count($_REQUEST['checkbox'])==0){
						echo "<script>alert('Would you pls select the size?');window.history.back();</script>";
						
					}
					
					$valcheck = $_REQUEST['checkbox'];  //从show.php中有勾选复选框提交过来的有效数据
					
					$valquantity = $_REQUEST['quantity'];//从show.php中提交过来的产品规格的数量
					
					$valpecif = $_REQUEST['pecif'];//从show.php中提交过来的产品规格的价格
					
					$GlobalArray = $_SESSION['GlobalArray']; //看看这个SESSION变量中是否有以前的购买记录，有的话也要加在一块(也可以理解为这个变量所存放的是订单列表)
					
					/*这个IF语句是为了删除购买的定单功能*/
					
					if($_REQUEST['sub2']=='Delete'){
					
						$count = count($_REQUEST['mycardid']); //统计要删除哪些订单
					
						for($i=0; $i<$count; $i++){
					
							unset($GlobalArray[$_REQUEST['mycardid'][$i]]);//从订单例表中删去订单
					
						}
					
						/*把订单列表从新索引	*/
					
						foreach ($GlobalArray as $b){
					
							$d[] = $b;
							
						}
					
					
					
						$GlobalArray = $d;
					
					
					
						$_SESSION['GlobalArray']=$GlobalArray; //从新索引后的订单列表赋值给SESSION
					
					}
					
					
					if($_REQUEST['sub']=='check out'){
					
						//echo $_SESSION['userid'].'sdf';exit;
					
						//print_r($_SESSION['GlobalArray']);exit;
					
						$ordernum = time(); //订单号
					
						$_quantity = $_REQUEST['quantity'];
					
						//	PRINT_R($_quantity);EXIT;
					
						for($i=0; $i<count($_SESSION['GlobalArray']); $i++){
					
							$array = array(	'pecif'=>$_SESSION['GlobalArray'][$i]['pecif'],
											'proid'=>$_SESSION['GlobalArray'][$i]['numbers'],
										   	'nums'=>$_quantity[$i],
					//					   	'nums'=>$_SESSION['GlobalArray'][$i]['quantity'],
					//					   	'price'=>$_SESSION['GlobalArray'][$i]['totalquantity'],
										   	'price'=>$_SESSION['GlobalArray'][$i]['price'],
										   	'ordernum'=>$ordernum,
										   	'userid'=>$_SESSION['userid']
					
											);
					
					
							$array = $db->trimStr($array);  //去除特殊字符
					
					
							$db->insert('pro_order',$array);
					
						}
					
						$array = array('ordernum_no'=>$ordernum);
					
						$db->insert('pro_order_no',$array);
					
							unset($_SESSION['GlobalArray']);
					
							//$message->mError('产品规格添加成功~!','proInq');
					
							echo '<script language="javascript">alert("order successful! \nThank you! Your order number is：'.$ordernum.'");</script>';
					
							echo '<script language="javascript">window.location.href = "./contact.php?ordernum='.$ordernum.'";</script>';	//跳转到订单联系页面
					
							exit;
					
					}
					
					//print_r($GlobalArray);
					
					$golbaNum = count($GlobalArray); //统计有几条订单
					
					/*把新下的订单信息存入订单列表*/
					
					for($i=0; $i<count($valcheck); $i++){
					
					//print_r($valpecif);exit;
					
						if($valcheck[$i]!=''){
					
							$sql = "select * from pro_pecif where id=".$valpecif[$valcheck[$i]];
					
							$rows = $db->GetAll($sql);
					
							$sql = "select numbers from pro_info where id=".$rows[0]['pid'];
					
							$rows2 = $db->GetOne($sql);
					
							$totalquantity = $rows[0]['price'] * $valquantity[$valcheck[$i]];
					
							$GlobalArray[$golbaNum]['numbers'] = $rows2;
					
					     	$GlobalArray[$golbaNum]['pecif'] = $rows[0]['pecif'];
					
					 		$GlobalArray[$golbaNum]['price'] = $rows[0]['price'];
					
					     	$GlobalArray[$golbaNum]['quantity'] = $valquantity[$valcheck[$i]];
					
					
					
							$GlobalArray[$golbaNum]['totalquantity'] = $totalquantity;
					
					
					
					    	$golbaNum++;
					
					
						}
						
						$_SESSION['GlobalArray'] = $GlobalArray;
						
					}
					
					
					
					
					
					
					
					/*把订单列表显示到页面上*/
					
					//print_r($GlobalArray);exit;
					
					
					for($i=0; $i<count($GlobalArray); $i++){
					
					
					$sql = "select * from pro_info where numbers='".$GlobalArray[$i]['numbers']."'";
					
					$picresult = $db->GetAll($sql);
					
					//			<td ><a href="/show.php?por_id='.$picresult[0]['id'].'" ><img src="admin/productimg/'.$picresult[0]['pic'].'" width="29" height="49" border=0></a></td>
					
						echo ' <tr class="cls12"> 
					
					
									<td width="110" height="139" bgcolor=#ffffff align="center">
						
										<table border="0" align="right" cellpadding="0" cellspacing="0">
							   				<tr> 
						  						<td align="center"><a href="./show.php?por_id='.$picresult[0]['id'].'" target=_blank><img src="admin/productimg/'.$picresult[0]['pic'].'" width="100" height="129" border=0></a></td>
						 						<td width="6" valign="top" background="img/shadowl_12.jpg"><img src="img/shadowl_02.jpg" width="6" height="6"></td>
						    				</tr>
						 					<tr> 
												<td width="173" height="6" background="img/shadowl_21.jpg"><img src="img/shadowl_20.jpg"></td>
												<td width="6" height="6" align="left" valign="top"><img src="img/shadowl_22.jpg" width="6" height="6"></td>
						 					</tr>
					                  </table>
									</td>
						      		<td height="26"  bgcolor="#FFFFFF" align="center">'.$GlobalArray[$i]['numbers'].'</td>
						  			<td  bgcolor="#FFFFFF"  align="center">'.$GlobalArray[$i]['pecif'].'</td>
						   			<td  bgcolor="#FFFFFF"  align="center">'.$GlobalArray[$i]['price'].'<input type="hidden" name="price[]" value="'.$GlobalArray[$i]['price'].'" ></td>
						   			<td  bgcolor="#FFFFFF"  align="center"><input type="text" name="quantity[]" value="'.$GlobalArray[$i]['quantity'].'" size="5"></td>
						      		<td  bgcolor="#FFFFFF"  align="center"><span id=to_'.$i.'>'.$GlobalArray[$i]['totalquantity'].'</span></td>
						     		<td  bgcolor="#FFFFFF"  align="center"><input type="checkbox" name="mycardid[]" value="'.$i.'"></td>
						      </tr>';
					
						$alltotalquantity = $alltotalquantity+$GlobalArray[$i]['totalquantity'];
					
					}
					
					?>
            		<tr bgcolor="#FFFFFF" class="cls12"> 
                    	<td height="38" colspan="3"  bgcolor="#FFFFFF">
                    		Total:<span id="totalprcie"><?php echo $alltotalquantity;?>(USD)</span>
                    	</td>
						<td height="38"   bgcolor="#FFFFFF">
							<div align="center">
                     			<a href="javascript:history.go(-1);">
                     			<img src="img/shopping.jpg" width="110" height="21" border="0"></a>
                      
                    		</div>
                    	</td>
               			<td  bgcolor="#FFFFFF"> 
                            <!--<div align="center"><a href="productlist.php" class="cls12">Continue shopping!</a></div>-->
             			 	<div align="center"> 
             			 		<input type="button" name="editsub" value="edit" onClick="opear();"  class="cls13" style="background-image:url(http://www.joabhomearts.com/img/checkout.jpg); border:0px; width:80px; height:21px;font-color:#ffffff;">
            				</div>  	
            			</td>
          				<td  bgcolor="#FFFFFF"> 
            				<div align="center">
                        		<!--<input  type="hidden" name="sub" value="Submit your order">-->
								<!--<input type="image" src="img/checkout.jpg">-->
								<input type="submit" name="sub" value="check out" onClick="return confirm('Are you sure to submit your order? ')"  class="cls13" style="background-image:url(http://www.joabhomearts.com/img/checkout.jpg); border:0px; width:80px; height:21px;font-color:#ffffff;">
                			</div>
                		</td>
       					<td  bgcolor="#FFFFFF"> 

							<!--  <input type="hidden" name="sub2" value="Delete">-->

							<!--	<input type="image" src="img/delete.jpg">-->
							<input type="submit" name="sub2" value="Delete" class="cls13" style="background-image:url(http://www.joabhomearts.com/img/delete.jpg); border:0px; width:64px; height:21px;font-color:#ffffff;">
						</td>
              			</tr>
   					</table>
     			</form>
			  </div>
			</td>
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

<script type="text/javascript">
$(function($) {
  　
});

function opear(){
	xajax_opea(xajax.getFormValues('form1'));
}
</script>