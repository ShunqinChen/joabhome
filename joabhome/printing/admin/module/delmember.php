<?php 
header("content-type:text/html;charset=gb2312");
/**
 * ������뿪ʼ
 */
//$comm->mysqldbdx->debug=1;
if ($IN['id']){
	$sql = "delete from member where id=".$IN['id'];
	if (!$db->Execute($sql)){
		$message->mError('��Աɾ��ʧ��~!');
	}else {
		$message->mError('��Աɾ���ɹ�~!','member');
	}
	
}

/**
 * ����������
 */


/**
 * body ��ʼ
 */





?> 

