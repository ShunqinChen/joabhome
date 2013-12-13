<?php 
header("content-type:text/html;charset=gb2312");
/**
 * 处理代码开始
 */
//$comm->mysqldbdx->debug=1;
if ($IN['id']){
	$sql = "delete from pro_type_new where id=".$IN['id'];
	if (!$db->Execute($sql)){
		$message->mError('新产品类别删除失败~!');
	}else {
		$message->mError('新产品类别删除成功~!','proTypeInq_new');
	}
	
}

/**
 * 处理代码结束
 */


/**
 * body 开始
 */





?> 

