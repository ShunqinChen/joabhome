<?php 
header("content-type:text/html;charset=gb2312");
/**
 * ������뿪ʼ
 */
//$comm->mysqldbdx->debug=1;
if ($IN['id']){
	$sql = "delete from pro_type where id=".$IN['id'];
	if (!$db->Execute($sql)){
		$message->mError('��Ʒ���ɾ��ʧ��~!');
	}else {
		$message->mError('��Ʒ���ɾ���ɹ�~!','proTypeInq');
	}
	
}

/**
 * ����������
 */


/**
 * body ��ʼ
 */





?> 

