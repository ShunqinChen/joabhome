<?php
/**
 * 购物车页面
 * */

//header("Cache-control: private");	//防止后退刷新

session_start();
require_once "./admin/comm/mysqldb.php"; 



//判断用户是否登陆
$userid = $_SESSION['userid'];	//用户ID 非姓名
if(empty($userid)){
	//这里可设定跳转到登录页或直接退出
	echo "<script language='javascript'>alert('please login first!');window.opener = null;window.open(' ', '_self', ' '); window.close();</script>";
}

?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html>

<head>

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	
	<title>Trade List</title>
	<?php echo $js;?> 
	<link href="img/css.css" rel="stylesheet" type="text/css">
 	<script type="text/javascript" src="./resource/js/jquery-1.9.1.min.js"></script>
	<style type="text/css">
	
	BODY {
	
		BACKGROUND-POSITION: center 50%; BACKGROUND-IMAGE: url(img/background_tile.gif); MARGIN: 0px; BACKGROUND-REPEAT: repeat-y; BACKGROUND-COLOR: #cedce9; TEXT-ALIGN: center
	
	}
	div{
		margin:0;
		padding:0;
	}
	
	#tradelist{
		font-size:12px;
	}
	
	
	#tradelist td,#tradelist tr{
		border:1px solid #EDEDED;
	}
	
	#tradelist td{
		text-align:center;
	}
	
	.firTr{
		font-size:14px;
	}
	
	.sndTr{
		background-color:#C2E1F5;
		font-size:14px;
	}
	</style>
</head>
<?php
	//获取用户历史订单号,因为没有下单时间，所以按订单号倒序排列
	$queryOdNumList = "select  ordernum,ifnull(sum(price),0) as totalusd from pro_order where userid = '".$userid."' group by ordernum order by ordernum desc ";
	
	$odNumList = $db->GetAll($queryOdNumList);
	
	//print_r($odNumList[0]['ordernum']); //for debug
?>
<body topmargin="0" leftmargin="0" rightmargin="0" bottommargin="0" >
<table width="720" height="100%" border="0" align="center" cellpadding="0" cellspacing="0" style="border:1px solid white;background-color:white;">
	<!-- top -->
	<tr> 
		<td height="126" colspan="2" valign="top"  >
		    <?php
				include("top.php");
			  ?> 
		</td>
	</tr>
	<!--<tr> 
		<td height="16" valign="middle" bgcolor="#FFFFFF"> </td>
  	</tr> -->
  	
	<!-- content -->
	<tr> 
		<td align="center">
			<table id="tradelist" style="height:90%;width:90%;margin:5px 10px;boder-spacing:none;border-collapse: collapse;" >
				<?php 
					//如果订单存在 Order Placed:
					if($odNumList){
						for($i=0; $i<count($odNumList); $i++){
				?> 
					<tr height="20px;">
						<td style="text-align:left;" nowrap="nowrap">Order Number:# <?php echo $odNumList[$i]['ordernum'] ?></td>
						<td style="text-align:left;"> </td>
						<td style="text-align:left;" colspan="3">Total(USD):<?php echo $odNumList[$i]['totalusd'] ?></td>
					</tr>
					<tr  height="20px;">
						<td class="sndTr">ID</td>
						<td class="sndTr">Size</td>
						<td class="sndTr">Price(USD)</td>
						<td class="sndTr">Quantity</td>
						<td class="sndTr">Total(USD)</td>
					</tr>
					<?php
						//查询订单明细表,关联产品信息表查图片名称
						$queryOdItem = "select b.*,pro.pic 
										from  pro_order b 
										left join pro_info pro on b.proid = pro.id
										where b.ordernum ='".$odNumList[$i]['ordernum']."'";
						$resultOdItem = $db->GetAll($queryOdItem);
						if($resultOdItem){
							for($j=0; $j<count($resultOdItem); $j++){
					?>
					<tr height="20px;">
						<td><?php echo $resultOdItem[$j]['proid'] ?></td>
						<td><?php echo $resultOdItem[$j]['pecif'] ?></td>
						<td><?php echo $resultOdItem[$j]['price'] ?></td>
						<td><?php echo $resultOdItem[$j]['nums'] ?></td>
						<td><?php echo $resultOdItem[$j]['price'] ?></td>
					</tr>
						<?php	}	
						}
					?>
					<tr height="3px;" style="border:0;">
						<td  style="border:0;"></td>
						<td  style="border:0;"></td>
						<td  style="border:0;"></td>
						<td  style="border:0;"></td>
						<td  style="border:0;"></td>
					</tr>
				<?php	}	
					}
				?>
				
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

function closeWindow() {
 　window.opener = null;
 　window.open(' ', '_self', ' '); 
 　window.close();
}
</script>