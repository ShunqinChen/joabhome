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
	$item =  'id='.$IN['id'];
	$array = $db->trimStr($array);  //ȥ�������ַ�
	if (!$db->update('pro_type',$array,$item)){
		$message->mError('��Ʒ����޸�ʧ��~!');
	}else {
		$message->mError('��Ʒ����޸ĳɹ�~!','proTypeInq');
	}
}

/**
 * ����������
 */


/**
 * body ��ʼ
 */




//$message->mError('sdf','DD');
$sql = "select * from pro_type where id=".$IN['id'];
$rows = $db->GetAll($sql);
$page = new SmartTemplate("proTypeEdit.html"); 
$page->assign( 'id', $IN['id'] ); 
$page->assign( 'title', $rows[0]['type_name'] ); 

/**
 * body ����
 */
$page->output(); 



?> 

