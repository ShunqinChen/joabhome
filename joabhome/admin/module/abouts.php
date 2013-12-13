<?php 
header("content-type:text/html;charset=gb2312");
/**
 * 处理代码开始
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
	$array = $db->trimStr($array);  //去除特殊字符
	if (!$db->update('abouts',$array,$item)){
		$message->mError('内容修改失败~!');
	}else {
		$message->mError('内容修改成功~!','abouts');
	}
}

/**
 * 处理代码结束
 */


/**
 * body 开始
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
 * body 结束
 */
$page->output(); 



?> 

