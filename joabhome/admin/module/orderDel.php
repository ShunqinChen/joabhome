<?php 
header("content-type:text/html;charset=gb2312");
/**
 * ������뿪ʼ
 */
//$comm->mysqldbdx->debug=1;
if ($IN['ordernum']){
	$sql = "delete from pro_order_no  where ordernum_no='".$IN['ordernum']."'";
	if (!$db->Execute($sql)){
		$message->mError('����ɾ��ʧ��~!');
	}else {
		$message->mError('����ɾ���ɹ�~!','proOrder');
	}
	
}

/**
 * ����������
 */


/**
 * body ��ʼ
 */





?> 

