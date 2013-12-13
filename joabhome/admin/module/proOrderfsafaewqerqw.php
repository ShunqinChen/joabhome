<?php
header("content-type:text/html;charset=gb2312");
/**
 * body 开始
 */

$page = new SmartTemplate("proOrder.html"); 

$sql = "select * from pro_order_no order by ordernum_no desc ";

$rows = DataPage(10,$sql);

$rows = getOrderInfo($rows);
//print_r($rows);
$item = array('mod'=>'proOrderfsafaewqerqw','user_name'=>'xiewj');


$page->assign( 'rows', getResult($rows) ); 
$page->assign( 'id', $IN['id'] ); 
$page->assign( 'links', $linkpage->link($item) );
/**
 * body 结束
 */
$page->output(); 

function getResult($array){
	global $db;
	
	for($i=0; $i<count($array); $i++){
		$sql = "select username from member where id=".$array[$i]['userid'];
//		echo $sql;
		$row = $db->GetOne($sql);
		$array[$i]['username'] = $row;
		
	}
	return $array;
}

function getOrderInfo($array){
	global $db;
	
	for($i=0; $i<count($array); $i++){
		$sql = "select * from pro_order where ordernum='".$array[$i]['ordernum_no']."'";
//		echo $sql;
		$row = $db->GetAll($sql);
		$array[$i]['userid'] = $row[0]['userid'];
		$array[$i]['proid'] = $row[0]['proid'];
		$array[$i]['orderTime'] = date('Y年m月d日 H:i:s',$row[0]['ordernum']);
		
	}
	return $array;
}

?>