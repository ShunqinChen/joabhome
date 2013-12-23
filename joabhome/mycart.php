<?php
/**
 * 购物车页面
 * */

//header("Cache-control: private");	//防止后退刷新

session_start();
require_once "./admin/comm/mysqldb.php"; 


//验证用户是否仍处于登陆状态，会话是否超时
$userid = $_SESSION['userid'];
if ( empty($userid) ) {
	echo "<script language='javascript'>alert('Please login first!');window.location.href='./index.php';</script>";
}
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>

<head>

	<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
	<meta http-equiv="X-UA-Compatible" content="IE=8;IE=9;IE=10;IE=11"/>
	<title>My Cart</title>
	<link href="img/css.css" rel="stylesheet" type="text/css">
	<link href="./resource/js/ui/css/cupertino/jquery-ui-1.9.2.custom.min.css" rel="stylesheet" type="text/css">
 	<script type="text/javascript" src="./resource/js/jquery-1.9.1.min.js"></script>
 	<!--<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js"></script>-->
 	<script type="text/javascript" src="./resource/js/ui/js/jquery-ui-1.9.2.custom.min.js"></script>
 	<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
	<style type="text/css">
	
	BODY {
	
		BACKGROUND-POSITION: center 50%; BACKGROUND-IMAGE: url(img/background_tile.gif); MARGIN: 0px; 
		BACKGROUND-REPEAT: repeat-y; BACKGROUND-COLOR: #cedce9; TEXT-ALIGN: center
	
	}
	
	
	#container{border:0px solid red;margin:auto;height:100%;	}
	
	#top{ border:0px solid blue;height:153px;width:100%;}
	
	#content{ border:0px solid black; height:auto;width:100%;text-align:center;padding:5px 0;background-color:white;}
	
	#foot{ border:0px solid green;}
	
	#cartDetail td{
		border:1px solid #969696;
		border-spacing:none;
		border-collapse: collapse;
	}
	#cartDetail table{
		border-spacing:none;
		border-collapse: collapse;
	}
	</style>
</head>

<body topmargin="0" leftmargin="0" rightmargin="0" bottommargin="0" >

