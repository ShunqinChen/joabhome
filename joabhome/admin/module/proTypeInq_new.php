<?php
header("content-type:text/html;charset=gb2312");
/**
 * body 开始
 */
//print_r($comm->vtiondb);
$select = getAllMod();
$page = new SmartTemplate("proTypeInq_new.html"); 
$page->assign( 'select', $select ); 
/**
 * body 结束
 */

$page->output(); 

function getAllMod($selected=0) {
	global $db;
//	$comm->mysqldbdx->debug=1;
	$string = '';
	$sql = "select * from pro_type_new where pid=0 order by id ";
	$rows = $db->GetAll($sql);
	for($i=0; $i<count($rows); $i++){
		$string.="<hr>".$rows[$i]['type_name']."<span style='font-size: 12px;color: #999999;font-style: italic;'>(id=".$rows[$i]['id'].")</span>&nbsp;<a href='index.php?mod=editProType_new&id=".$rows[$i]['id']."'><img src='other/images/edit.png' /></a>&nbsp;&nbsp;&nbsp;<a href='#' onclick=\"if(confirm('确定删除！')) location.href='index.php?mod=delProType_new&id=".$rows[$i]['id']."'\"><img src='other/images/del.png' /></a><hr>";
		$sql = "select * from pro_type_new where  pid=".$rows[$i]['id']." order by id ";
		$subrows = $db->GetAll($sql);
		for($n=0; $n<count($subrows); $n++){
			$string.="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$subrows[$n]['type_name']."<span style='font-size: 12px;color: #999999;font-style: italic;'>(id=".$subrows[$n]['id'].";update=".date('Y年m月d日 H:i:s',$subrows[$n]['update_time']).")</span> &nbsp;<a href='index.php?mod=editProType_new&id=".$subrows[$n]['id']."'><img src='other/images/edit.png' /></a>&nbsp;&nbsp;&nbsp;<a href='#' onclick=\"if(confirm('确定删除！')) location.href='index.php?mod=delProType_new&id=".$subrows[$n]['id']."'\"><img src='other/images/del.png' /></a><br>";
			
			$sql = "select * from pro_type_new where  pid=".$subrows[$n]['id']." order by id ";
			$subrows3 = $db->GetAll($sql);
			
			/*for($n3=0; $n3<count($subrows3); $n3++){
				$string.="　　　　------".$subrows3[$n3]['type_name']."<span style='font-size: 12px;color: #999999;font-style: italic;'>(id=".$subrows3[$n3]['id'].";update=".date('Y年m月d日 H:i:s',$subrows3[$n3]['update_time']).")</span> &nbsp;<a href='index.php?mod=editProType&id=".$subrows3[$n3]['id']."'><img src='other/images/edit.png' /></a>&nbsp;&nbsp;&nbsp;<a href='#' onclick=\"if(confirm('确定删除！')) location.href='index.php?mod=delProType&id=".$subrows3[$n3]['id']."'\"><img src='other/images/del.png' /></a><br>";
			}*/
		}
	}
	return $string;
}
?>