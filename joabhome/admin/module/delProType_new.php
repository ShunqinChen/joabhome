<?php 
header("content-type:text/html;charset=gb2312");
/**
 * ������뿪ʼ
 */
//$comm->mysqldbdx->debug=1;
if ($IN['id']){
	$sql = "delete from pro_type_new where id=".$IN['id'];
	if (!$db->Execute($sql)){
		$message->mError('�²�Ʒ���ɾ��ʧ��~!');
	}else {
		$message->mError('�²�Ʒ���ɾ���ɹ�~!','proTypeInq_new');
	}
	
}

/**
 * ����������
 */


/**
 * body ��ʼ
 */





?> 

