<?php
require('./xajax/xajax.inc.php'); //载入第三方库xajax
/*
 * xajax
 * 取得期刊数
 */

$xajax = new xajax(); 

/*将输出流的字符编码由UTF-8转化为指定的编码，这里我们定义的是“gb2312”
 * 如果要跟踪打印参数的话，可以先把这句注销掉
 */
$xajax->decodeUTF8InputOn();  

$xajax->registerFunction("opea");
$xajax->processRequests();

/*
 * 取得期刊数
 * @param $parm:杂志的ID号
 * @return 返回期刊的下拉列表
 */
function opea($parm){
	
	$objResponse = new xajaxResponse();
/*	$objResponse->addAlert(print_r($parm['price']));
	$objResponse->addAlert(print_r($parm['quantity']));*/
	for($i=0; $i<count($parm['quantity']); $i++){
		$toprice = $parm['quantity'][$i]*$parm['price'][$i];
		$totalprcie = $totalprcie+$toprice;
		$objResponse->addAssign("to_$i","innerHTML",$toprice);//在页面上显示任务编号
	}
	
		
	$objResponse->addAssign("totalprcie","innerHTML",$totalprcie);//在页面上显示任务编号
	$objResponse->addAlert("modify successful~!");
	
	return $objResponse;
}



?>