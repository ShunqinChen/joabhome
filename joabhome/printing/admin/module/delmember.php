<?php 
header("content-type:text/html;charset=gb2312");
/**
 * 处理代码开始
 */
//$comm->mysqldbdx->debug=1;
if ($IN['id']){
	$sql = "delete from member where id=".$IN['id'];
	if (!$db->Execute($sql)){
		$message->mError('会员删除失败~!');
	}else {
		$message->mError('会员删除成功~!','member');
	}
	
}

/**
 * 处理代码结束
 */


/**
 * body 开始
 */





?> 

