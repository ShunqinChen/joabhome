<?php
require('./xajax/xajax.inc.php'); //�����������xajax
/*
 * xajax
 * ȡ���ڿ���
 */

$xajax = new xajax(); 

/*����������ַ�������UTF-8ת��Ϊָ���ı��룬�������Ƕ�����ǡ�gb2312��
 * ���Ҫ���ٴ�ӡ�����Ļ��������Ȱ����ע����
 */
$xajax->decodeUTF8InputOn();  

$xajax->registerFunction("opea");
$xajax->processRequests();

/*
 * ȡ���ڿ���
 * @param $parm:��־��ID��
 * @return �����ڿ��������б�
 */
function opea($parm){
	
	$objResponse = new xajaxResponse();
/*	$objResponse->addAlert(print_r($parm['price']));
	$objResponse->addAlert(print_r($parm['quantity']));*/
	for($i=0; $i<count($parm['quantity']); $i++){
		$toprice = $parm['quantity'][$i]*$parm['price'][$i];
		$totalprcie = $totalprcie+$toprice;
		$objResponse->addAssign("to_$i","innerHTML",$toprice);//��ҳ������ʾ������
	}
	
		
	$objResponse->addAssign("totalprcie","innerHTML",$totalprcie);//��ҳ������ʾ������
	$objResponse->addAlert("modify successful~!");
	
	return $objResponse;
}



?>