<?php 
header("content-type:text/html;charset=gb2312");
/**
 * ������뿪ʼ
 */
//$comm->mysqldbdx->debug=1;
if ($IN['sub']){
	$array = array('type_name'=>$IN['titleName'],
				   'update_time'=>time()
					);
	
	$array = $db->trimStr($array);  //ȥ�������ַ�
	if (!$db->insert('pro_type',$array)){
		$message->mError('��Ʒ������ʧ��~!');
	}else {
		$message->mError('��Ʒ�����ӳɹ�~!','proTypeInq');
	}
}

/**
 * ����������
 */


/**
 * body ��ʼ
 */




//$message->mError('sdf','DD');
$page = new SmartTemplate("proTypeAdd.html"); 

/**
 * body ����
 */
$page->output(); 



?> 

