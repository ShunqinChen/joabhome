<?php 
header("content-type:text/html;charset=gb2312");
/**
 * ������뿪ʼ
 */
//$comm->mysqldbdx->debug=1;
if ($IN['id']){
	$sql = "delete from getbook where id=".$IN['id'];
	if (!$db->Execute($sql)){
		$message->mError('����ɾ��ʧ��~!');
	}else {
		$message->mError('����ɾ���ɹ�~!','getbook');
	}
	
}

/**
 * ����������
 */


/**
 * body ��ʼ
 */





?> 

