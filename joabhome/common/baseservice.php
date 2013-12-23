<?php
/**
 * ��ܻ���������
 * **/
 
session_start();

require_once "../admin/comm/mysqldb.php"; 
require_once "../resource/util/medoo.min.php"; //���ݿ⹤��

//��ȡ��������
$oper_type = $_REQUEST['oper_type'];
$baseService = new Baseservice();

//��ȡ�û�ID���˴��ɲ���֤�Ƿ�Ϊ�գ���Ϊ��Ϊ���򲻻���ת��BASESERVICE������ҳ�������
$user_id = $_SESSION['userid'];

//echo $oper_type;	//for debug

//���ݴ������ȡ����
switch ( $oper_type ) {
	case 'delCartItem': //mycart.php�е�ɾ�����ﳵ��Ʒ
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
 * �ۺ��������
 * @return result:�Ƿ�ɹ�, delCount��ɾ����
 * */
class Baseservice{
	
	//mycart.php�е�ɾ�����ﳵ��Ʒ
	function delCartItem($itemId,$user_id){
		
		//���û��ID��ɾ��ʧ�ܣ�����ɾ����������ID
		if(empty($itemId)){
			echo $result = array("result"=>"false","delCount"=>"0");//���巵��ֵ��result���Ƿ�ɹ��� delCount��ɾ����
			exit;
		}
		
		$database = new medoo('joabhome_jiankuncai');
//		//ɾ������
//		$param = array(	"id"=>$itemId,
//						"validflag"=>'1',
//						"status"=>'0');
//		$deleteNum = 
//			$database->delete("meb_cart", array("AND"=>$param));

		$delSql = "delete from meb_cart where id='%s' and validflag='1' and status='0'";
		$delSql = sprintf($delSql,mysql_real_escape_string($itemId));
		$delresult = mysql_query($delSql);
		$deleteNum = mysql_affected_rows();
		
		$totalInCart = $this->costTotalInCart($user_id);	//��ȡ��¼ɾ����Ĺ��ﳵ����Ʒ�ܽ�����ǰ̨
		
		//TODO:���������Ϣ
		//$rorMsg = $database->error();echo json_encode($errorMsg);
		
		//���巵��ֵ
		$result = array("result"=>$delresult,"delCount"=>$deleteNum,"totalInCart"=>$totalInCart);
		
		$result = json_encode($result);
		print_r($result) ;
		exit;
	}
	
	
	/**���㵱ǰ���ﳵ�ܽ��**/
	function costTotalInCart($user_id){
		 //�ܶ�:������û���Ч�����ܶ�
		 $querySumPrice = " select   ifnull(sum(round((pecif.price * cart.nums),2)),0) as total
							from meb_cart cart 
							left join pro_pecif pecif on pecif.id = cart.pecif_id
							where cart.status = '0'
							      and cart.validflag = '1'
							      and userid='".$user_id."'";
		$totalAllCartList = mysql_query($querySumPrice);	//ִ�в�ѯ
		$totalRow = mysql_fetch_array($totalAllCartList);
		return $totalRow['total'];
	}
	
	
	/**�����ﳵ�ڵ���Ʒȫ�����붩��**/
	function checkOut($user_id){
		
			//���û��ID��ɾ��ʧ�ܣ�����ɾ����������ID
		if(empty($user_id)){
			echo $result = array("result"=>"false");//���巵��ֵ��result���Ƿ�ɹ�
			exit;
		}
		
		//////////////////���²�����ִ��������
		mysql_query("SET AUTOCOMMIT=0"); 
		mysql_query("BEGIN");
		
		
		//Step 1. ���붩����		
		$ordernum = time(); //������
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
		
		
		//Step 2. ���붩���Ż��ܱ�		
		$sqlinsertProOrderInfo = "INSERT INTO joabhome_jiankuncai.pro_order_no(ordernum_no) VALUES ('".$ordernum."')";
		$insertRes = mysql_query($sqlinsertProOrderInfo);
		
		$stage2 = $insertRes;	//DEBUG
		
		//Step 3.���¹��ﳵ�еļ�¼Ϊ���µ�
		$updateCartList = "update meb_cart cart set status='1' where cart.userid='".$user_id.
						  "' and cart.status = '0' and cart.validflag = '1'";
		$insertRes = mysql_query($updateCartList);
		
		$stage3 = $insertRes;	//DEBUG
		
		if(!$insertRes){//�ж����������Ƿ�ɹ�
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
		
		//���
		//$result = array("result"=>$insertRes,"insertCount"=>$insertNum,$stage1,$stage2,$stage3,$stage4,$updateCartList);//debug
		$result = array("result"=>$insertRes,"insertCount"=>$insertNum,"orderNum"=>$ordernum);//���巵��ֵ
		$result = json_encode($result);
		print_r($result) ;
		exit;
	}
	
	
	//���ﳵ�е������Ӽ�
	function updateCartsNumbs($itemId,$numbs,$user_id){
		
		$updateNums = "update meb_cart cart set nums=".$numbs." where id='".$itemId."' and cart.status = '0' and cart.validflag = '1'; ";
		$sqlresult = mysql_query($updateNums);
		
		$totalInCart = $this->costTotalInCart($user_id);	//��ȡ��¼ɾ����Ĺ��ﳵ����Ʒ�ܽ�����ǰ̨
		$result = array("result"=>$sqlresult, "totalInCart"=>$totalInCart);
		$result = json_encode($result);
		print_r($result) ;
		exit;
	}
}

?>