<?php 
header("content-type:text/html;charset=gb2312");
/**
 * 处理代码开始
 */
//$comm->mysqldbdx->debug=1;
if ($IN['id']){
	$sql = "delete from pro_type where id=".$IN['id'];
	if (!$db->Execute($sql)){
		$message->mError('产品类别删除失败~!');
	}else {
		$message->mError('产品类别删除成功~!','proTypeInq');
	}
	
}

/**
 * 处理代码结束
 */


/**
 * body 开始
 */





?> 

