<?php 

header("content-type:text/html;charset=gb2312");

/**

 * ������뿪ʼ

 */

//$comm->mysqldbdx->debug=1;

if ($IN['subadmin']){

	$string = $IN['adminusername']."|".$IN['adminpass'];

	$fp = fopen('config.ini','w');

	$fp = fwrite($fp,$string);

	fclose($fp);

	$message->mError('�����޸ĳɹ�~!','editpass@dsfsdf*sdfsew!@wfe');

}

if ($IN['subdata']){

	$string = $IN['datausername']."|".$IN['datapass'];

	$fp = fopen('dataconfig.ini','w');

	$fp = fwrite($fp,$string);

	fclose($fp);

	$message->mError('�����޸ĳɹ�~!','editpass@dsfsdf*sdfsew!@wfe');

}



/**

 * ����������

 */





/**

 * body ��ʼ

 */









//$message->mError('sdf','DD');



$page = new SmartTemplate("editpass.html"); 

$fp = fopen('config.ini','r');

$string = fread($fp,1000);

$adminarray = explode('|',$string);

fclose('config.ini');

$page->assign( 'adminusername', $adminarray[0] ); 

$page->assign( 'adminpass', $adminarray[1] ); 





$fp = fopen('dataconfig.ini','r');

$string = fread($fp,1000);

$adminarray = explode('|',$string);

fclose('dataconfig.ini');

$page->assign( 'datausername', $adminarray[0] ); 

$page->assign( 'datapass', $adminarray[1] ); 



/**

 * body ����

 */

$page->output(); 





?> 



