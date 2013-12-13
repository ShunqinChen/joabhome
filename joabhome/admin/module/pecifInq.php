<?php
header("content-type:text/html;charset=gb2312");
/**
 * body ¿ªÊ¼
 */

$page = new SmartTemplate("pecifInq.html"); 

$sql = "select * from pro_pecif where pid=".$IN['id'];

$rows = DataPage(10,$sql);
//print_r($rows);
$item = array('mod'=>'pecifInq','user_name'=>'xiewj');


$page->assign( 'rows', $rows ); 
$page->assign( 'id', $IN['id'] ); 
$page->assign( 'links', $linkpage->link($item) );
/**
 * body ½áÊø
 */

$page->output(); 



?>