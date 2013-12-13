<?php
function getParam() {
	
	$_GET[$_REQUEST['action_name']]=$_REQUEST['action_par'];
	$_REQUEST[$_REQUEST['action_name']]=$_REQUEST['action_par'];
	
	$param = '';
	if ($_REQUEST) {
		foreach ($_REQUEST as $k=>$y) {
/*			$y = intval($y);
			$y = stripcslashes($y);*/
			$param[$k] = $y; 
		}
	}
	
	if ($_POST) {
		foreach ($_POST as $k=>$y) {
			$param[$k] = $y; 
		}
	}
	if ($_GET) {
		foreach ($_GET as $k=>$y) {
			$param[$k] = $y; 
		}
	}
	return $param;
}

/*分页*/
function DataPage($pageSize=15,$sql){
		global $IN,$db,$linkpage;
		
		
		if($IN['pageNum']) $pageSize = $IN['pageNum']; //一页显示几条记录
		
		$nums = $db->RecordCount($sql);
		
		$IN['pager']?$pageCurr = $IN['pager']:$pageCurr = 1;
		$linkpage->page($nums,$pageSize,$pageCurr);
		$offset = $linkpage->_offset();
		$sql = $sql." limit $offset,$pageSize";
		$date = $db->GetAll($sql);
		
		return $date;
		
	}
?>