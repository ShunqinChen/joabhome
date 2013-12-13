<?php
header("content-type:text/html;charset=gb2312");
/**
 * body ¿ªÊ¼
 */

$page = new SmartTemplate("member.html"); 
$where = " 1=1 ";
if($IN['userid']){
	$where .=" and id=".$IN['userid'];
}
$sql = "select * from member where ".$where;

$rows = DataPage(10,$sql);

$item = array('mod'=>'member','user_name'=>'xiewj');


$page->assign( 'rows', $rows ); 
$page->assign( 'links', $linkpage->link($item) );
/**
 * body ½áÊø
 */

$page->output(); 



?>