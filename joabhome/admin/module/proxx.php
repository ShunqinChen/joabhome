<?php

header("content-type:text/html;charset=gb2312");

/**

 * body 开始

 */

$allprice = 0;//总价

$page = new SmartTemplate("proxx.html"); 



$sql = "select * from pro_order where ordernum='".$IN['ordernum']."'";



$rows = DataPage(30,$sql);

//print_r($rows);

$item = array('mod'=>'proxx','user_name'=>'xiewj','ordernum'=>$IN['ordernum']);





$page->assign( 'rows', getInfo($rows) ); 

$page->assign( 'id', $IN['id'] ); 

$page->assign( 'allprice', $allprice ); 

$page->assign( 'ordernum', $IN['ordernum'] ); 

$page->assign( 'links', $linkpage->link($item) );

/**

 * body 结束

 */

$page->output(); 



function getInfo($array){

	global $allprice;

	$count = count($array);

	for($i=0; $i<$count; $i++){

		$array[$i]['oneprice'] = $array[$i]['price']*$array[$i]['nums'];

		$allprice = $allprice+$array[$i]['oneprice'];

	}

	return $array;

}

?>