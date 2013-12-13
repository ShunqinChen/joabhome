<?php
header("content-type:text/html;charset=gb2312");
/**
 * body ¿ªÊ¼
 */

$page = new SmartTemplate("proInq.html"); 

$where = " 1=1 ";
if($IN['numbers']){
	$where .=" and numbers like '%".$IN['numbers']."%'";
}

$sql = "select * from pro_info where ".$where. " order by p_up_date desc ";

$rows = DataPage(10,$sql);

$item = array('mod'=>'proInq','user_name'=>'xiewj','numbers'=>"{$IN['numbers']}");


$page->assign( 'rows', getResult($rows) ); 
$page->assign( 'links', $linkpage->link($item) );
/**
 * body ½áÊø
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