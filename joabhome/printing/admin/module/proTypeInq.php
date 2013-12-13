<?php
header("content-type:text/html;charset=gb2312");
/**
 * body 开始
 */
//print_r($comm->vtiondb);
$select = getAllMod();
$page = new SmartTemplate("proTypeInq.html"); 
$page->assign( 'select', $select ); 
/**
 * body 结束
 */

$page->output(); 

function getAllMod($selected=0) {
	global $db;
//	$comm->mysqldbdx->debug=1;
	$string = '';
	$sql = "select * from pro_type ";
	$rows = $db->GetAll($sql);
	for($i=0; $i<count($rows); $i++){
		$string.="<hr>".$rows[$i]['type_name']."<span style='font-size: 12px;color: #999999;font-style: italic;'>(id=".$rows[$i]['id'].")</span>&nbsp;<a href='/printing/admin/index.php?mod=editProType&id=".$rows[$i]['id']."'><img src='other/images/edit.png' /></a>&nbsp;&nbsp;&nbsp;<a href='#' onclick=\"if(confirm('确定删除！')) location.href='/printing/admin/index.php?mod=delProType&id=".$rows[$i]['id']."'\"><img src='other/images/del.png' /></a><hr>";
	}
	return $string;
}
?>