<?php
/**
 * 框架基础调用类
 * **/
 
session_start();

require_once "../admin/comm/mysqldb.php"; 
require_once "../resource/util/medoo.min.php"; //数据库工具

//获取操作类型
$oper_type = $_REQUEST['oper_type'];
$baseService = new Baseservice();

//获取用户ID，此处可不验证是否为空，因为若为空则不会跳转至BASESERVICE在其他页面会拦截
$user_id = $_SESSION['userid'];

//echo $oper_type;	//for debug

//根据传入参数取方法
switch ( $oper_type ) {
	case 'delCartItem': //mycart.php中的删除购物车商品
		$cartItemId = $_REQUEST['cartId'];
		$baseService->delCartItem($cartItemId,$user_id);
		
		break;
	case 'checkOut':
		$baseService->checkOut($user_id);
		//echo $user_id;	//DEBUG
		break;
		
	case 'updateCartsNumbs':
		$cartItemId = $_REQUEST['cartId'];
		$numbs =  $_REQUEST['numbs'];
		$baseService->updateCartsNumbs($cartItemId,$numbs,$user_id);
		break;
	default:
		break;
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

/**
 * 综合事务调用
 * @return result:是否成功, delCount，删除数
 * */
class Baseservice{
	
	//mycart.php中的删除购物车商品
	function delCartItem($itemId,$user_id){
		
		//如果没有ID则删除失败，进入删除方法必有ID
		if(empty($itemId)){
			echo $result = array("result"=>"false","delCount"=>"0");//定义返回值，result，是否成功。 delCount，删除数
			exit;
		}
		
		$database = new medoo('joabhome_jiankuncai');
//		//删除条件
//		$param = array(	"id"=>$itemId,
//						"validflag"=>'1',
//						"status"=>'0');
//		$deleteNum = 
//			$database->delete("meb_cart", array("AND"=>$param));

		$delSql = "delete from meb_cart where id='%s' and validflag='1' and status='0'";
		$delSql = sprintf($delSql,mysql_real_escape_string($itemId));
		$delresult = mysql_query($delSql);
		$deleteNum = mysql_affected_rows();
		
		$totalInCart = $this->costTotalInCart($user_id);	//获取记录删除后的购物车内商品总金额并返回前台
		
		//TODO:捕获错误信息
		//$rorMsg = $database->error();echo json_encode($errorMsg);
		
		//定义返回值
		$result = array("result"=>$delresult,"delCount"=>$deleteNum,"totalInCart"=>$totalInCart);
		
		$result = json_encode($result);
		print_r($result) ;
		exit;
	}
	
	
	/**计算当前购物车总金额**/
	function costTotalInCart($user_id){
		 //总额:计算该用户有效订单总额
		 $querySumPrice = " select   ifnull(sum(round((pecif.price * cart.nums),2)),0) as total
							from meb_cart cart 
							left join pro_pecif pecif on pecif.id = cart.pecif_id
							where cart.status = '0'
							      and cart.validflag = '1'
							      and userid='".$user_id."'";
		$totalAllCartList = mysql_query($querySumPrice);	//执行查询
		$totalRow = mysql_fetch_array($totalAllCartList);
		return $totalRow['total'];
	}
	
	
	/**将购物车内的物品全部放入订单**/
	function checkOut($user_id){
		
			//如果没有ID则删除失败，进入删除方法必有ID
		if(empty($user_id)){
			echo $result = array("result"=>"false");//定义返回值，result，是否成功
			exit;
		}
		
		//////////////////以下部分需执行事务处理
		mysql_query("SET AUTOCOMMIT=0"); 
		mysql_query("BEGIN");
		
		
		//Step 1. 插入订单表		
		$ordernum = time(); //订单号
		$sqlInsertProOrder = "INSERT INTO joabhome_jiankuncai.pro_order
							(id, userid, ordernum, proid, nums, price, pecif) 
							select  replace(uuid(),'-','') id,
							        cart.userid,
							        '".$ordernum."' ordernum,
							        pro.p_name as proid,
							        cart.nums,
							        round((cart.price * cart.nums),2) as price,
							       cart.pecif
							from meb_cart cart
							left join pro_info pro on pro.id = cart.proid
							where cart.status = '0'
							      and cart.validflag = '1'
							      and cart.userid='".$user_id."'";
		$insertRes=mysql_query($sqlInsertProOrder);
		
		$insertNum = mysql_affected_rows();
		
		$stage1 = $insertRes;	//DEBUG
		
		
		//Step 2. 插入订单号汇总表		
		$sqlinsertProOrderInfo = "INSERT INTO joabhome_jiankuncai.pro_order_no(ordernum_no) VALUES ('".$ordernum."')";
		$insertRes = mysql_query($sqlinsertProOrderInfo);
		
		$stage2 = $insertRes;	//DEBUG
		
		//Step 3.更新购物车中的记录为已下单
		$updateCartList = "update meb_cart cart set status='1' where cart.userid='".$user_id.
						  "' and cart.status = '0' and cart.validflag = '1'";
		$insertRes = mysql_query($updateCartList);
		
		$stage3 = $insertRes;	//DEBUG
		
		if(!$insertRes){//判断事务最终是否成功
			mysql_query("ROLLBACK");
			mysql_query("SET AUTOCOMMIT=1"); 
			$result = array("result"=>$insertRes,"insertCount"=>0);
			$result = json_encode($result);
			print_r($result) ;
			exit;
		}else{
			mysql_query("COMMIT");
			mysql_query("SET AUTOCOMMIT=1"); 
			mysql_query("END"); 
			
			$stage4 = $insertRes;	//DEBUG
		}
		
		//输出
		//$result = array("result"=>$insertRes,"insertCount"=>$insertNum,$stage1,$stage2,$stage3,$stage4,$updateCartList);//debug
		$result = array("result"=>$insertRes,"insertCount"=>$insertNum,"orderNum"=>$ordernum);//定义返回值
		$result = json_encode($result);
		print_r($result) ;
		exit;
	}
	
	
	//购物车中的数量加减
	function updateCartsNumbs($itemId,$numbs,$user_id){
		
		$updateNums = "update meb_cart cart set nums=".$numbs." where id='".$itemId."' and cart.status = '0' and cart.validflag = '1'; ";
		$sqlresult = mysql_query($updateNums);
		
		$totalInCart = $this->costTotalInCart($user_id);	//获取记录删除后的购物车内商品总金额并返回前台
		$result = array("result"=>$sqlresult, "totalInCart"=>$totalInCart);
		$result = json_encode($result);
		print_r($result) ;
		exit;
	}
}

?>