<?php 
header("content-type:text/html;charset=gb2312");
/**
 * 处理代码开始
 */
//$comm->mysqldbdx->debug=1;
if ($IN['id']){
	$sql = "delete from getbook where id=".$IN['id'];
	if (!$db->Execute($sql)){
		$message->mError('留言删除失败~!');
	}else {
		$message->mError('留言删除成功~!','getbook');
	}
	
}

/**
 * 处理代码结束
 */


/**
 * body 开始
 */





?> 

