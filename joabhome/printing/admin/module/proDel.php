<?php 
header("content-type:text/html;charset=gb2312");
/**
 * ������뿪ʼ
 */
//$comm->mysqldbdx->debug=1;
if ($IN['id']){
	$sql = "delete from pro_info where id=".$IN['id'];
	if (!$db->Execute($sql)){
		$message->mError('��Ʒɾ��ʧ��~!');
	}else {
		$message->mError('��Ʒɾ���ɹ�~!','proInq');
	}
	
}

/**
 * ����������
 */


/**
 * body ��ʼ
 */





?> 

