<?php 
header("content-type:text/html;charset=gb2312");
/**
 * 处理代码开始
 */
//$comm->mysqldbdx->debug=1;
if ($IN['ordernum']){
	$sql = "delete from pro_order_no  where ordernum_no='".$IN['ordernum']."'";
	if (!$db->Execute($sql)){
		$message->mError('订单删除失败~!');
	}else {
		$message->mError('订单删除成功~!','proOrder');
	}
	
}

/**
 * 处理代码结束
 */


/**
 * body 开始
 */





?> 

