<?php
header("content-type:text/html;charset=gb2312");
/**
 * body ¿ªÊ¼
 */

$page = new SmartTemplate("getbook.html"); 

$sql = "select * from getbook ";

$rows = DataPage(4,$sql);
for($i=0; $i<count($rows); $i++){
	$rows[$i]['up_date'] = date('Y-m-d',$rows[$i]['up_date']);
}
$item = array('mod'=>'getbook','user_name'=>'xiewj');


$page->assign( 'rows', $rows ); 
$page->assign( 'links', $linkpage->link($item) );
/**
 * body ½áÊø
 */

$page->output(); 



?>