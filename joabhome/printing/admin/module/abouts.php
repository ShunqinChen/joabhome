<?php 
header("content-type:text/html;charset=gb2312");
/**
 * ������뿪ʼ
 */
//$comm->mysqldbdx->debug=1;
if ($IN['sub']){
	$array = array('abouts'=>$IN['abouts'],
				   'contact'=>$IN['contact'],
				   'management'=>$IN['management'],
				   'service'=>$IN['service'],
				   'rd'=>$IN['rd'],
					);
	$item =  'id='.$IN['id'];
	$array = $db->trimStr($array);  //ȥ�������ַ�
	if (!$db->update('abouts',$array,$item)){
		$message->mError('�����޸�ʧ��~!');
	}else {
		$message->mError('�����޸ĳɹ�~!','abouts');
	}
}

/**
 * ����������
 */


/**
 * body ��ʼ
 */




//$message->mError('sdf','DD');
$sql = "select * from abouts ";
$rows = $db->GetAll($sql);
$page = new SmartTemplate("abouts.html"); 
$page->assign( 'id', $rows[0]['id'] ); 
$page->assign( 'abouts', $rows[0]['abouts'] ); 
$page->assign( 'contact', $rows[0]['contact'] ); 
$page->assign( 'management', $rows[0]['management'] ); 
$page->assign( 'service', $rows[0]['service'] ); 
$page->assign( 'rd', $rows[0]['rd'] ); 

/**
 * body ����
 */
$page->output(); 



?> 

