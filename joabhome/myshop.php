<?php
/**
 * ���빺�ﳵ����ύҳ��
 * */

//header("Cache-control: private");	//��ֹ����ˢ��

session_start();
require_once "./admin/comm/mysqldb.php"; 
require_once "./resource/util/medoo.min.php"; //���ݿ⹤��


//��֤�û��Ƿ��Դ��ڵ�½״̬���Ự�Ƿ�ʱ
$userid = $_SESSION['userid'];
if ( empty($userid) ) {
	echo "<script language='javascript'>alert('Please login first!');window.location.href='./index.php';</script>";
}


//��ȡshow.php�ύ����
{
	$checkbox = $_REQUEST['checkbox'];  //checkboxѡ�е�����

	$quantity = $_REQUEST['quantity'];	//���ύ��Ʒ��������

	$price = $_REQUEST['price'];		//�ύ�����Ĳ�Ʒ���ĵ���
		
	$pecif = $_REQUEST['pecif'];		//�ύ�����Ĳ�Ʒ�����ͺ�
	
	$pecifid = $_REQUEST['pecifid'];	//�ύ�����Ĳ�Ʒ�����ͺ�ID
	
	$proid = $_SESSION['cart_pro_id'] ;
	
	unset($_SESSION['cart_pro_id']);//��ȡ�����proid
	//��ֹ����ύ,�ύ�����ոñ��
	if ( empty($_SESSION['cart_flag']) ) {
		echo "<script language='javascript'>" .
				"window.location.href='mycart.php';" .
			  "</script>";
		exit;	
	}
	
}			

/****�������ɵĶ������빺�ﳵ(����meb_cart��)***/
try {
	$insertCartSql ="INSERT INTO joabhome_jiankuncai.meb_cart
	(id, userid, proid, price, pecif, pecif_id, nums, oper_time, oper_id, update_time, update_id, validflag) ";
	
	//�������ɵĶ������빺�ﳵ(����meb_cart��)
	if(!empty($checkbox) && count($checkbox)!=0){
		$database = new medoo('joabhome_jiankuncai');
		for ($i = 0; $i < count($checkbox); $i++) {
			$index = $checkbox[$i];
			$param =  array("id"=>uniqid(),
							"userid"=>$userid,
							"proid"=>$proid,
							"price"=>str_replace('$','',$price[$index]),//�������ݿ�ʱȥ����Ԫ����
							"pecif"=>$pecif[$index],
							"pecif_id"=>$pecifid[$index],
							"nums"=>$quantity[$index],
							"oper_time"=>date("Y-m-d H:i:s"),
							"oper_id"=>$userid,
							"validflag"=>"1",
							"status"=>"0");
			$database->insert("meb_cart",$param);
			//$errorMsg = $database->error();//TODO:�쳣����
			$sqlContidion = "VALUES ('".uniqid()."', '".$userid."', '".$proid."', '".$price[$index]."', '".$pecif[$index]."', ".$pecifid[$index].", ".$quantity[$index].", '".date("Y-m-d H:i:s")."', ".$userid.", '1','1')";
			$finalInsertSql = $insertCartSql.$sqlContidion;
			//print_r($param);
			echo "<br/>";
		}
		
	}
	
	unset($_SESSION['cart_flag']);//�ύ�ɹ�������ύ��־
	echo "<script language='javascript'>" .
				"alert('Product list has been added to your shopping cart!');" .
				//"window.location.href='mycart.php';" .
		  "</script>";
	
	//�ύ�ɹ�����ת�����ﳵҳ��
	Header("Location: mycart.php");
	
} catch (Exception $e) {
	echo $e->errorMessage();
}


?>
