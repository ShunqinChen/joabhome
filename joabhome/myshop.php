<?php
/**
 * 加入购物车后的提交页面
 * */

//header("Cache-control: private");	//防止后退刷新

session_start();
require_once "./admin/comm/mysqldb.php"; 
require_once "./resource/util/medoo.min.php"; //数据库工具


//验证用户是否仍处于登陆状态，会话是否超时
$userid = $_SESSION['userid'];
if ( empty($userid) ) {
	echo "<script language='javascript'>alert('Please login first!');window.location.href='./index.php';</script>";
}


//获取show.php提交数据
{
	$checkbox = $_REQUEST['checkbox'];  //checkbox选中的数据

	$quantity = $_REQUEST['quantity'];	//从提交产品规格的数量

	$price = $_REQUEST['price'];		//提交过来的产品规格的单价
		
	$pecif = $_REQUEST['pecif'];		//提交过来的产品规格的型号
	
	$pecifid = $_REQUEST['pecifid'];	//提交过来的产品规格的型号ID
	
	$proid = $_SESSION['cart_pro_id'] ;
	
	unset($_SESSION['cart_pro_id']);//获取后清空proid
	//防止多次提交,提交后会清空该标记
	if ( empty($_SESSION['cart_flag']) ) {
		echo "<script language='javascript'>" .
				"window.location.href='mycart.php';" .
			  "</script>";
		exit;	
	}
	
}			

/****将新生成的订单放入购物车(插入meb_cart表)***/
try {
	$insertCartSql ="INSERT INTO joabhome_jiankuncai.meb_cart
	(id, userid, proid, price, pecif, pecif_id, nums, oper_time, oper_id, update_time, update_id, validflag) ";
	
	//将新生成的订单放入购物车(插入meb_cart表)
	if(!empty($checkbox) && count($checkbox)!=0){
		$database = new medoo('joabhome_jiankuncai');
		for ($i = 0; $i < count($checkbox); $i++) {
			$index = $checkbox[$i];
			$param =  array("id"=>uniqid(),
							"userid"=>$userid,
							"proid"=>$proid,
							"price"=>str_replace('$','',$price[$index]),//存入数据库时去掉美元符号
							"pecif"=>$pecif[$index],
							"pecif_id"=>$pecifid[$index],
							"nums"=>$quantity[$index],
							"oper_time"=>date("Y-m-d H:i:s"),
							"oper_id"=>$userid,
							"validflag"=>"1",
							"status"=>"0");
			$database->insert("meb_cart",$param);
			//$errorMsg = $database->error();//TODO:异常处理
			$sqlContidion = "VALUES ('".uniqid()."', '".$userid."', '".$proid."', '".$price[$index]."', '".$pecif[$index]."', ".$pecifid[$index].", ".$quantity[$index].", '".date("Y-m-d H:i:s")."', ".$userid.", '1','1')";
			$finalInsertSql = $insertCartSql.$sqlContidion;
			//print_r($param);
			echo "<br/>";
		}
		
	}
	
	unset($_SESSION['cart_flag']);//提交成功后清空提交标志
	echo "<script language='javascript'>" .
				"alert('Product list has been added to your shopping cart!');" .
				//"window.location.href='mycart.php';" .
		  "</script>";
	
	//提交成功后跳转至购物车页面
	Header("Location: mycart.php");
	
} catch (Exception $e) {
	echo $e->errorMessage();
}


?>
