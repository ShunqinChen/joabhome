<?php 
header("content-type:text/html;charset=gb2312");
/**
 * 处理代码开始
 */
//$comm->mysqldbdx->debug=1;
if ($IN['sub']){
	$array = array('type_name'=>$IN['titleName'],
				   'update_time'=>time()
					);
	$item =  'id='.$IN['id'];
	$array = $db->trimStr($array);  //去除特殊字符
	if (!$db->update('pro_type',$array,$item)){
		$message->mError('产品类别修改失败~!');
	}else {
		$message->mError('产品类别修改成功~!','proTypeInq');
	}
}

/**
 * 处理代码结束
 */


/**
 * body 开始
 */




//$message->mError('sdf','DD');
$sql = "select * from pro_type where id=".$IN['id'];
$rows = $db->GetAll($sql);
$page = new SmartTemplate("proTypeEdit.html"); 
$page->assign( 'id', $IN['id'] ); 
$page->assign( 'title', $rows[0]['type_name'] ); 

/**
 * body 结束
 */
$page->output(); 



?> 

