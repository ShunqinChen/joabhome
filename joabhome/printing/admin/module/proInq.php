<?php
header("content-type:text/html;charset=gb2312");
/**
 * body ��ʼ
 */

$page = new SmartTemplate("proInq.html"); 

$where = " 1=1 ";
if($IN['p_name']){
	$where .=" and p_name='".$IN['p_name']."'";
}

$sql = "select * from pro_info where ".$where;

$rows = DataPage(10,$sql);

$item = array('mod'=>'proInq','user_name'=>'xiewj');


$page->assign( 'rows', getResult($rows) ); 
$page->assign( 'links', $linkpage->link($item) );
/**
 * body ����
 */

$page->output(); 

function getResult($array){
	global $db;
	
	for($i=0; $i<count($array); $i++){
		$sql = "select type_name from pro_type where id=".$array[$i]['p_type_id'];
//		echo $sql;
		$row = $db->GetOne($sql);
		$array[$i]['p_type_id'] = $row;
	}
	return $array;
}

?>