<div id="container" style="width:785px;height:100%;text-align:center;background-color:white;">
	<!-- top -->
	<div id="top">
	
	  <?php 
	  		include("top.php"); 
	  ?> 
	  
	</div>
	<div style="clear:both;"></div>
	
	<!-- content -->
	<div id="content">

		<div id="cartDetail" style="width:95%;height:auto;margin:auto;">
			<table width="100%" id="cartDetailTable" >
		 	<!-- table head begin -->
				<tr class="cls12"> 
					<td width="12%" bgcolor="F0FAF6" align="center"> 
		             	 IMG
					</td>
			        <td width="19%" bgcolor="F0FAF6" align="center"> 
						ID 
					</td>
		           	<td width="13%" bgcolor="F0FAF6"  align="center">
		           	 	Size
		           	</td>
		            <td width="17%" bgcolor="F0FAF6"  align="center"> 
			      		Price(USD)
			      	</td>
		           	<td width="10%" bgcolor="F0FAF6"  align="center"> 
		              	Quantity
		            </td>
		           	<td width="15%" bgcolor="F0FAF6"  align="center"> 
		      			<div align="center" >Total(USD)</td>
		           	<td width="16%" bgcolor="F0FAF6"  align="center"> 
			        	Delete
			        </td>
				</tr>
				
				<?php
					 //按日期和用户过滤分类购物车
					 $sqlMebCartByDate = "select count(id) as countid,substr(oper_time,1,10) as oper_time
											from meb_cart cart 
											where cart.status = '0'
											      and cart.validflag = '1'
											      and userid='".$userid."'
											group by substr(oper_time,1,10);";
					 
					 $countMebCartByDate = $db->GetAll($sqlMebCartByDate);	//执行查询
					 
					 //根据结果按日期分类						
					 if(count($countMebCartByDate)>0){
					 	for ($i = 0; $i < count($countMebCartByDate); $i++) {
							//输出一行分类
						   echo '<tr><td colspan="7" class="clsTittleLv2" style="border-left:0;border-right:0;text-align:left;">Add Date: '.$countMebCartByDate[$i]['oper_time'].'</td></tr>';	
						   
						   	//继续查询购物车列表明细
					 		$queryMemCartList= "select  cart.userid,cart.id cartid,
												        pro.p_name,pro.p_type_id,
												        cart.pecif,
												        cart.proid,
												        pecif.price as price,
												        round((pecif.price * cart.nums),2) as total,
												        cart.nums,
												        pro.pic,
												        cart.oper_time
												from meb_cart cart 
												left join pro_info pro on pro.id = cart.proid
												left join pro_pecif pecif on pecif.id = cart.pecif_id
												where cart.status = '0'
												      and cart.validflag = '1'
												      and userid='".$userid."'
												      and substr(cart.oper_time,1,10) = '".$countMebCartByDate[$i]['oper_time']."'".
												"order by oper_time desc";
							$memCartList = $db->GetAll($queryMemCartList);	//执行查询
							if(count($memCartList)>0){
								$protype_id = $memCartList[0]['p_type_id'];//该字段用于继续购物按钮跳转，无其他用途
								for ($j = 0; $j < count($memCartList); $j++) {
				?>
									<tr class="cls12" align="center" id="<?php echo $memCartList[$j]['cartid'];?>">
										<td>
											<a href="./show.php?por_id=<?php echo $memCartList[$j]['proid']?>" target=_blank>
												<img src="admin/productimg/<?php echo $memCartList[$j]['pic']?>" width="100" height="129" border=0>
											</a>
										</td>
										<td><?php echo $memCartList[$j]['p_name']?></td>
										<td><?php echo $memCartList[$j]['pecif']?></td>
										<td><?php echo $memCartList[$j]['price']?></td>
										<td nowrap="nowrap" style="text-align:center;">
											<a href="javascript:void(0)" onClick="reduceCartNumbs('<?php echo $memCartList[$j]['cartid'];?>');" style="border:1px solid #cfcfcf;">－</a>
											<input id="nums_<?php echo $memCartList[$j]['cartid'];?>" type="text" value="<?php echo $memCartList[$j]['nums']?>" onblur="checkFormat(this.value,'<?php echo $memCartList[$j]['cartid'];?>')" style="border:1px solid #cfcfcf;text-align:center;width:30px;height:30px;line-height:30px;" >
											<a href="javascript:void(0)" onClick="addCartNumbs('<?php echo $memCartList[$j]['cartid'];?>');" style="border:1px solid #cfcfcf;height:20px;">＋</a>
										</td>
										<td><?php echo $memCartList[$j]['total']?></td>
										<td><button id="delete" href="javascript:void(0);" onClick="delCartItem('<?php echo $memCartList[$j]['cartid'];?>')">Delete</button></td>
									</tr>
				<?php			}
							}	
						}
					 }else{ //如果沒有查詢到購物車信息，即count =0 
				?>
					<tr  align="center" style="border:0;">
						<td colspan="7" style="border:0;padding:10px;">
							<div style="width:100%;height:50px;background-color:#E1EFF8;border:1px solid #cfcfcf;margin:auto;line-height:50px;">
								Sorry!You haven`t added any painting to your cart.Please chooses something first!
							</div>
						</td>
					</tr>
				
				<?php
					 }
					 //总额:计算该用户有效订单总额
					 $querySumPrice = " select   ifnull(sum(round((pecif.price * cart.nums),2)),0) as total
										from meb_cart cart 
										left join pro_pecif pecif on pecif.id = cart.pecif_id
										where cart.status = '0'
										      and cart.validflag = '1'
										      and userid='".$userid."'";
					$totalAllCartList = $db->GetAll($querySumPrice);	//执行查询
				?>
				<!--<tr>
					<td colspan="2" class="cls12" align="right" ></td>
					<td></td>
					<td align="center"></td>
					<td align="center"></td>
					<td align="center"></td>
					<td></td>
				</tr>-->
			</table>
			
			<!-- check out panel-->
			<div id="toolbar" class="ui-widget-header ui-corner-all" style="width:100%;padding:5px 2px;margin:auto;margin-top:40px;margin-bottom:40px;vertical-align:baseline;">
				<span style="margin-right:50px;"><b>Total: </b><span style="color:#FF5500" id="totalInCart"><b>$<?php print($totalAllCartList[0]['total']); ?></b></span></span>
				<a id="contiue" href="product.php?type_id=<?php echo $protype_id;?>" style="border:1px solid #AED0EA;text-align:center;"><i class="fa fa-reply"></i> Continue Shop</a>
				<?php 
					if(count($countMebCartByDate)==0){//如果没有购物车记录则不允许CHECKOUT，防止生成错误订单
						echo '<a id="checkOut" onClick="" disabled="true" style="border:1px solid #AED0EA;text-align:center;"><i class="fa fa-shopping-cart"></i> Check Out</a>';
					}else{
						echo '<a id="checkOut" onClick="checkOutConfirm()" style="border:1px solid #AED0EA;text-align:center;"><i class="fa fa-shopping-cart"></i> Check Out</a>';
					}
				?>
				
			</div>
			
		</div>
	</div>
	
	<div style="clear:both;"></div>
	<!-- foot -->
	<div id="foot" style="height:147px;width:100%;background-image:url('img/bbg.gif');">
		<?php
		  	include("index-bottom.php");
		?>
	</div>
	
</div>



</body>
<!-- checkout confirm-->
<div id="dialog-confirm" title=" Checkout confirm" style="display:none;">
  <p style="font-size:14px;text-align:left;">
  	<span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>
  	Wiil u confirm to checkout?All this item will be added to one order.
  </p>
</div>


</html>

<script type="text/javascript">
$(function($) {
  　
});
//Initial controls
$(function() {
	//define button style
    $( "#contiue" )
      .button({
      	width:'100px',
      	height:'60px'
      });
   	$( "#contiue" ).css({"font-size":"12px","color":"black"});
   	
	//define button style
    $( "#checkOut" )
      .button({
      	width:'100px',
      	height:'30px'
      })
      .click(function( event ) {
        event.preventDefault();
      });
   	$( "#checkOut" ).css({"font-size":"12px","color":"black"});
   	
   	//define button style
    $( "#cartDetailTable button" )
      .button({
      	width:'100px',
      	height:'30px'
      })
      .click(function( event ) {
         event.preventDefault();
      });
   	$( "#checkOut" ).css({"font-size":"12px","color":"black"});
});


//delete cartItem
function delCartItem(cartId){
	$.ajax({
		cache: false,
		async: false,
	   	type: "POST",
	   	url: "common/baseservice.php",
	   	data: "cartId="+cartId+"&oper_type=delCartItem",
	   	dataType : "text",
	   	error: function(request) {
			alert('please try it agian!');
       	},
	   	success: function(msg){
	   		var data = eval('('+msg+')');
	   		var result = data.result;
	     	//alert( "Data Saved: " + result +" "+ msg);
	     	if(result == true || result=="true"){
	     		$("#"+cartId).remove();
	     		if(data.totalInCart == 0 || data.totalInCart =='0.00'){
	     			//$("#checkOut").attr("disabled",true);
	     			$("#checkOut").removeAttr("onClick");
	     		}
	     		$("#totalInCart").html(data.totalInCart);
	     	}else{
	     		alert("Operation fail,please try it agian!");
	     	}
	   	}
	});
}

/**Check out Confirm**/
function checkOutConfirm(){
	$( "#dialog-confirm" ).dialog({
      resizable: false,
      modal: true,
      positon:{my:"center center",at:"center center"},
      buttons: {
        "confirm": function() {
          	checkOut();//exect order update
          	$( this ).dialog( "close" );
        },
        Cancel: function() {
          $( this ).dialog( "close" );
        }
      }
    });
    $( "#dialog-confirm" ).height(60);
}


/**Check out**/
function checkOut(){
	$.ajax({
		cache: false,
		async: false,
	   	type: "POST",
	   	url: "common/baseservice.php",
	   	data: "oper_type=checkOut",
	   	dataType : "text",
	   	error: function(request) {
			alert('please try it agian!');
       	},
	   	success: function(msg){
	   		var data = eval('('+msg+')');
	   		var result = data.result;
	     	//alert( "Data Saved: " + result +" "+ msg);
	     	if(result == true || result=="true"){
     			 alert("Your order has been complete,u can check it in history order or u can contact us!");
	     		 //history.go(0);
	     		 var odnum = data.orderNum;
	     		 window.location.href="contact.php?ordernum="+odnum;
	     	}else{
	     		alert("Operation fail,please try it agian!");
	     	}
	   	}
	});
}


//reduce num
function reduceCartNumbs(itemId){
	//alert($("#nums_"+itemId).val());
	var no = $("#nums_"+itemId).val();
	if(no>1){
		$("#nums_"+itemId).val(--no);
	}else{
		alert("At least 1 item is required,or u can del this product.");
		return false;
	}
	//commit
	no = $("#nums_"+itemId).val();
 	updateNumbs(itemId,no);//update cart no
}


//reduce num
function addCartNumbs(itemId){
	var no = $("#nums_"+itemId).val();
	//alert($("#nums_"+itemId).val());
	$("#nums_"+itemId).val(++no);
	//commit
	no = $("#nums_"+itemId).val();
	updateNumbs(itemId,no);//update cart no
}


function updateNumbs(itemId,no){
	//commit
	$.ajax({
		cache: false,
		async: false,
	   	type: "POST",
	   	url: "common/baseservice.php",
	   	data: "oper_type=updateCartsNumbs&cartId="+itemId+"&numbs="+no,
	   	dataType : "text",
	   	error: function(request) {
			alert('please try it agian!');
       	},
	   	success: function(msg){
	   		var data = eval('('+msg+')');
	   		var result = data.result;
	     	if(result == true || result=="true"){
	     		$("#totalInCart").html(data.totalInCart);
	     	}else{
	     		 alert('fail!please try it agian!');
	     	}
	   	}
	});
}


function checkFormat(value,itemId){
   var curVal = value.trim();
   var reg =  /^\d+$/;
   //alert(curVal.match(reg));
   if(value == 0){
   		alert("At least 1 item is required,or u can del this product.");return false;
   }else if(curVal.match(reg) == null){
   		alert("only positive integer is allowed");return false;
   }else{
   		var no = $("#nums_"+itemId).val();
 		updateNumbs(itemId,no);//update cart no
   }
}
</script>