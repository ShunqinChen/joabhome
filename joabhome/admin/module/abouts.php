<?php 
header("content-type:text/html;charset=gb2312");
/**
 * ������뿪ʼ
 */
//$comm->mysqldbdx->debug=1;
if ($IN['sub']){
	$array = array('abouts'=>$IN['abouts'],
				   'brief'=>$IN['brief'],
				   'service'=>$IN['service'],
				   'payment'=>$IN['payment'],
				   'faq'=>$IN['faq'],
				   'news'=>$IN['news'],
				   'shippment'=>$IN['shippment']
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
$page->assign( 'brief', $rows[0]['brief'] ); 
$page->assign( 'service', $rows[0]['service'] ); 
$page->assign( 'faq', $rows[0]['faq'] ); 
$page->assign( 'news', $rows[0]['news'] ); 
$page->assign( 'shippment', $rows[0]['shippment'] ); 
$page->assign( 'payment', $rows[0]['payment'] ); 

/**
 * body ����
 */
$page->output(); 



?> 

